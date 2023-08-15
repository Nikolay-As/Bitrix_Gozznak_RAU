<?
require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php" );
$APPLICATION->SetTitle("Экскурсии по расписанию");
$APPLICATION->SetTitle( "Экскурсии по расписанию");
?><!--
<div class="buy-banner-wrapper">
	<div class="buy-banner-main">
		<div class="text-content-wrapper">
 <span class="banner-buy-title">Экскурсии и программы по расписанию</span> <a href="https://widget.afisha.yandex.ru/w/venues/10349?clientKey=519f8a7f-f168-4286-8d8a-9a9e46496fd" class="banner-buy-button"> <span class="buy-button-text">Бронировать</span> </a>
		</div>
	</div>
</div>
 <br>
--> <br>
<br>
<p>
	<span style="font-family: var(--ui-font-family-primary, var(--ui-font-family-helvetica));">На что нужно обращать внимание, планируя визит в музей, можно посмотреть </span><a href="https://museum.goznak.ru/info/pravilami-poseshcheniya-muzeya.php" style="font-family: var(--ui-font-family-primary, var(--ui-font-family-helvetica));"><b><u>здесь</u></b></a><b><u>.</u></b><br>
</p>
<p>
	 &nbsp;&nbsp;Обзорные экскурсии по основной экспозиции проводятся ежедневно, без выходных. Начало – в 13:00, 15:00&nbsp;и 18:00.
</p>
<p>
	 &nbsp;&nbsp;Экскурсии проходят на русском языке. Продолжительность экскурсии – 40 – 50 минут. Оплата экскурсии производится в кассе музея, которая расположена в Аннинском кавальере Петропавловской крепости.<br>
	 &nbsp;&nbsp;Обратите внимание:&nbsp;&nbsp;<b>максимальное число участников</b> экскурсии – <b>двадцать</b> человек.<br>
	 &nbsp;&nbsp;Рекомендуем вам заранее <a href="https://museum.goznak.ru/info/order_ticket/buy/">бронировать</a> билеты на экскурсии по расписанию.<br>
 <b>&nbsp;&nbsp;Стоимость входных билетов с экскурсионным обслуживанием по расписанию:</b><br>
</p>
<ul>
	<li>билет для взрослых – 300 рублей</li>
	<li>льготный билет для детей старше 7 лет, учащихся и пенсионеров (при предъявлении соответствующих документов) – 200 рублей; </li>
	<li>семейный билет (один/двое взрослых + один/два ребенка до 16 лет) – 600 рублей.</li>
</ul>
<p>
	 &nbsp;&nbsp;Если вы уже приобрели входной билет, но хотите присоединиться к экскурсии, проходящей по расписанию, вам необходимо дополнительно приобрести билет на экскурсионное обслуживание стоимостью 100 рублей.<br>
	 &nbsp;&nbsp;Подробнее о стоимости билетов – в разделе «<a href="/info/order_ticket/">Билеты</a><a href="/info/order_ticket/"></a>».<br>
	 &nbsp;&nbsp;Также музей предлагает тематические программы для индивидуальных посетителей (в фиксированное время, без предварительной записи), посвященные различным памятным датам и праздникам.&nbsp; Также тематические программы для индивидуальных посетителей проводятся в выходные дни и во время школьных каникул.<br>
	 &nbsp;&nbsp;С расписанием проведения тематических программ для индивидуальных посетителей вы можете ознакомиться в разделе <b>«</b><a href="/info/afisha-/"><b>Афиша</b></a><b>».</b><br>
	 &nbsp;&nbsp;Помимо экскурсий по расписанию в Музее истории денег также проводятся экскурсионные <a href="/ekskursii-i-programmy/programmy-i-ekskursii/">программы по записи</a>.<br>
	 &nbsp;&nbsp;В Музее истории денег проводятся <a href="https://museum.goznak.ru/master-klassy/master-klass-po-ruchnomu-otlivu-bumagi/"><u>мастер-классы</u></a> по ручному отливу бумаги – в 12:00, 14:00 и 16:00 (кроме среды и четверга). Максимальное число участников мастер-класса – десять человек.<br>
	 &nbsp;&nbsp;Билеты на мастер-классы рекомендуем заранее <a href="https://widget.afisha.yandex.ru/w/venues/22038?clientKey=52b17819-92f2-49e1-b9d4-711b904a6c6f"><u>бронировать</u></a>.<br>
	 &nbsp;&nbsp;Стоимость билетов на мастер-класс (по расписанию):<br>
	 &nbsp;&nbsp;– для взрослых – 400 рублей,<br>
	 &nbsp;&nbsp;– для школьников, студентов и пенсионеров – 300 рублей,<br>
	 &nbsp;&nbsp;– семейный билет (1–2 взрослых и до двух детей в возрасте до 16 лет включительно) – 800 рублей.<br>
	 &nbsp;&nbsp;Кроме мастер-классов по расписанию для организованных групп проводятся мастер-классы по предварительной записи.
</p>
<style>
   a { 
    text-decoration: none; /* Отменяем подчеркивание у ссылки */
   }

.modalDialog {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.8);
	z-index: 99999;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	display: none;
	pointer-events: none;
}

.modalDialog:target {
	display: block;
	pointer-events: auto;
}

.modalDialog > div {
	width: 400px;
	position: relative;
	margin: 10% auto;
	padding: 5px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
	background: -moz-linear-gradient(#fff, #999);
	background: -webkit-linear-gradient(#fff, #999);
	background: -o-linear-gradient(#fff, #999);
}


.close {
	background: #606061;
	color: #FFFFFF;
	line-height: 25px;
	position: absolute;
	right: -12px;
	text-align: center;
	top: -10px;
	width: 24px;
	text-decoration: none;
	font-weight: bold;
	-webkit-border-radius: 12px;
	-moz-border-radius: 12px;
	border-radius: 12px;
	-moz-box-shadow: 1px 1px 3px #000;
	-webkit-box-shadow: 1px 1px 3px #000;
	box-shadow: 1px 1px 3px #000;
}

.close:hover { background: #00d9ff; }

.backing {
 vertical-align: middle;
 margin: 0;
 overflow: hidden;
}
.backing svg { 
 display: inline-block;
 position: absolute;
 top: 0; left: 0;
}

	/*затемнение при наведении*/
#Press:hover, #Kavaler:hover, #Kafe:hover, #Lavka:hover, #DFK:hover{
    fill: black!important;
		opacity: 0.2;
}
</style><? require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php" );?>