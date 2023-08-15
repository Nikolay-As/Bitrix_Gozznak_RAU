<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

if(defined("B_PROLOG_INCLUDED") && B_PROLOG_INCLUDED===true)
{
	global $APPLICATION;
	$APPLICATION->RestartBuffer();
}
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Страница не найдена</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link href='/css/fonts/playfairsc/playfairsc.css' rel='stylesheet' type='text/css'>
		<link href='/css/fonts/rubik/rubik.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="/css/style_404.css">
	</head>
	<body>
	<div class="im-404-logo"><a href="/"><img src="/images/logos/goznak.png"></a></div>
	<div class="im-404">
		<div class="im-404-title">Ошибка 404</div>
		<div class="im-404-text">Вы ищете страницу, которой не существует</div>
		<a href="/" class="im-404-home_link">Перейти на главную страницу сайта</a>
	</div>
	</body>
	</html>
<?if(defined("B_PROLOG_INCLUDED") && B_PROLOG_INCLUDED===true)
{
	die();
}
?>