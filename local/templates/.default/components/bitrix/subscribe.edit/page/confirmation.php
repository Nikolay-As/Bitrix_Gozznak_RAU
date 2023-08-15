<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//*************************************
//show confirmation form
//*************************************
?>
<hr class="im-common-mb20">	
<div class="im-common-heading-big im-common-mb30">
	Спасибо за подписку!
</div>

<?if (isset($arResult["REQUEST"]["CONFIRM_CODE"]) && (strlen($arResult["REQUEST"]["CONFIRM_CODE"]) > 0)):?>	
	<form action="<?=$arResult["FORM_ACTION"]?>" method="get">
		<input type="hidden" name="ID" value="<?echo $arResult["ID"];?>" />
		<?echo bitrix_sessid_post();?>
				
		<div class="im-common-mb30">
			<p class="im-common-clr-black im-common-mb3"><?echo GetMessage("subscr_conf_code")?><span class="im-common-required">*</span></p>
			<div class="im-common-field-wrapper im-common-mb15">
				<input type="text" name="CONFIRM_CODE" value="<?echo $arResult["REQUEST"]["CONFIRM_CODE"];?>" size="20" />				
				<?if (count($arResult["ERROR"]) > 0):?>
					<?foreach($arResult["ERROR"] as $itemID=>$itemValue):?>
						<i class="im-field-error-invalid" id="BX-error"><?=$itemValue;?></i>
					<?endforeach;?>
				<?endif;?>		
			</div>							
		</div>
		
		<div class="im-common-clearfix"></div>
		<div class="im-common-ac im-common-mb30">
			<button type="submit" name="confirm" class="im-common-button im-common-button__wide"><?echo GetMessage("subscr_conf_button")?></button>
			<input type="hidden" name="confirm" value="<?echo GetMessage("subscr_conf_button")?>" />
		</div>		
		
		<p><?echo GetMessage("subscr_conf_note1")?> <a title="<?echo GetMessage("adm_send_code")?>" href="<?echo $arResult["FORM_ACTION"]?>?ID=<?echo $arResult["ID"]?>&amp;action=sendcode&amp;<?echo bitrix_sessid_get()?>"><?echo GetMessage("subscr_conf_note2")?></a>.</p>		
	</form>

<?else:?>
	<p>Вам отправлено письмо с подтверждением. </p>
	<p>Пожалуйста, кликните в письме на ссылку <span class="im-common-clr-green">"Подтвердить подписку"</span>.</p>
<?endif;?>
	
<?/*
<form action="<?=$arResult["FORM_ACTION"]?>" method="get">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="data-table">
<thead><tr><td colspan="2"><?echo GetMessage("subscr_title_confirm")?></td></tr></thead>
<tr valign="top">
	<td width="40%">
		<p><?echo GetMessage("subscr_conf_code")?><span class="starrequired">*</span><br />
		<input type="text" name="CONFIRM_CODE" value="<?echo $arResult["REQUEST"]["CONFIRM_CODE"];?>" size="20" /></p>
		<p><?echo GetMessage("subscr_conf_date")?></p>
		<p><?echo $arResult["SUBSCRIPTION"]["DATE_CONFIRM"];?></p>
	</td>
	<td width="60%">
		<?echo GetMessage("subscr_conf_note1")?> <a title="<?echo GetMessage("adm_send_code")?>" href="<?echo $arResult["FORM_ACTION"]?>?ID=<?echo $arResult["ID"]?>&amp;action=sendcode&amp;<?echo bitrix_sessid_get()?>"><?echo GetMessage("subscr_conf_note2")?></a>.
	</td>
</tr>
<tfoot><tr><td colspan="2"><input type="submit" name="confirm" value="<?echo GetMessage("subscr_conf_button")?>" /></td></tr></tfoot>
</table>
<input type="hidden" name="ID" value="<?echo $arResult["ID"];?>" />
<?echo bitrix_sessid_post();?>
</form>
<br />
*/?>