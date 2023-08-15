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

<?if ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["PHOTOS_COUNT"] > 0):?>
	
	<div class="im-photogal-img-wrapper">
		<div class="im-photogal-img  im-common-img im-common-ac im-gal_box im-common-shadow im-common-zoom">
			<img src="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"][0]["MIDDLE"]?>" class="im-photogal-img-bg" />
			
			<div mag-thumb="inner"><?/*<img src="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"][0]["FULL"]?>" class="im-photogal-img-main" />*/?></div>
			<div mag-zoom="inner"><img src="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"][0]["FULL"]?>" class="im-photogal-img-main" /></div>
			
			<span class="im-photogal-preloader"></span>				
			<?/*<span class="im-icon-loop im-common-al">&#xe116;</span>*/?>
			
			<div class="im-common-img_block-caption im-photogal-description-block">
				<div><?if (strlen ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"][0]["DESCRIPTION"]) > 0):?><?echo $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"][0]["DESCRIPTION"];?><?endif;?></div>
			</div>
			
		</div>
		
		<div mag-ctrl="controls" class="im-mag-ctrl im-common-fl im-common-mr10">			
			<button mag-ctrl-zoom-by="-0.5" title="Уменьшить" class="im-common-mr10"><span class="fa fa-minus im-common-clr-green"></span></button>
			<button mag-ctrl-zoom-by="0.5" title="Увеличить" class="im-common-mr10"><span class="fa fa-plus im-common-clr-green"></span></button>	  	 
			<button mag-ctrl-center-and-default-size title="Убрать увеличение" class="im-common-mr10"><span class="fa fa-compress im-common-clr-green"></span></button>	  	 
			<button title="Посмотреть в всплывающем окне" onclick="$.dwbox.load($('.im-photogal-img-slider a'), $('.im-photogal-img-active').attr('href'));" class="im-common-mr10"><span class="fa fa-arrows-alt im-common-clr-green"></span></button>	  
		</div>	
		
		<?if ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["PHOTOS_COUNT"] > 1):?>
		<div>
			<div class="im-photogal-img-slider">	
				<?foreach ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"] as $key=>$photo):?>
					<?//<div>?>
						<a href="<?=$photo["FULL"]?>" data-middle-href="<?=$photo["MIDDLE"]?>" alt='<?if (strlen ($photo["DESCRIPTION"]) > 0):?><?=$photo["DESCRIPTION"];?><?endif;?>' class="<?if ($key == 0) {?>im-photogal-img-active<?}?> im-common-shadow" >
							<img src="<?=$photo["SMALL"]?>" alt='<?if (strlen ($photo["DESCRIPTION"]) > 0):?><?=$photo["DESCRIPTION"];?><?endif;?>'/>				
						</a>
						<?/*if (strlen ($photo["DESCRIPTION"]) > 0):?>
							<div class="im-gallery-detail-descr im-common-mt5"><?=$photo["DESCRIPTION"];?></div>
						<?endif;*/?>
					<?//</div>?>
				<?endforeach;?>			
			</div>
		</div>
		<?endif;?>
	</div>
	
	<?/*	
	<div class="pure-g im-gallery-detail">
		<?foreach ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["RESIZED"] as $photo):?>
			<div class="pure-u-1-1 pure-u-sm-1-2 pure-u-600-1-3 pure-u-md-1-4">
				<div class="im-gallery-detail-item">
					<a href="<?=$photo["FULL"]?>" alt='<?if (strlen ($photo["DESCRIPTION"]) > 0):?><?=$photo["DESCRIPTION"];?><?endif;?>' rel="dw-gallery" style="background-image: url(<?=$photo["SMALL"]?>)" class="im-common-shadow im-common-bg im-common-zoom im-common-mb10" tabindex="0">
						<span class="im-common-zoom-lens"></span>
					</a>
					<?if (strlen ($photo["DESCRIPTION"]) > 0):?>
						<div class="im-gallery-detail-descr"><?=$photo["DESCRIPTION"];?></div>
					<?endif;?>
				</div>		
			</div>		
		<?endforeach;?>
	</div>
	*/?>
<?endif;?>

<?/*
<div class="news-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3><?=$arResult["NAME"]?></h3>
	<?endif;?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
	<?foreach($arResult["FIELDS"] as $code=>$value):
		if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
			if (!empty($value) && is_array($value))
			{
				?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
			}
		}
		else
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
		}
		?><br />
	<?endforeach;
	foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
</div>
*/?>