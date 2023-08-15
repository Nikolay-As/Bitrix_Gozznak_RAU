<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if($arResult["FORM_NOTE"] != ""):?>
	<div class="im-common-success"><?=$arResult["FORM_NOTE"]?></div>
<?endif;?>

<?if ($arResult["isFormNote"] != "Y")
{
	?>

	<h3 class="is-stack-40"><?=$arResult["FORM_TITLE"]?></h3>

	<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

	<?echo $arResult["FORM_HEADER"];?>

	<div class="is-row">


		<?foreach($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion):?>
			<?if($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] != "hidden"):?>
				<div class="is-col is-50">
					<div class="form-item">
					<?=$arQuestion["CAPTION"];?>:<?if($arQuestion["REQUIRED"] == "Y"):?><span>*</span><?endif;?>
					<?=$arQuestion["HTML_CODE"]?>
					</div>
				</div>
			<?else:?>
				<?=$arQuestion["HTML_CODE"]?>
			<?endif;?>
		<?endforeach;?>

		<?if($arResult["isUseCaptcha"] == "Y"):?>
			<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" />
			<div class="is-col is-100">
			<div class="form-item">
				<!-- <div class="is-small"><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE_2")?>:<span>*</span></div> -->
				<div class="is-container is-items-middle">
					<div>
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" style="width:180px;height:40px;" width="180" height="40" class="im-common-captcha"/>
					</div>
					<div class="is-inset-left-20">
						<input type="text" name="captcha_word" size="10" maxlength="50" value="" required />
					</div>
				</div>
			</div>
			</div>
		<?endif;?>

	</div>

	<p class="is-smaller"><?=GetMessage("FORM_DESCRIPTOR")?></p>

	<div class="im-common-ac">
		<button type="submit" name="web_form_submit" class="button"><?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?></button>
		<input type="hidden" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>">
	</div>

	<?echo $arResult["FORM_FOOTER"];?>

	<?
} //endif (isFormNote)
?>
