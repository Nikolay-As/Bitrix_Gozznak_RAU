$(document).ready(function () 
{

    $('#pay-order-button').click(function () {
        orderPayment();
    });

    $("#order-create-form").submit(function (event) 
    {
        event.preventDefault();
        var ajaxUrl = BX.message('templateFolder') + '/ajax.php';
        var siteId = BX.message('SITE_ID');
        var paySystemId = BX.message('PAY_SYSTEM_ID');
        var userEmail = $('#user_email').val();
        
        $.ajax({
            type: "POST",
            url: ajaxUrl,
            dataType: 'json',
            data: { SITE_ID: siteId, PAY_SYSTEM_ID: paySystemId, EMAIL: userEmail },
            success: function (result) {
                if (result.status === 'success') {
                    var message = 'Создан заказ';
                    if (result.order_id) message += ' №' + result.order_id;
                    
                    if (result.payment_link)
                        window.location.href = result.payment_link;
                    // alert(message);
                } else if (result.status === 'error') {
                    var message = 'Произошла ошибка при создании заказа.';
                    if (result.error_text) message += "\n" + result.error_text;

                    var popup = BX.PopupWindowManager.create("popup-message", null, {
                        content: message,
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

    });

    function orderPayment() 
    {
        $("#submit_form").click();
    }

});