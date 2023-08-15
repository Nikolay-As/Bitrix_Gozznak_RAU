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

<div class="hero__slider">

<?foreach($arResult["ITEMS"] as $arItem):?>

<div class="hero__slider__item" data-title="<?= $arItem["PREVIEW_TEXT"] ?>" data-desc="<?= $arItem["DETAIL_TEXT"] ?>" data-link="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"];?>">
        <img class="tns-lazy-img" data-src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" />
</div>	

<?endforeach;?>

</div>

<div class="hero__panel noise">
  <div class="rev-skew">
	  <a href="<?= LANGUAGE_ID === 'ru' ? '/' : '/en/' ?>">
        <svg class="svg-icon svg-icon--logo is-hidden-mobile">
                <use xlink:href="#logo-01"></use>
        </svg>
      </a>
      <div class="hero__panel__text">
        <div class="is-big is-stack-20"><?= getMessage("EXPOSITION"); ?></div>
        <a href="#" class="hero__panel__text__title">

        </a>
        <div class="hero__panel__text__desc">

        </div>
        <div class="hero__panel__text__nav">
        <?foreach($arResult["ITEMS"] as $arItem):?>
                <div></div>
          <?endforeach;?>
        </div>
      </div>
    </div>
</div>