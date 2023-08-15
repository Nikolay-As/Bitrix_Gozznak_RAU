<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$picture = "http://museum.goznak.ru/images/museum_logo_social.jpg";
if(isset($arResult["PREVIEW_PICTURE"]) && (strlen($arResult["PREVIEW_PICTURE"]["SRC"]) > 0))
{
	$picture = "http://museum.goznak.ru".$arResult["PREVIEW_PICTURE"]["SRC"];
}

$APPLICATION->AddHeadString('<meta property="og:title" content="' . $arResult["NAME"] . '" />');
$APPLICATION->AddHeadString('<meta property="og:description" content="' . strip_tags($arResult["PREVIEW_TEXT"]) . '" />');
$APPLICATION->AddHeadString('<meta property="og:image" content="'.$picture.'" />');
?>

<?//if($USER->IsAdmin()): echo "<pre>"; print_r($arResult); echo "</pre>"; endif;?>