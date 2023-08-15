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

<div>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="is-border-bottom is-inset-top-20" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="is-big is-stack-12">
				<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
					<strong><?echo $arItem["NAME"]?></strong>
				<?endif;?>
			</div>
			<div>
				<div class="is-stack-20">
					<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
						<?echo $arItem["PREVIEW_TEXT"];?>
					<?endif;?>
				</div>
				<?if ($arItem["DETAIL_TEXT"]):?>
					<div class="is-stack-12">
						<strong><?=GetMessage("CT_BNL_GUESTBOOK_MODERATOR_TITLE");?></strong>
					</div>
					<div class="is-stack-20">
						<?echo $arItem["DETAIL_TEXT"]?>
					</div>
				<?endif;?>			
			</div>
	
		</div>	
	<?endforeach;?>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

