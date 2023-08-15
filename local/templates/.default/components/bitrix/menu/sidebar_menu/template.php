<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?><?

if (!empty($arResult)):
?><div class="main-menu">
<nav>
  <ul><?
	foreach($arResult as $arItem):
	?><li><a href="<?=$arItem["LINK"];?>" <?if($arItem["SELECTED"]):?>class="im-mobile_menu-item__active"<?endif;?>><?=$arItem["TEXT"];?></a><?
		if(isset($arItem["CHILDREN"]) && !empty($arItem["CHILDREN"])):
			?><nav <?if($arItem["SELECTED"]):?>class="active"<?endif;?>><ul class="im-common-menu_items"><?
			foreach($arItem["CHILDREN"] as $arChild):
				?><li <?if($arChild["SELECTED"]):?>class="active"<?endif;?>><a href="<?=$arChild["LINK"];?>"><?=$arChild["TEXT"];?></a></li><?
			endforeach;
			?></ul></nav><?
		endif; ?>
		</li>
	<? endforeach;
?></ul></nav></div><?
endif; ?>