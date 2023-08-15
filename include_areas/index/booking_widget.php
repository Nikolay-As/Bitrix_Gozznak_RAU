<div class="widget booking-widget">
      <div class="booking-widget__title">
      Запись на экскурсию
    </div>

    <?
	// Веб-форма - http://dev.1c-bitrix.ru/user_help/service/form/components_2/form.php
	$APPLICATION->IncludeComponent("bitrix:form", "reservation", Array(
		"START_PAGE" => "new",	// Начальная страница
			"SHOW_LIST_PAGE" => "N",	// Показывать страницу со списком результатов
			"SHOW_EDIT_PAGE" => "N",	// Показывать страницу редактирования результата
			"SHOW_VIEW_PAGE" => "N",	// Показывать страницу просмотра результата
			"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
			"WEB_FORM_ID" => "3",	// ID веб-формы
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
        
        

    </div>