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

<div class="is-row is-col-stack-24">

<?foreach($arResult["ITEMS"] as $arItem):?>

<div class="is-col is-33">
  <div class="is-stack-12">
    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
      <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" />
    </a>
  </div>
  <div class="is-stack-20">
    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="is-big color-green"><?= $arItem["NAME"] ?></a>
  </div>
  <div class="is-large color-green"><?= $arItem["PROPERTIES"]["price"]["VALUE"] ?> ₽</div>
</div>

<?endforeach;?>

<div class="is-col is-33"></div>
<div class="is-col is-33"></div>
</div>

