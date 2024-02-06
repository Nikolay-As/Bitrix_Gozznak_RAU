<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
require 'constants.php';
$APPLICATION->SetTitle("Реквизиты");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<style type="text/css">
    dialog {
        margin: auto;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background: #F9EFD4;
        border: none;
        border-radius: 3px;
        padding: 10px;

    }


    /*   Open state of the dialog  */
    dialog[open] {
        opacity: 1;
        transform: scaleY(1);
    }

    /*   Closed state of the dialog   */
    dialog {
        opacity: 0;
        transform: scaleY(0);
        transition:
            opacity 0.7s ease-out,
            transform 0.7s ease-out,
            overlay 0.7s ease-out allow-discrete,
            display 0.7s ease-out allow-discrete;
        /* Equivalent to
  transition: all 0.7s allow-discrete; */
    }

    /*   Before-open state  */
    /* Needs to be after the previous dialog[open] rule to take effect,
    as the specificity is the same */
    @starting-style {
        dialog[open] {
            opacity: 0;
            transform: scaleY(0);
        }
    }

    /* Transition the :backdrop when the dialog modal is promoted to the top layer */
    dialog::backdrop {
        background-color: rgb(0 0 0 / 0%);
        transition:
            display 0.7s allow-discrete,
            overlay 0.7s allow-discrete,
            background-color 0.7s;
        /* Equivalent to
  transition: all 0.7s allow-discrete; */
    }

    dialog[open]::backdrop {
        background-color: rgb(0 0 0 / 25%);
    }

    /* This starting-style rule cannot be nested inside the above selector
because the nesting selector cannot represent pseudo-elements. */

    @starting-style {
        dialog[open]::backdrop {
            background-color: rgb(0 0 0 / 0%);
        }
    }
</style>


