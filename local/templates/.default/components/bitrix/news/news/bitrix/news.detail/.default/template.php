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

<div class="is-stack-8"><?echo $arResult["DISPLAY_ACTIVE_FROM"]?></div>


	<?// check result_modifier?>
	
	<?if ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["PHOTOS_COUNT"] === 1):?>
		<div class="lightbox is-stack-40">
		<a href="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"]["FULL"]?>">
			<img src="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"]["SMALL"]?>" />
		</a>
			<?if (strlen ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"]["DESCRIPTION"]) > 0):?>
				<div class="im-news-detail-descr">
					<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"]["DESCRIPTION"]?>
				</div>
			<?endif;?>
		</div>
	<?elseif ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["PHOTOS_COUNT"] > 1):?>
		<div class="im-carousel-wrapper is-inset-24 is-stack-40">
			<div class="im-carousel-controls">
				<button class="im-carousel-controls__button im-carousel-controls__button--prev">
				<</button> <button class="im-carousel-controls__button im-carousel-controls__button--next">>
				</button>
			</div>
			<div class="im-carousel lightgallery">
				<?foreach ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"] as $photo):?>
					<div class="im-carousel-item">
						<a class="gallery-item" href="<?=$photo["FULL"]?>" style="background-image: url(<?=$photo["SMALL"]?>)"></a>
					</div>
				<?endforeach;?>
			</div>
		</div>
	<?endif;?>

	<?if(strlen($arResult["DISPLAY_PROPERTIES"]["SOURCE"]["VALUE"]) > 0):?>
		<p><strong><?=$arResult["DISPLAY_PROPERTIES"]["SOURCE"]["NAME"]?></strong>: <?=$arResult["DISPLAY_PROPERTIES"]["SOURCE"]["VALUE"]?></p>
	<?endif?>
	<?if(strlen($arResult["DISPLAY_PROPERTIES"]["SOURCE_LINK"]["VALUE"]) > 0):?>
		<p><strong><?=$arResult["DISPLAY_PROPERTIES"]["SOURCE_LINK"]["NAME"]?></strong>: <a href="<?=$arResult["DISPLAY_PROPERTIES"]["SOURCE_LINK"]["VALUE"]?>" target="_blank" rel="nofollow" title="<?=$arResult["DISPLAY_PROPERTIES"]["SOURCE_LINK"]["VALUE"]?>"><?=$arResult["DISPLAY_PROPERTIES"]["SOURCE_LINK"]["VALUE"]?></a></p>
	<?endif?>
	
	<div class="is-stack-40">
		<? if($arResult["DETAIL_TEXT_TYPE"] == "text"): ?>
			<p><?echo $arResult["DETAIL_TEXT"];?></p>
		<? else: ?>
			<?echo $arResult["DETAIL_TEXT"];?>
		<? endif; ?>
	</div>

	<div class="is-container">
		<div>
			<a href="<?=$arResult["LIST_PAGE_URL"]?>"><?=GetMessage("T_NEWS_DETAIL_BACK")?></a>
		</div>
		<div class="is-push-right">

			<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
			<script src="https://yastatic.net/share2/share.js"></script>
            <div style="position: absolute; margin-left: -29px; margin-top: -2px" >
                <a href=" https://rutube.ru/channel/23832108/" target="_blank">
                    <img src="/images/icons/ico_Rutube_news.svg" alt="Rutube" width="26" height="26">
                </a>
            </div>
            <div class="ya-share2" data-services="vkontakte,odnoklassniki,telegram,"></div>
		</div>
	</div>



