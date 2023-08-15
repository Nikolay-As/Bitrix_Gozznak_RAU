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

<?if(strlen($arResult["DETAIL_TEXT"]) > 0):?>
	<p class="im-common-mb25"><?echo $arResult["DETAIL_TEXT"];?></p>
<?else:?>
	<p class="im-common-mb25"><?echo $arResult["PREVIEW_TEXT"];?></p>
<?endif?>

<?if ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["PHOTOS_COUNT"] > 0):?>
	<div class="thumbs-list lightgallery is-row is-col-stack-24">
		<?foreach ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"] as $photo):?>
			<div class="thumbs-list__item is-col is-25">
				<div class="thumbs-list__item__container">
					<a class="gallery-item" href="<?=$photo["FULL"]?>" alt='<?if (strlen ($photo["DESCRIPTION"]) > 0):?><?=$photo["DESCRIPTION"];?><?endif;?>' style="background-image: url(<?=$photo["SMALL"]?>)">
						<span class="im-common-zoom-lens"></span>
					</a>
					<?if (strlen ($photo["DESCRIPTION"]) > 0):?>
						<div class="im-gallery-detail-descr"><?=$photo["DESCRIPTION"];?></div>
					<?endif;?>
				</div>		
			</div>		
		<?endforeach;?>
	</div>
<?endif;?>