<style>
    body {
        font-family: Arial;
    }

    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #076857;
        background-color: #076857;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        color: #f6e9c3;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #64ac9f;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #64ac9f;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

    .bqGQVz:first-child {
        border: 0px;
    }

    .koXssp {
        width: 192px;
        position: absolute;
        top: 31px;
        left: 0px;
    }

    .bqGQVz {
        width: 100%;
        display: block;
        border-top: 1px solid rgb(229, 229, 229);
        padding: 19px 0px 16px;
        margin: 0px;
        position: relative;
    }

    .emYJqf {
        white-space: nowrap;
        position: relative;
    }

    .hHKlPr {
        width: 100%;
        display: table;
        box-sizing: border-box;
        padding: 16px 0px 16px 140px;
    }

    .jczLfp {
        color: rgb(51, 51, 51);
        font-size: 44px;
        line-height: 44px;
        display: block;
        position: absolute;
        top: 0px;
        left: 0px;
    }

    .grIJFP {
        color: rgb(153, 153, 153);
        font-size: 11px;
        line-height: 15px;
        text-transform: uppercase;
        display: block;
        padding: 2px 0px 0px;
        margin: 0px 0px 0px 60px;
    }

    .bVcWVs {
        color: rgb(51, 51, 51);
        font-size: 18px;
        line-height: 24px;
        display: block;
        padding: 2px 0px 0px;
        margin: 0px 0px 0px 60px;
    }

    .gikwcU {
        color: rgb(51, 51, 51);
        font-size: 18px;
        line-height: 24px;
        text-align: left;
        width: 192px;
        display: table-cell;
        vertical-align: middle;
    }

    .jbCZbr {
        color: rgb(153, 153, 153);
        font-size: 13px;
        line-height: 18px;
        display: table-cell;
        vertical-align: middle;
    }

    .prevF {
        list-style: none;
        padding: 0px;
        margin: 0px 0px 0px -8px;
    }

    .ZVbAI {
        white-space: nowrap;
        display: inline-block;
        padding: 0px;
        margin: 0px 0px 0px 8px;
    }

    .gfolnF {
        width: 130px;
        height: 34px;
        font-size: 15px;
    }

    .mMNjC {
        color: var(--primary-button-font-color);
        background-color: var(--primary-button-background-color);
        border-color: var(--primary-button-border-color);
        border-width: 1px;
        border-radius: 100px;
        height: 48px;
        font-weight: 500;
        font-size: 16px;
    }

    .LgTJo {
        display: table-row;
    }

    .bQgTwa {
        position: relative;
        color: #f6e9c3;
        font-family: "Ys Text", sans-serif;
        font-size: 18px;
        font-weight: normal;
        text-align: center;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 100%;
        height: 44px;
        display: inline-block;
        overflow: hidden;
        box-sizing: border-box;
        box-shadow: none;
        background: rgb(7 104 87);
        outline: 0px;
        border-width: 1px;
        border-style: solid;
        border-color: rgb(215, 214, 213);
        border-radius: 2px;
        padding: 0px 8px;
        cursor: pointer;
        user-select: none;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        transition: background-color 0.2s ease 0s;
    }

    button {
        writing-mode: horizontal-tb !important;
        font-style: ;
        font-variant-ligatures: ;
        font-variant-caps: ;
        font-variant-numeric: ;
        font-variant-east-asian: ;
        font-variant-alternates: ;
        font-weight: ;
        font-stretch: ;
        font-size: ;
        font-family: ;
        font-optical-sizing: ;
        font-kerning: ;
        font-feature-settings: ;
        font-variation-settings: ;
        text-rendering: auto;
        color: buttontext;
        letter-spacing: normal;
        word-spacing: normal;
        line-height: normal;
        text-transform: none;
        text-indent: 0px;
        text-shadow: none;
        text-align: center;
        cursor: default;
    }

    .kHCDzl {
        white-space: nowrap;
    }

    .gfolnF {
        width: 130px;
        height: 34px;
        font-size: 15px;
    }

    * {
        letter-spacing: 0.25px;
    }

    .emYJqf {
        white-space: nowrap;
        position: relative;
    }

    :root {
        --primary-color: #fff500;
        --primary-hover-color: #f8e735;
        --primary-disabled-color: rgba(254, 243, 57, 0.88);
        --primary-button-font-color: rgba(0, 0, 0, 0.8);
        --primary-button-background-color: #fff500;
        --primary-button-border-color: #fff500;
        --primary-button-active-background-color: #f6e234;
        --primary-button-active-border-color: #f6e234;
        --primary-button-disabled-font-color: #d0c49f;
        --timeline-primary-color: #e0da78;
        --timeline-background-color: #fff;
        --timeline-border-color: #d7d6d5;
        --timeline-active-background-color: #fef888;
        --timeline-hover-background-color: #f8e735;
        --input-border-color: #ccc;
        --input-font-color: #333;
        --input-focus-border-color: #fff500;
        --input-focus-border-radius: 2px;
        --input-error-focus-border-color: #f88;
        --region-picker-backgroundColor: #fff;
        --switch-background-color: #e4e4e4;
        --switch-active-background-color: #505add;
        --order-payment-details-background-color: #e6e6e6;
        --order-payment-details-mobile-background-color: #e6e6e6;
        --order-items-popup-list-render-step-filter: invert(1);
        --order-items-popup-list-render-step-active-filter: invert(1);
        --order-items-list-render-step-filter: invert(1);
        --order-items-list-render-step-active-filter: invert(1);
        --order-items-popup-list-render-step-opacity: 0.3;
        --order-items-popup-list-render-step-active-opacity: 1;
        --order-items-list-render-step-opacity: 0.3;
        --order-items-list-render-step-active-opacity: 1;
        --details-item-text-color: #000;
        --sale-complete-background-color: #d3d3d3;
        --sale-complete-layout-right-padding-bottom: 80px;
        --sale-complete-footer-background-color: #bbb;
        --sale-complete-footer-text-color: #000;
        --sale-complete-footer-copyright-color: #747474;
        --sale-complete-footer-desktop-background-color: #bbb;
        --sale-complete-footer-desktop-text-color: #747474;
        --sale-complete-footer-desktop-copyright-color: #747474;
        --sale-complete-lite-branding-display: block;
        --sale-complete-footer-copy-display: block;
        --sale-complete-footer-desktop-margin-bottom: 20px;
        --sale-complete-promo-card-background-color: #e6e6e6;
        --sale-complete-promo-card-border-color: 1px solid transparent;
        --sale-complete-promo-card-padding: 20px;
        --sale-complete-account-card-padding: 20px;
        --sale-complete-account-card-background-color: #e6e6e6;
        --sale-complete-account-card-color: #000;
        --sale-complete-account-card-padding-mobile: 20px;
        --sale-complete-promo-card-padding-mobile: 20px 16px;
        --sale-complete-tickets-popup-cinema-background-color: #000;
        --sale-complete-tickets-popup-other-background-color: #fff;
        --sale-complete-tickets-popup-cinema-close-background-color: #fff;
        --sale-complete-tickets-popup-other-close-background-color: #000;
        --sale-complete-tickets-popup-cinema-content-barcode-background: #fff;
        --sale-complete-details-item-color: #909090;
        --sale-complete-details-item-value-color: #fff;
        --footer-barcode-border-color: #FDF14E;
        --footer-barcode-image-background-color: none;
        --footer-barcode-ticket-number-color: #000;
        --footer-barcode-tickets-info-large-color: rgba(0, 0, 0, 0.8);
        --footer-barcode-tickets-info-small-color: rgba(0, 0, 0, 0.8);
        --order-ticket-layout-labeled-line-block-label-color: #9e9e9e;
        --order-ticket-layout-labeled-line-block-value-color: #000;
    }

    A {
        text-decoration: none;
        /* Убирает подчеркивание для ссылок */
        color: #f6e9c3;
    }
