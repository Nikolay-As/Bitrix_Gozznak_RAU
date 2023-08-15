<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

//Выбираем все периодические события
$rsPeriod = CIBlockElement::GetList(Array('ID'=>'ASC'), Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'ACTIVE'=>'Y', 'PROPERTY_PERIOD_VALUE'=>'Y'));
$arPeriod = [];
while($p = $rsPeriod->GetNextElement())
{
    $tmp = $p->GetFields();
    $tmp['END_DATE'] = date('d.m.Y', strtotime($tmp['ACTIVE_TO'])+3600*24);
    $tmp['PROPERTIES'] = $p->GetProperties();
    $arPeriod[] = $tmp;
}

$arItems = [];
foreach($arResult["ITEMS"] as $arItem)
{
  $arItems[strtotime($arItem["PROPERTIES"]["CUSTOM_DATE"]["VALUE"])][] = $arItem;
}
$currentDate = date('d.m.Y');
foreach($arPeriod as $arItem)
{
  $d1 = strtotime($currentDate.' 00:00');
  $d2 = strtotime($arItem['END_DATE'].' 00:00');
  $p = ceil(($d2-$d1)/(3600*24));
  for($i = 0; $i < $p; $i++)
  {
    $newDate = date('d.m.Y', strtotime($currentDate.' 00:00')+$i*3600*24);
    $is_no_date = false;
    if(!empty($arItem['PROPERTIES']['DATE_NO']['VALUE']))
    {
      foreach($arItem['PROPERTIES']['DATE_NO']['VALUE'] as $date)
      {
        if($newDate == $date)
        {
          $is_no_date = true;
          break;
        }
      }
    }
    if($is_no_date)
    {
      continue;
    }
    foreach($arItem['PROPERTIES']['PERIOD_TIME']['VALUE'] as $time)
    {
      $tmpData = $arItem;
      $tmpData["PROPERTIES"]["CUSTOM_DATE"]["VALUE"] = $newDate.' '.$time;
      $arItems[strtotime($tmpData["PROPERTIES"]["CUSTOM_DATE"]["VALUE"])][] = $tmpData;
    }
  }
}
ksort($arItems);
?>

<div class="afisha afisha--inner">


<?
  foreach($arItems as $time=>$arItemArray)
  {
    foreach($arItemArray as $arItem)
    {
    ?>


  <div class="afisha__item is-container">
      <div class="afisha__item__left">
        <div class="afisha__item__left__num"><?= FormatDate("d", strtotime( $arItem["PROPERTIES"]["CUSTOM_DATE"]["VALUE"])); ?></div>
        <div class="afisha__item__left__month"><?= FormatDate("F", strtotime( $arItem["PROPERTIES"]["CUSTOM_DATE"]["VALUE"])); ?>,</div>
        <div class="is-smaller"><?= FormatDate("l", strtotime( $arItem["PROPERTIES"]["CUSTOM_DATE"]["VALUE"])); ?></div>
      </div>
      <div class="afisha__item__right">
        <a href="/ekskursii-i-programmy/ekskursionnoe-obsluzhivanie/">
          <div class="afisha__item__right__time"><?= date("H:i", strtotime( $arItem["PROPERTIES"]["CUSTOM_DATE"]["VALUE"])); ?></div>
          <div class="afisha__item__right__title"><?= $arItem["NAME"] ?></div>
          <div class="afisha__item__right__desc"><?= $arItem["PREVIEW_TEXT"] ?></div>
        </a>
      </div>
    </div>

    <?
    }
  }?>

</div>
