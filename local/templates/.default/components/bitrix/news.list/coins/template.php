<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>



<?foreach($arResult["ITEMS"] as $arItem):?>

	<h3><?= $arItem["NAME"] ?></h3>
	<p class="is-small"><?= $arItem["PREVIEW_TEXT"] ?></p>
<div class="is-row is-stack-40">
	<div class="is-col is-60">
	<div class="lightbox">
		<a href="<?=$arItem['PREVIEW_PICTURE']['RESIZED']['FULL']["SRC"]?>">
			<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" />
		</a>
		</div>
</div>
	<div class="is-col is-40">
	<p><?= $arItem["DETAIL_TEXT"] ?></p>
</div>
</div>



<?endforeach;?>

