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

	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
	<div class="im-common-list im-news">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>

		<div class="is-border-bottom is-stack-28 is-inset-bottom-28">
			<div class="is-row">
				<?if($arItem["PREVIEW_PICTURE"]["SRC"]):?>
				<div class="is-col is-20">
					<div class="im-news-item-img im-common-bs im-common-fl im-common-mb20">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"  class="im-common-img_wrapper im-common-shadow im-common-bs">
							<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
						</a>
					</div>
				</div>
				<?endif?>
				<div class="is-col is-80">
					<div class="im-news-item-heading im-common-fr im-common-bs im-common-mb20">
						<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
							<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
								<div class="is-stack-12"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="is-big"><?echo $arItem["NAME"]?></a></div>
							<?else:?>
								<?echo $arItem["NAME"]?>
							<?endif;?>
						<?endif;?>
						<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
							<div class="is-small is-stack-12"><?= $arItem['DISPLAY_ACTIVE_FROM']; ?></div>
						<?endif?>

						<?if (strlen($arItem["PROPERTIES"]["SOURCE"]["VALUE"]) > 0):?>
						<p class="im-common-mt20"><i><?=$arItem["PROPERTIES"]["SOURCE"]["NAME"]?>: <?=$arItem["PROPERTIES"]["SOURCE"]["VALUE"]?></i></p>
						<?endif;?>

					</div>
					<div class="im-common-fr im-common-bs im-news-item-descr">
						<div class="is-stack-12"><?echo $arItem["PREVIEW_TEXT"];?></div>
						<div>
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=GetMessage("CT_BNL_SEE_MORE");?></a>
						</div>
					</div>
				</div>
				
			</div>
		</div>

	<?endforeach;?>
	</div>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>

<?else:?>

	<?=GetMessage("CT_BNL_NO_ITEMS");?>

<?endif;?>
