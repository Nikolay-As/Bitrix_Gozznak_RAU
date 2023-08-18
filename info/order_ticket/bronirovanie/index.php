
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Бронирование билетов");
?>
<p>
Выкупить билет в кассе Музея истории денег необходимо не позднее, чем за 10 минут до начала события. Опоздавшие к началу сеанса не будут допущены до участия в мероприятии.
</p>
<body>
<?php // Попурей НД РАУ 46444
global $DB;
?>

<?php


$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://1c-devs.rauit.ru/goznak_popurey/hs/RAU_info_for_site/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic 0J/QvtC00YDRj9C00YfQuNC6OjE0NTgq'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$sql = "SELECT * FROM bitrix_65.application_for_excursions where status = 'По расписанию' and type =  'Обзорная экскурсия по музею' and amount_for_bron > 0";
$Application_Query = $DB->Query($sql);

$Application_array=array();

while ($row = $Application_Query->fetch())
{
array_push($Application_array, $row);
}

if (count($Application_array) > 0){
  ?>
  <div class="buy-banner-wrapper">
  <div class="buy-banner-main">
    <div class="text-content-wrapper">
      <span class="banner-buy-title">Экскурсии и программы по расписанию&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="https://museum.goznak.ru/info/order_ticket/bronirovanie/bronirovanie1.php" class="banner-buy-button"><span class="buy-button-text">Перейти</span></a>
    </div> 
  </div>
</div>
<?php } ?>

<br>

<?php
$sql = "SELECT * FROM bitrix_65.application_for_excursions where status = 'По расписанию' and type =  'Участие в мастер-классе по отливу бумаги' and amount_for_bron > 0";
$Application_Query = $DB->Query($sql);

$Application_array=array();

while ($row = $Application_Query->fetch())
{
array_push($Application_array, $row);
}

if (count($Application_array) > 0){
  ?>
  <div class="buy-banner-wrapper">
  <div class="buy-banner-main">
    <div class="text-content-wrapper">
       <span class="banner-buy-title">Участие в мастер-классе&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="https://museum.goznak.ru/info/order_ticket/bronirovanie/bronirovanie2.php" class="banner-buy-button"><span class="buy-button-text">Перейти</span></a>
    </div>
  </div>
</div>
<?php } ?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>