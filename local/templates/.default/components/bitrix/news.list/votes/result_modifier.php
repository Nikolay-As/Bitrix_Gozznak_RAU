<?
$cookieName = "bx_info_updated";

$rsSection = CIBlockSection::GetList(Array('ID'=>'ASC'), Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'ID'=>$arResult['SECTION']['PATH'][0]['ID']), false, Array('ID', 'NAME', 'CODE', 'UF_COUNT', 'UF_VOTES'));
$arSection = $rsSection->GetNext();

$userVotes = $APPLICATION->get_cookie($cookieName);
$userVotes = (!empty($userVotes))? json_decode($userVotes, true): array();

$arResult['userVotes'] = $userVotes;
$arResult['arSection'] = $arSection;

$arResult['isUserVoted'] = (in_array($arSection['ID'], $userVotes))? true: false;
$isUserVoted = $arResult['isUserVoted'];

if($isUserVoted || $_REQUEST['result'] == 'Y')
{
  $rsResultItems = CIBlockElement::GetList(Array('PROPERTY_VOTES'=>'DESC'), array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'ACTIVE'=>'Y', 'SECTION_ID'=>$arSection['ID']), false, false, Array('ID', 'NAME', 'PROPERTY_VOTES'));
  $arResultItems = array();
  $sumVotes = 0;
  while($tmp = $rsResultItems->GetNext())
  {
    $sumVotes += $tmp['PROPERTY_VOTES_VALUE']*1;
    $arResultItems[] = $tmp;
  }
  $arResult['arResultItems'] = $arResultItems;
  $arResult['sumVotes'] = $sumVotes;
}
else
{
  if(!empty($_REQUEST['vote']) && !empty($_REQUEST['votes']))
  {
    if($_REQUEST['vote']*1 != $arSection['ID']*1)
    {
      LocalRedirect('/vote/'.$arSection['CODE'].'/?result=Y');
      die();
    }

    $arID = $_REQUEST['votes'];
    $rsElements = CIBlockElement::GetList(Array('ID'=>'ASC'), Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'ACTIVE'=>'Y', 'SECTION_ID'=>$_REQUEST['vote'], 'ID'=>$arID), false, false, Array('ID', 'PROPERTY_VOTES'));
    $r = 0;
    while($el = $rsElements->GetNext())
    {
      if($r > $arSection['UF_COUNT']*1)
      {
        break;
      }
      $newVote = $el['PROPERTY_VOTES_VALUE']*1 + 1;
      CIBlockElement::SetPropertyValuesEx($el['ID'], $arParams['IBLOCK_ID'], array('VOTES'=>$newVote));
      $r++;
    }

    $newCountUf = $arSection['UF_VOTES']*1 + 1;

    $bs = new CIBlockSection;
    $bs->Update($arSection['ID'], array("UF_VOTES" => $newCountUf)); 

    $userVotes[] = $arSection['ID'];

    $userVotes = json_encode($userVotes);
    
    $APPLICATION->set_cookie($cookieName, $userVotes, time()+60*60*24*30*12*2, "/");

    LocalRedirect('/vote/'.$arSection['CODE'].'/?result=Y');
    die();
  }

  global $voteName;
  $voteName = $arSection['NAME'];

  $arResult["voteName"] = $voteName;
}
?>