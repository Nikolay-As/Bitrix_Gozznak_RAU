<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

array_pop($arResult);

$homeName = LANGUAGE_ID === 'ru' ? 'Главная' : 'Home';

$strReturn = '';
$strReturn .= '<div class="breadcrumbs"><a href="/"><span>'.$homeName.'</span></a>';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
    if( $index > 0 ) {

    }
	$strReturn .= '<span>&nbsp;&nbsp;&mdash;&nbsp;&nbsp;</span><a href="'.$arResult[$index]["LINK"].'"><span>'.$title.'</span></a>';
}

$strReturn .= '</div>';

return $strReturn;
