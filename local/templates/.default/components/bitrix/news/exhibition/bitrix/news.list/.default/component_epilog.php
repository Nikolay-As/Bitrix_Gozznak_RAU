<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

if (isset($arResult['TITLE']))
    $APPLICATION->SetTitle($arResult['TITLE']);
?>