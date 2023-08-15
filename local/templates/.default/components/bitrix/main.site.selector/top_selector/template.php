<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if($USER->IsAdmin()):?><?echo "<pre>";?><?print_r($arResult);?><?echo "</pre>";?><?endif;?>

<?
	foreach ($arResult["SITES"] as $key => $arSite):?>
		<?if ($arSite["CURRENT"] == "Y"):?>
			<span class="im-lang-item im-lang-item__active" title="<?=$arSite["NAME"]?>"><?=$arSite["NAME"]?></span>
		<?else:?>
			<a href="<?if(is_array($arSite['DOMAINS']) && strlen($arSite['DOMAINS'][0]) > 0 || strlen($arSite['DOMAINS']) > 0):?>http://<?endif?><?=(is_array($arSite["DOMAINS"]) ? $arSite["DOMAINS"][0] : $arSite["DOMAINS"])?><?=$arSite["DIR"]?>" class="im-lang-item" title="<?=$arSite["NAME"]?>"><?=$arSite["NAME"]?></a>
		<?endif?>
	<?endforeach;
?>

<?/*foreach ($arResult["SITES"] as $key => $arSite):?>
		<?if ($arSite["CURRENT"] != "Y"):?>
			<?//<span class="im-lang-item im-lang-item__active" title="<?=$arSite["NAME"]?>"><?=$arSite["NAME"]?></span>?>

			<a href="<?if(is_array($arSite['DOMAINS']) && strlen($arSite['DOMAINS'][0]) > 0 || strlen($arSite['DOMAINS']) > 0):?>http://<?endif?><?=(is_array($arSite["DOMAINS"]) ? $arSite["DOMAINS"][0] : $arSite["DOMAINS"])?><?=$arSite["DIR"]?>" class="im-lang-item" title="<?=$arSite["NAME"]?>"><?=$arSite["NAME"]?></a>
	<?endif;
endforeach;*/?>