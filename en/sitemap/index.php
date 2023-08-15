<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Site map");
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
		"SHOW_CONTROL" => array("1db3d73ef99274b44e9123b41febbf6a"=>"Y","fb822594ce8e0a801ceb54dd8e33a9cf"=>"Y","2f137f57689ca08195771a6451bf1f39"=>"Y","fbc4615799df13a868f355ba27530ee9"=>"Y","dd629ffe164379b21c824cc8431dcc9e"=>"Y","44d6dc0c302f38be8255ea1aebb647f5"=>"Y","4ace38fb45c4d087909194c99d9a2841"=>"Y","81ee979e4591718db6e13d89b62fc846"=>"Y","94c0e99447460f540b3e0217132c234f"=>"Y","35db5b13a67cb6617cf62566b6d46311"=>"Y","b5ba928a77301d882e8dee23ee614955"=>"Y","5b4fe0e319a13219a800380c3d76311d"=>"Y","b7b5037e6e5d066963a4517558ca520b"=>"Y",),
		"SHOW_DESCRIPTION" => "N",
		"SITE_ID" => "s2"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>