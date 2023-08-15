<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
?>

<form action="" method="get">
<div class="is-append is-60">
<input type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>">
<button type="submit" class="button is-small"><?=GetMessage("SEARCH_GO")?></button>
	</div>
<input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
</form>

<?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
	?>
	<div>
		<?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
	</div><?
endif;?>

<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
<?elseif($arResult["ERROR_CODE"]!=0):?>

	<p><?=GetMessage("SEARCH_ERROR")?></p>
	<?ShowError($arResult["ERROR_TEXT"]);?>
	<p><?=GetMessage("SEARCH_CORRECT_AND_CONTINUE")?></p>

<?elseif(count($arResult["SEARCH"])>0):?>

	<?if($arParams["DISPLAY_TOP_PAGER"] != "N"):
		echo $arResult["NAV_STRING"];
	endif;?>

	<div>

	<?foreach($arResult["SEARCH"] as $arItem):?>

		<div class="is-inset-y-20 is-border-bottom">
			<div class="is-stack-8"><a href="<?echo $arItem["URL"]?>" class="is-big"><?echo $arItem["TITLE_FORMATED"]?></a></div>
			<div><?echo $arItem["BODY_FORMATED"]?></div>
        </div>

	<?endforeach;?>

</div>

	<?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N"):
		echo $arResult["NAV_STRING"];
	endif;?>

<?else:?>
	<?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?>
<?endif;?>