<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

\Bitrix\Main\Loader::includeModule('iblock');

$url      = 'http://82.140.87.246/Goznak/hs/excursions';
$login    = 'admin';
$password = '123';

$client = new \Bitrix\Main\Web\HttpClient();
$client->setAuthorization($login, $password);

if($_REQUEST['date']) {
    $date = DateTime::createFromFormat('d.m.Y', $_REQUEST['date']);
}else {
    $date = new DateTime();
}

$date->setTime(1, 0);

$res = $client->get($url . '?date=' . $date->format('Y-m-d H:i:s'));
$date->modify('+1 day');

$decodedRes = json_decode($res, true);

header('Content-Type: application/json');


echo json_encode($decodedRes['Excursions']);
