<? if ( ! defined( 'B_PROLOG_INCLUDED' ) || B_PROLOG_INCLUDED !== true ) {
	die();
}

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogTopComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
if ( isset( $arParams['~TEMPLATE_THEME'] ) && $arParams['~TEMPLATE_THEME'] == 'site' ) {
	$arParams['TEMPLATE_THEME'] = '';
}

function getWeekdays( $values, $holidays = false ) {
	$weekdays = [];

	$weekdaysCompliance = [
		"work_day_sunday_enabled" => 1,
		"work_day_monday_enabled" => 2,
		"work_day_tuesday_enabled" => 3,
		"work_day_wednesday_enabled" => 4,
		"work_day_thursday_enabled" => 5,
		"work_day_friday_enabled" => 6,
		"work_day_saturday_enabled" => 7
	];


	foreach ( $values as $key => $value ) {
		if ( array_key_exists( $key, $weekdaysCompliance ) ) {
			if ( ! $holidays && $value === "Y" ) {
				array_push( $weekdays, $weekdaysCompliance[ $key ] );
			} elseif ( $holidays && $value === "N" ) {
				array_push( $weekdays, $weekdaysCompliance[ $key ] );
			}
		}
	}

	return $weekdays;
}

$ticketReservationOptions = \Bitrix\Main\Config\Option::getForModule( "sb.ticket_reservation" );

$holidays = getWeekdays( $ticketReservationOptions, true );

$nowDate = new DateTime( "now" );

$arResult["CALENDAR_OPTIONS"] = [
	"minDate" => $nowDate->format( "d.m.Y" ),
	"disabledDates" => [
		"weekdays" => $holidays
	],
	"availableDates" => []
];

$workdayDates = explode( "\n", $ticketReservationOptions["work_day_dates"] );
$weekendDates = explode( "\n", $ticketReservationOptions["weekend_dates"] );

if ( count( $workdayDates ) > 0 ) {
	foreach ( $workdayDates as $date ) {
		$date = trim( $date );
		$dateTime = new DateTime( $date );

		if ( $dateTime->getTimestamp() > $nowDate->getTimestamp() ) {
			array_push( $arResult["CALENDAR_OPTIONS"]["availableDates"], [
				"start" => $date,
				"end" => $date
			] );
		}
	}
}

if ( count( $weekendDates ) > 0 ) {
	foreach ( $weekendDates as $date ) {
		$date = trim( $date );
		$dateTime = new DateTime( $date );

		if ( $dateTime->getTimestamp() > $nowDate->getTimestamp() ) {
			array_push( $arResult["CALENDAR_OPTIONS"]["disabledDates"], [
				"start" => $date,
				"end" => $date
			] );
		}
	}
}

if ( $arParams["VISIT_TIME_IBLOCK_ID"] ) {
	$arResult["VISIT_TIME"] = [];

	$visitTimeRes = CIBlockElement::GetList( [], [
		"IBLOCK_ID" => $arParams["VISIT_TIME_IBLOCK_ID"],
		"ACTIVE" => "Y"
	] );

	while ( $visitTime = $visitTimeRes->Fetch() ) {
		$arResult["VISIT_TIME"][] = [
			"id" => $visitTime["ID"],
			"value" => $visitTime["NAME"]
		];
	}
}

$excursionsIBlockId = 0;
$excursionIds = [];

foreach ( $arResult['ITEMS'] as $item ) {
	if ( isset( $item["DISPLAY_PROPERTIES"]["EXCURSION"] ) ) {
		$excursion = $item["DISPLAY_PROPERTIES"]["EXCURSION"];

		if ( $excursionsIBlockId === 0 ) {
			$excursionsIBlockId = $excursion["LINK_IBLOCK_ID"];
		}

		if ( ! in_array( $excursion["VALUE"], $excursionIds ) ) {
			array_push( $excursionIds, $excursion["VALUE"] );
		}
	}
}

if ( intval( $excursionsIBlockId ) > 0 && count( $excursionIds ) > 0 ) {
	$arResult["EXCURSIONS"] = [];

	$excursionsRes = CIBlockElement::GetList( [], [
		"ID" => $excursionIds,
		"IBLOCK_ID" => $excursionsIBlockId
	], false, false, [ "ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", "PROPERTY_DURATION", "PROPERTY_CUSTOM_DATE" ] );

	while ( $excursion = $excursionsRes->Fetch() ) {
		$date = new DateTime($excursion["PROPERTY_CUSTOM_DATE_VALUE"]);

		$arResult["EXCURSIONS"][] = [
			"ID" => $excursion["ID"],
			"NAME" => $excursion["NAME"],
			"PREVIEW_TEXT" => $excursion["PREVIEW_TEXT"],
			"PREVIEW_PICTURE" => CFile::GetPath( $excursion["PREVIEW_PICTURE"] ),
			"DURATION" => $excursion["PROPERTY_DURATION_VALUE"],
			"DATE" => $date->format("d.m.Y")
		];
	}
}
