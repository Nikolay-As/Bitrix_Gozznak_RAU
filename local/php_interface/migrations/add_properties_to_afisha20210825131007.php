<?php

namespace Sprint\Migration;


class add_properties_to_afisha20210825131007 extends Version
{
    protected $description = "Добавление новых свойств инфоблоку \"Афиша\"";

    protected $moduleVersion = "3.28.7";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblockId = $helper->Iblock()->getIblockIdIfExists('afisha', 'content');
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Событие периодическое (каждый день)',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'PERIOD',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'L',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => NULL,
  'HINT' => '',
  'VALUES' => 
  array (
    0 => 
    array (
      'VALUE' => 'Y',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'ce81cfc46d5fec83f85b831d6f02f222',
    ),
  ),
));
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Время проведения периодического события',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'PERIOD_TIME',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'L',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => NULL,
  'HINT' => '',
  'VALUES' => 
  array (
    0 => 
    array (
      'VALUE' => '08:00',
      'DEF' => 'N',
      'SORT' => '100',
      'XML_ID' => '84f3d57a3b70dcc23bc4ba0277d071bc',
    ),
    1 => 
    array (
      'VALUE' => '08:30',
      'DEF' => 'N',
      'SORT' => '200',
      'XML_ID' => '6f52ee714848c71fd796991d168b388a',
    ),
    2 => 
    array (
      'VALUE' => '09:00',
      'DEF' => 'N',
      'SORT' => '300',
      'XML_ID' => 'c0d15631793d5541bf48786c601d802d',
    ),
    3 => 
    array (
      'VALUE' => '09:30',
      'DEF' => 'N',
      'SORT' => '400',
      'XML_ID' => '7f34161725013fbaa82dcfb35d19ae83',
    ),
    4 => 
    array (
      'VALUE' => '10:00',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'a250a7212a9242720bab6496bb1f93fe',
    ),
    5 => 
    array (
      'VALUE' => '10:30',
      'DEF' => 'N',
      'SORT' => '600',
      'XML_ID' => 'c05fc888e47e00e61dbb0802f5781867',
    ),
    6 => 
    array (
      'VALUE' => '11:00',
      'DEF' => 'N',
      'SORT' => '700',
      'XML_ID' => '3e42a3f148850f85cf10af740886fb23',
    ),
    7 => 
    array (
      'VALUE' => '11:30',
      'DEF' => 'N',
      'SORT' => '800',
      'XML_ID' => '39c31dc8a4daf7fbd96f9901a190120e',
    ),
    8 => 
    array (
      'VALUE' => '12:00',
      'DEF' => 'N',
      'SORT' => '900',
      'XML_ID' => 'f4ad397255725a86e4dabaef7f48d7bd',
    ),
    9 => 
    array (
      'VALUE' => '12:30',
      'DEF' => 'N',
      'SORT' => '1000',
      'XML_ID' => '73e7d2f33ee5fd917f21d4cf73f11364',
    ),
    10 => 
    array (
      'VALUE' => '13:00',
      'DEF' => 'N',
      'SORT' => '1100',
      'XML_ID' => 'c1a31c0b31f7ef261fc56f9c690cd274',
    ),
    11 => 
    array (
      'VALUE' => '13:30',
      'DEF' => 'N',
      'SORT' => '1200',
      'XML_ID' => '8e6c75e05b4c4db5c944cc6b4b7ae9c7',
    ),
    12 => 
    array (
      'VALUE' => '14:00',
      'DEF' => 'N',
      'SORT' => '1300',
      'XML_ID' => '7f0695854fae3307dca7d90ba5fb94a6',
    ),
    13 => 
    array (
      'VALUE' => '14:30',
      'DEF' => 'N',
      'SORT' => '1400',
      'XML_ID' => '261e5e658af945956cf74ca53c243586',
    ),
    14 => 
    array (
      'VALUE' => '15:00',
      'DEF' => 'N',
      'SORT' => '1500',
      'XML_ID' => '612dd71a3b3bb8a2d9e2c3351b82aa18',
    ),
    15 => 
    array (
      'VALUE' => '15:30',
      'DEF' => 'N',
      'SORT' => '1600',
      'XML_ID' => '203c649ef4f2932b2d0a7ffe5406143c',
    ),
    16 => 
    array (
      'VALUE' => '16:00',
      'DEF' => 'N',
      'SORT' => '1700',
      'XML_ID' => '257dda55293832d02264de499bfd48c9',
    ),
    17 => 
    array (
      'VALUE' => '16:30',
      'DEF' => 'N',
      'SORT' => '1800',
      'XML_ID' => '99b9a930df3ba4fee1f1ceddee27625b',
    ),
    18 => 
    array (
      'VALUE' => '17:00',
      'DEF' => 'N',
      'SORT' => '1900',
      'XML_ID' => '1926bdb65fd3588f44a184a501d7f240',
    ),
    19 => 
    array (
      'VALUE' => '17:30',
      'DEF' => 'N',
      'SORT' => '2000',
      'XML_ID' => 'bd126d2ee50855c092282da901da4853',
    ),
    20 => 
    array (
      'VALUE' => '18:00',
      'DEF' => 'N',
      'SORT' => '2100',
      'XML_ID' => 'f66038f27ed180b339d0da8415aa4656',
    ),
    21 => 
    array (
      'VALUE' => '18:30',
      'DEF' => 'N',
      'SORT' => '2200',
      'XML_ID' => '0f8a60de3d44f7539d871c34d646c7f8',
    ),
    22 => 
    array (
      'VALUE' => '19:00',
      'DEF' => 'N',
      'SORT' => '2300',
      'XML_ID' => 'f65d35c9037bc78a948fc3856048cf63',
    ),
    23 => 
    array (
      'VALUE' => '19:30',
      'DEF' => 'N',
      'SORT' => '2400',
      'XML_ID' => 'a5a962556ccb2c7d33d42ff4572c052b',
    ),
    24 => 
    array (
      'VALUE' => '20:00',
      'DEF' => 'N',
      'SORT' => '2500',
      'XML_ID' => '5c53dbff0a30ce84c89afcae2361b534',
    ),
    25 => 
    array (
      'VALUE' => '20:30',
      'DEF' => 'N',
      'SORT' => '2600',
      'XML_ID' => 'b48d63caee8c031e37096bbdeeb193a2',
    ),
    26 => 
    array (
      'VALUE' => '21:00',
      'DEF' => 'N',
      'SORT' => '2700',
      'XML_ID' => 'f39d26f5d6fd5fa7e3185c59d95c29d1',
    ),
    27 => 
    array (
      'VALUE' => '21:30',
      'DEF' => 'N',
      'SORT' => '2800',
      'XML_ID' => 'af124af42959d7823f4a88c82b75a90d',
    ),
    28 => 
    array (
      'VALUE' => '22:00',
      'DEF' => 'N',
      'SORT' => '2900',
      'XML_ID' => '49003bc700ff51119f7d5938894d26cb',
    ),
    29 => 
    array (
      'VALUE' => '22:30',
      'DEF' => 'N',
      'SORT' => '3000',
      'XML_ID' => 'b796255e4597a86ef748fad7b487f3d6',
    ),
    30 => 
    array (
      'VALUE' => '23:00',
      'DEF' => 'N',
      'SORT' => '3100',
      'XML_ID' => 'ec5fbb4358a85c37d360530331b36f26',
    ),
    31 => 
    array (
      'VALUE' => '23:30',
      'DEF' => 'N',
      'SORT' => '3200',
      'XML_ID' => '1e447b101165cdc1a6a73209f80fd940',
    ),
    32 => 
    array (
      'VALUE' => '00:00',
      'DEF' => 'N',
      'SORT' => '3300',
      'XML_ID' => 'c2ce160464d50c0b909ac39ef741e482',
    ),
  ),
));
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Событие недоступно (даты)',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'DATE_NO',
  'DEFAULT_VALUE' => NULL,
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => 'Date',
  'USER_TYPE_SETTINGS' => NULL,
  'HINT' => '',
));
        $helper->UserOptions()->saveElementForm($iblockId, array (
  'Элемент|edit1' => 
  array (
    'ID' => 'ID',
    'DATE_CREATE' => 'Создан',
    'TIMESTAMP_X' => 'Изменен',
    'ACTIVE' => 'Активность',
    'ACTIVE_FROM' => 'Начало активности',
    'ACTIVE_TO' => 'Окончание активности',
    'NAME' => 'Название',
    'CODE' => 'Символьный код',
    'XML_ID' => 'Внешний код',
    'SORT' => 'Сортировка',
    'IBLOCK_ELEMENT_PROP_VALUE' => 'Значения свойств',
    'PROPERTY_CUSTOM_DATE' => 'Дата мероприятия',
    'PROPERTY_DURATION' => 'Длительность (минут)',
    'PROPERTY_QUANTITY' => 'Количество',
    'edit1_csection1' => 'Настройки для периодических событий',
    'PROPERTY_PERIOD' => 'Событие периодическое (каждый день)',
    'PROPERTY_PERIOD_TIME' => 'Время проведения периодического события',
    'PROPERTY_DATE_NO' => 'Событие недоступно (даты)',
  ),
  'Анонс|edit5' => 
  array (
    'PREVIEW_PICTURE' => 'Картинка для анонса',
    'PREVIEW_TEXT' => 'Описание для анонса',
  ),
  'Подробно|edit6' => 
  array (
    'DETAIL_PICTURE' => 'Детальная картинка',
    'DETAIL_TEXT' => 'Детальное описание',
  ),
  'SEO|edit14' => 
  array (
    'IPROPERTY_TEMPLATES_ELEMENT_META_TITLE' => 'Шаблон META TITLE',
    'IPROPERTY_TEMPLATES_ELEMENT_META_KEYWORDS' => 'Шаблон META KEYWORDS',
    'IPROPERTY_TEMPLATES_ELEMENT_META_DESCRIPTION' => 'Шаблон META DESCRIPTION',
    'IPROPERTY_TEMPLATES_ELEMENT_PAGE_TITLE' => 'Заголовок элемента',
    'IPROPERTY_TEMPLATES_ELEMENTS_PREVIEW_PICTURE' => 'Настройки для картинок анонса элементов',
    'IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_ALT' => 'Шаблон ALT',
    'IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_TITLE' => 'Шаблон TITLE',
    'IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_NAME' => 'Шаблон имени файла',
    'IPROPERTY_TEMPLATES_ELEMENTS_DETAIL_PICTURE' => 'Настройки для детальных картинок элементов',
    'IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_ALT' => 'Шаблон ALT',
    'IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_TITLE' => 'Шаблон TITLE',
    'IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_NAME' => 'Шаблон имени файла',
    'SEO_ADDITIONAL' => 'Дополнительно',
    'TAGS' => 'Теги',
  ),
  'Разделы|edit2' => 
  array (
    'SECTIONS' => 'Разделы',
  ),
));
    $helper->UserOptions()->saveElementGrid($iblockId, array (
  'views' => 
  array (
    'default' => 
    array (
      'columns' => 
      array (
        0 => 'NAME',
        1 => 'ACTIVE',
        2 => 'SORT',
        3 => 'TIMESTAMP_X',
        4 => 'ID',
        5 => 'PROPERTY_PERIOD',
      ),
      'columns_sizes' => 
      array (
        'expand' => 1,
        'columns' => 
        array (
        ),
      ),
      'sticked_columns' => 
      array (
      ),
      'custom_names' => NULL,
    ),
  ),
  'filters' => 
  array (
  ),
  'current_view' => 'default',
));
    $helper->UserOptions()->saveSectionGrid($iblockId, array (
  'views' => 
  array (
    'default' => 
    array (
      'columns' => 
      array (
        0 => '',
      ),
      'columns_sizes' => 
      array (
        'expand' => 1,
        'columns' => 
        array (
        ),
      ),
      'sticked_columns' => 
      array (
      ),
    ),
  ),
  'filters' => 
  array (
  ),
  'current_view' => 'default',
));

    }

    public function down()
    {
        //your code ...
    }
}
