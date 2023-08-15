<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$this->__component->SetResultCacheKeys(array(
    "NAME",
    "PREVIEW_TEXT",
    "PREVIEW_PICTURE"
));

if (isset($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]))
{
	$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["PHOTOS_COUNT"] = count ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["VALUE"]);
	if ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["PHOTOS_COUNT"] === 1)
	{
		$tmp = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["VALUE"][0], array('width'=>400, 'height'=>400), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
		$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"]["SMALL"] = $tmp[src];
			
		$tmp = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["VALUE"][0], array('width'=>1000, 'height'=>1000), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
		$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"]["FULL"] = $tmp[src];				
		
		$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"]["DESCRIPTION"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["DESCRIPTION"][0];
	}
	else
	{
		foreach ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["VALUE"] as $key=>$photo_id)
		{
			$photo = array();
			
			$tmp = CFile::ResizeImageGet($photo_id, array('width'=>400, 'height'=>400), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
			$photo["SMALL"] = $tmp[src];					
			
			$tmp = CFile::ResizeImageGet($photo_id, array('width'=>1000, 'height'=>1000), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
			$photo["FULL"] = $tmp[src];		
			
			$photo["DESCRIPTION"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["DESCRIPTION"][$key];
			
			$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"][] = $photo;		
		}		
	}
}
?>