<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

global $APPLICATION;
$cp = $this->__component; 
if (is_object($cp))
{
	$cp->arResult['TITLE'] = $arResult["SECTION"]["PATH"][(count($arResult["SECTION"]["PATH"]) - 1)]["NAME"];    	
	$cp->arResult['SEC_DESCRIPTION'] = $arResult["SECTION"]["PATH"][(count($arResult["SECTION"]["PATH"]) - 1)]["DESCRIPTION"];    	
	$cp->SetResultCacheKeys(array("TITLE", "SEC_DESCRIPTION"));
	
	$arResult['SEC_DESCRIPTION'] = $cp->arResult['SEC_DESCRIPTION'];
}		
?>