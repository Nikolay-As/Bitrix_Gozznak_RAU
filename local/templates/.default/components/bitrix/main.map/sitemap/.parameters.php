<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$GLOBALS["arrMainMenu"] = explode(",",COption::GetOptionString("main","map_top_menu_type","top"));
$GLOBALS["arrChildMenu"] = explode(",",COption::GetOptionString("main","map_left_menu_type","left"));
$GLOBALS["arrSearchPath"] = array();

if (!function_exists('GetTree'))
{
	function GetTree($dir, $max_depth, $get_description = false)
	{
		$arMap = GetTreeRecursive($dir, 0, $max_depth, $get_description);

		return $arMap;
	}
}

if (!function_exists('GetTreeRecursive'))
{
	function GetTreeRecursive($PARENT_PATH, $level, $max_depth, $get_description = false)
	{
		/** @noinspection PhpUnusedLocalVariableInspection */
		global $arrMainMenu, $arrChildMenu, $arrSearchPath, $APPLICATION, $USER;

		static $arIndexes = false;
		if($arIndexes === false)
			$arIndexes = GetDirIndexArray();

		$arrMenu = $level == 0 ? $arrMainMenu : $arrChildMenu;

		$map = array();

		if(is_array($arrMenu) && count($arrMenu)>0)
		{
			foreach($arrMenu as $mmenu)
			{
				$menu_file = ".".trim($mmenu).".menu.php";
				$menu_file_ext = ".".trim($mmenu).".menu_ext.php";

				$aMenuLinks = array();
				$bExists = false;

				if(file_exists($PARENT_PATH.$menu_file))
				{
					include($PARENT_PATH.$menu_file);
					$bExists = true;
				}

				if(file_exists($PARENT_PATH.$menu_file_ext))
				{
					include($PARENT_PATH.$menu_file_ext);
					$bExists = true;
				}

				if ($bExists && is_array($aMenuLinks))
				{
					foreach ($aMenuLinks as $aMenu)
					{
						if (strlen($aMenu[0]) <= 0) continue;
						if(count($aMenu)>4)
						{
							$CONDITION = $aMenu[4];
							if(strlen($CONDITION)>0 && (!eval("return ".$CONDITION.";")))
								continue;
						}

						$search_child = false;
						$search_path = '';
						$full_path = '';
						if ($aMenu[1] <> '')
						{
							if(preg_match("'^(([A-Za-z]+://)|mailto:|javascript:)'i", $aMenu[1]))
							{
								$full_path = $aMenu[1];
							}
							else
							{
								$full_path = trim(Rel2Abs(substr($PARENT_PATH, strlen($_SERVER["DOCUMENT_ROOT"])), $aMenu[1]));

								$slash_pos = strrpos($full_path, "/");
								if ($slash_pos !== false)
								{
									$page = substr($full_path, $slash_pos+1);
									if(($pos = strpos($page, '?')) !== false)
										$page = substr($page, 0, $pos);
									if($page == '' || $page == 'index.php' || in_array($page, $arIndexes))
									{
										$search_path = substr($full_path, 0, $slash_pos+1);
										$search_child = true;
									}
								}
							}
						}

						if ($full_path <> '')
						{
							$FILE_ACCESS = (preg_match("'^(([A-Za-z]+://)|mailto:|javascript:)'i", $full_path)) ? "R" : $APPLICATION->GetFileAccessPermission($full_path);

							if ($FILE_ACCESS!="D" && $aMenu[3]["SEPARATOR"]!="Y")
							{
								$is_dir = ($search_child && is_dir($_SERVER["DOCUMENT_ROOT"].$search_path)) ? "Y" : "N";
								if ($is_dir=="Y")
								{
									$search_child &= $level < $max_depth;
									$search_child &= !in_array($search_path, $arrSearchPath);
								}
								else
								{
									$search_child = false;
								}

								$ar = array();
								$ar["LEVEL"] = $level;
								if(isset($aMenu[3]["DEPTH_LEVEL"]) && $aMenu[3]["DEPTH_LEVEL"] > 1)
									$ar["LEVEL"] += ($aMenu[3]["DEPTH_LEVEL"] - 1);

								if($ar["LEVEL"] > $max_depth)
									continue;

								$ar["ID"] = md5($full_path.$ar["COUNTER"]);
								$ar["IS_DIR"] = is_dir($_SERVER["DOCUMENT_ROOT"].$full_path) ? "Y" : "N";
								$ar["NAME"] = $aMenu[0];
								$ar["PATH"] = $PARENT_PATH;
								$ar["FULL_PATH"] = $full_path;
								$ar["SEARCH_PATH"] = $search_path;
								$ar["DESCRIPTION"] = "";

								if ($get_description && $ar["IS_DIR"] == "Y")
								{
									if (file_exists($_SERVER["DOCUMENT_ROOT"].$full_path.".section.php"))
									{
										$arDirProperties = array();
										include($_SERVER["DOCUMENT_ROOT"].$full_path.".section.php");
										if($arDirProperties["description"] <> '')
											$ar["DESCRIPTION"] = $arDirProperties["description"];
									}
								}

								if ($search_child)
								{
									$arrSearchPath[] = $search_path;
									$ar["CHILDREN"] = GetTreeRecursive($_SERVER["DOCUMENT_ROOT"].$ar["SEARCH_PATH"], $level+1, $max_depth, $get_description);
								}

								$map[] = $ar;
							}
						}
					}
				}
			}
		}

		return $map;
	}
}

