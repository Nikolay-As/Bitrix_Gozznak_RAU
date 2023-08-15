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

<div class="is-row is-col-stack-24 is-stack-40">

	<?foreach($arResult["ITEMS"] as $arItem):?>

		<div class="is-col is-33">
      <div class="is-big is-stack-12"><i><?= FormatDate('d F', strtotime( $arItem['ACTIVE_FROM'])); ?></i></div>
      <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="h3 is-stack-24 color-green"><?= $arItem['NAME'] ?></a>
      <?= $arItem['PREVIEW_TEXT'] ?>
    </div>

	<?endforeach;?>

	</div>

<?endif;?>
