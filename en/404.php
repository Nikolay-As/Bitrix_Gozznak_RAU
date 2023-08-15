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
		<title>Page not found</title>
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
		<div class="im-404-title">Error 404</div>
		<div class="im-404-text">Are you looking for a page that doesn't exist</div>
		<a href="/en/" class="im-404-home_link">Go to the home page</a>
	</div>
	</body>
	</html>
<?if(defined("B_PROLOG_INCLUDED") && B_PROLOG_INCLUDED===true)
{
	die();
}
?>