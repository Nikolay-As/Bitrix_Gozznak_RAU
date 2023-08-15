<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

CModule::IncludeModule('labsu.cross');

if(empty($_REQUEST['ELEMENT_CODE']))
{
	$APPLICATION->SetTitle("Кроссворды");
	$arCrosses = LSCross::getList();
	?>
		<p>
			&nbsp;&nbsp;На этой странице мы публикуем кроссворды, которые предлагаем вам решить.<br>
			&nbsp;&nbsp;Кроссворды будут разные – и совсем простые (их мы предлагаем разгадывать детям), и посложнее.<br>
			&nbsp;&nbsp;Всё просто: вы выбираете тему, кликаете на соответствующую ссылку и переходите на страницу с этим кроссвордом. Слева – сетка кроссворда, справа – вопросы. Кликаете на вопрос – появляется окно со строкой, куда надо вписать ответ, после чего – нажать на кнопку «сохранить».<br>
			&nbsp;&nbsp;Если слово найдено правильно – оно появится в сетке кроссворда. А если ваш ответ – неверный, появится надпись «ошибка». Надо будет повторить попытку и найти в итоге правильный вариант. 
		</p>
	<?
	foreach($arCrosses as $cross)
	{
		?>
		<h3><?=$cross['name']?></h3>
		<?=htmlspecialchars_decode($cross['text'])?>
        <p class="is-small"><a href="/cross/<?=$cross['file']?>/">Подробнее</a></p>
		<hr class="is-stack-40" />
		<?
	}
}
else
{
	$arCross = LSCross::get($_REQUEST['ELEMENT_CODE']);
	if(!$arCross)
	{
		GLOBAL $APPLICATION;
		$APPLICATION->RestartBuffer();
		include   $_SERVER['DOCUMENT_ROOT'].'/bitrix/templates/'.SITE_TEMPLATE_ID.'/header.php';
		require   ($_SERVER['DOCUMENT_ROOT'].'/404.php');
		include   $_SERVER['DOCUMENT_ROOT'].'/bitrix/templates/'.SITE_TEMPLATE_ID.'/footer.php';
		die();
	}
	$APPLICATION->SetTitle($arCross['name']);
	CJSCore::Init(array("jquery"));
	$APPLICATION->SetAdditionalCss("/cross/style.css");
	$APPLICATION->AddHeadScript("/cross/script.js"); 
	$APPLICATION->AddChainItem("Кроссворды", "/cross/");
	?>

	<input type="hidden" value='<?=$arCross['file']?>' name='crossCode' id='crossCode'>
	<div class="cross_block">
		<div class="description"><?=htmlspecialchars_decode($arCross['text'])?></div>
		<div class="cross_info">
			<div class="left"> 
				<div class="cross_fields"></div>
			</div>
			<div class="right">
				<div class="cross_words"><ul></ul></div>
			</div>
		</div>
	</div>
	<div class="popupover"></div>
	<div class="popup_enter_word">
		<h4>Введите слово</h4>
		<input type="hidden" name='word_number' value=''>
		<input type="text" name='word' value='' autocomplete="off">
		<button class="enter_word_btn">Сохранить</button>
	</div>
	<div class="popup_cross_end">
		<h4>Поздравляем!</h4>
		<p>Вы прошли данный кроссворд.</p>
		<div class="btns">
			<a href='javascript:void(0);' class="btn_restart">Перезапустить кроссворд</a>
			<a href='javascript:void(0);' class="btn_next">Перейти дальше</a>
		</div>
	</div>
	<div class="popupovererror"></div>
	<div class="popup_error">
		<h4>Ошибка</h4>
		<p></p>
	</div>
	<?
}?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>