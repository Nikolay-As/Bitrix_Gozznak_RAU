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


  /* Ниже стили для кнопки в виде кретсика ( закрытие модального окна)  */

  .closeModal {

    position: absolute;
    top: 10px;
    right: 20px;
    width: 24px;
    height: 24px;
    opacity: 0.2;
    cursor: pointer;
    transition: opacity ease 0.5s;

    &:hover {
      opacity: 1;
    }
  }

  .closeModal::before,
  .closeModal::after {
    content: '';
    position: absolute;
    top: 10px;
    display: block;
    width: 24px;
    height: 3px;
    background: #000;
  }

  .closeModal::before {
    transform: rotate(45deg);
  }

  .closeModal::after {
    transform: rotate(-45deg);
  }
</style>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
require 'constants.php';
$APPLICATION->SetTitle("Бронирование билетов");
?><p>
  <b>Выкупить</b> билет в кассе Музея истории денег необходимо <b>не позднее, чем за 15 минут</b><b> до начала событи</b><b>я</b>. Опоздавшие к началу сеанса не будут допущены до участия в мероприятии.
</p>
<?php // Попурей НД РАУ 46444
global $DB;
?> <?php


    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url_1c . '/hs/RAU_info_for_site/all_applications/',
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

    $response = json_decode($response);
    $flag_program = false;
    $flag_master = false;
    $unique_result = array();

    if (is_array($response)) { // Формируем массив видов экскурсий
      foreach ($response as $line) {
        array_push($unique_result, $line->ВидЭкскурсии);
      }
    }

    $unique_result = array_unique($unique_result); // Удаляем дубли из массива, чтобы понять сколько всего тем


    if (count($unique_result) > 0) {
      foreach ($unique_result as $line) {
    ?>
    <form action="bronirovanie_general.php" method="post">
      <input type="hidden" name="type_excursion" value="<?php echo $line ?>" />
      <div class="buy-banner-wrapper">
        <div class="buy-banner-main">
          <div class="text-content-wrapper">
            <span class="banner-buy-title">
              <?php echo $line ?>&nbsp;&nbsp;&nbsp;&nbsp;
            </span>

            <button style="display: flex;
                width: 170px;
                height: 45px;
                margin-left: 10px;
                align-items: center;
                align-self: center;
                background: #F9EFD4;
                border-radius: 3px;
                text-decoration: none;
                z-index: 100;
                border:none;
                font-size:17px;
                cursor:pointer">
              <span class="buy-button-text">Перейти</span>
            </button>

          </div>
        </div>
      </div>
    </form>
    <br>
<?php
      }
    } ?>



<div class="buy-banner-wrapper">
  <div class="buy-banner-main_cancel">
    <div class="text-content-wrapper">
      <span class="banner-buy-title">
        Отмена бронирования&nbsp;&nbsp;&nbsp;&nbsp;
      </span>

      <button id="open" style="display: flex;
                width: 170px;
                height: 45px;
                margin-left: 10px;
                align-items: center;
                align-self: center;
                background: #F9EFD4;
                border-radius: 3px;
                text-decoration: none;
                z-index: 100;
                border:none;
                font-size:17px;
                cursor:pointer;
                margin-bottom: 10px;">
        <span class="buy-button-text">Отменить</span>

      </button>

    </div>
  </div>
</div>

<dialog>
  <div>
    <div class="closeModal" id="close"></div>
  </div>
  <div>
    <h2>
      Форма отмены бронирования
    </h2>
  </div>


  <label for="fio"><b>Номер заказа</b></label>
  <input type="text" placeholder="" name="number_order" id="number_order" required>
  <br>
  <label for="phone"><b>Телефонный номер</b></label>
  <input class="tel" placeholder="(XXX)-XXX-XXXX" name="tel" id="tel" required>
  <br>
  <label for="email"><b>Электронная почта</b></label>
  <input type="email" placeholder="" name="email" id="email" required>
  <br>

  <input type="email" placeholder="" name="title_dialog" id="title_dialog" readonly style="border:0;color:red">
  <br>



  <button onclick="fetchData()" id="close" style="
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
                cursor:pointer;
                color: black;">
    <span class="buy-button-text">Отменить бронь</span>

  </button>

</dialog>
<script>
  function someFunction_replace() {
    window.location.replace("index.php");
  }

  // Отправка ajax запроса на получение результата отмены бронирования
  function fetchData() {
    buffer = document.body.style.cursor;
    document.body.style.cursor = 'wait';
    var tel = $("#tel").val();
    tel = tel.replace('(', '');
    tel = tel.replace(')', '');
    tel = tel.replaceAll(' ', '');
    var email = $("#email").val();
    var number_order = $("#number_order").val();

    array = {
      tel: tel,
      email: email,
      number_order: number_order
    }
    $.ajax({
      url: "cansel_bron.php",
      type: "POST",
      async: true,
      data: array,
      success: function(data) {
        document.body.style.cursor = buffer;
        if (data == 1) {
          //setInterval(someFunction_replace, 3000)
          $('#title_dialog').val("Бронь успешно отменена!");
        } else {
          //setInterval(someFunction_replace, 10000)
          $('#title_dialog').val("Бронь не найдена, проверьте данные!");

        }
      }
    });
  }

  var dialog = document.querySelector('dialog')
  // выводим модальное окно
  document.querySelector('#open').onclick = function() {
    $("#number_order").val(null);
    $("#tel").val(null);
    $("#email").val(null);
    $("#title_dialog").val(null);
    dialog.showModal()
  }
  // скрываем окно
  document.querySelector('#close').onclick = function() {
    dialog.close()
  }

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
</script>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>