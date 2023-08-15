<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Как добраться");
?>
<p>
	Экспозиция «История денег» расположена на территории Петропавловской крепости, в здании Кавальера Анны Иоанновны (Аннинского кавальера), рядом с Головкиным бастионом.
</p>
<div class="is-video-container is-stack-40">
	<iframe src="//www.youtube.com/embed/C6phLHOviY4?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
</div>

<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Afd8990c76e6b194d5e1d0ec23695295e1adbc9ea72af943c43ca6f272607a95c&amp;width=827&amp;height=536&amp;lang=ru_RU&amp;scroll=true"></script>

<!--
<?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	".default", 
	array(
		"CONTROLS" => array(
			"TYPECONTROL",
			"SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:".
            "\"yandex_lat\";d:59.93111336838201;s:10:".
            "\"yandex_lon\";d:30.274979649095965;s:12:".
            "\"yandex_scale\";i:10;s:10:".
            "\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:".
            "\"LON\";d:30.316633363568712;s:3:".
            "\"LAT\";d:59.94954537285442;s:4:".
            "\"TEXT\";s:56:\"Музей истории денег АО \"Гознак\"\";}}}",
		"MAP_HEIGHT" => "400",
        "MAP_WIDTH" => "100%",
		"MAP_ID" => "museum_yandex_map",
		"OPTIONS" => array(
			"ENABLE_SCROLL_ZOOM",
			"ENABLE_DBLCLICK_ZOOM",
			"ENABLE_DRAGGING",
		),
		"COMPONENT_TEMPLATE" => ".default",
	),
	false
);?>
-->

<h2>До Петропавловской крепости можно добраться:</h2>

<div class="is-row is-col-stack-24">
	<div class="is-col is-50">
		<h3>От станции метро «Горьковская»</h3>
		Прогулка пешком через Александровский парк и далее по территории крепости (примерно 1 км) займет у вас около 15 минут
	</div>
	<div class="is-col is-50">
	<h3>От станции метро «Спортивная»</h3>
Далее – или трамваем № 6 или 40 до остановки «Кронверкский проспект» и пешком 700 м. (10 мин); или троллейбусом № 7, автобусом № 10 или 191 до остановки «Мытнинская набережная» и пешком 1 км (15 мин.); или от метро пешком около 1,5 км (20 минут).
	</div>
</div>

<hr />

<p>
	 &nbsp;&nbsp;Обращаем ваше внимание, что въезд автотранспорта на территорию Петропавловской крепости запрещен. Также запрещена парковка на Кронверкской&nbsp;набережной и Каменностровском проспекте.
</p>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>