</style>

<!-- Стили таймера -->
<style>
    .timer__items {
        display: flex;
        font-size: 25px;
    }

    .timer__item {
        position: relative;
        min-width: 60px;
        margin-left: 10px;
        margin-right: 10px;
        padding-bottom: 15px;
        text-align: center;
    }

    .timer__item::before {
        content: attr(data-title);
        display: block;
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        font-size: 14px;
    }

    .timer__item:not(:last-child)::after {
        content: ':';
        position: absolute;
        right: -15px;
    }
</style>

<?php
$array_balance = array(
    'date_doc'    => $_POST["date_doc"],
    'number_doc'    => $_POST["number_doc"]
);

$array_balance_2 = json_encode($array_balance);

$ch_response_balance = curl_init($url_1c . '/hs/RAU_BalanceOrder/balance_order');
curl_setopt($ch_response_balance, CURLOPT_POST, 1);
curl_setopt($ch_response_balance, CURLOPT_POSTFIELDS, $array_balance_2);
curl_setopt($ch_response_balance, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_response_balance, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch_response_balance, CURLOPT_HTTPHEADER, array(
    'Authorization: Basic 0J/QvtC00YDRj9C00YfQuNC6OjE0NTgq'
));

$response_balance = curl_exec($ch_response_balance);
curl_close($ch_response_balance);
$response_balance = json_decode($response_balance);


if ($response_balance < 4) {
    $balance = $response_balance;
} else {
    $balance = 4;
}

if ($balance == 0) {
    // header("Location: https://museum.goznak.ru/info/order_ticket/bronirovanie/index.php");
    header("Location: https://192.168.0.73/info/order_ticket/bronirovanie/index.php");
} else {
    $array = array(
        'select'    => $balance,
        'date_doc'    => $_POST["date_doc"],
        'number_doc'    => $_POST["number_doc"]
    );

    $array_2 = json_encode($array);

    $ch = curl_init($url_1c . '/hs/RAU_info_for_site/time_reservation');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $array_2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Basic 0J/QvtC00YDRj9C00YfQuNC6OjE0NTgq'
    ));

    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response);
}
?>



<h2>Детали заказа: <?php echo $_POST["title"] ?>, <?php echo $_POST["date"] ?> <?php echo $_POST["month"] ?>, <?php echo $_POST["time"] ?>, <?php echo $_POST["info_site"] ?></h2>

