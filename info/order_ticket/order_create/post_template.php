<style>

    @import "/css/fonts/playfairsc/playfairsc.css";
    @import "/css/fonts/rubik/rubik.css";

    .template-body {
        width: 100%;
        height: 100%;
        background-color: #f9efd4;
        font-family: "Rubik", Helvetica, Arial, sans-serif;
        color: #39291a;
        line-height: 1.2;
    }

    .top-logo-wrapper {
        display: flex;
        flex-flow: row wrap;
        justify-content: space-between;
        align-items: center;
    }

    .age-logo-wrap {
        margin-right: 20px;
    }

    .text-content-wrapper {
        max-width: 450px;
        margin: 0 auto 60px;
    }

    .ticket-text-wrapper {
        font-size: 1em;
    }

    .ticket-text-wrapper .ticket-order-info .ticket-title {
        font-size: 1.2em;
        text-align: center;
    }

    .ticket-text-wrapper .ticket-order-info .order-id {
        font-weight: bold;
    }

    .contacts-block-wrapper .info-text {
        padding-left: 10px;
        font-size: 0.9em;
        font-family: 'Rubick', sans-serif;
    }

    .order-table-wrapper {
        height: auto;
        min-height: 270px;
        background: #fff;
    }

    .order-table-wrapper .order-table .table-row {
        display: flex;
        padding: 25px 0;
        flex-flow: row wrap;
        justify-content: space-between;
        border-bottom: 1px solid #eceae9;
    }

    .order-table-wrapper .order-table .table-row .row-name {
        color: #948C85;
    }

    .order-table-wrapper .order-table .table-row .row-value {
        font-weight: bold;
    }

    .footer {
        height: auto;
        min-height: 300px;
        background: #fff;
    }

    .footer .footer-hr {
        width: 85%;
        margin: 0 auto;
        border-top: 1px solid #eceae9;
    }

    .footer .footer-info {
        color: #948C85;
    }

    .footer .footer-info .contacts {
        display: flex;
        flex-flow: row wrap;
        justify-content: space-between;
        align-items: center;
    }

    .footer .footer-info .contacts .social-icons {
        width: 40%;
        display: flex;
        flex-flow: row wrap;
        justify-content: space-between;
    }

    .footer .footer-info .contacts .social-icons a {
        text-decoration: none;
    }

    .contacts-block-wrapper .address-block {
        display: flex;
        align-items: center;
    }
</style>


