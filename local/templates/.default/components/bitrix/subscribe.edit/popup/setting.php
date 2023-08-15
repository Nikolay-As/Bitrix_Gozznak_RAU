<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//***********************************
//setting section
//***********************************
?>

<?
$randString = randString(6);
?>	
	
	<div class="news-subscribe is-hidden">
	
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
			
			<div class="form-item">
				<div><?echo GetMessage("subscr_email")?><span class="im-common-required">*</span></div>
				<div class="is-stack-8">
					<input type="text" name="EMAIL" value="<?=$arResult["SUBSCRIPTION"]["EMAIL"]!=""?$arResult["SUBSCRIPTION"]["EMAIL"]:$arResult["REQUEST"]["EMAIL"];?>" maxlength="255">				
					<?if (count($arResult["ERROR"]) > 0):?>
						<div class="news-subscribe-alert news-subscribe-alert--error">
							<?foreach($arResult["ERROR"] as $itemID=>$itemValue):?>
								<i class="im-field-error-invalid" id="BX-error"><?=$itemValue;?></i>
							<?endforeach;?>
						</div>
					<?endif;?>		
				</div>				
				
				<div class="is-smaller">
					<input type="checkbox" name="AGREE" value="Y" <?if($_REQUEST["AGREE"] == "Y"):?>checked<?endif;?>> 
					Нажимая кнопку "Подписаться", я даю согласие на обработку моих персональных данных, в соответствии с <a href="https://goznak.ru/about/today/security/" target="_blank">Положением об обработке и защите персональных данных в АО "Гознак"</a>
				</div>
			</div>
			
			<button type="submit" name="Save" class="button" <?if($_REQUEST["AGREE"] != "Y"):?>disabled<?endif;?>><?echo ($arResult["ID"] > 0? GetMessage("subscr_upd"):GetMessage("subscr_add"))?></button>
			<input type="hidden" name="Save" <?if($_REQUEST["AGREE"] != "Y"):?>disabled<?endif;?> value="<?echo ($arResult["ID"] > 0? GetMessage("subscr_upd"):GetMessage("subscr_add"))?>">
		</form>

</div>	

<script>

	var agreeElement = document.querySelector('[name="AGREE"]');
	if( agreeElement ) {
		var saveButton = document.querySelector('button[name="Save"]');
		var saveInput = document.querySelector('input[name="Save"]');
		agreeElement.addEventListener('change', function() {
			if(agreeElement.checked) {
				saveButton.removeAttribute('disabled');
				saveInput.removeAttribute('disabled');
			} else {
				saveButton.setAttribute('disabled', true);
				saveInput.setAttribute('disabled', true);
			}
		})
	}

</script>
