<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<p>
	Эта форма бронирования экскурсий используется <b>только для организованных групп</b>.<br> 
	Если вы хотите забронировать место на обзорной или тематической экскурсии по расписанию, пожалуйста, перейдите в раздел <a href="https://museum.goznak.ru/info/order_ticket/">«Билеты»</a>. 
</p>
<?if($arResult["FORM_NOTE"] != ""):?>
	
	<div class="im-common-success">
		<div class="im-common-mb20"><?=GetMessage("FORM_SUCCESS_TEXT_1");?></div>
		<div><?=GetMessage("FORM_SUCCESS_TEXT_2");?></div>
	</div>	
	
<?endif;?>

<?if ($arResult["isFormNote"] != "Y")
{
	?>

	<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

	<?echo $arResult["FORM_HEADER"];?>

	<fieldset class="msf_hide">
            <div class="form-item">
              <input type="text" name="form_text_8" placeholder="Ваше имя">
              </div>
              <div class="is-stack-24">
            <input type="text" name="form_text_9" placeholder="Телефон">
          </div>
          <div class="is-stack-24">
            <p>Выберите желаемую дату для экскурсии</p>
            <input name="form_text_11" class="date" style="display: none">
          </div>
            <button name="back" class="button">Назад</button>
            <button name="next" class="button">Далее</button>
            
          <div class="msf_bullet_o"></div>
          <div class="msf_line"></div>
        </fieldset>
        
        <fieldset class="msf_hide">
            <div class="form-item">
          <div class="is-container">
            <div class="is-50 is-inset-right-8">
                <input type="text" name="form_text_15" placeholder="Кол-во участников">
            </div>
            <div class="is-50">
                <select name="form_text_17">
                  <option value="" disabled selected>Категория</option>
                  <option value="взрослые">взрослые</option>
                  <option value="учащиеся">учащиеся</option>
                </select>
            </div>
          </div>
          </div>
          <div class="form-item">
            <select name="form_text_12">
              <option value="" disabled selected>Форма оплаты</option>
              <option value="наличные">наличные</option>
              <option value="по счету">по счету</option>
            </select>
          </div>
          <div class="form-item">
          	<textarea name="form_textarea_14" placeholder="Комментарии"></textarea>
		  </div>
		  
		  <?if($arResult["isUseCaptcha"] == "Y"):?>
		  <div class="form-item">
		  	<div class="is-small is-stack-4"><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE_2")?>:<span class="im-common-required">*</span></div>
		  	<div class="is-row">
			  <div class="is-col is-50">
			  	<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" style="width:180px;height:40px;" width="180" height="40" class="im-common-captcha"/>
			  </div>
			  <div class="is-col is-50">
			  	<input type="text" name="captcha_word" size="30" maxlength="50" value="" class="im-common-input im-common-captcha-field" />
			  </div>				
			</div>
		  </div>
		<?endif;?>

          <div class="form-item is-inset-y-12">
            <p class="is-small"><strong>Обратите внимание: ваша заявка будет подтверждена только после звонка сотрудника музея</strong></p>
            <div class="is-smaller">Отправляя эту форму, я даю согласие на обработку моих персональных данных, в соответствии с <a href="https://goznak.ru/about/today/security/" target="_blank">Положением об обработке и защите персональных данных в АО "Гознак"</a></div>
		</div>
		
          <button name="back" class="button">Назад</button>
          <button name="next" class="button">Далее</button>
		  <button name="submit" class="button">Отправить</button>
		  <input type="hidden" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>">
          <div class="msf_bullet_o"></div>
          <div class="msf_line"></div>
        </fieldset>

	<!-- <div class="im-common-ac">
		<button type="submit" name="web_form_submit" class="im-common-button im-common-button__wide"><?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?></button>
		<input type="hidden" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>">
	</div>	 -->
	
	<?echo $arResult["FORM_FOOTER"];?>

	<?
} //endif (isFormNote)
?>
