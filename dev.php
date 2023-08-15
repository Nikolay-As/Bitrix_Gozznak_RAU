<?
// подключение служебной части пролога
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


use Bitrix\Main\Loader;
use Bitrix\Sale;

$orderNumber = '35-0G8F8';

Loader::includeModule('sale');


$orderId = \CSaleOrder::GetList([], ['ACCOUNT_NUMBER' => $orderNumber])->fetch()['ID'];


var_dump($orderId);