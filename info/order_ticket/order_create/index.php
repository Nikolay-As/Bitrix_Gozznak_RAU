<?
require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php" );
$APPLICATION->SetTitle("Ваши билеты успешно забронированы");
$APPLICATION->SetTitle( "Ваши билеты успешно забронированы" );

use Bitrix\Sale;

Bitrix\Main\Loader::includeModule( "sale" );

if ( ! $_GET["order_id"] ) {
	LocalRedirect( "/" );
}

$order = Sale\Order::load( $_GET["order_id"] );

if ( ! $order ) {
	LocalRedirect( "/" );
}

$basket = $order->getBasket();
$quantitySum = intval( array_sum( $basket->getQuantityList() ) );

$items = $basket->getBasketItems();
$item = $items[0];

$propValues = $item->getPropertyCollection()->getPropertyValues();
?><div class="order-created">
	<div class="order-created-text">
		Письмо с бронью отправлено на указанный e-mail
	</div>
	<div class="order-ticket">
		<div class="order-ticket__inner">
			<div class="order-accounting">
 <span class="order-accounting__text">Номер вашей брони:</span> <span class="order-accounting__number"><?= $order->getField( "ACCOUNT_NUMBER" ) ?></span>
			</div>
			<div class="order-ticket-text--small">
				 Номер брони необходимо назвать кассиру в музее для печати билета
			</div>
			<div class="order-ticket-items">
				 <?php
			if ( $quantitySum === 1 ) {
				echo $items[0]->getField( 'NAME' );
			} else {
				echo "Вы забронировали " . declOfNum( $quantitySum, [ "билет", "билета", "билетов" ] );
			}
			?>
			</div>
			<div class="order-ticket-info order-ticket-date">
 <span class="icon"> </span>
				<?php echo $propValues["VISIT_DATE"]["VALUE"] . ", " . $propValues["VISIT_TIME"]["VALUE"] ?>
			</div>
			<div class="order-ticket-info order-ticket-address">
 <span class="icon"> </span>
				197046, Петропавловская крепость, дом 3, литер «Ш», Санкт-Петербург, Россия
			</div>
		</div>
	</div>
</div>
<?php
function declOfNum( $num, $titles ) {
	$cases = array( 2, 0, 1, 1, 1, 2 );

	return $num . " " . $titles[ ( $num % 100 > 4 && $num % 100 < 20 ) ? 2 : $cases[ min( $num % 10, 5 ) ] ];
}

?>
<?php
//<div class="contacts-block-wrapper">
//	<div class="address-block">
//		<span class="icon">
//			<svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
//				<path d="M5.60032 8.40009C7.14453 8.40009 8.40034 7.14428 8.40034 5.60007C8.40034 4.05586 7.14453 2.80005 5.60032 2.80005C4.0561 2.80005 2.80029 4.05586 2.80029 5.60007C2.80029 7.14428 4.0561 8.40009 5.60032 8.40009ZM5.60032 4.20006C6.37242 4.20006 7.00033 4.82797 7.00033 5.60007C7.00033 6.37218 6.37242 7.00008 5.60032 7.00008C4.82821 7.00008 4.2003 6.37218 4.2003 5.60007C4.2003 4.82797 4.82821 4.20006 5.60032 4.20006Z" fill="#D1C9B3"/>
//				<path d="M5.1941 13.8699C5.31258 13.9545 5.45452 14 5.60011 14C5.74569 14 5.88764 13.9545 6.00611 13.8699C6.21891 13.7194 11.2205 10.1081 11.2001 5.60004C11.2001 2.51232 8.68783 0 5.60011 0C2.51238 0 6.16269e-05 2.51232 6.16269e-05 5.59654C-0.0202385 10.1081 4.9813 13.7194 5.1941 13.8699ZM5.60011 1.40001C7.91642 1.40001 9.80014 3.28373 9.80014 5.60354C9.81484 8.71017 6.72851 11.4997 5.60011 12.4146C4.4724 11.499 1.38537 8.70877 1.40007 5.60004C1.40007 3.28373 3.28379 1.40001 5.60011 1.40001Z" fill="#D1C9B3"/>
//			</svg>
//		</span>
//		<span class="info-text">197046, Петропавловская крепость, дом 3, литер «Ш», Санкт-Петербург, Россия</span>
//	</div>
//	<div class="work-time-block">
//		<span class="icon">
//			<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
//				<path d="M13.23 1.92H10.5V0.88C10.5 0.8085 10.4415 0.75 10.37 0.75H9.46C9.3885 0.75 9.33 0.8085 9.33 0.88V1.92H5.17V0.88C5.17 0.8085 5.1115 0.75 5.04 0.75H4.13C4.0585 0.75 4 0.8085 4 0.88V1.92H1.27C0.982375 1.92 0.75 2.15237 0.75 2.44V13.23C0.75 13.5176 0.982375 13.75 1.27 13.75H13.23C13.5176 13.75 13.75 13.5176 13.75 13.23V2.44C13.75 2.15237 13.5176 1.92 13.23 1.92ZM12.58 12.58H1.92V6.405H12.58V12.58ZM1.92 5.3V3.09H4V3.87C4 3.9415 4.0585 4 4.13 4H5.04C5.1115 4 5.17 3.9415 5.17 3.87V3.09H9.33V3.87C9.33 3.9415 9.3885 4 9.46 4H10.37C10.4415 4 10.5 3.9415 10.5 3.87V3.09H12.58V5.3H1.92Z" fill="#D1C9B3" stroke="#D1C9B3" stroke-width="0.06"/>
//			</svg>
//		</span>
//		<span class="info-text">Ежедневно, кроме четверга, с 10.00 до 20.00</span>
//	</div>
//</div>
//<br/>
// ?>
<? //$APPLICATION->IncludeComponent(
//	"studiobit:custom.order",
//	"",
//	Array(
//		"CACHE_TIME" => "12000",
//		"CACHE_TYPE" => "A",
//		"PAY_SYSTEM_ID" => 2 // ID платёжной системы
//	)
//);?><? require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php" ); ?>