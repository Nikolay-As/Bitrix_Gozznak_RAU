<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "Museum shop");
$APPLICATION->SetPageProperty("keywords", "Museum shop");
$APPLICATION->SetPageProperty("description", "Information about the shop, its work schedule and main types of products");
$APPLICATION->SetTitle("Museum shop");
?>
<div class="is-row is-stack-40">
	<div class="is-col is-20">
 		<img alt="ce324a14b82c59e08fb47de01b07dede.png" src="/upload/medialibrary/af9/af96982ab2e5f07a33822761469e0c5d.png" />
	</div>
	<div class="is-col is-80">
		<p>
			The museum shop is located on the territory of the museum complex, behind the building of Anninsky Cavalier. The entrance to the shop is under the ramp of the Bastion Golovkin. The museum shop is open daily (without lunch and weekends) from 10.00 to 18.00.
		</p>
		<p>
			At the museum shop you can buy souvenir products and publications issued by the museum, as well as various products of the St. Petersburg Mint.
		</p>
	</div>
</div>

<hr class="is-stack-40" />

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
		"IBLOCK_ID" => "33",
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
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_404" => "Y",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?> 

</div>

<hr class="is-stack-40" />

<div class="is-row">
	<div class="is-col is-20">
		<img src="/upload/medialibrary/61d/61d8a3378b3ec36b700738e2ad9cc425.jpg" />
	</div>
	<div class="is-col is-80">
	<h3>You can also buy at the museum shop:</h3>
<ul>
	<li>commemorative badges issued for temporary exhibitions held in the museum;</li>
	<li>magnets depicting rare coins and banknotes, as well as unrealized projects of banknotes;</li>
	<li>souvenir plates with the image of coins;</li>
	<li>sets of commemorative coins of the Bank of Russia;</li>
	<li>souvenir tokens and commemorative medals produced by the St. Petersburg Mint;</li>
	<li>books on numismatics and bonistics.</li>
</ul>
<p>
	The shop's assortment is constantly expanding.
</p>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
