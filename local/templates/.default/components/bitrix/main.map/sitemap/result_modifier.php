<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Custom for museum

// Do not show sitemap if empty parameter "SHOW_CONTROL" in component's parameters
if(!isset($arParams["SHOW_CONTROL"]) || empty($arParams["SHOW_CONTROL"]))
	$arResult["arMap"] = array();

if (is_array($arResult["arMap"]) && count($arResult["arMap"]) > 0)
{
	$arMapTmp = array();
	$lastUnvisLevel = false;
	foreach($arResult["arMap"] as &$arPath)
	{
		if($lastUnvisLevel !== false && $arPath["LEVEL"] > $lastUnvisLevel)
			continue;

		if($lastUnvisLevel !== false && $arPath["LEVEL"] <= $lastUnvisLevel)
			$lastUnvisLevel = false;

		if(isset($arParams["SHOW_CONTROL"][$arPath["ID"]]) && $arParams["SHOW_CONTROL"][$arPath["ID"]] == "Y")
		{
			$arMapTmp[] = $arPath;
		}
		else
		{
			$lastUnvisLevel = $arPath["LEVEL"];
		}
	}
	$arResult["arMap"] = $arMapTmp;
}