<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

foreach ($arResult['ITEMS'] as $key => $item) {

    if (!empty($item['PREVIEW_PICTURE']['SRC'])) {

        $resizeImg = CFile::ResizeImageGet(
            $item['PREVIEW_PICTURE'],
            [
                'width'  => 500,
                'height' => 500,
            ]
        );

		$resizeImgBig = CFile::ResizeImageGet(
            $item['PREVIEW_PICTURE'],
            [
                'width'  => 900,
                'height' => 900,
            ]
        );

        if (!empty($resizeImg['src'])) {
            $resizeImg = array_change_key_case($resizeImg, CASE_UPPER);
			$resizeImgBig = array_change_key_case($resizeImgBig, CASE_UPPER);
            $arResult['ITEMS'][$key]['PREVIEW_PICTURE'] = $resizeImg;
			$arResult['ITEMS'][$key]['PREVIEW_PICTURE']['RESIZED']['FULL'] = $resizeImgBig;
        }
    }
}

?>