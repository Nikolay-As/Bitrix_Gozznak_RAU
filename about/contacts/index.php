<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
	<div class="is-row is-stack-40">
		<div class="is-col is-50">
			<div class="is-inset-right-28">
				<div class="is-stack-8"><strong><?=GetMessage("FRAMEWORK_CONTACTS_ADDRESS");?></strong></div>
				<span class="im-contacts-grid-item-inner"><?$APPLICATION->IncludeFile(SITE_DIR."include_areas/about/contacts/address.php", Array(), Array("MODE" => "html"));?></span>
			</div>
		</div>

		<div class="is-col is-50">
			<div class="im-contacts-grid">
				<div class="is-stack-8"><strong><?=GetMessage("FRAMEWORK_CONTACTS_PHONE");?></strong></div>
				<span class="im-contacts-grid-item-inner"><?$APPLICATION->IncludeFile(SITE_DIR."include_areas/about/contacts/phone.php", Array(), Array("MODE" => "html"));?></span>
			</div>

			<div class="im-contacts-grid">
				<div class="is-stack-8"><strong><?=GetMessage("FRAMEWORK_CONTACTS_EMAIL");?></strong></div>
				<span class="im-contacts-grid-item-inner"><?$APPLICATION->IncludeFile(SITE_DIR."include_areas/about/contacts/email.php", Array(), Array("MODE" => "html"));?></span>
			</div>
		</div>
	</div><!-- END .im-contacts-grid -->

	<hr />
	
	<?
	// Веб-форма - http://dev.1c-bitrix.ru/user_help/service/form/components_2/form.php
	$APPLICATION->IncludeComponent("bitrix:form", "feedback", Array(
		"START_PAGE" => "new",	// Начальная страница
			"SHOW_LIST_PAGE" => "N",	// Показывать страницу со списком результатов
			"SHOW_EDIT_PAGE" => "N",	// Показывать страницу редактирования результата
			"SHOW_VIEW_PAGE" => "N",	// Показывать страницу просмотра результата
			"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
			"WEB_FORM_ID" => "1",	// ID веб-формы
			"RESULT_ID" => $_REQUEST[RESULT_ID],	// ID результата
			"SHOW_ANSWER_VALUE" => "N",	// Показать значение параметра ANSWER_VALUE
			"SHOW_ADDITIONAL" => "N",	// Показать дополнительные поля веб-формы
			"SHOW_STATUS" => "N",	// Показать текущий статус результата
			"EDIT_ADDITIONAL" => "N",	// Выводить на редактирование дополнительные поля
			"EDIT_STATUS" => "N",	// Выводить форму смены статуса
			"NOT_SHOW_FILTER" => array(	// Коды полей, которые нельзя показывать в фильтре
				0 => "",
				1 => "",
			),
			"NOT_SHOW_TABLE" => array(	// Коды полей, которые нельзя показывать в таблице
				0 => "",
				1 => "",
			),
			"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
			"USE_EXTENDED_ERRORS" => "Y",	// Использовать расширенный вывод сообщений об ошибках
			"SEF_MODE" => "N",	// Включить поддержку ЧПУ
			"SEF_FOLDER" => "",	// Каталог ЧПУ (относительно корня сайта)
			"AJAX_MODE" => "N",	// Включить режим AJAX
			"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
			"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
			"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
			"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
			"CACHE_TYPE" => "A",	// Тип кеширования
			"CACHE_TIME" => "3600",	// Время кеширования (сек.)
			"CACHE_NOTES" => "",
			"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
			"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
			"COMPONENT_TEMPLATE" => ".default",
			"VARIABLE_ALIASES" => array(
				"action" => "action",
			)
		),
		false
	);
	?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>