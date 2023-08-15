<?
IncludeModuleLangFile(__FILE__);
$module_rights = $APPLICATION->GetGroupRight("labsu.cross");

if ($USER->IsAdmin())
{
	$arItems = Array(
		Array(
			"text" => GetMessage("LS_CROSS_MENU"),
			"url" => "ls_cross.php",
			"more_url" => array(),
			"title" => GetMessage("LS_CROSS_MENU_TITLE")
		),
	);
	$aMenu = array(
		"parent_menu" => "global_menu_content",
		"section" => "labsu.cross",
		"sort" => 800,
		"text" => GetMessage("LS_CROSS_MENU"),
		"title" => GetMessage("LS_CROSS_MENU_TITLE"),
		"icon" => "cross_menu_icon",
		"page_icon" => "",
		"items_id" => "ls_cross_menu",
		"items" => $arItems,
	);
	return $aMenu;
}
else
{
	return false;
}
?>