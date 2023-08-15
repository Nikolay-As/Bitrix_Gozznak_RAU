<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if (isset($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]))
{
	$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["PHOTOS_COUNT"] = count ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["VALUE"]);
	
	foreach ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["VALUE"] as $key=>$photo_id)
	{
		$photo = array();
		
		$photo["FULL"] = CFile::GetPath($photo_id);
		
		$tmp = CFile::ResizeImageGet($photo_id, array('width'=>300, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
		$photo["SMALL"] = $tmp[src];					
		
		$tmp = CFile::ResizeImageGet($photo_id, array('width'=>800, 'height'=>800), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
		$photo["MIDDLE"] = $tmp[src];		
		
		$photo["DESCRIPTION"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["DESCRIPTION"][$key];
		
		$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"][] = $photo;		
	}			
}
?>