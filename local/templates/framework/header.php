<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);

global $APPLICATION;
$dir = $APPLICATION->GetCurPage();
?><!DOCTYPE html>
<html>
	<head>
		<title><?$APPLICATION->ShowTitle();?></title>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(48127907, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        trackHash:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/48127907" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

		<?$APPLICATION->ShowHead();?>
		<!-- meta -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-language" content="<?=LANGUAGE_ID;?>" />
		<?if($dir == "/"): // #6972 - Yandex verification?>
		<meta name="yandex-verification" content="3f9d2aa9e5b6fabc" />
		<?endif;?>

		<!-- fonts -->
        <link href='/css/fonts/playfairsc/playfairsc.css' rel='stylesheet' type='text/css'>
        <link href='/css/fonts/rubik/rubik.css' rel='stylesheet' type='text/css'>

		<link rel="shortcut icon" href="/images/logos/favicon.ico" type="image/x-icon">
		<!-- CSS -->
		<?$APPLICATION->SetAdditionalCSS("/css/normalize.min.css");?>
		<?$APPLICATION->SetAdditionalCSS("/css/font-awesome.min.css");?>
		<?$APPLICATION->SetAdditionalCSS("/css/tooltipster/tooltipster.css");?>
		<?$APPLICATION->SetAdditionalCSS("/css/tooltipster/tooltipster-shadow.css");?>
		<?$APPLICATION->SetAdditionalCSS("/css/owl-carousel/owl.carousel.css");?>
		<?$APPLICATION->SetAdditionalCSS("/css/dwbox.css");?>
		<?$APPLICATION->SetAdditionalCSS("/css/mag.css");?>
		<?$APPLICATION->SetAdditionalCSS("/css/slick/slick.css");?>
		<?$APPLICATION->SetAdditionalCSS("/css/slick/slick-theme.css");?>
		<?$APPLICATION->SetAdditionalCSS("/css/pure/grids.min.css");?>
		<?$APPLICATION->SetAdditionalCSS("/css/pure/grids-responsive.min.css");?>
		<?$APPLICATION->SetAdditionalCSS("/css/style.css");?>

		<!-- Scripts -->
		<?//$APPLICATION->AddHeadScript("/js/jquery-1.12.0.js");?>
		<?$APPLICATION->AddHeadScript("/js/jquery.min.js");?>
		<?$APPLICATION->AddHeadScript("/js/jquery.dwbox.min.js");?>
		<?$APPLICATION->AddHeadScript("/js/scrollTo.min.js");?>
		<?$APPLICATION->AddHeadScript("/js/slick.min.js");?>		
		<?$APPLICATION->AddHeadScript("/js/jquery.validate.min.js");?>
		<?$APPLICATION->AddHeadScript("/js/jquery.tooltipster.min.js");?>
		<?$APPLICATION->AddHeadScript("/js/jquery.bridget.js");?>
		<?$APPLICATION->AddHeadScript("/js/PreventGhostClick.js");?>
		<?$APPLICATION->AddHeadScript("/js/jquery.mousewheel.js");?>
		<?$APPLICATION->AddHeadScript("/js/jquery.event.drag.js");?>		
		<?$APPLICATION->AddHeadScript("/js/mag.js");?>
		<?$APPLICATION->AddHeadScript("/js/mag-jquery.js");?>
		<?$APPLICATION->AddHeadScript("/js/mag-control.js");?>  <?// MODIFIED: reset to default position/zoom added, don't replace!?>
		<?$APPLICATION->AddHeadScript("/js/owl.carousel.min.js");?>
		
		<?$APPLICATION->AddHeadScript("/js/script.js");?>
		<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
		<script src="//yastatic.net/share2/share.js"></script>
		<!-- <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script> -->
	</head>
	<body>
		<div id="panel"><? $APPLICATION->ShowPanel();?></div>
		<div class="im-common-page_wrapper">
			<header class="im-common-page_row">
				<div class="im-header-inner">
					<div class="im-common-wrapper">
						<a href="<?=SITE_DIR;?>" class="im-header-logo im-common-fl">
							<div class="im-common-img_wrapper im-common-fl">
								<img src="/images/logos/md_goznak_logo.svg" alt="">
							</div>
							<div class="im-common-fl">
								<div class="im-header-logo-text im-common-clr-black im-common-al">
									<?$APPLICATION->IncludeFile(SITE_DIR."include_areas/framework/title.php", Array(), Array("MODE" => "html"));?>
								</div>
							</div>
						</a>
						<button class="im-menu_icon im-common-fr im-common-bg-palegreen im-common-desktop-hide">
							<span></span>
						</button>
						<nav class="im-common-fr im-common-mob-hide_b">
							<?
							$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_menu1", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "top",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "top_menu1",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);
							?>
						</nav>
						<div class="im-search-wrapper">
							<div class="im-search">
								<span class="im-search-toggle im-common-fr im-common-ac"></span>
								<div class="im-lang im-common-fl im-common-ac">
									<?// changed by #6468?>
									<?if (SITE_ID == "s1"):?>
										<a href="/en/" class="im-lang-item im-lang-item__active" title="EN">EN</a>
									<?else:?>
										<a href="/" class="im-lang-item im-lang-item__active" title="RU">RU</a>
									<?endif;?>
																
									<?/*									
									// Выбор сайта - http://dev.1c-bitrix.ru/user_help/settings/settings/components_2/navigation/main_site_selector.php
									$APPLICATION->IncludeComponent("bitrix:main.site.selector", "top_selector", Array(
										"SITE_LIST" => array(	// Список сайтов
												0 => "s1",
												1 => "s2",
											),
											"CACHE_TYPE" => "A",	// Тип кеширования
											"CACHE_TIME" => "3600",	// Время кеширования (сек.)
											"CACHE_NOTES" => "",
											"COMPONENT_TEMPLATE" => ".default"
										),
										false
									);
									*/?>									
								</div>

								<div class="im-search-field">
									<?
									// Поиск по заголовкам - http://dev.1c-bitrix.ru/user_help/settings/search/components_2/search_title.php
									$APPLICATION->IncludeComponent(
										"bitrix:search.title", 
										"top_search", 
										array(
											"NUM_CATEGORIES" => "1",
											"TOP_COUNT" => "5",
											"ORDER" => "date",
											"USE_LANGUAGE_GUESS" => "Y",
											"CHECK_DATES" => "N",
											"SHOW_OTHERS" => "N",
											"PAGE" => "#SITE_DIR#search/index.php",
											"CATEGORY_0_TITLE" => "Результаты поиска",
											"CATEGORY_0" => array(
												0 => "iblock_content",
												1 => "iblock_content_en",
											),
											"COMPONENT_TEMPLATE" => "top_search",
											"SHOW_INPUT" => "Y",
											"INPUT_ID" => "title-search-input",
											"CONTAINER_ID" => "title-search",
											"CATEGORY_0_main" => "",
											"CATEGORY_0_iblock_content" => array(
												0 => "3",
											),
											"CATEGORY_0_iblock_content_en" => array(
												0 => "11",
											)
										),
										false
									);
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<main class="im-common-page_row im-common-page_row-expanded">

			<? if($dir == SITE_DIR): // index page ?>

				<? include($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include_areas/index/index_page_content.php"); ?>

			<? else: // inner page ?>

				<div class="im-current_section im-common-bg im-common-ac">
					<?
					// Меню - http://dev.1c-bitrix.ru/user_help/settings/settings/components_2/navigation/menu.php
					$APPLICATION->IncludeComponent(
						"bitrix:menu",
						"center_section_title",
						array(
							"ROOT_MENU_TYPE" => "top",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => array(
							),
							"MAX_LEVEL" => "1",
							"CHILD_MENU_TYPE" => "left",
							"USE_EXT" => "N",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N",
							"COMPONENT_TEMPLATE" => "center_section_title"
						),
						false,
						array("HIDE_ICONS" => "Y")
					);
					?>
				</div>

				<div class="im-common-wrapper">

					<?
					// Навигационная цепочка - http://dev.1c-bitrix.ru/user_help/settings/settings/components_2/navigation/breadcrumb.php
					$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"nav", 
	array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "s2",
		"COMPONENT_TEMPLATE" => "nav"
	),
	false
);
					?>

					<div class="im-common-clearfix">
						<div class="im-common-left_col im-common-fl">
							<?
							$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"left_menu", 
	array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "left_menu"
	),
	false
);
							?>
						</div>
						<div class="im-common-right_col im-common-fl">

							<h1><?$APPLICATION->ShowTitle(false);?></h1>

							<div class="im-wa">
			<? endif; ?>