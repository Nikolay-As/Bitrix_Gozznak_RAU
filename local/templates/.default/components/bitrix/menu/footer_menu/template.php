<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?><?

if (!empty($arResult)):
?>

<div class="is-row is-stack-20 is-col-stack-24">

<?
	foreach($arResult as $arItem):
	?>
	
	<div class="is-col">
		  <div class="is-big is-stack-20"><?=$arItem["TEXT"];?></div>

		
          <?
		if(isset($arItem["CHILDREN"]) && !empty($arItem["CHILDREN"])):
			?><nav><ul><?
			foreach($arItem["CHILDREN"] as $arChild):
				?><li><a href="<?=$arChild["LINK"];?>"><?=$arChild["TEXT"];?></a></li><?
			endforeach;
			?></ul></nav><?
		endif; ?>
		</div>

		<?
		endforeach;?>

	</div>
	<?
endif; ?>
	
