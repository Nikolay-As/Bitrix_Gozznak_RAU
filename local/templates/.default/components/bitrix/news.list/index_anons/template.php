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
<?if(!empty($arResult["ITEMS"])):?>

<div class="is-row sub-hero-anons">

	<?foreach($arResult["ITEMS"] as $arItem):?>

        <div class="is-col is-35 sub-hero-anons__image">
          <a href="<?=$arItem["PROPERTIES"]["CUSTOM_LINK"]["VALUE"];?>">
            <div class="sub-hero-anons__image__back" style="background-image:url('<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>')"></div>
          </a>
        </div>
        <div class="is-col is-65 is-inset-y-80 is-inset-left-40 is-inset-right-20">
          <div class="shape-polygon"></div>
          <div class="text">
            <a href="<?=$arItem["PROPERTIES"]["CUSTOM_LINK"]["VALUE"];?>">
              <div class="is-big is-stack-12"><i><?=$arItem["PROPERTIES"]["CUSTOM_DATE"]["VALUE"];?></i></div>
              <h3 class="is-stack-20"><?= $arItem["NAME"] ?></h3>
                <?= $arItem["PREVIEW_TEXT"] ?>
            </a>
          </div>
        </div>

	<?endforeach;?>

</div>

<?endif;?>