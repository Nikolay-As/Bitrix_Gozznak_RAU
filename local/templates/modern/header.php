<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
global $APPLICATION;
$dir = $APPLICATION->GetCurPage();
?>
<!DOCTYPE html>
<meta name="description" content="Деньги" />
<html lang="<?= LANGUAGE_ID === 'ru' ? 'ru' : 'en'; ?>">
	<head>
		<title><?$APPLICATION->ShowTitle();?></title>
		<link href='/css/fonts/playfairsc/playfairsc.css' rel='stylesheet' type='text/css'>
		<link href='/css/fonts/rubik/rubik.css' rel='stylesheet' type='text/css'>
	<?
	if(CSite::InDir('/vote/'))
	{
		?>
		<script src="<?=SITE_TEMPLATE_PATH . '/js/jquery.min.js' ?>"></script>
		<?
	}
	?>
<!-- Yandex.Metrika Логин: goznak.museum-->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(88171790, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/88171790" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika -->
<!-- Yandex.Metrika counter -->
	<script type="text/javascriptA" >
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?if($dir == "/"): // #6972 - Yandex verification?>
	<meta name="yandex-verification" content="3f9d2aa9e5b6fabc" />
	<?endif;?>
	<link href="/static/css/1.2e3f6761.css" rel="stylesheet">
	<link href="/static/css/app.6cfc0343.css" rel="stylesheet">
	<link href="<?=SITE_TEMPLATE_PATH?>/styles.css" rel="stylesheet">
	<script>
		(function () {
			function setViewport() {
				var mvp = document.querySelector('[name="viewport"]');
				var mvpContent = screen.width > 768 && screen.width < 1280 ? 'width=1280' : 'width=device-width';
				 mvp.setAttribute('content',mvpContent);
			}
			window.addEventListener('orientationchange', () => {
				setViewport();
			}, false);
			setViewport();
		})();
	</script>
	<!--[if lte IE 9]>
		<link href="/static/css/iefix.css" rel="stylesheet">
	<![endif]-->
	<?$APPLICATION->ShowHead()?>
</head>
<body class="<?= LANGUAGE_ID === 'ru' ? 'lang-ru' : 'lang-en'; ?> <?= ($dir == "/") ? 'home-page' : 'inner-page' ?> <?$APPLICATION->ShowProperty("body_class");  ?>">
	<?$APPLICATION->ShowPanel()?>
	<? include($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include_areas/index/navigation.php"); ?>
	<? if($dir == SITE_DIR): // index page ?>
	<? include($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include_areas/index/index_page_content_modern.php"); ?>
	<? else: // inner page ?>
	<? if($dir == '/about/collection/' || $dir == '/en/about/collection/'): // index page ?>
	<? include($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include_areas/index/collection_navigation.php"); ?>
	<? endif; ?>
	<? if($dir == '/ekskursii-i-programmy/programmy-i-ekskursii/'): // index page ?>
	<? include($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include_areas/index/booking_widget.php"); ?>
	<? endif; ?>
	<? $isWidget = ($dir == '/about/collection/' || $dir == '/ekskursii-i-programmy/programmy-i-ekskursii/') ? 'container--widget' : '' ; ?>
	<div class="content is-inset-y-40">
		<div class="container container--inner <?= $isWidget ?>">
			<div class="is-stack-40 is-hidden-mobile">
				<a href="<?= LANGUAGE_ID === 'ru' ? '/' : '/en/'; ?>">
					<svg class="svg-icon svg-icon--logo-inner">
						<use xlink:href="#logo-00"></use>
					</svg>
				</a>
			</div>
			<?
				// Навигационная цепочка - http://dev.1c-bitrix.ru/user_help/settings/settings/components_2/navigation/breadcrumb.php
				$APPLICATION->IncludeComponent(
					"bitrix:breadcrumb", 
					"modern", 
					array(
						"START_FROM" => "1",
						"PATH" => "",
						"SITE_ID" => "s2",
						"COMPONENT_TEMPLATE" => "modern"
					),
					false
				);
			?>
			<?
				if(CSite::InDir('/cross/') && !CSite::InDir('/cross/index.php'))
				{
					?>
						<div class='subheader'>Кроссворд</div>
					<?
				}
			?>
			<h1 class="is-stack-40"><?$APPLICATION->ShowTitle(false);?></h1>
			<? endif; ?>
			