if (!function_exists('CreateMapStructure'))
{
	function CreateMapStructure($arMap)
	{
		$arReturn = array();

		foreach ($arMap as $key => $arMapItem)
		{
			$arChildrenItems = $arMapItem["CHILDREN"];
			unset($arMapItem["CHILDREN"]);

			$arMapItem["STRUCT_KEY"] = $key;

			$arReturn[] = $arMapItem;
			if (is_array($arChildrenItems) && count($arChildrenItems) > 0)
			{
				$arChildren = CreateMapStructure($arChildrenItems);
				$arReturn = array_merge($arReturn, $arChildren);
			}
		}

		return $arReturn;
	}
}

$defaultSite = "";
$arSites = array();
$arPaths = array();

$sl = CLang::GetList($dummy1="", $dummy2="");
while ($slr = $sl->Fetch())
{
	if(!$defaultSite)
		$defaultSite = $slr["LID"];
	$arSites[$slr["LID"]] = '['.$slr["LID"].'] '.$slr["NAME"];
	$arPaths[$slr["LID"]] = $slr["DIR"];
}

$selSite = strlen($arCurrentValues['SITE_ID']) > 0 ? $arCurrentValues['SITE_ID'] : $defaultSite;

$arMapStruct = GetTree($_SERVER["DOCUMENT_ROOT"].$arPaths[$selSite], $arCurrentValues['LEVEL'], false);
$arMap = CreateMapStructure($arMapStruct);

$arTemplateParameters = array(
	"SITE_ID" => array(
		"NAME" => GetMessage("MSM_SITE_ID"),
		"TYPE" => "LIST",
		"VALUES" => $arSites,
		"REFRESH" => "Y",
		"DEFAULT" => $defaultSite
	),
	"SHOW_CONTROL" => array(
		"NAME" => GetMessage("MSM_SETTINGS"),
		"TYPE" => "CUSTOM",
		"JS_FILE" => "/local/templates/.default/components/bitrix/main.map/sitemap/settings/settings.js",
		"JS_EVENT" => "OnSitemapSettingsLoad",
		"JS_DATA" => json_encode(array('tree' => $arMap, 'val' => $arCurrentValues['SHOW_CONTROL'])),
		"DEFAULT" => "",
		"REFRESH" => "N",
	),
);
?>
<?echo "<pre>"; print_r($arSitesCopy); echo "</pre>";?>
