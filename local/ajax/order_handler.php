<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
Bitrix\Main\Loader::includeModule("sale");
Bitrix\Main\Loader::includeModule("catalog");

use Bitrix\Currency\CurrencyManager;
use Bitrix\Main\Context;
use Bitrix\Sale;
use Bitrix\Sale\Order;

$result = ["type" => "error"];

$_POST = json_decode(file_get_contents('php://input'), true);

$db_sales = CSaleOrder::GetList([], [
    ">=DATE_INSERT" => date($DB->DateFormatToPHP(CSite::GetDateFormat("SHORT"))) . " 00:00:00",
    "<=DATE_INSERT" => date($DB->DateFormatToPHP(CSite::GetDateFormat("SHORT"))) . " 23:59:59",
    "=PROPERTY_VAL_BY_CODE_USER_EMAIL" => $_POST['EMAIL'],
]);

$maxReservations = (int)\Bitrix\Main\Config\Option::get("sb.ticket_reservation", "reservation_max_per_day");;

if (!$maxReservations) {
    $maxReservations = 5;
}

if ($db_sales->SelectedRowsCount() >= $maxReservations) {
    echo json_encode($result);
    exit(0);
}

if ($_POST['ITEMS'] && $_POST['SITE_ID']) {
    if (is_array($_POST['ITEMS'])) {
        $basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), $_POST['SITE_ID']);

        $order = Order::create($_POST['SITE_ID'], Sale\Fuser::getId());
        $order->setPersonTypeId(1);
        $order->setField('CURRENCY', \Bitrix\Currency\CurrencyManager::getBaseCurrency());

        $visitTimeIBlock = \CIBlock::GetList([], [
            "CODE" => "VISIT_TIME",
            "CHECK_PERMISSIONS" => "N"
        ])->Fetch();

        $visitTimeElementRes = CIBlockElement::GetList([], [
            "IBLOCK_ID" => $visitTimeIBlock["ID"],
            "ACTIVE" => "Y",
            "ID" => $_POST["VISIT_TIME"] ?: 0
        ]);

        $propCollArr = [
            [
                'NAME' => 'Дата посещения',
                'CODE' => 'VISIT_DATE',
                'VALUE' => $_POST["VISIT_DATE"],
                'SORT' => 100,
            ]
        ];

        if ($visitTimeElement = $visitTimeElementRes->Fetch()) {
            $propCollArr[] = [
                'NAME' => 'Время посещения',
                'CODE' => 'VISIT_TIME',
                'VALUE' => $visitTimeElement["NAME"],
                'SORT' => 200,
            ];
        }else {
            $propCollArr[] = [
                'NAME' => 'Время посещения',
                'CODE' => 'VISIT_TIME',
                'VALUE' => $_POST["VISIT_TIME"],
                'SORT' => 200,
            ];
        }

        if (intval($_POST["EXCURSION_ID"]) > 0) {
            $propCollArr[] = [
                'NAME' => 'Экскурсия',
                'CODE' => 'EXCURSION',
                'VALUE' => $_POST["NAME"],
                'SORT' => 300,
            ];

            $propCollArr[] = [
                'NAME' => 'ID Экскурсии',
                'CODE' => 'EXCURSION_ID',
                'VALUE' => $_POST["EXCURSION_ID"],
                'SORT' => 300,
            ];

            foreach ($_POST['ITEMS'] as $key => $value) {
                $productId = $key;
                $quantity  = $value;

                //Добавление товара
                $item                     = $basket->createItem('catalog', 0);
                $basketPropertyCollection = $item->getPropertyCollection();
                $item->setFields([
                    'NAME' => $_POST['NAME'],
                    'QUANTITY' => $quantity,
                    'CURRENCY' => CurrencyManager::getBaseCurrency(),
                    'LID' => Context::getCurrent()->getSite(),
                    'PRICE' => 250,
                    'CUSTOM_PRICE' => 'Y',
                ]);

                $basketPropertyCollection->redefine($propCollArr);
            }
        }else {


            foreach ($_POST['ITEMS'] as $key => $value) {
                $productId = $key;
                $quantity  = $value;

                //Добавление товара
                $item                     = $basket->createItem('catalog', $productId);
                $basketPropertyCollection = $item->getPropertyCollection();
                $item->setFields([
                    'QUANTITY' => $quantity,
                    'CURRENCY' => \Bitrix\Currency\CurrencyManager::getBaseCurrency(),
                    'LID' => $_POST['SITE_ID'],
                    'PRODUCT_PROVIDER_CLASS' => \Bitrix\Catalog\Product\Basket::getDefaultProviderName(),
                ]);

                $basketPropertyCollection->redefine($propCollArr);
            }
        }

        $order->setBasket($basket);

        $propertyCollection = $order->getPropertyCollection();

        $emailProp = $propertyCollection->getUserEmail();
        $emailProp->setValue($_POST["EMAIL"]);

		$order->doFinalAction( true );
		$saveResult = $order->save();
        $orderId = $order->getId();

        $result = [
            "type" => "success",
            "data" => [
                "orderId" => $orderId
            ]
        ];
    }
}

echo json_encode($result);
exit(0);