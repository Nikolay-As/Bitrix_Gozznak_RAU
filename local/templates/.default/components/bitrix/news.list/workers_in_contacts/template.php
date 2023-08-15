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

<?if(count($arResult["ITEMS"]) > 0):?>

<div>

	<div class="im-common-heading-big im-common-mb30"><?=$arParams["BLOCK_TITLE"] ?: GetMessage("CT_BNL_BLOCK_TITLE");?></div>

	<ul class="im-common-list">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

	<li class="im-common-clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="im-contacts-person-img im-common-fl im-common-mb20 im-common-bg" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);"></div>
		<div class="im-contacts-person-info im-common-fl im-common-mb40">
			<p class="im-common-heading-regular im-common-mb10"><?echo $arItem["NAME"]?></p>
			<?if($arItem["DISPLAY_PROPERTIES"]["POST"]["VALUE"]):?>
			<p class="im-common-clr-black im-common-mb30"><?=$arItem["DISPLAY_PROPERTIES"]["POST"]["VALUE"];?></p>
			<?endif;?>
			<?if($arItem["DISPLAY_PROPERTIES"]["PHONE"]["VALUE"]):?>
			<p class="im-common-mb7"><b><?=$arItem["DISPLAY_PROPERTIES"]["PHONE"]["NAME"];?>:</b>&nbsp;<?=$arItem["DISPLAY_PROPERTIES"]["PHONE"]["VALUE"];?></p>
			<?endif;?>
			<?if($arItem["DISPLAY_PROPERTIES"]["EMAIL"]["VALUE"]):?>
			<div><b><?=$arItem["DISPLAY_PROPERTIES"]["EMAIL"]["NAME"];?>:</b>&nbsp;<a href="mailto:<?=$arItem["DISPLAY_PROPERTIES"]["EMAIL"]["VALUE"];?>"><?=$arItem["DISPLAY_PROPERTIES"]["EMAIL"]["VALUE"];?></a></div>
			<?endif;?>
		</div>
	</li>

<?endforeach;?>

	</ul>

</div>

<?endif;?>