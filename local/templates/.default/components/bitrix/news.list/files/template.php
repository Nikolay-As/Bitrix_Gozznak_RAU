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

	<div class="im-common-bg-palegreen im-common-p20 im-common-mt30 im-download_links">
		<div class="im-common-mb15"><b><?=GetMessage("CT_BNL_FILES_TITLE");?>:</b></div>

	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

		if(intval($arItem["PROPERTIES"]["FILE"]["VALUE"]) == 0)
			continue;
		?>

			<a id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="<?=CFile::GetPath($arItem["PROPERTIES"]["FILE"]["VALUE"]);?>" target="_blank"><?echo $arItem["NAME"]?></a><br />

	<?endforeach;?>

	</div>

<?endif;?>
