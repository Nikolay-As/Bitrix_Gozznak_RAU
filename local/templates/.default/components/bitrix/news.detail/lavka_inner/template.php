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

<div class="is-row is-stack-40">
    <div class="is-col is-70">
        <?= $arResult['PREVIEW_TEXT'] ?>
    </div>
    <div class="is-col is-30 is-large">
        Цена: <?= $arResult["PROPERTIES"]["price"]["VALUE"] ?> ₽
    </div>
</div>

    <?if ($arResult["PROPERTIES"]["SLIDER"]["PHOTOS_COUNT"] === 1):?>
		<div>
			<img src="<?=$arResult["PROPERTIES"]["SLIDER"]["RESIZED"]["FULL"]?>" />
			<?if (strlen ($arResult["PROPERTIES"]["SLIDER"]["RESIZED"]["DESCRIPTION"]) > 0):?>
				<div class="im-news-detail-descr">
					<?=$arResult["PROPERTIES"]["SLIDER"]["RESIZED"]["DESCRIPTION"]?>
				</div>
			<?endif;?>
		</div>
    <?elseif ($arResult["PROPERTIES"]["SLIDER"]["PHOTOS_COUNT"] > 1):?>
    
        <div class="im-carousel-wrapper">
            <div class="im-carousel-controls">
                <button class="im-carousel-controls__button im-carousel-controls__button--prev">
                    <</button> <button class="im-carousel-controls__button im-carousel-controls__button--next">>
                </button>
            </div>
            <div class="im-carousel im-carousel--slider lightgallery" data-items="1">
                <?foreach ($arResult["PROPERTIES"]["SLIDER"]["RESIZED"] as $photo):?>
                    <div class="im-carousel-item">
                        <a class="gallery-item" href="<?=$photo["FULL"]?>">
                            <img src="<?=$photo["SMALL"]?>">
                        </a>
                    </div>
                <?endforeach;?>	
            </div>
        </div>
	<?endif;?>

<?= $arResult['DETAIL_TEXT'] ?>


