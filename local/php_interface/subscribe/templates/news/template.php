<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $SUBSCRIBE_TEMPLATE_RESULT;
$SUBSCRIBE_TEMPLATE_RESULT=false;
global $SUBSCRIBE_TEMPLATE_RUBRIC;
$SUBSCRIBE_TEMPLATE_RUBRIC=$arRubric;
global $APPLICATION;
?>

<div style="width:100%; max-width:768px; margin: 0 auto;">
	<div style="overflow: hidden; margin: 0 0 5px 0;">		
			<a href="http://museum.goznak.ru" spfieldtype="null"> 
				<img src="http://museum.goznak.ru/images/logos/md_goznak_logo.png" style="float:left; height: 80px; margin: 0 20px 0 0;" alt='Экспозиция "История денег"' spfieldtype="null"> 
			</a>		
			<div style="max-width:100%; margin: 22px 0 0 0; font-size: 24px; float: left; font-weight: 700; font-family: 'Playfair Display SC', serif;">			
				Экспозиция "История денег"					
			</div>		
	</div>
	
	<div style="text-align:center; height: 80px; line-height: 80px; font-size: 22px; font-family: 'Playfair Display SC', serif; font-weight: 700; background-image: url(http://museum.goznak.ru/images/bg/green.png); background-repeat: no-repeat; background-size: cover; background-position: center center; display:block;">	
		Новости
	</div>
	
	<div style="border: 1px solid #2c8450; padding: 30px 20px 20px 20px; margin: 0;">

	<?$SUBSCRIBE_TEMPLATE_RESULT = $APPLICATION->IncludeComponent(
		"bitrix:subscribe.news",
		"sub",
		Array(
			"COMPOSITE_FRAME_MODE" => "A",
			"COMPOSITE_FRAME_TYPE" => "AUTO",
			"IBLOCK_TYPE" => "content",
			"ID" => "3",
			"SITE_ID" => "s1",
			"SORT_BY" => "ACTIVE_FROM",
			"SORT_ORDER" => "DESC"
		)
	);?>

	<div style="text-align: center; margin: 0 0 35px 0;">
			<span style="border: 3px solid #23613c; display: inline-block;">
				<a href="http://museum.goznak.ru/content/news/" style="border-style: solid; border-color: transparent; border-width: 10px 50px; display: inline-block; background:transparent; font-size: 18px; color:#23613c; text-decoration:none; font-family: 'Playfair Display SC', serif; font-weight: 700;" target="_blank" >Все новости</a>
			</span>
		</div>
		
		<hr style="border-top: 1px dashed #23613c; margin: 0 0 35px 0; border-bottom: 0;">
		
		<p style="font-size: 12px; font-family: 'OpenSans-Regular', sans-serif; color: #676767;">Вы получили это письмо, поскольку являетесь подписчиком сайта <a href="http://museum.goznak.ru" style="color: #23613c;">museum.goznak.ru</a> и дали свое согласие на получение информационных сообщений с сайта.</p>
		
		<p style="font-size: 12px; font-family: 'OpenSans-Regular', sans-serif; color: #676767;">Для отказа от получения рассылки с сайта, пожалуйста, <a href="#PERSONAL_UNSUBSCRIBE_URL#" style="color: #23613c;">перейдите по этой ссылке</a>.</p>				
	</div>
	<div style="background: #232323; margin: 0; text-align: center;">
		<div style="height: 60px; line-height: 60px; display: block; color: #727272; margin: 0 40px 0 0; font-size: 14px; font-family: 'OpenSans-Regular', sans-serif;">
			<a href="http://goznak.ru/" target="_blank" style="display: inline-block; background: url(http://museum.goznak.ru/images/logos/gray_eagle.png) no-repeat; background-size: 30px auto; width: 30px; height: 35px; vertical-align: middle; margin: 0 10px 0 20px; opacity: 1;"></a>
			©&nbsp;&nbsp;AO "Гознак"
		</div>
		
		<div style="display: block;">
			<div style="font-size: 12px; font-family: 'OpenSans-Regular', sans-serif; color: #676767; padding: 10px 0 10px 0;">АО «Гознак» Экспозиционно-выставочный центр, 197046, Петропавловская крепость, дом 3, литер «Ш», Санкт-Петербург, Россия</div>
			<div style="font-size: 12px; font-family: 'OpenSans-Regular', sans-serif; color: #676767; padding: 0 0 10px 0;">+7 (812) 324-14-68</div>
			<div style="padding: 0 0 20px 0;"><a style="font-size: 14px; font-family: 'OpenSans-Regular', sans-serif; color: #2c8450;" href="mailto:museum@goznak.ru">museum@goznak.ru</a></div>		
		</div>
		
	</div>
</div> 
		
<?
if($SUBSCRIBE_TEMPLATE_RESULT)
	return array(
		"SUBJECT"=>$SUBSCRIBE_TEMPLATE_RUBRIC["NAME"],
		"BODY_TYPE"=>"html",
		"CHARSET"=>"UTF-8",
		"DIRECT_SEND"=>"Y",
		"FROM_FIELD"=>$SUBSCRIBE_TEMPLATE_RUBRIC["FROM_FIELD"],
		"AUTO_SEND_FLAG"=>"Y"
	);
else
	return false;
?>