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

<div class="lavka-slider is-stack-80">
  <div class="lavka-slider__track">

<?foreach($arResult["ITEMS"] as $arItem):?>

<div>
  <div class="lavka-slider__item">
    <div class="lavka-slider__item__image">
      <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" />
    </div>
    <div class="lavka-slider__item__title">
      <?= $arItem["NAME"] ?>
    </div>
  </div>
</div>

<?endforeach;?>

</div>

<div class="lavka-slider__controls">
  <button class="lavka-slider__controls__button lavka-slider__controls__button--prev">
    <</button> <button class="lavka-slider__controls__button lavka-slider__controls__button--next">>
  </button>
</div>
</div>
