<?php
if (!function_exists('fetchExcursions')) {
    function fetchExcursions()
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $url      = 'http://82.140.87.246/Goznak/hs/excursions';
        $login    = 'admin';
        $password = '123';

        $excursionIblockId = 21;


        $client = new \Bitrix\Main\Web\HttpClient();
        $client->setAuthorization($login, $password);


        $date = new DateTime();
        $date->setTime(1, 0);

        for ($i = 0; $i < 14; $i++) {
            $res = $client->get($url . '?date=' . $date->format('Y-m-d H:i:s'));
            $date->modify('+1 day');

            $decodedRes = json_decode($res, true);

            foreach ($decodedRes['Excursions'] as $excursion) {

                $startTime = DateTime::createFromFormat('Y-m-d H:i:s', $date->format('Y-m-d') . ' ' . $excursion['StartTime']);
                $endTime   = DateTime::createFromFormat('Y-m-d H:i:s', $date->format('Y-m-d') . ' ' . $excursion['EndTime']);;
                $timeDiff = $startTime->diff($endTime);

                $excursionDate = DateTime::createFromFormat('Y-m-d', $excursion['Date']);


                $dbExcursion = \Bitrix\Iblock\ElementTable::getList([
                    'filter' => [
                        'XML_ID' => $excursion['IDExcursions'],
                        'IBLOCK_ID' => $excursionIblockId,
                    ],
                    'select' => ['ID']
                ])->fetch();

                if(!$dbExcursion) {
                    $obElement = new \CIBlockElement();

                    $obElement->Add([
                        'NAME' => $excursion['NameExcursions'],
                        'XML_ID' => $excursion['IDExcursions'],
                        'IBLOCK_ID' => $excursionIblockId,
                        'PROPERTY_VALUES' => [
                            'CUSTOM_DATE' => $excursionDate->format('d.m.Y'),
                            'DURATION' => $timeDiff->i + $timeDiff->h * 60,
                            'QUANTITY' => $excursion['Quantity']
                        ]
                    ]);
                }
            }
        }

        return __FUNCTION__ . '();';
    }
}