<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("sale");
CModule::IncludeModule("catalog");

use Bitrix\Sale,
    Bitrix\Main\Context,
    Bitrix\Currency\CurrencyManager,
    Bitrix\Sale\Order,
    Bitrix\Sale\Basket,
    Bitrix\Sale\Delivery,
    Bitrix\Sale\PaySystem;


$result = [];
$result['status'] = 'error';

if ($_REQUEST['EMAIL']) 
{
    $userEmail = htmlspecialchars($_REQUEST['EMAIL']);

    $rsUsers = CUser::GetList(($by = "name"), ($order = "desc"), ["EMAIL" => 'buyer@mail.ru']);
    if ($rsUser = $rsUsers->Fetch()) {
        $userID = $rsUser["ID"];
    } else {
        
        $obUser = new CUser;
        // $userLogin = "client".time();
        $userPassw = randString(8);

        $arFields = array(
            "EMAIL" => 'buyer@mail.ru',
            "LOGIN" => 'buyer_user',
            "LID" => $_REQUEST['SITE_ID'],
            "ACTIVE" => "Y",
            "NAME" => "Пользователь",
            "LAST_NAME" => "Для заказов",
            "PASSWORD" => $userPassw,
            "CONFIRM_PASSWORD" => $userPassw
        );
        $userID = $obUser->Add($arFields);
        // echo $obUser->LAST_ERROR;

        // Регистрация пользователя
    }

    if ($userID) {
        
        $basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), $_REQUEST['SITE_ID']);

        $countBasket = array_sum($basket->getQuantityList());
        if ($countBasket === 0) {
            $result['error_text'] = 'Вы не выбрали товары для покупки';
            echo json_encode($result);
            die();
        }

        $currencyCode = CurrencyManager::getBaseCurrency(); // Базовая валюта

        $order = Order::create($_REQUEST['SITE_ID'], $userID);
        $order->setPersonTypeId(1);
        $order->setField('CURRENCY', $currencyCode);
        $order->setBasket($basket);

        // Создаём одну отгрузку и устанавливаем способ доставки - "Без доставки" (он служебный)
        $shipmentCollection = $order->getShipmentCollection();
        $shipment = $shipmentCollection->createItem();
        $service = Delivery\Services\Manager::getById(Delivery\Services\EmptyDeliveryService::getEmptyDeliveryServiceId());
        $shipment->setFields(array(
            'DELIVERY_ID' => $service['ID'],
            'DELIVERY_NAME' => $service['NAME'],
        ));


        $shipmentItemCollection = $shipment->getShipmentItemCollection();

        foreach ($basket as $basketItem) {
            //echo $basketItem->getField('NAME') . ' - ' . $basketItem->getQuantity() . '<br />';
            $shipmentItem = $shipmentItemCollection->createItem($basketItem);
            $shipmentItem->setQuantity($basketItem->getQuantity());
        }

        // Создаём оплату со способом #1
        $paymentCollection = $order->getPaymentCollection();
        $payment = $paymentCollection->createItem();
        $paySystemService = PaySystem\Manager::getObjectById($_REQUEST['PAY_SYSTEM_ID']); // ID платёжной системы
        $payment->setFields(array(
            'PAY_SYSTEM_ID' => $paySystemService->getField("PAY_SYSTEM_ID"),
            'PAY_SYSTEM_NAME' => $paySystemService->getField("NAME"),
        ));


        // задаётся свойство email для заказа
        $propertyCollection = $order->getPropertyCollection();
        $emailPropValue = $propertyCollection->getUserEmail();
        $emailPropValue->setValue($userEmail);

        // Сохраняем
        $order->doFinalAction(true);
        $orderResult = $order->save();
        $orderId = $order->getId();

        $result['$orderId'] = $orderId;
        $result['$orderResult'] = $orderResult;

        if ($orderId) {
            $result['status'] = 'success';
            $result['order_id'] = $orderId;
            $result['payment_link'] = '/info/order_ticket/order_create/payment.php?ORDER_ID=' . $orderId . '&PAYMENT_ID=' . $orderId . '/1';

            // Отправка письма с инфо о заказе!!!!
        }


    } else {
        $result['error_text'] = 'Проверьте правильность введённого email';
    }
}


echo json_encode($result);
