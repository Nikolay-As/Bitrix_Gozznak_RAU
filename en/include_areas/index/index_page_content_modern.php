<div class="hero">

<?$APPLICATION->IncludeComponent(
  "bitrix:news.list",
  "index_banner_bg",
  Array(
    "ACTIVE_DATE_FORMAT" => "d.m.Y",
    "ADD_SECTIONS_CHAIN" => "N",
    "AJAX_MODE" => "N",
    "AJAX_OPTION_ADDITIONAL" => "",
    "AJAX_OPTION_HISTORY" => "N",
    "AJAX_OPTION_JUMP" => "N",
    "AJAX_OPTION_STYLE" => "Y",
    "CACHE_FILTER" => "N",
    "CACHE_GROUPS" => "Y",
    "CACHE_NOTES" => "",
    "CACHE_TIME" => "4000",
    "CACHE_TYPE" => "A",
    "CHECK_DATES" => "Y",
    "COMPONENT_TEMPLATE" => "flat",
    "DETAIL_URL" => "",
    "DISPLAY_BOTTOM_PAGER" => "N",
    "DISPLAY_DATE" => "N",
    "DISPLAY_NAME" => "Y",
    "DISPLAY_PICTURE" => "Y",
    "DISPLAY_PREVIEW_TEXT" => "Y",
    "DISPLAY_TOP_PAGER" => "N",
    "FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_TEXT",2=>"PREVIEW_PICTURE",3=>"DETAIL_TEXT",4=>"",),
    "FILTER_NAME" => "",
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
    "IBLOCK_ID" => "8",
    "IBLOCK_TYPE" => "banners",
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
    "INCLUDE_SUBSECTIONS" => "Y",
    "MEDIA_PROPERTY" => "",
    "MESSAGE_404" => "",
    "NEWS_COUNT" => "20",
    "PAGER_BASE_LINK_ENABLE" => "N",
    "PAGER_DESC_NUMBERING" => "N",
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
    "PAGER_SHOW_ALL" => "N",
    "PAGER_SHOW_ALWAYS" => "N",
    "PAGER_TEMPLATE" => ".default",
    "PAGER_TITLE" => "Новости",
    "PARENT_SECTION" => "",
    "PARENT_SECTION_CODE" => "",
    "PREVIEW_TRUNCATE_LEN" => "",
    "PROPERTY_CODE" => array(0=>"LINK",1=>"",),
    "SEARCH_PAGE" => "/search/",
    "SET_BROWSER_TITLE" => "N",
    "SET_LAST_MODIFIED" => "N",
    "SET_META_DESCRIPTION" => "N",
    "SET_META_KEYWORDS" => "N",
    "SET_STATUS_404" => "N",
    "SET_TITLE" => "N",
    "SHOW_404" => "N",
    "SLIDER_PROPERTY" => "",
    "SORT_BY1" => "SORT",
    "SORT_BY2" => "ACTIVE_FROM",
    "SORT_ORDER1" => "ASC",
    "SORT_ORDER2" => "DESC",
    "TEMPLATE_THEME" => "blue",
    "USE_RATING" => "N",
    "USE_SHARE" => "N"
  ),
false,
Array(
  'HIDE_ICONS' => 'Y'
)
);?>

</div>

<div class="sub-hero is-container">
  <div class="sub-hero__left is-50 is-inset-y-80 is-inset-left-40">

    <?$APPLICATION->IncludeComponent("bitrix:news.list","slider_collection",Array(
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "AJAX_MODE" => "N",
        "IBLOCK_TYPE" => "news",
        "IBLOCK_ID" => "28",
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "",
        "FIELD_CODE" => Array("ID"),
        "PROPERTY_CODE" => Array("DESCRIPTION"),
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "SET_TITLE" => "Y",
        "SET_BROWSER_TITLE" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_META_DESCRIPTION" => "Y",
        "SET_LAST_MODIFIED" => "Y",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "Y",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "1000",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",
        "DISPLAY_TOP_PAGER" => "Y",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "Новости",
        "PAGER_SHOW_ALWAYS" => "Y",
        "PAGER_TEMPLATE" => "",
        "PAGER_DESC_NUMBERING" => "Y",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "1000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "Y",
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y",
        "MESSAGE_404" => "",
        "PAGER_BASE_LINK" => "",
        "PAGER_PARAMS_NAME" => "arrPager",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => ""
    )
);?>


</div>

