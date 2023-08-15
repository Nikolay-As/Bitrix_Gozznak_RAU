<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?
$n = 0;
foreach($arResult['SECTIONS'] as $arItem)
{
	if($n > 0)
	{
	?>
		<hr class="is-stack-40" />
	<?
	}
	$cnt = ($arItem['UF_VOTES']*1 > 0)? $arItem['UF_VOTES']*1: '0';
	?>
	<h3><?=$arItem['NAME']?></h3>
	<ul class='vote_info'>
		<li><a href="javascript:void(0);">Количество проголосовавших: <?=$cnt?></a></li>
		<li><a href="<?=$arItem['SECTION_PAGE_URL']?>" class="button">Перейти к голосованию</a></li>
		<li><a href="<?=$arItem['SECTION_PAGE_URL']?>?result=Y" class="button">Результаты</a></li>
	</ul>
	<?
	$n++;
}
?>