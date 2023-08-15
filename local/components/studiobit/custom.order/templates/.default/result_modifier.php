<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

CModule::IncludeModule("sale");

use Bitrix\Sale;


$basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());

$price = $basket->getPrice(); // Цена с учетом скидок
$basketItems = $basket->getBasketItems(); // массив объектов Sale\BasketItem
$totalQuantity = 0;
foreach ($basket as $basketItem) 
{
    $totalQuantity += $basketItem->getQuantity();
    // echo $basketItem->getField('NAME') . '/ ' . $basketItem->getQuantity() . '<br/>';
}

$arResult['PRINT_PRICE'] = $price;

function declOfNum($number, $titles) {
    $cases = [2, 0, 1, 1, 1, 2];
    return $titles[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[($number % 10 < 5) ? $number % 10 : 5]];
}

$declension = declOfNum($totalQuantity, ['билет', 'билета', 'билетов']);

$arResult['PRINT_COUNT'] = $totalQuantity . ' ' . $declension;

