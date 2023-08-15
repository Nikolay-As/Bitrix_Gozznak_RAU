<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/*
if (isset($arResult["DISPLAY_PROPERTIES"]["PHOTO_PREV"]))
{
	$arResult["DISPLAY_PROPERTIES"]["PHOTO_PREV"]["PHOTOS_COUNT"] = count ($arResult["DISPLAY_PROPERTIES"]["PHOTO_PREV"]["VALUE"]);
	
	foreach ($arResult["DISPLAY_PROPERTIES"]["PHOTO_PREV"]["VALUE"] as $key=>$photo_id)
	{
		$photo = array();
		
		$tmp = CFile::ResizeImageGet($photo_id, array('width'=>395, 'height'=>395), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
		$photo["SMALL"] = $tmp[src];					
		
		$tmp = CFile::ResizeImageGet($photo_id, array('width'=>1000, 'height'=>1000), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
		$photo["FULL"] = $tmp[src];		
		
		$photo["DESCRIPTION"] = $arResult["DISPLAY_PROPERTIES"]["PHOTO_PREV"]["DESCRIPTION"][$key];
		
		$photo["LINKED_VIDEO"] = $arResult["DISPLAY_PROPERTIES"]["VIDEO"]["~VALUE"][$key];
		
		$arResult["DISPLAY_PROPERTIES"]["PHOTO_PREV"]["RESIZED"][] = $photo;		
	}			
}*/
?>