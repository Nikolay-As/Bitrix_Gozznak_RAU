<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Жетоны «Редкости Музея истории денег»");
?>

<p>
	 &nbsp; &nbsp;В 2021 году &nbsp;выпущены последние четыре жетона серии «Редкости Музея истории денег».
</p>
<p>
	 Это жетоны с изображениями:
</p>
<p>
	 – пробной памятной монеты 1 рубль 1980 года, посвященной 600-летию Куликовской битвы,
</p>
<p>
	 – пробного серебряного рубля 1762 года,
</p>
<p>
	 – пробной монеты 3 рубля 1956 года,
</p>
<p>
	 – пробной монеты 5 копеек 1998 года с изображением Медного всадника.
</p>
<p>
	 &nbsp; Первые три монеты были выбраны по результатам онлайн-голосования&nbsp;на сайте музея, четвертая – определена сотрудниками музея.
</p>
<p>
	 В итоге полная серия «Редкости Музея истории денег» состоит&nbsp;из 24 коллекционных жетонов.
</p>
<p>
	&nbsp; &nbsp;<br>
</p>
 <!--
<p>
	&nbsp;&nbsp;Голосование продлится с 1 января до 1 февраля (включительно).&nbsp;
</p>
<br>
--> <!--Кнопка голосования--> <!--
<div class="buy-banner-wrapper">
	<div class="buy-banner-main">
		<div class="text-content-wrapper">
			<span class="banner-buy-title">Редкости Музея истории денег &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <a href="/projects_new/kollektsionnye-zhetony/Voting.php" class="banner-buy-button"> <span class="buy-button-text">Голосование</span> </a>
		</div>
	</div>
</div>
<br>
<br>
--> <!--Текстовый блок-->
<p>
 <br>
</p>
<p>
	 &nbsp;&nbsp;Первые десять жетонов серии вышли в 2018 году. Это жетоны с изображениями денги великого князя Дмитрия Ивановича Донского, первой рублевой российской монеты – серебряного рубля 1654 года, двойного червонца 1714 года, 10 рублей 1757 года, донативной монеты достоинством 37 рублей 50 копеек – 100 франков 1902 года, а также пробных и не выпущенных в обращение советских монет – 20 копеек 1934 года, червонца 1925 года, ½ копейки 1961 года, 50 копеек 1962 года и 10 рублей 1970 года.
</p>
<p>
	 &nbsp;&nbsp;В 2019 году в рамках серии «Редкости Музея истории денег» появились еще пять жетонов. Их выпуску предшествовало онлайн-голосование, проведенное на сайте музея, в результате которого были определены четыре монеты для жетонов. Пятая монета была выбрана сотрудниками музея. В итоге жетоны 2019 года посвящены псковской денге XV века, полуполтиннику 1654 года, севскому чеху 1686 года, «таврическому» гривеннику 1787 года и пробному советскому рублю 1962 года.
</p>
<p>
	 &nbsp;&nbsp;В 2020 году серия пополнилась жетонами, на которых изображены: десять денег 1701 года; новгородская денга XV века; пробный рубль 1860 года; червонец 1711 года; червонец («банковый») 1796 года. Последний был выбран по решению сотрудников Музея истории денег.
</p>
<p>
	 &nbsp;&nbsp;Особенностью серии жетонов «Редкости музея истории денег» является то, что каждый жетон отчеканен в металле, цвет которого сходен с цветом монеты-оригинала. Так, например, жетон с изображением 20-копеечника 1934 года отчеканен в белом металле (МН19), а червонца 1925 года – в желтом (Л90).
</p>
<p>
	 &nbsp;&nbsp;Автор эскизов всех жетонов серии – художник Дизайнерского центра АО «Гознак» Е. В. Крамская.
</p>
<p>
	 &nbsp;&nbsp;Жетоны отчеканены на Санкт-Петербургском монетном дворе – филиале АО «Гознак». Диаметр жетонов – 35 мм, качество – «пруф».
</p>
<p>
	 &nbsp;&nbsp;Тираж – по 500 штук каждого наименования.
</p>
<p>
	 &nbsp;&nbsp;Приобрести коллекционные жетоны серии «Редкости Музея истории денег» можно в <a href="/info/muzeynaya-lavka/">Музейной лавке</a>, расположенной за зданием музея (вход – под аппарелью Головкина бастиона).
</p>
<hr>
<!--Блок-контент "Коллекционные жетоны"-->
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"coins",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
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
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"IBLOCK_ID" => "25",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
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
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>