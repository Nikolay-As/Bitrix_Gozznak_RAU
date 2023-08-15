<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Афиша мероприятий");
?><p>
	<b>С мая по сентябрь Музей истории денег работает по летнему графику – с 10:00 до 20:00, ежедневно, без выходных. Обзорные экскурсии проводятся в 13:00, 15:00&nbsp;и 18:00</b><span style="font-family: var(--ui-font-family-primary, var(--ui-font-family-helvetica));">. Максимальное число человек на экскурсии – двадцать.</span><br>
</p>
<p>
	 &nbsp;&nbsp;С октября по апрель музей работает ежедневно с 10:00 до 20:00, кроме четверга.<br>
	 &nbsp;&nbsp;Мастер-классы для индивидуальных посетителей проводятся по графику: в 12:00, 14:00, 16:00 (выходные дни – среда и четверг). Просим приходить за 10 минут до начала мастер-класса. Опоздавшие к началу сеанса, к сожалению, не смогут участвовать в мастер-классе. <br>
	 &nbsp;&nbsp;Максимальное число участников мастер-класса – десять человек. Есть возрастное ограничение для мастер-классов: не допускаются к участию дети младше 7 лет. <br>
	 &nbsp; &nbsp; &nbsp;
</p>
<?
global $arAfishaFilter;
$arAfishaFilter['!=PROPERTY_PERIOD_VALUE'] = 'Y';
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"slider_afisha_inner",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "5000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
		"FIELD_CODE" => Array("ID"),
		"FILTER_NAME" => "arAfishaFilter",
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"IBLOCK_ID" => "21",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK" => "",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"PAGER_DESC_NUMBERING" => "Y",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "5000",
		"PAGER_PARAMS_NAME" => "arrPager",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => Array("DESCRIPTION"),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
		"SORT_BY1" => "PROPERTY_CUSTOM_DATE",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>