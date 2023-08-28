<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
require 'constants.php';
$APPLICATION->SetTitle("Реквизиты");
?>
<style>
body {font-family: Arial;}
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
	text-decoration: none; /* Убирает подчеркивание для ссылок */
    color: #f6e9c3;
}
</style>

<?php
        $array = array(
            'select'    => 4,
            'date_doc'    => $_POST["date_doc"],
            'number_doc'    => $_POST["number_doc"]
        );	
        
        $array_2 = json_encode($array);	
         
        $ch = curl_init($url_1c.'/goznak_popurey/hs/RAU_info_for_site/time_reservation');
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
?>

<h2>Детали заказа:	<?php echo $_POST["title"] ?>, <?php echo $_POST["date"] ?> <?php echo $_POST["month"] ?>, <?php echo $_POST["time"] ?>, <?php echo $_POST["info_site"] ?></h2>

<form action="ajax.php" method="post"> 
  <div class="container">
    <p>Заполните данные для получения брони</p>
    <hr>

    <label for="fio"><b>ФИО</b></label>
    <input type="text" placeholder="" name="fio" required>
	<br>
    <label for="phone"><b>Телефонный номер</b></label>
    <input type="tel" placeholder="(XXX)-XXX-XXXX" name="tel" required>
<br>
    <label for="email"><b>Электронная почта</b></label>
    <input type="email" placeholder="" name="email" required>
<br>
    <label for="tickets"><b>Количество билетов</b></label>
	<select name="select">
		<option value="1" selected>1 билет</option>
	  	<option value="2">2 билета</option>
	  	<option value="3">3 билета</option>
	  	<option value="4">4 билета</option>
	</select>

<br><br>
				<div class="venue__Button-sc-ur24e3-4 fgvyUn">
					<button id="button" data-key="OTYzN3wxOTYzMjV8MTczMTQ3fDE2ODQ5OTgwMDAwMDA=" class="Button-sc-3k6hpk-0 Action__ActionButton-sc-1iie49r-0 __get-button__Button-sc-3tp1b1-0 bQgTwa mMNjC gfolnF SessionButton" label="[object Object]">
						<!--<a class="htyff" href="https://museum.goznak.ru/info/order_ticket/bronirovanie/Requisites.php"><span data-component="CommonPrice" class="Price__Root-sc-gcvzz1-0 kHCDzl">Далее</span></a>-->
                        <a class="htyff" ><span data-component="CommonPrice" class="Price__Root-sc-gcvzz1-0 kHCDzl">Далее</span></a>
					</button>
				</div>
<br>
  <div class="container signin">
	  <p>Нажимая "Далее", я даю согласие на обработку моих персональных данных, в соответствии с <a style="color: #000; text-decoration: underline" href="https://goznak.ru/about/today/security/">Положением об обработке и защите персональных данных в АО "Гознак"</a></p>
  </div>
    <input type="hidden" name="date_doc" value="<?php echo $_POST["date_doc"] ?>"/>
    <input type="hidden" name="number_doc" value="<?php echo $_POST["number_doc"] ?>"/> 
</form>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>