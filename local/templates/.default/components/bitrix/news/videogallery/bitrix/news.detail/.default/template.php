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

<?if(strlen($arResult["PREVIEW_TEXT"]) > 0):?>
	<p class="im-common-mb25"><?echo $arResult["PREVIEW_TEXT"];?></p>
<?endif?>

<?if (count ($arResult["DISPLAY_PROPERTIES"]["VIDEO"]["VALUE"]) > 0):?>
	<?foreach ($arResult["DISPLAY_PROPERTIES"]["VIDEO"]["~VALUE"] as $video):?>
		<p class="im-common-mb25"><?echo $video;?></p>
	<?endforeach;?>
<?endif;?>

<?/*if ($arResult["DISPLAY_PROPERTIES"]["PHOTO_PREV"]["PHOTOS_COUNT"] > 0):?>
	<div class="pure-g im-gallery-detail">
		<?foreach ($arResult["DISPLAY_PROPERTIES"]["PHOTO_PREV"]["RESIZED"] as $photo):?>
			<div class="pure-u-1-1 pure-u-sm-1-2 pure-u-600-1-3 pure-u-md-1-4">
				<div class="im-gallery-detail-item">
					<a href="javascript:void(0)" onclick='$.dwbox.loadHtml("<?=CUtil::JSEscape($photo["LINKED_VIDEO"]);?>")' alt='<?if (strlen ($photo["DESCRIPTION"]) > 0):?><?=$photo["DESCRIPTION"];?><?endif;?>' style="background-image: url(<?=$photo["SMALL"]?>)" class="im-common-shadow im-common-bg im-common-zoom im-common-mb10" tabindex="0">
						<span class="im-common-zoom-lens"></span>
					</a>
					<?if (strlen ($photo["DESCRIPTION"]) > 0):?>
						<div class="im-gallery-detail-descr"><?=$photo["DESCRIPTION"];?></div>
					<?endif;?>
				</div>		
			</div>		
		<?endforeach;?>
	</div>
<?endif;*/?>