<div class="template-body">

    <div class="top-logo-wrapper">
        <div class="main-logo-wrap">
            <svg width="265" height="141" viewBox="0 0 265 141" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect width="265" height="141" fill="url(#pattern0)" />
                <defs>
                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0" transform="scale(0.00377358 0.0070922)"></use>
                    </pattern>
                    <image id="image0" width="265" height="141" xlink:href="data:image/png;base64,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"></image>
                </defs>
            </svg>
        </div>

        <div class="age-logo-wrap">
            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="25" cy="25" r="24.5" stroke="#D1C9B3" />
                <path d="M20.58 32.2C18.7933 32.2 17.46 31.7067 16.58 30.72C15.7133 29.7333 15.24 28.44 15.16 26.84C15.1467 26.48 15.14 25.8667 15.14 25C15.14 24.12 15.1467 23.4933 15.16 23.12C15.2267 21.5467 15.7067 20.2667 16.6 19.28C17.4933 18.2933 18.82 17.8 20.58 17.8C22.34 17.8 23.6667 18.2933 24.56 19.28C25.4533 20.2667 25.9333 21.5467 26 23.12C26.0267 23.8667 26.04 24.4933 26.04 25C26.04 25.5067 26.0267 26.12 26 26.84C25.92 28.44 25.44 29.7333 24.56 30.72C23.6933 31.7067 22.3667 32.2 20.58 32.2ZM20.58 29.86C21.4067 29.86 22.0267 29.5933 22.44 29.06C22.8533 28.5133 23.0733 27.74 23.1 26.74C23.1133 26.3533 23.12 25.76 23.12 24.96C23.12 24.16 23.1133 23.58 23.1 23.22C23.0733 22.2467 22.8533 21.4867 22.44 20.94C22.0267 20.3933 21.4067 20.1133 20.58 20.1C19.7533 20.1133 19.1333 20.3933 18.72 20.94C18.3067 21.4867 18.0867 22.2467 18.06 23.22C18.0467 23.58 18.04 24.16 18.04 24.96C18.04 25.76 18.0467 26.3533 18.06 26.74C18.0867 27.74 18.3067 28.5133 18.72 29.06C19.1333 29.5933 19.7533 29.86 20.58 29.86ZM32.7236 31.34C32.5903 31.34 32.4769 31.2933 32.3836 31.2C32.2903 31.1067 32.2436 30.9933 32.2436 30.86V26.96H28.4236C28.2903 26.96 28.1769 26.9133 28.0836 26.82C27.9903 26.7267 27.9436 26.6133 27.9436 26.48V25.4C27.9436 25.2667 27.9903 25.1533 28.0836 25.06C28.1769 24.9667 28.2903 24.92 28.4236 24.92H32.2436V21.14C32.2436 20.9933 32.2903 20.88 32.3836 20.8C32.4769 20.7067 32.5903 20.66 32.7236 20.66H33.9236C34.0703 20.66 34.1836 20.7067 34.2636 20.8C34.3569 20.88 34.4036 20.9933 34.4036 21.14V24.92H38.2236C38.3569 24.92 38.4703 24.9667 38.5636 25.06C38.6569 25.1533 38.7036 25.2667 38.7036 25.4V26.48C38.7036 26.6133 38.6569 26.7267 38.5636 26.82C38.4836 26.9133 38.3703 26.96 38.2236 26.96H34.4036V30.86C34.4036 30.9933 34.3569 31.1067 34.2636 31.2C34.1836 31.2933 34.0703 31.34 33.9236 31.34H32.7236Z" fill="#D1C9B3" />
            </svg>
        </div>
    </div>

    <div class="text-content-wrapper">
        <div class="ticket-text-wrapper">
            <div class="ticket-order-info">
                <p class="ticket-title">Ваш заказ <span class="order-id">№000123</span> успешно оплачен.</p>
                <p class="order-additional-info">Номер заказа необходимо назвать кассиру в музее для печати билета</p>
            </div>
            <div class="contacts-block-wrapper">
                <div class="address-block">
                    <span class="icon">
                        <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.60032 8.40009C7.14453 8.40009 8.40034 7.14428 8.40034 5.60007C8.40034 4.05586 7.14453 2.80005 5.60032 2.80005C4.0561 2.80005 2.80029 4.05586 2.80029 5.60007C2.80029 7.14428 4.0561 8.40009 5.60032 8.40009ZM5.60032 4.20006C6.37242 4.20006 7.00033 4.82797 7.00033 5.60007C7.00033 6.37218 6.37242 7.00008 5.60032 7.00008C4.82821 7.00008 4.2003 6.37218 4.2003 5.60007C4.2003 4.82797 4.82821 4.20006 5.60032 4.20006Z" fill="#D1C9B3"></path>
                            <path d="M5.1941 13.8699C5.31258 13.9545 5.45452 14 5.60011 14C5.74569 14 5.88764 13.9545 6.00611 13.8699C6.21891 13.7194 11.2205 10.1081 11.2001 5.60004C11.2001 2.51232 8.68783 0 5.60011 0C2.51238 0 6.16269e-05 2.51232 6.16269e-05 5.59654C-0.0202385 10.1081 4.9813 13.7194 5.1941 13.8699ZM5.60011 1.40001C7.91642 1.40001 9.80014 3.28373 9.80014 5.60354C9.81484 8.71017 6.72851 11.4997 5.60011 12.4146C4.4724 11.499 1.38537 8.70877 1.40007 5.60004C1.40007 3.28373 3.28379 1.40001 5.60011 1.40001Z" fill="#D1C9B3"></path>
                        </svg>
                    </span>
                    <span class="info-text">197046, Петропавловская крепость, дом 3, литер «Ш», Санкт-Петербург, Россия</span>
                </div>
                <div class="work-time-block">
                    <span class="icon">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.23 1.92H10.5V0.88C10.5 0.8085 10.4415 0.75 10.37 0.75H9.46C9.3885 0.75 9.33 0.8085 9.33 0.88V1.92H5.17V0.88C5.17 0.8085 5.1115 0.75 5.04 0.75H4.13C4.0585 0.75 4 0.8085 4 0.88V1.92H1.27C0.982375 1.92 0.75 2.15237 0.75 2.44V13.23C0.75 13.5176 0.982375 13.75 1.27 13.75H13.23C13.5176 13.75 13.75 13.5176 13.75 13.23V2.44C13.75 2.15237 13.5176 1.92 13.23 1.92ZM12.58 12.58H1.92V6.405H12.58V12.58ZM1.92 5.3V3.09H4V3.87C4 3.9415 4.0585 4 4.13 4H5.04C5.1115 4 5.17 3.9415 5.17 3.87V3.09H9.33V3.87C9.33 3.9415 9.3885 4 9.46 4H10.37C10.4415 4 10.5 3.9415 10.5 3.87V3.09H12.58V5.3H1.92Z" fill="#D1C9B3" stroke="#D1C9B3" stroke-width="0.06"></path>
                        </svg>
                    </span>
                    <span class="info-text">Ежедневно, кроме четверга, с 10.00 до 20.00</span>
                </div>
            </div>

        </div>
    </div>

    <div class="order-table-wrapper">
        <div class="text-content-wrapper">
            <div class="order-table">

                <div class="table-row">
                    <div class="row-name">Дата и время оформления</div>
                    <div class="row-value">01.01.2020</div>
                </div>
                <div class="table-row">
                    <div class="row-name">Сумма</div>
                    <div class="row-value">400 ₽</div>
                </div>
                <div class="table-row">
                    <div class="row-name">Покупатель</div>
                    <div class="row-value">ivanov.ivan@mail.ru</div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-hr"></div>
        <div class="text-content-wrapper">
            <div class="footer-info">
                <p>Справки по телефону: +7 (812) 324-14-68, <br /> +7 (921) 415-25-34</p>
                <div class="contacts">
                    <span class="email">museum@goznak.ru</span>
                    <span class="social-icons">
                        <a href="https://vk.com/museum_goznak">
                            <svg width="30" height="30" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10" cy="10" r="10" fill="#948C85" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1373 10.9052C14.5281 11.2868 14.9405 11.6457 15.291 12.0657C15.4458 12.2523 15.5924 12.4449 15.7045 12.6615C15.8634 12.9694 15.7195 13.3083 15.4434 13.3267L13.7272 13.3259C13.2846 13.3626 12.9315 13.1844 12.6346 12.8818C12.3969 12.6397 12.1769 12.3822 11.9484 12.132C11.8548 12.0297 11.7567 11.9335 11.6396 11.8574C11.4053 11.7054 11.2019 11.7519 11.0681 11.9963C10.9317 12.2448 10.9008 12.52 10.8874 12.797C10.869 13.2011 10.7468 13.3073 10.3409 13.3258C9.47334 13.3668 8.65 13.2355 7.88513 12.7979C7.2108 12.412 6.68789 11.8674 6.23275 11.2508C5.34658 10.0501 4.66795 8.73071 4.05803 7.37438C3.92074 7.0688 4.02114 6.90476 4.35831 6.89896C4.91819 6.88808 5.47799 6.88886 6.03852 6.89818C6.26607 6.90151 6.41672 7.03203 6.50458 7.247C6.80749 7.99181 7.17813 8.70044 7.64338 9.35727C7.76727 9.53215 7.89361 9.70702 8.07351 9.8301C8.27254 9.96639 8.42407 9.92122 8.5177 9.69951C8.57711 9.55893 8.60312 9.40751 8.61652 9.25695C8.66087 8.73895 8.66672 8.22184 8.58892 7.70566C8.54116 7.38352 8.3597 7.17497 8.03825 7.11401C7.87422 7.08293 7.89864 7.02189 7.97807 6.92826C8.11601 6.76678 8.24575 6.66626 8.50439 6.66626H10.444C10.7493 6.72652 10.8171 6.8637 10.8589 7.17094L10.8606 9.32542C10.8573 9.44436 10.92 9.79732 11.1342 9.87605C11.3057 9.93209 11.4187 9.79492 11.5216 9.68619C11.986 9.19332 12.3174 8.61083 12.6135 8.00768C12.7449 7.74247 12.8579 7.46704 12.9674 7.19184C13.0485 6.98763 13.1759 6.88715 13.4059 6.8916L15.2726 6.89327C15.328 6.89327 15.384 6.89408 15.4376 6.90325C15.7521 6.95686 15.8383 7.09218 15.7412 7.39935C15.5881 7.88127 15.2903 8.28288 14.999 8.68635C14.6877 9.11711 14.3548 9.53311 14.0461 9.96642C13.7624 10.3621 13.785 10.5616 14.1373 10.9052Z" fill="white" />
                            </svg>
                        </a>
                        <a style="margin-left: 0px" href=" https://t.me/museum_goznak/" target="_blank">
                            <img src="/images/icons/ico_Telegram.svg" alt="Telegram" width="36" height="36">
                         </a>
              &nbsp;
                        <a style="margin-left: 0px" href=" https://rutube.ru/channel/23832108/" target="_blank">
                             <img src="/images/icons/ico_Rutube.svg" alt="Rutube" width="36" height="36">
                        </a>
                        <a href="https://ok.ru/museum.goznak/">
                            <svg width="30" height="30" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10" cy="10" r="10" fill="#948C85" />
                                <path d="M10.5376 10.2745C8.81216 10.2745 7.40039 8.86275 7.40039 7.13726C7.40039 5.41176 8.81216 4 10.5376 4C12.2631 4 13.6749 5.41176 13.6749 7.13726C13.6749 8.86275 12.2631 10.2745 10.5376 10.2745ZM10.5376 5.4902C9.63568 5.4902 8.89059 6.23529 8.89059 7.13726C8.89059 8.03922 9.63568 8.78431 10.5376 8.78431C11.4396 8.78431 12.1847 8.03922 12.1847 7.13726C12.1847 6.23529 11.4396 5.4902 10.5376 5.4902Z" fill="white" />
                                <path d="M13.9102 10.5882C13.6357 10.2352 13.1651 10.196 12.8121 10.4313C12.8121 10.4313 11.9494 11.0588 10.5376 11.0588C9.12586 11.0588 8.26311 10.4313 8.26311 10.4313C7.91017 10.1568 7.43958 10.2352 7.16507 10.5882C6.89056 10.9411 6.96899 11.4117 7.32193 11.6862C7.36115 11.7254 8.18468 12.3529 9.55723 12.549L7.4788 14.6666C7.16507 14.9803 7.16507 15.4901 7.4788 15.7646C7.63566 15.9215 7.83174 15.9999 8.02782 15.9999C8.2239 15.9999 8.41997 15.9215 8.57684 15.7646L10.5376 13.7646L12.4984 15.7646C12.6553 15.9215 12.8513 15.9999 13.0474 15.9999C13.2435 15.9999 13.4396 15.9215 13.5964 15.7646C13.9102 15.4509 13.9102 14.9803 13.5964 14.6666L11.518 12.549C12.8906 12.3137 13.7141 11.6862 13.7533 11.6862C14.1062 11.4117 14.1847 10.9019 13.9102 10.5882Z" fill="white" />
                            </svg>
                        </a>

                    </span>
                </div>
                <p>© AO "Гознак"</p>
            </div>
        </div>

    </div>