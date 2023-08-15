<?
/**
 * Contain event handlers for some custom things
 *
 */

use Bitrix\Main;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Web\HttpClient;
use Bitrix\Main\Web\Json;
use Bitrix\Sale;

Loc::loadMessages(__FILE__);

$eventManager = \Bitrix\Main\EventManager::getInstance();

AddEventHandler("subscribe", "BeforePostingSendMail", array("MuseumHandlers", "BeforePostingSendMailHandler"));
AddEventHandler("iblock", "OnAfterIBlockElementAdd", array("MuseumHandlers", "OnAfterIBlockElementAddHandler"));

AddEventHandler("sale", "OnSaleStatusOrder", array("MuseumHandlers", "OnSaleStatusOrderAddHandler"));
AddEventHandler('main', 'OnBeforeProlog', array("MuseumHandlers", "redirectOnIndex"));

class MuseumHandlers
{
    // создаем обработчик события "BeforePostingSendMail"
    function BeforePostingSendMailHandler($arFields)
    {
        $rs = CSubscription::GetByEmail($arFields["EMAIL"]);
        if ($ar = $rs->Fetch()) {
            $arFields["BODY"] = str_replace("#PERSONAL_UNSUBSCRIBE_URL#", "http://museum.goznak.ru/subscribe/index.php?ID=" . $ar["ID"] . "&CONFIRM_CODE=" . $ar["CONFIRM_CODE"] . "&action=unsubscribe", $arFields["BODY"]);

        }
        return $arFields;
    }

    public static function OnAfterIBlockElementAddHandler(&$arFields)
    {
        // send a letter for admin about new post in guestbook
        if ($arFields["ID"] > 0 && $arFields["IBLOCK_ID"] == 19 && !defined("ADMIN_SECTION")) {
            $arPostFields = array(
                "QUESTION" => $arFields["PREVIEW_TEXT"],
                "AUTHOR" => $arFields["NAME"],
                "EDIT_URL" => "/bitrix/admin/iblock_element_edit.php?type=content&IBLOCK_ID=" . $arFields["IBLOCK_ID"] . "&ID=" . $arFields["ID"],
            );
            CEvent::Send(
                "IBLOCK_GUESTBOOK_POST_ADD",
                "s1",
                $arPostFields
            );
        }
    }

    public static function OnSaleStatusOrderAddHandler($id, $val)
    {
        try {
            Loader::includeModule('sale');
            $order       = Sale\Order::load($id);
            $orderNumber = $order->getField('ACCOUNT_NUMBER');

            $curl = curl_init();

            $data = [
                'appid' => 'goznakweb',
                'action' => 'ticket',
                'ticketid' => $orderNumber
            ];

            curl_setopt_array($curl, array(
                //CURLOPT_URL => "http://admin:123@149.126.20.98:23180/goznak/hs/ex?" . http_build_query($data),
                CURLOPT_URL => "http://admin:123@82.140.87.246/Goznak/hs/ex?" . http_build_query($data),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json"
                ),
            ));

            $response = curl_exec($curl);

            $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            $result = json_decode($response, true);

            if (!$responseCode === 200 || $result['data'] !== 200) {
                throw new \Exception(curl_error($curl));
            }

            curl_close($curl);
        } catch (\Exception $exception) {
            return false;
        }
        return true;
    }

    function redirectOnIndex()
    {
        global $APPLICATION;
        global $USER;
        if ((strpos($APPLICATION->getCurPage(), '/en/') !== false) && !($USER->IsAdmin())) {
            LocalRedirect("/");
        }
    }
}

