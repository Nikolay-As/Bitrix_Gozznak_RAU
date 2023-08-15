<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Loader,
    Bitrix\Sale,
    Bitrix\Sale\Order;

if (Loader::includeModule('sale')) {
    if ($_REQUEST['ID']) {
        $orderNumber = htmlspecialchars($_REQUEST['ID']);
        $orderId     = \CSaleOrder::GetList([], ['ACCOUNT_NUMBER' => $orderNumber])->fetch()['ID'];

        if (!$orderId) die('не удалось получить заказ');

        $order = Order::load($orderId);

        if (!$order) die('не удалось получить заказ');

        $result             = [];
        $propertyCollection = $order->getPropertyCollection();
        $orderDateInsert    = $order->getDateInsert();
        $userEmail          = $propertyCollection->getUserEmail();

        $result['ORDER_NUMBER']       = $order->getField('ACCOUNT_NUMBER');
        $result['ORDER_IS_PAYED']     = $order->isPaid();
        $result['ORDER_DATE']         = $orderDateInsert->toString();
        $result['ORDER_CLIENT_EMAIL'] = $userEmail->getValue();


        $basket     = $order->getBasket();
        $orderProds = [];


        /**
         * @var Sale\BasketItem $basketItem
         */
        foreach ($basket as $key => $basketItem) {
            $date        = null;
            $time        = null;
            $excursionId = null;


            /** @var Sale\BasketPropertyItem $property */
            foreach ($basketItem->getPropertyCollection() as $property) {

                if ($property->getField('CODE') === 'VISIT_DATE') {
                    $date = $property->getField('VALUE');
                }

                if ($property->getField('CODE') === 'VISIT_TIME') {
                    $time = $property->getField('VALUE');
                }

                if ($property->getField('CODE') === 'EXCURSION_ID') {
                    $excursionId = $property->getField('VALUE');
                }
            }


            $ticketElement = [];
            if (!$excursionId) {

                $ticketElement = CIBlockElement::GetList([],
                    [
                        'ID' => $basketItem->getProductId(),
                        'IBLOCK_ID' => 36
                    ],
                    false,
                    false,
                    [
                        'ID', 'PROPERTY_EXCURSION', 'PROPERTY_CODE_1C'
                    ])->GetNext();
            }


            $orderProds[$key]['ORDER_PROD_NAME']          = $basketItem->getField('NAME');
            $orderProds[$key]['ORDER_PROD_QUANT']         = $basketItem->getField('PRICE');
            $orderProds[$key]['ORDER_PROD_PRICE']         = (int)$basketItem->getField('QUANTITY');
            $orderProds[$key]['ORDER_PROD_DATE']          = $date;
            $orderProds[$key]['ORDER_PROD_TIME']          = $time;
            $orderProds[$key]['ORDER_PROD_ID_EXCURSIONS'] = $excursionId;
            $orderProds[$key]['ORDER_PROD_CODE_1C']       = $ticketElement['PROPERTY_CODE_1C_VALUE'];
        }

        $result['ORDER_PRODS'] = $orderProds;

        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
