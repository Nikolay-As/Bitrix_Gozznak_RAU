<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if(!empty($arResult["CATEGORIES"])):?>

	<div class="im-search_help-wrapper tbl-title-search-result">
	<?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>
		<?foreach($arCategory["ITEMS"] as $i => $arItem):?>
		<div class="im-search_help">
			<a href="<?echo $arItem["URL"]?>" class="im-search_help-link"><?echo $arItem["NAME"]?></a>
		</div>

		<?/*if($category_id === "all"):?>
		<div class="im-search_help">
			<a href="<?echo $arItem["URL"]?>" class="im-search_help-link">
				<span class="im-search_help-link-all"><?echo $arItem["NAME"]?></span>
			</a>
		</div>
		<?endif;*/?>

		<?endforeach;?>
	<?endforeach;?>
	</div>
<?endif;
?>