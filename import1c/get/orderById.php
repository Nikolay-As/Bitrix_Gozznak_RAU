<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Loader,
    Bitrix\Sale,
    Bitrix\Sale\Order;

if (Loader::includeModule('sale'))
{
    if ($_REQUEST['ID']) {
        $orderId = htmlspecialchars($_REQUEST['ID']);
        $order = Order::load($orderId);

        if (!$order) die('не удалось получить заказ');

        $result = [];
        $propertyCollection = $order->getPropertyCollection();
        $orderDateInsert = $order->getDateInsert();
        $userEmail = $propertyCollection->getUserEmail();

        $result['ORDER_NUMBER'] = $order->getField('ACCOUNT_NUMBER');
        $result['ORDER_IS_PAYED'] = $order->isPaid();
        $result['ORDER_DATE'] = $orderDateInsert->toString();
        $result['ORDER_CLIENT_EMAIL'] = $userEmail->getValue();


        $basket = $order->getBasket();
        $orderProds = [];
        foreach ($basket as $key => $basketItem) {

            $orderProds[$key]['ORDER_PROD_NAME'] = $basketItem->getField('NAME');
            $orderProds[$key]['ORDER_PROD_QUANT'] = $basketItem->getField('QUANTITY');
            $orderProds[$key]['ORDER_PROD_PRICE'] = $basketItem->getField('PRICE');
        }

        $result['ORDER_PRODS'] = $orderProds;
        // $date = $order->getField('DATE_INSERT');
        // $fields = $order->getFields();

        echo json_encode($result, JSON_UNESCAPED_UNICODE);

    }

}






/* 

[
 {
V   "ORDER_NUMBER": "000001062",
V   "ORDER_IS_PAYED":  true,
V   "ORDER_DATE": *ваш формат даты*
V   "ORDER_CLIENT_EMAIL": "example@example.com",   
   "ORDER_PRODS": [
     {
       "ORDER_PROD_NAME": "Билет выставка денег",
       "ORDER_PROD_QUANT": 1,
       "ORDER_PROD_PRICE": 100,
     },
     {
       "ORDER_PROD_NAME": "Пенсионный",
       "ORDER_PROD_QUANT": 2,
       "ORDER_PROD_PRICE": 150,
     }
     
   ]
}
]

*/