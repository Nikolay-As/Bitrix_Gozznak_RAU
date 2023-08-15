<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карта сайта");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.map",
	"sitemap",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COL_NUM" => "1",
		"COMPONENT_TEMPLATE" => "sitemap",
		"LEVEL" => "1",
		"SET_TITLE" => "Y",
		"SHOW_CONTROL" => array("f34bb62f734d1cecaa4de6a8b8efab52"=>"Y","e735da51d1036207ae8ae91d15250cee"=>"Y","677d6cb0bed6e1a07d1dd38c6657063e"=>"Y","fbccf3134002635112c8cc8898da49ae"=>"Y","2530bc3fc92265a473426a0d9837007e"=>"Y","11256e11ef788191637b019557035074"=>"Y","86f7e5d636efdb38f9268505ac3accdb"=>"Y","43a0e05fd7c01b6ce87d93f29de95fbc"=>"Y","c71c3581761c26654c182b5818524f37"=>"Y","c82c9ab05ac924c04ab80f3beb7ca581"=>"Y","f1194dfd824cfe379c2165a1326628f1"=>"Y","6176bdcfa28155b323d48658f690571e"=>"Y","f6502803d00c423fe1ebac8f8ab4cf89"=>"Y",),
		"SHOW_DESCRIPTION" => "N",
		"SITE_ID" => "s1"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>