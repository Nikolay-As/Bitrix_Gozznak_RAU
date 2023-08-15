<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Contacts");
?><div class="is-row is-stack-40">
	<div class="is-col is-50">
		<div class="is-inset-right-28">
			<div class="is-stack-8">
 <strong><?=GetMessage("FRAMEWORK_CONTACTS_ADDRESS");?></strong>
			</div>
 <span class="im-contacts-grid-item-inner"><?$APPLICATION->IncludeFile(SITE_DIR."include_areas/about/contacts/address.php", Array(), Array("MODE" => "html"));?></span>
		</div>
	</div>
	<div class="is-col is-50">
		<div class="im-contacts-grid">
			<div class="is-stack-8">
 <strong><?=GetMessage("FRAMEWORK_CONTACTS_PHONE");?></strong>
			</div>
 <span class="im-contacts-grid-item-inner"><?$APPLICATION->IncludeFile(SITE_DIR."include_areas/about/contacts/phone.php", Array(), Array("MODE" => "html"));?></span>
		</div>
		<div class="im-contacts-grid">
			<div class="is-stack-8">
 <strong><?=GetMessage("FRAMEWORK_CONTACTS_EMAIL");?></strong>
			</div>
 <span class="im-contacts-grid-item-inner"><?$APPLICATION->IncludeFile(SITE_DIR."include_areas/about/contacts/email.php", Array(), Array("MODE" => "html"));?></span>
		</div>
	</div>
</div>
 <!-- END .im-contacts-grid -->
<hr>
	
	<?
	// Список новостей
	$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"workers_in_contacts", 
	array(
		"IBLOCK_TYPE" => "content_en",
		"IBLOCK_ID" => "12",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "EMAIL",
			1 => "POST",
			2 => "PHONE",
			3 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"COMPONENT_TEMPLATE" => "workers_in_contacts",
		"SET_LAST_MODIFIED" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"BLOCK_TITLE" => "Administration"
	),
	false
);
	?>

	<?
	// Веб-форма - http://dev.1c-bitrix.ru/user_help/service/form/components_2/form.php
	$APPLICATION->IncludeComponent(
	"bitrix:form", 
	"feedback", 
	array(
		"START_PAGE" => "new",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"SUCCESS_URL" => "",
		"WEB_FORM_ID" => "2",
		"RESULT_ID" => $_REQUEST[RESULT_ID],
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_ADDITIONAL" => "N",
		"SHOW_STATUS" => "N",
		"EDIT_ADDITIONAL" => "N",
		"EDIT_STATUS" => "N",
		"NOT_SHOW_FILTER" => array(
			0 => "",
			1 => "",
		),
		"NOT_SHOW_TABLE" => array(
			0 => "",
			1 => "",
		),
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "Y",
		"SEF_MODE" => "N",
		"SEF_FOLDER" => "",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"COMPONENT_TEMPLATE" => "feedback",
		"VARIABLE_ALIASES" => array(
			"action" => "action",
		)
	),
	false
);
	?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>