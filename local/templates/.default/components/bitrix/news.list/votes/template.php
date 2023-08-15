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

$arSection = $arResult['arSection'];

$userVotes = $arResult['userVotes'];
$isUserVoted = $arResult['isUserVoted'];

if($isUserVoted || $_REQUEST['result'] == 'Y')
{
  ?>
  <h1 class="is-stack-40"><?=$arSection['NAME']?></h1>
  <?
  $arResultItems = $arResult['arResultItems'];
  $sumVotes = $arResult['sumVotes'];
  $n = 0;
  foreach($arResultItems as $arItem)
  {
    $percent = ceil($arItem['PROPERTY_VOTES_VALUE']/($sumVotes*2)*100);
    if($n > 0)
    {
      ?>
      <hr class="is-stack-40" />
      <?
    }
    ?>
    <div class="voteResultBlocks">
      <div class="voteResultBlock">
        <div class="name"><?=($n+1)?>. <?=$arItem['NAME']?></div>
        <div class="coins">
          <ul>
            <?
            if($percent > 0)
            {
              ?><li class="start"></li><?
            }
            for($i = 0; $i < $percent; $i++)
            {
              ?><li></li><?
            }
            if($percent > 0)
            {
              ?><li class="end"></li><?
            }
            ?>
          </ul>
        </div>
        <div class="voteCount <?=($percent == 0)? 'empty': '';?>"> Голосов <?=($arItem['PROPERTY_VOTES_VALUE']*1 > 0)? $arItem['PROPERTY_VOTES_VALUE']: '0';?></div>
      </div>
    </div>
    <?
      $n++;
  }
}
else
{
  global $voteName;
  $voteName = $arSection['NAME'];
  ?>
  <?if(!empty($arResult["ITEMS"])):?>
    <form action="" metod="POST" id='voteForm' data-max='<?=($arSection['UF_COUNT']*1 > 0)? $arSection['UF_COUNT']*1: 1;?>'>
      <input type="hidden" name='vote' value='<?=$arSection['ID']?>'>
      <?
      $n = 0;
      foreach($arResult["ITEMS"] as $arItem)
      {
        if($n > 0)
        {
        ?>
        <hr class="is-stack-40" />
        <?
        }?>
        <h3><?=$arItem['NAME']?></h3>
        <p class="is-small"><?=$arItem['PROPERTIES']['SMALL_TEXT']['VALUE']?></p>
        <?=$arItem['PREVIEW_TEXT']?>
        <?
        if(!empty($arItem['PROPERTIES']['MORE_PHOTO']['VALUE']))
        {
        ?>
          <div class="lightgallery is-container is-stack-40">
            <?
            foreach($arItem['PROPERTIES']['MORE_PHOTO']['VALUE'] as $photo)
            {
                $photo = (is_array($photo))? $photo: CFile::GetFileArray($photo);
            ?>
            <div class="is-col">
              <a class="gallery-item" href="<?=$photo['SRC']?>">
                <img src="<?=$photo['SRC']?>" alt="">
              </a>
            </div>
            <?
            }?>
          </div>
        <?
        }?>
        <div class="vote_select_block">
          <label for="vote-<?=$arItem['ID']?>">Выбрать данный вариант: </label>
          <input id="vote-<?=$arItem['ID']?>" type="checkbox" name='votes[]' value='<?=$arItem['ID']?>'>
        </div>
      <?
        $n++;
      }?>
      <div class="vote_btns">
        <button class="vote_button">Проголосовать</button>
      </div>
    </form>
    <div class="popupoverVoteError"></div>
    <div class="popupVoteError">
      <div class="errorText"></div>
    </div>

  <?endif;?>
<?
}
?>