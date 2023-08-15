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
$sql = "SELECT * FROM skud_bd.application_for_excursions where status = 'По расписанию' and type =  'Обзорная экскурсия по музею' and amount_for_bron > 0";
$Application_Query = $DB->Query($sql);

if (count($Application_Query) > 0 and $Application_Query->fetch()['id'] > 0){
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
$sql = "SELECT * FROM skud_bd.application_for_excursions where status = 'По расписанию' and type =  'Участие в мастер-классе по отливу бумаги' and amount_for_bron > 0";
$Application_Query = $DB->Query($sql);

if (count($Application_Query) > 0 and $Application_Query->fetch()['id'] > 0){
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