<div class="sub-hero__right is-50">

  <?$APPLICATION->IncludeComponent("bitrix:news.list","index_anons",Array(
    "DISPLAY_DATE" => "Y",
    "DISPLAY_NAME" => "Y",
    "DISPLAY_PICTURE" => "Y",
    "DISPLAY_PREVIEW_TEXT" => "Y",
    "AJAX_MODE" => "N",
    "IBLOCK_TYPE" => "news",
    "IBLOCK_ID" => "27",
    "NEWS_COUNT" => "1",
    "SORT_BY1" => "ACTIVE_FROM",
    "SORT_ORDER1" => "DESC",
    "SORT_BY2" => "SORT",
    "SORT_ORDER2" => "ASC",
    "FILTER_NAME" => "",
    "FIELD_CODE" => Array("ID"),
    "PROPERTY_CODE" => Array("DESCRIPTION"),
    "CHECK_DATES" => "Y",
    "DETAIL_URL" => "",
    "PREVIEW_TRUNCATE_LEN" => "",
    "ACTIVE_DATE_FORMAT" => "d.m.Y",
    "SET_TITLE" => "Y",
    "SET_BROWSER_TITLE" => "Y",
    "SET_META_KEYWORDS" => "Y",
    "SET_META_DESCRIPTION" => "Y",
    "SET_LAST_MODIFIED" => "Y",
    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
    "ADD_SECTIONS_CHAIN" => "Y",
    "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
    "PARENT_SECTION" => "",
    "PARENT_SECTION_CODE" => "",
    "INCLUDE_SUBSECTIONS" => "Y",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "3600",
    "CACHE_FILTER" => "Y",
    "CACHE_GROUPS" => "Y",
    "DISPLAY_TOP_PAGER" => "Y",
    "DISPLAY_BOTTOM_PAGER" => "Y",
    "PAGER_TITLE" => "Новости",
    "PAGER_SHOW_ALWAYS" => "Y",
    "PAGER_TEMPLATE" => "",
    "PAGER_DESC_NUMBERING" => "Y",
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
    "PAGER_SHOW_ALL" => "Y",
    "PAGER_BASE_LINK_ENABLE" => "Y",
    "SET_STATUS_404" => "Y",
    "SHOW_404" => "Y",
    "MESSAGE_404" => "",
    "PAGER_BASE_LINK" => "",
    "PAGER_PARAMS_NAME" => "arrPager",
    "AJAX_OPTION_JUMP" => "N",
    "AJAX_OPTION_STYLE" => "Y",
    "AJAX_OPTION_HISTORY" => "N",
    "AJAX_OPTION_ADDITIONAL" => ""
)
);?>
</div>
</div>

</div>
</div>

<section class="section section--afisha noise">
<div class="container">

    <?$APPLICATION->IncludeComponent("bitrix:news.list","slider_afisha",Array(
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "AJAX_MODE" => "N",
        "IBLOCK_TYPE" => "news",
        "IBLOCK_ID" => "29",
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "PROPERTY_CUSTOM_DATE",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "",
        "FIELD_CODE" => Array("ID"),
        "PROPERTY_CODE" => Array("DESCRIPTION"),
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "SET_TITLE" => "Y",
        "SET_BROWSER_TITLE" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_META_DESCRIPTION" => "Y",
        "SET_LAST_MODIFIED" => "Y",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "Y",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "5000",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",
        "DISPLAY_TOP_PAGER" => "Y",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "Новости",
        "PAGER_SHOW_ALWAYS" => "Y",
        "PAGER_TEMPLATE" => "",
        "PAGER_DESC_NUMBERING" => "Y",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "5000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "Y",
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y",
        "MESSAGE_404" => "",
        "PAGER_BASE_LINK" => "",
        "PAGER_PARAMS_NAME" => "arrPager",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => ""
        )
    );?>

</div>
</section>

<section class="section" style="padding-bottom:0;">
<div class="container">
  <h2 class="is-stack-80">Excursions</h2>

  <div class="is-row is-col-stack-24">
    <div class="is-col is-50">
      <a href="/en/ekskursii-i-programmy/guided-tours-on-schedule/"><img src="/images/main_raspisanie.jpg" class="is-stack-24" /></a>
      <a href="/en/ekskursii-i-programmy/guided-tours-on-schedule/" class="h2">Guided tours on schedule</a>
    </div>
    <div class="is-col is-50">
      <a href="/en/ekskursii-i-programmy/guided-tours-to-book/"><img src="/images/main_zapis.jpg" class="is-stack-24" /></a>
      <a href="/en/ekskursii-i-programmy/guided-tours-to-book/" class="h2">Guided tours to book</a>
    </div>
  </div>
</div>
</section>

