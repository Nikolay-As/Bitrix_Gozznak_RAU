<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//***********************************
//setting section
//***********************************
?>

<?
$randString = randString(6);
?>	
	
<form action="<?=$arResult["FORM_ACTION"]?>" method="post" id="form_<?=$randString;?>">
	<?echo bitrix_sessid_post();?>
	<input type="hidden" name="PostAction" value="<?echo ($arResult["ID"]>0? "Update":"Add")?>" />
	<input type="hidden" name="ID" value="<?echo $arResult["SUBSCRIPTION"]["ID"];?>" />
	<?if($_REQUEST["register"] == "YES"):?>
		<input type="hidden" name="register" value="YES" />
	<?endif;?>
	<?if($_REQUEST["authorize"]=="YES"):?>
		<input type="hidden" name="authorize" value="YES" />
	<?endif;?>
	
	<?// sub to all available rubrics?>
	<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
		<input type="hidden" name="RUB_ID[]" value="<?=$itemValue["ID"]?>" checked />
	<?endforeach;?>
	<?// sub in HTML format?>
	<input type="hidden" name="FORMAT" value="html" checked />
	
	<div class="im-common-mb30">
		<p class="im-common-clr-black im-common-mb3"><?echo GetMessage("subscr_email")?><span class="im-common-required">*</span></p>
		<div class="im-common-field-wrapper im-common-mb15">
			<input type="text" class="inputtext" name="EMAIL" value="<?=$arResult["SUBSCRIPTION"]["EMAIL"]!=""?$arResult["SUBSCRIPTION"]["EMAIL"]:$arResult["REQUEST"]["EMAIL"];?>" maxlength="255">				
			<?if (count($arResult["ERROR"]) > 0):?>
				<?foreach($arResult["ERROR"] as $itemID=>$itemValue):?>
					<i class="im-field-error-invalid" id="BX-error"><?=$itemValue;?></i>
				<?endforeach;?>
			<?endif;?>			
		</div>				

		<div class="im-common-field-wrapper im-common-mb15">			
			<label class="im-popup-check">
				<div style="padding-top: 4px;">
					<input type="checkbox" name="AGREE" value="Y" <?if($_REQUEST["AGREE"] == "Y"):?>checked<?endif;?>>
				</div>
				<div>
					<small><?=GetMessage("FORM_FOOTER_AGREE_TEXT_1");?><?echo ($arResult["ID"] > 0? GetMessage("subscr_upd"):GetMessage("subscr_add"))?><?=GetMessage("FORM_FOOTER_AGREE_TEXT_2");?>
						<a href="javascript:void(0)" title="<?=MuseumHelpers::getTooltipContent("privacy");?>" class="im-common-dots im-tooltip_on_click"><?=GetMessage("FORM_FOOTER_AGREE_LINK_TEXT");?></a>
						<span class="im-common-required">*</span>
					</small>
				</div>
			</label>					
		</div>
		
	</div>
	
	<div class="im-common-clearfix"></div>
	<div class="im-common-ac">
		<button type="submit" name="Save" class="im-common-button im-common-button__wide" <?if($_REQUEST["AGREE"] != "Y"):?>disabled<?endif;?>><?echo ($arResult["ID"] > 0? GetMessage("subscr_upd"):GetMessage("subscr_add"))?></button>
		<input type="hidden" name="Save" <?if($_REQUEST["AGREE"] != "Y"):?>disabled<?endif;?> value="<?echo ($arResult["ID"] > 0? GetMessage("subscr_upd"):GetMessage("subscr_add"))?>">
	</div>			
</form>

<script>
	$('#form_<?=$randString;?>').validate({
		rules: {		
			"EMAIL" : {
				required: true,
				email: true,			
			},		
		},
		submitHandler: function(form) {							
			form.submit(); 
		},
		invalidHandler: function(e, validator)
		{
			if(typeof BX != 'undefined' && !!BX)
			{
				BX.closeWait();
			}
		},
		messages : {		
			"EMAIL" : {
				required: "<?=GetMessage("FORM_INVALID_EMAIL");//=GetMessage("FORM_VALIDATE_EMPTY");?>",
				email: "<?=GetMessage("FORM_INVALID_EMAIL");?>",			
			},			
		}
	});

	$('#form_<?=$randString;?> input[name="AGREE"]').on('change', function(e){
		$('#form_<?=$randString;?> button[name="Save"]').attr('disabled', !$(this).is(':checked'));
		$('#form_<?=$randString;?> input[name="Save"]').attr('disabled', !$(this).is(':checked'));		
	});
	
	$('#form_<?=$randString;?> .im-tooltip_on_click').tooltipster({
		theme: 'tooltipster-shadow',
		interactive: true,
		animation: 'grow',
		trigger: 'click',
		hideOnClick: true,
		speed: 150,
		maxWidth: 400,
		contentAsHTML: true
	});	
</script>

<?/*

<form action="<?=$arResult["FORM_ACTION"]?>" method="post">
<?echo bitrix_sessid_post();?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="data-table">
<thead><tr><td colspan="2"><?echo GetMessage("subscr_title_settings")?></td></tr></thead>
<tr valign="top">
	<td width="40%">
		<p><?echo GetMessage("subscr_email")?><span class="starrequired">*</span><br />
		<input type="text" name="EMAIL" value="<?=$arResult["SUBSCRIPTION"]["EMAIL"]!=""?$arResult["SUBSCRIPTION"]["EMAIL"]:$arResult["REQUEST"]["EMAIL"];?>" size="30" maxlength="255" /></p>
		<p><?echo GetMessage("subscr_rub")?><span class="starrequired">*</span><br />
		<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
			<label><input type="checkbox" name="RUB_ID[]" value="<?=$itemValue["ID"]?>"<?if($itemValue["CHECKED"]) echo " checked"?> /><?=$itemValue["NAME"]?></label><br />
		<?endforeach;?></p>
		<p><?echo GetMessage("subscr_fmt")?><br />
		<label><input type="radio" name="FORMAT" value="text"<?if($arResult["SUBSCRIPTION"]["FORMAT"] == "text") echo " checked"?> /><?echo GetMessage("subscr_text")?></label>&nbsp;/&nbsp;<label><input type="radio" name="FORMAT" value="html"<?if($arResult["SUBSCRIPTION"]["FORMAT"] == "html") echo " checked"?> />HTML</label></p>
	</td>
	<td width="60%">
		<p><?echo GetMessage("subscr_settings_note1")?></p>
		<p><?echo GetMessage("subscr_settings_note2")?></p>
	</td>
</tr>
<tfoot><tr><td colspan="2">
	<input type="submit" name="Save" value="<?echo ($arResult["ID"] > 0? GetMessage("subscr_upd"):GetMessage("subscr_add"))?>" />
	<input type="reset" value="<?echo GetMessage("subscr_reset")?>" name="reset" />
</td></tr></tfoot>
</table>
<input type="hidden" name="PostAction" value="<?echo ($arResult["ID"]>0? "Update":"Add")?>" />
<input type="hidden" name="ID" value="<?echo $arResult["SUBSCRIPTION"]["ID"];?>" />
<?if($_REQUEST["register"] == "YES"):?>
	<input type="hidden" name="register" value="YES" />
<?endif;?>
<?if($_REQUEST["authorize"]=="YES"):?>
	<input type="hidden" name="authorize" value="YES" />
<?endif;?>
</form>
<br />
*/?>