<div class="container">
    <p>Заполните данные для получения брони</p>
    <hr>

    <div class="timer">
        <div class="timer__items">
            <div class="timer__item timer__minutes">00</div>
            <div class="timer__item timer__seconds">00</div>
        </div>
    </div>

    <label for="fio"><b>ФИО</b></label>
    <input type="text" placeholder="" name="fio" id="fio" required>
    <br>
    <label for="phone"><b>Телефонный номер</b></label>
    <input class="tel" size=14 name="tel" id="tel" required>
    <br>
    <label for="email"><b>Электронная почта</b></label>
    <input type="email" placeholder="" name="email" id="email" required>
    <br>
    <label for="tickets"><b>Количество билетов</b></label>
    <select name="select" id="select">
        <?php
        if ($balance == 4) { ?>
            <option value="1" selected>1 билет</option>
            <option value="2">2 билета</option>
            <option value="3">3 билета</option>
            <option value="4">4 билета</option>
        <?php } else if (($balance == 3)) { ?>
            <option value="1" selected>1 билет</option>
            <option value="2">2 билета</option>
            <option value="3">3 билета</option>
        <?php   } else if (($balance == 2)) { ?>
            <option value="1" selected>1 билет</option>
            <option value="2">2 билета</option>
        <?php    }
        if (($balance == 1)) { ?>
            <option value="1" selected>1 билет</option>
        <?php    } ?>
    </select>

    <br><br>
    <div class="venue__Button-sc-ur24e3-4 fgvyUn">
        <button onclick="fetchData()" data-key="OTYzN3wxOTYzMjV8MTczMTQ3fDE2ODQ5OTgwMDAwMDA=" class="Button-sc-3k6hpk-0 Action__ActionButton-sc-1iie49r-0 __get-button__Button-sc-3tp1b1-0 bQgTwa mMNjC gfolnF SessionButton" label="[object Object]">
            <a class="htyff"><span data-component="CommonPrice" class="Price__Root-sc-gcvzz1-0 kHCDzl">Далее</span></a>
        </button>
    </div>
    <br>
    <div class="container signin">
        <p>Нажимая "Далее", я даю согласие на обработку моих персональных данных, в соответствии с <a style="color: #000; text-decoration: underline" href="https://goznak.ru/about/today/security/">Положением об обработке и защите персональных данных в АО "Гознак"</a></p>
    </div>
    <input type="hidden" name="date_doc" id="date_doc" value="<?php echo $_POST["date_doc"] ?>" />
    <input type="hidden" name="number_doc" id="number_doc" value="<?php echo $_POST["number_doc"] ?>" />
    <input type="hidden" name="status" id="status" value="<?php echo $_POST["status"] ?>" />


    <dialog id="success">
        <h2>
            Билеты успешно забронированы!
        </h2>
        <label for="fio"><b>Номер заказа</b></label>
        <input type="text" name="number_doc_2" id="number_doc_2" placeholder="" readonly value="<?php echo $_POST["number_doc"] ?>">
        <br>
        <label for="email"><b>Количество билетов</b></label>
        <input type="text" name="select_2" id="select_2" placeholder="" readonly value="">
        <br>
        <label for="email"><b>Наименование мероприятия</b></label>
        <input type="text" placeholder="" readonly value="<?php echo $_POST["title"] ?>">
        <br>
        <label for="phone"><b>Дата мероприятия</b></label>
        <input type="text" placeholder="" readonly value="<?php echo $_POST["date"] ?> <?php echo $_POST["month"] ?>">
        <br>
        <label for="email"><b>Время мероприятия</b></label>
        <input type="text" placeholder="" readonly value="<?php echo $_POST["time"] ?>">
        <br>

        <button id="close_success" style="
                width: 50%;
                height: 45px;
                margin-left: 25%;
                align-items: center;
                align-self: center;
                background: #7e6c44;
                border-radius: 3px;
                text-decoration: none;
                z-index: 100;
                border:none;
                font-size:17px;
                cursor:pointer">
            <span class="buy-button-text">ОК</span>
        </button>
    </dialog>

    <dialog id="error">
        <h2>
            Не удалось забронировать билеты!
        </h2>
        <br>
        <button id="close_error" style="
                width: 50%;
                height: 45px;
                margin-left: 25%;
                align-items: center;
                align-self: center;
                background: #7e6c44;
                border-radius: 3px;
                text-decoration: none;
                z-index: 100;
                border:none;
                font-size:17px;
                cursor:pointer">
            <span class="buy-button-text">ОК</span>
        </button>
    </dialog>

    <dialog id="timeer">
        <h2>
            Время для бронирования истекло!<br />Вы будете перенаправлены на начальную страницу.
        </h2>
        <br>
        <button id="close_timeer" style="
                width: 50%;
                height: 45px;
                margin-left: 25%;
                align-items: center;
                align-self: center;
                background: #7e6c44;
                border-radius: 3px;
                text-decoration: none;
                z-index: 100;
                border:none;
                font-size:17px;
                cursor:pointer">
            <span class="buy-button-text">ОК</span>
        </button>
    </dialog>


    <script>
        // Маска номера телефона
        window.addEventListener("DOMContentLoaded", function() {
            [].forEach.call(document.querySelectorAll('.tel'), function(input) {
                var keyCode;

                function mask(event) {
                    event.keyCode && (keyCode = event.keyCode);
                    var pos = this.selectionStart;
                    if (pos < 3) event.preventDefault();
                    var matrix = "+7 (___) ___ ____",
                        i = 0,
                        def = matrix.replace(/\D/g, ""),
                        val = this.value.replace(/\D/g, ""),
                        new_value = matrix.replace(/[_\d]/g, function(a) {
                            return i < val.length ? val.charAt(i++) || def.charAt(i) : a
                        });
                    i = new_value.indexOf("_");
                    if (i != -1) {
                        i < 5 && (i = 3);
                        new_value = new_value.slice(0, i)
                    }
                    var reg = matrix.substr(0, this.value.length).replace(/_+/g,
                        function(a) {
                            return "\\d{1," + a.length + "}"
                        }).replace(/[+()]/g, "\\$&");
                    reg = new RegExp("^" + reg + "$");
                    if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
                    if (event.type == "blur" && this.value.length < 5) this.value = ""
                }

                input.addEventListener("input", mask, false);
                input.addEventListener("focus", mask, false);
                input.addEventListener("blur", mask, false);
                input.addEventListener("keydown", mask, false)

            });

        });

        // Таймер
        var minutes = 10;
        var millisec = minutes * 60000;

        var timerId_main;
        var dialog_success = document.getElementById('success');
        var dialog_error = document.getElementById('error');
        var dialog_timeer = document.getElementById('timeer');
        document.querySelector('#close_success').onclick = function() {
            dialog_success.close()
            setInterval(someFunction_replace, 1500);
        }
        document.querySelector('#close_error').onclick = function() {
            dialog_error.close()
            setInterval(someFunction_replace, 1500);
        }
        document.querySelector('#close_timeer').onclick = function() {
            dialog_timeer.close()
            setInterval(someFunction_replace, 1500);
        }

        function someFunction_replace() {
            window.location.replace("index.php");
        }


        window.onload = function() {
            timerId_main = setTimeout(someFunction, millisec) //600000 - 10 минут
            start_timer();
        };

        function someFunction() {
            dialog_timeer = document.getElementById('timeer');
            dialog_timeer.showModal();

        }

        function check_email(email) {
            return String(email)
                .toLowerCase()
                .match(
                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                );
        }

        // Отправка ajax запроса на получение номера брони билета
        function fetchData() {
            var fio = $("#fio").val();
            var tel = $("#tel").val();
            tel = tel.replace('(', '');
            tel = tel.replace(')', '');
            tel = tel.replaceAll(' ', '');
            if (tel.length != 12) {
                alert("Проверьте корректность номера телефона.");
                return;
            }
            var email = $("#email").val();
            if (!check_email(email)) {
                alert("Проверьте корректность email адреса.");
                return;
            }
            var select = $("#select").val();
            var date_doc = $("#date_doc").val();
            var number_doc = $("#number_doc").val();

            if (fio && tel && email) {
                buffer = document.body.style.cursor;
                document.body.style.cursor = 'wait';
                array = {
                    fio: fio,
                    tel: tel,
                    email: email,
                    select: select,
                    date_doc: date_doc,
                    number_doc: number_doc
                }
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    async: true,
                    data: array,
                    success: function(data) {
                        var dialog_success = document.getElementById('success');
                        document.body.style.cursor = buffer;
                        $('#number_doc_2').val(data);
                        var s = $('#select').val()
                        $('#select_2').val(s);
                        clearTimeout(timerId_main);
                        timerId_main = 0;
                        dialog_success.showModal();
                        setInterval(someFunction_replace, 60000); // 1 минута

                    },
                    error: function(err) {
                        var dialog_error = document.getElementById('error');
                        document.body.style.cursor = buffer;
                        clearTimeout(timerId_main);
                        timerId_main = 0;
                        dialog_error.showModal();
                        setInterval(someFunction_replace, 60000); // 1 минута

                    }
                });
            } else {
                alert("Все поля должны быть заполнены!");
                return
            }
        }


        //<!-- Скрипт таймера -->

        const $minutes = document.querySelector('.timer__minutes');
        const $seconds = document.querySelector('.timer__seconds');
        let timerId = null;
        let deadline = null;

        function start_timer() {
            // конечная дата
            deadline = new Date();
            deadline.setMinutes(deadline.getMinutes() + minutes);
            // получаем элементы, содержащие компоненты даты

            // склонение числительных
            function declensionNum(num, words) {
                return words[(num % 100 > 4 && num % 100 < 20) ? 2 : [2, 0, 1, 1, 1, 2][(num % 10 < 5) ? num % 10 : 5]];
            }

            // вычисляем разницу дат и устанавливаем оставшееся времени в качестве содержимого элементов
            function countdownTimer() {
                const diff = deadline - new Date();
                if (diff <= 0 || timerId_main == 0) {
                    clearInterval(timerId);
                }

                const minutes = diff > 0 ? Math.floor(diff / 1000 / 60) % 60 : 0;
                const seconds = diff > 0 ? Math.floor(diff / 1000) % 60 : 0;

                $minutes.textContent = minutes < 10 ? '0' + minutes : minutes;
                $seconds.textContent = seconds < 10 ? '0' + seconds : seconds;

                $minutes.dataset.title = declensionNum(minutes, ['минута', 'минуты', 'минут']);
                $seconds.dataset.title = declensionNum(seconds, ['секунда', 'секунды', 'секунд']);
            }
            // вызываем функцию countdownTimer
            countdownTimer(deadline);
            // вызываем функцию countdownTimer каждую секунду
            timerId = setInterval(countdownTimer, 1000);
        };
    </script>

    <? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>