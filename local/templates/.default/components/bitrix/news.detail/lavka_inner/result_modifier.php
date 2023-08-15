<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$this->__component->SetResultCacheKeys(array(
    "NAME",
    "PREVIEW_TEXT",
    "PREVIEW_PICTURE"
));

if (isset($arResult["PROPERTIES"]["SLIDER"]))
{
	$arResult["PROPERTIES"]["SLIDER"]["PHOTOS_COUNT"] = count ($arResult["PROPERTIES"]["SLIDER"]["VALUE"]);
	if ($arResult["PROPERTIES"]["SLIDER"]["PHOTOS_COUNT"] === 1)
	{
		$tmp = CFile::ResizeImageGet($arResult["PROPERTIES"]["SLIDER"]["VALUE"][0], array('width'=>800, 'height'=>800), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
		$arResult["PROPERTIES"]["SLIDER"]["RESIZED"]["SMALL"] = $tmp[src];
			
		$tmp = CFile::ResizeImageGet($arResult["PROPERTIES"]["SLIDER"]["VALUE"][0], array('width'=>600, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
		$arResult["PROPERTIES"]["SLIDER"]["RESIZED"]["FULL"] = $tmp[src];				
		
		$arResult["PROPERTIES"]["SLIDER"]["RESIZED"]["DESCRIPTION"] = $arResult["PROPERTIES"]["SLIDER"]["DESCRIPTION"][0];
	}
	else
	{
		foreach ($arResult["PROPERTIES"]["SLIDER"]["VALUE"] as $key=>$photo_id)
		{
			$photo = array();
			
			$tmp = CFile::ResizeImageGet($photo_id, array('width'=>800, 'height'=>800), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
			$photo["SMALL"] = $tmp[src];					
			
			$tmp = CFile::ResizeImageGet($photo_id, array('width'=>1200, 'height'=>1200), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
			$photo["FULL"] = $tmp[src];		
			
			$photo["DESCRIPTION"] = $arResult["PROPERTIES"]["SLIDER"]["DESCRIPTION"][$key];
			
			$arResult["PROPERTIES"]["SLIDER"]["RESIZED"][] = $photo;		
		}		
	}
}
?>