<section class="section">
<div class="container">
  <h2 class="is-stack-80">News</h2>

  <?$APPLICATION->IncludeComponent("bitrix:news.list","frontPage",Array(
      "DISPLAY_DATE" => "Y",
      "DISPLAY_NAME" => "Y",
      "DISPLAY_PICTURE" => "Y",
      "DISPLAY_PREVIEW_TEXT" => "Y",
      "AJAX_MODE" => "N",
      "IBLOCK_TYPE" => "news",
      "IBLOCK_ID" => "11",
      "NEWS_COUNT" => "3",
      "SORT_BY1" => "ACTIVE_FROM",
      "SORT_ORDER1" => "DESC",
      "SORT_BY2" => "SORT",
      "SORT_ORDER2" => "ASC",
      "FILTER_NAME" => "",
      "FIELD_CODE" => Array("ID"),
      "PROPERTY_CODE" => Array("DESCRIPTION"),
      "CHECK_DATES" => "Y",
      "DETAIL_URL" => "",
      "PREVIEW_TRUNCATE_LEN" => "",
      "ACTIVE_DATE_FORMAT" => "d.m.Y",
      "SET_TITLE" => "Y",
      "SET_BROWSER_TITLE" => "Y",
      "SET_META_KEYWORDS" => "Y",
      "SET_META_DESCRIPTION" => "Y",
      "SET_LAST_MODIFIED" => "Y",
      "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
      "ADD_SECTIONS_CHAIN" => "Y",
      "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
      "PARENT_SECTION" => "",
      "PARENT_SECTION_CODE" => "",
      "INCLUDE_SUBSECTIONS" => "Y",
      "CACHE_TYPE" => "A",
      "CACHE_TIME" => "3000",
      "CACHE_FILTER" => "Y",
      "CACHE_GROUPS" => "Y",
      "DISPLAY_TOP_PAGER" => "Y",
      "DISPLAY_BOTTOM_PAGER" => "Y",
      "PAGER_TITLE" => "Новости",
      "PAGER_SHOW_ALWAYS" => "N",
      "PAGER_TEMPLATE" => "",
      "PAGER_DESC_NUMBERING" => "N",
      "PAGER_DESC_NUMBERING_CACHE_TIME" => "3000",
      "PAGER_SHOW_ALL" => "Y",
      "PAGER_BASE_LINK_ENABLE" => "Y",
      "SET_STATUS_404" => "Y",
      "SHOW_404" => "Y",
      "MESSAGE_404" => "",
      "PAGER_BASE_LINK" => "",
      "PAGER_PARAMS_NAME" => "arrPager",
      "AJAX_OPTION_JUMP" => "N",
      "AJAX_OPTION_STYLE" => "Y",
      "AJAX_OPTION_HISTORY" => "N",
      "AJAX_OPTION_ADDITIONAL" => ""
  )
);?>

  <div class="is-text-center">
    <a href="/en/content/news/" class="button">All news</a>
  </div>

</div>

</section>

<section class="section section--lavka noise">
<div class="container">
  <h2 class="color-cream is-stack-100">Museum Shop</h2>

  <?$APPLICATION->IncludeComponent("bitrix:news.list","slider_lavka",Array(
      "DISPLAY_DATE" => "Y",
      "DISPLAY_NAME" => "Y",
      "DISPLAY_PICTURE" => "Y",
      "DISPLAY_PREVIEW_TEXT" => "Y",
      "AJAX_MODE" => "N",
      "IBLOCK_TYPE" => "news",
      "IBLOCK_ID" => "33",
      "NEWS_COUNT" => "20",
      "SORT_BY1" => "ACTIVE_FROM",
      "SORT_ORDER1" => "DESC",
      "SORT_BY2" => "SORT",
      "SORT_ORDER2" => "ASC",
      "FILTER_NAME" => "",
      "FIELD_CODE" => Array("ID"),
      "PROPERTY_CODE" => Array("DESCRIPTION"),
      "CHECK_DATES" => "Y",
      "DETAIL_URL" => "",
      "PREVIEW_TRUNCATE_LEN" => "",
      "ACTIVE_DATE_FORMAT" => "d.m.Y",
      "SET_TITLE" => "Y",
      "SET_BROWSER_TITLE" => "Y",
      "SET_META_KEYWORDS" => "Y",
      "SET_META_DESCRIPTION" => "Y",
      "SET_LAST_MODIFIED" => "Y",
      "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
      "ADD_SECTIONS_CHAIN" => "Y",
      "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
      "PARENT_SECTION" => "",
      "PARENT_SECTION_CODE" => "",
      "INCLUDE_SUBSECTIONS" => "Y",
      "CACHE_TYPE" => "A",
      "CACHE_TIME" => "1000",
      "CACHE_FILTER" => "Y",
      "CACHE_GROUPS" => "Y",
      "DISPLAY_TOP_PAGER" => "Y",
      "DISPLAY_BOTTOM_PAGER" => "Y",
      "PAGER_TITLE" => "Новости",
      "PAGER_SHOW_ALWAYS" => "Y",
      "PAGER_TEMPLATE" => "",
      "PAGER_DESC_NUMBERING" => "Y",
      "PAGER_DESC_NUMBERING_CACHE_TIME" => "1000",
      "PAGER_SHOW_ALL" => "N",
      "PAGER_BASE_LINK_ENABLE" => "Y",
      "SET_STATUS_404" => "Y",
      "SHOW_404" => "Y",
      "MESSAGE_404" => "",
      "PAGER_BASE_LINK" => "",
      "PAGER_PARAMS_NAME" => "arrPager",
      "AJAX_OPTION_JUMP" => "N",
      "AJAX_OPTION_STYLE" => "Y",
      "AJAX_OPTION_HISTORY" => "N",
      "AJAX_OPTION_ADDITIONAL" => ""
  )
);?>

  <div class="is-text-center">
    <a href="/en/info/museum-shop/" class="button is-secondary">To Museum Shop</a>
  </div>

</div>

</section>
