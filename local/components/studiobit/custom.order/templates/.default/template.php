<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

CJSCore::Init('jquery3'); 
?>


<div class="catalog-top-wrapper order-form">

<form action="" id="order-create-form" class="custom-from">
	<label>Введите ваш e-mail</label>
	<input type="email" id="user_email" placeholder="ivanov.ivan@mail.ru" required>
	<p class="form-add-info">После оплаты билеты будут высланы на ваш e-mail</p>
	<input type="submit" id="submit_form">
</form>




    <div class="catalog-total-block-wrapper">
		<div class="total-info-content">
			<div class="total-price-block">
				<div class="total-val-wrapper">
					<span id="total-price-value"><?=$arResult['PRINT_PRICE']?></span>
					<span class="currency-symbol">₽</span>
				</div>
				<p class="tickets-counter-wrap">за <span class="tickets-counter"><?=$arResult['PRINT_COUNT']?></span></p>
			</div>
			<div class="total-order-block">
				<div class="order-button" id="pay-order-button">
					Оплатить заказ
				</div>
				<p class="information-text">Покупая билеты, вы соглашаетесь с <a href="/info/order_ticket/" target="_blank">условиями приобретения</a> 
					и даёте согласие на обработку персональных данных.</p>
			</div>
		</div>
	</div>

</div>





<script>
	BX.message({
		templateFolder: '<?=$templateFolder?>',
		SITE_ID: '<?=SITE_ID?>',
		PAY_SYSTEM_ID: '<?=$arParams['PAY_SYSTEM_ID']?>'
	});
</script>