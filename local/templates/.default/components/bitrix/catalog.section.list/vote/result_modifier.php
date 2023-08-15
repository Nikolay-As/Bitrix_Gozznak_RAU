<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult["SECTIONS"] as $key=>$arSection)
{
	$res = CIBlockElement::GetList(array("SORT"=>"ASC", "NAME"=>"ASC"), array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE"=>"Y", "SECTION_ID"=>$arSection['ID']), false, false,
		array("PREVIEW_PICTURE", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT"));
	$items = array();
	while($ar_res = $res->GetNext())
	{
		if(!is_array($ar_res["PREVIEW_PICTURE"]) && $ar_res["PREVIEW_PICTURE"])
		{
			$ar_res["PREVIEW_PICTURE"] = CFile::GetFileArray($ar_res["PREVIEW_PICTURE"]);
		}
		$items[] = $ar_res;
	}
	$arResult["SECTIONS"][$key]["ITEMS"] = $items;
}
?>