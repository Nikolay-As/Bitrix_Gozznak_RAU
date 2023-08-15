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

<ul class="im-common-list im-news">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<li class="im-news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="im-common-heading-regular im-common-mb10">
				<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
					<?echo $arItem["NAME"]?>
				<?endif;?>
			</div>
			<div class="im-common-mb20">
				<div class="im-common-mb20">
					<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
						<?echo $arItem["PREVIEW_TEXT"];?>
					<?endif;?>
				</div>
				<?if ($arItem["DETAIL_TEXT"]):?>
					<div class="im-common-heading-regular-green im-common-mb10">
						<?=GetMessage("CT_BNL_GUESTBOOK_MODERATOR_TITLE");?>
					</div>
					<div class="im-common-mb20 im-common-clr-black">
						<?echo $arItem["DETAIL_TEXT"]?>
					</div>
				
				<?endif;?>			
			</div>
			<hr />
		</li>	
	<?endforeach;?>
</ul>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

