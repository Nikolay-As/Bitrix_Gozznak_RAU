<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if (isset($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]))
{
	$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["PHOTOS_COUNT"] = count ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["VALUE"]);
	
	foreach ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["VALUE"] as $key=>$photo_id)
	{
		$photo = array();
		
		$tmp = CFile::ResizeImageGet($photo_id, array('width'=>395, 'height'=>395), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
		$photo["SMALL"] = $tmp[src];					
		
		$tmp = CFile::ResizeImageGet($photo_id, array('width'=>1000, 'height'=>1000), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
		$photo["FULL"] = $tmp[src];		
		
		$photo["DESCRIPTION"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["DESCRIPTION"][$key];
		
		$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"][] = $photo;		
	}			
}
?>