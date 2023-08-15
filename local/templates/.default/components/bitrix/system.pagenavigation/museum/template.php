<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if($arResult["bDescPageNumbering"]):?>

	<?if ($arResult["NavShowAlways"] || $arResult["NavPageCount"] > 1):?>
		<div class="im-common-mt30">
			<div class="im-common-ac im-common-page_nav">
				<?if($arResult["NAV"]["PAGE_NUMBER"] < $arResult["NAV"]["PAGE_COUNT"]):?>
					<a href="<?=$arResult["NAV"]["URL"]["PREV_PAGE"];?>" class="im-common-icon im-common-page_nav-left"><?=GetMessage("nav_prev");?></a>
				<?endif;?>
				<?if($arResult["NAV"]["PAGE_NUMBER"] > 1):?>
					<a href="<?=$arResult["NAV"]["URL"]["NEXT_PAGE"];?>" class="im-common-icon im-common-page_nav-right"><?=GetMessage("nav_next");?></a>
				<?endif;?>
				<div class="im-common-page_nav-pages">
					<?if($arResult["NAV"]["START_PAGE"] < $arResult["NAV"]["PAGE_COUNT"]):?>
						<a href="<?=$arResult["NAV"]["URL"]["FIRST_PAGE"];?>">1</a>
						...
					<?endif;?>

					<?for($PAGE_NUMBER=$arResult["NAV"]["END_PAGE"]; $PAGE_NUMBER<=$arResult["NAV"]["START_PAGE"]; $PAGE_NUMBER++):?>
						<?if($arResult["NAV"]["PAGE_NUMBER"] == $PAGE_NUMBER):?>
							<span><?=$PAGE_NUMBER;?></span>
						<?else:?>
							<a href="<?=$arResult["NAV"]["URL"]["SOME_PAGE"][$PAGE_NUMBER];?>"><?=$PAGE_NUMBER;?></a>
						<?endif;?>
					<?endfor;?>

					<?if($arResult["NAV"]["END_PAGE"] > 1):?>
						...
						<a href="<?=$arResult["NAV"]["URL"]["LAST_PAGE"];?>"><?=$arResult["NAV"]["PAGE_COUNT"];?></a>
					<?endif;?>
				</div>
			</div>
		</div>
	<?endif;?>

<?else:?>

	<?if ($arResult["NavShowAlways"] || $arResult["NavPageCount"] > 1):?>
		<div class="im-common-mt30">
			<div class="im-common-ac im-common-page_nav">
				<?if($arResult["NAV"]["PAGE_NUMBER"] > 1):?>
					<a href="<?=$arResult["NAV"]["URL"]["PREV_PAGE"];?>" class="im-common-fl im-common-page_nav-prev"><?=GetMessage("nav_prev");?></a>
				<?endif;?>
				<?if($arResult["NAV"]["PAGE_NUMBER"] < $arResult["NAV"]["PAGE_COUNT"]):?>
					<a href="<?=$arResult["NAV"]["URL"]["NEXT_PAGE"];?>" class="im-common-fr im-common-page_nav-next"><?=GetMessage("nav_next");?></a>
				<?endif;?>
				<div class="im-common-page_nav-pages">

					<?if($arResult["NAV"]["START_PAGE"] > 1):?>
						<a href="<?=$arResult["NAV"]["URL"]["FIRST_PAGE"];?>">1</a>
						...
					<?endif;?>

					<?for($PAGE_NUMBER=$arResult["NAV"]["START_PAGE"]; $PAGE_NUMBER<=$arResult["NAV"]["END_PAGE"]; $PAGE_NUMBER++):?>
						<?if($arResult["NAV"]["PAGE_NUMBER"] == $PAGE_NUMBER):?>
							<span><?=$PAGE_NUMBER;?></span>
						<?else:?>
							<a href="<?=$arResult["NAV"]["URL"]["SOME_PAGE"][$PAGE_NUMBER];?>"><?=$PAGE_NUMBER;?></a>
						<?endif;?>
					<?endfor;?>

					<?if($arResult["NAV"]["END_PAGE"] < $arResult["NAV"]["PAGE_COUNT"]):?>
						...
						<a href="<?=$arResult["NAV"]["URL"]["LAST_PAGE"];?>"><?=$arResult["NAV"]["PAGE_COUNT"];?></a>
					<?endif;?>
				</div>
			</div>
		</div>
	<?endif;?>

<?endif;?>