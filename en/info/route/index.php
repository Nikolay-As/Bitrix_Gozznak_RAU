<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("How to find us");
?><p>
	 The Russian Money museum is located within the territory of the Peter and Paul Fortress, in the building of Cavalier.
</p>

<div class="is-video-container is-stack-40">
	 <iframe src="//www.youtube.com/embed/C6phLHOviY4?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
</div>
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

<h2>The Peter and Paul Fortress can be reached:</h2>

<div class="is-row is-col-stack-24">
	<div class="is-col is-50">
		<h3>From “Gorkovskaya” metro station</h3>
		A walk through Alexandrovskiy Park and across the territory of the fortress (about 1 km) will take you about 15 minutes
	</div>
	<div class="is-col is-50">
		<h3>From “Sportivnaya” metro station</h3>
		Take Tram No. 6 or 40, "Kronverkskiy Prospekt" stop and walk 700 m.; or Trolleybus No. 7, Bus No. 10 or 191, “Mytninskaya Naberezhnaya” stop, 1 km on foot; or you can walk from the metro station (about 1.5 km, 20 minutes).
	</div>
</div>
<hr/>
<p>
	 &nbsp;&nbsp;Please be aware that it is not allowed to drive into the territory of the Peter and Paul Fortress. Moreover, parking is prohibited in Kronverkskaya Naberezhnaya and Kamennoostrovskiy Prospekt.
</p>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>