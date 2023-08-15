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

<div class="sub-hero-slider">



<div class="sub-hero-slider__track">

<?foreach($arResult["ITEMS"] as $arItem):?>

  <div>
    <div class="is-row is-items-middle">
      <div class="is-col is-30">
        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" />
      </div>
      <div class="is-col is-70">
        <div class="is-big is-stack-12"><i><a href="<?= LANGUAGE_ID === 'ru' ? '/about/collection/' : '/en/about/collection/'; ?>"><?= LANGUAGE_ID === 'ru' ? 'Наша коллекция' : 'Collection'; ?></a></i></div>
        <h3 class="is-stack-20"><?= $arItem["NAME"] ?></h3>
        <?= $arItem["PREVIEW_TEXT"] ?>
      </div>
    </div>
  </div>

<?endforeach;?>

</div>

        <div class="sub-hero-slider__controls">
          <button class="sub-hero-slider__controls__button sub-hero-slider__controls__button--prev">
            <</button> <button class="sub-hero-slider__controls__button sub-hero-slider__controls__button--next">>
          </button>
        </div>
      </div>
