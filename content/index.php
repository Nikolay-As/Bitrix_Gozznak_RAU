<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");

LocalRedirect("/content/news/", "301");
?>s

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>