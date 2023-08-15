<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "Музейная лавка");
$APPLICATION->SetPageProperty("keywords", "Музейная лавка");
$APPLICATION->SetPageProperty("description", "Информация о лавке, графике ее работы и основные виды продукции");
$APPLICATION->SetTitle("Музейная лавка");
?><p style="text-align: justify;">
 <b>С 16 октября 2021 года музейная лавка временно не работает.</b><br>
</p>
<p>
	 Сувенирную продукцию и издания, выпущенные Музеем истории денег сейчас можно в Нумизматическом салоне Санкт-Петербургского монетного двора. Салон расположен в Никольской куртине (рядом с Никольскими воротами) и работает ежедневно с 10:00 до 18:00. Также в Нумизматическом салоне представлены памятные монеты, медали, жетоны и различные наборы производства Санкт-Петербургского монетного двора, ювелирные украшения, а также разнообразные сувениры.
</p>
<p style="text-align: justify;">
</p>
<p>
	 Дополнительную информацию об ассортименте салона можно получить у сотрудников Нумизматического салона по телефону 233-93-03.
</p>
<img width="740" alt="нумсалон_вход.jpg" src="/upload/medialibrary/ed5/hly7wyajz2oc80t2z8n05tqseoab1x6m.jpg" height="574" title="нумсалон_вход.jpg"><br>
<br>
<hr class="is-stack-40">
<div class="is-stack-40">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"lavka_inner",
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
		"CACHE_TIME" => "1000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "detail.php?ELEMENT_ID=#ELEMENT_ID#",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
		"FIELD_CODE" => Array("ID"),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"IBLOCK_ID" => "23",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK" => "",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"PAGER_DESC_NUMBERING" => "Y",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "1000",
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
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>
</div>
<hr class="is-stack-40">
<div class="is-row">
	<div class="lightgallery is-container is-stack-40">
		<div class="is-col">
			<span style="font-family: OpenSans-Bold; font-size: 16px;">В Нумизматическом салоне СПМД можно приобрести:</span><br>
		</div>
	</div>
	<ul>
		<li>памятные жетоны, выпущенные к проводимым в музее временным выставкам;</li>
		<li>магниты с изображением редких монет и банкнот, а также нереализованных проектов денежных знаков;</li>
		<li>сувенирные тарелки с изображением монет;</li>
		<li>наборы памятных монет Банка России;</li>
		<li>сувенирные жетоны и памятные медали, выпускаемые Санкт-Петербургским монетным двором;</li>
		<li>книги, посвященные нумизматике и бонистике.</li>
	</ul>
	<p>
		 Ассортимент музейных сувениров постоянно расширяется.
	</p>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>