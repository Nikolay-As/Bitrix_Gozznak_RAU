$(document).ready(function () 
{
	// Обработка счётчика товаров
	
	updateTotal();

	$('.minus').click(function () {
		var input = $(this).parent().find('input');
		var value = parseInt(input.val()) || 0;
		var count = value - 1;
		count = count < 0 ? 0 : count;
		input.val(count);
		input.change();
		updateTotal();
		return false;
	});

	$('.plus').click(function () {
		var input = $(this).parent().find('input');
		var value = parseInt(input.val()) || 0;
		input.val(value + 1);
		input.change();
		updateTotal();
		return false;
	});

	$('.input-type-number').change(function() {
		updateTotal();
	});


	// Обработка счётчика товаров

	$('#create-order-button').click(function () {
		addToBasket();
	});

	$('.input-type-number').keyup(function() {
		this.value = this.value.replace(/[^\d]/g,'');
		if(this.value > 999) this.value = 999;
		updateTotal();
	});
	

	function updateTotal() 
	{
		var itemsCountFullText = '';
		var totalSumm = 0;
		var totalItemsCount = 0;
		var totalPriceValueContainer = $('#total-price-value');
		var totalItemsCountContainer = $('.tickets-counter-wrap .tickets-counter');
		var allItems = $('[data-product-info]');

		for (let i = 0; i < allItems.length; i++) 
		{
			const item = $(allItems[i]); // jq init
			const itemPrice = Number(item.data('price'));
			const itemId = item.data('id');
			const itemCount = Number(item.find('input').val());

			totalItemsCount += itemCount;
			totalSumm += itemPrice * itemCount;
		}

		itemsCountFullText = totalItemsCount + ' ' + declOfNum(totalItemsCount, ['билет', 'билета', 'билетов']);

		totalPriceValueContainer.html(totalSumm);
		totalItemsCountContainer.html(itemsCountFullText);
		
	}


	function addToBasket(params) 
	{
		var totalPriceValue = Number($('#total-price-value').html());
		var siteId = BX.message('SITE_ID');

		if (totalPriceValue !== 0) 
		{
			var allItems = $('[data-product-info]');
			var items = {};

			for (let i = 0; i < allItems.length; i++) 
			{
				const item = $(allItems[i]); // jq init
				const itemId = item.data('id');
				const itemCount = Number(item.find('input').val());

				items[itemId] = itemCount;
				
			}

			$.ajax({
				type: "POST",
				url: '/local/ajax/order_handler.php',
				data: { SITE_ID: siteId, ITEMS: items },
				success: function (result) {
					if ( result === 'order_create') {
						window.location.href = "/info/order_ticket/order_create/";
					} else if (result === 'error') {
						var popup = BX.PopupWindowManager.create("popup-message", null, {
							content: "Произошла ошибка при создании заказа",
							darkMode: false,
							autoHide: true,
							overlay: {
								backgroundColor: '#000', opacity: '60'
							},
							closeByEsc: true,
						});
						popup.show();
					}
				}
			});

		} else {
			var popup = BX.PopupWindowManager.create("popup-message", null, {
				content: "Не выбраны товары для заказа",
				darkMode: false,
				autoHide: true,
				overlay: {
					backgroundColor: '#000', opacity: '60'
				},
				closeByEsc: true,
			});
			popup.show();
		}

	}

	
	// склонение числительных
	function declOfNum(number, titles) {
		cases = [2, 0, 1, 1, 1, 2];
		return titles[(number % 100 > 4 && number % 100 < 20) ? 2 : cases[(number % 10 < 5) ? number % 10 : 5]];
	}


	// Обработка счётчика товаров

});