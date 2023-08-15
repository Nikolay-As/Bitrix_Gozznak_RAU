<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
foreach($arResult["IBLOCKS"] as $arIBlock):
	if(count($arIBlock["ITEMS"]) > 0):
		foreach($arIBlock["ITEMS"] as $arItem):		
			?>
			<div style="margin: 0 0 20px 0;">
				<div style="float: left; width: 100%; height: 100%; max-width: 180px; max-height: 180px; margin:0 20px 10px 0; border: 3px solid #fff !important; box-shadow: 2px 2px 8px rgba(0,0,0,.2);">
					<a href="http://museum.goznak.ru<?=$arItem["~DETAIL_PAGE_URL"]?>" style="width: 100%; max-width: 180px; display: block;" target="_blank" >
						<img alt="<?=$arItem["NAME"]?>" style="width: auto; height: auto; max-width:180px; max-height:180px; margin: auto; display:block;" src="http://museum.goznak.ru<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" />
					</a>
				</div>
				<div style="margin:0;">
					<div style="overflow: hidden; height:1px;"></div>
					<a href="http://museum.goznak.ru<?=$arItem["~DETAIL_PAGE_URL"]?>" style="display:block; color:#2c8450; font-family: 'OpenSans-Bold', sans-serif ; font-size: 16px; font-weight: 700; text-decoration: none;" target="_blank"><?=$arItem["NAME"]?></a>
					
					<?if(strlen($arItem["DATE_ACTIVE_FROM"])>0):?>
						<span style="color: #bababa; font-family: 'OpenSans-Regular', sans-serif ; font-size: 14px;">[<?=$arItem["DATE_ACTIVE_FROM"]?>]</span>			
					<?endif;?>
					
					<p style="color:#000; font-size: 14px; font-family: 'OpenSans-Regular', sans-serif ; line-height: 22px; margin: 10px 0 0 0;">
						<?=$arItem["PREVIEW_TEXT"];?>
					</p>
				</div>
				<div style="clear:both;width:100%;overflow:hidden;height:1px;"></div>
			</div>
			
			<hr style="border-top: 1px dashed #23613c; margin: 0 0 35px 0; border-bottom: 0;">
			<?
			/*
			if($arItem["PREVIEW_PICTURE"])
			{
				
				
				
				
				if(COption::GetOptionString("subscribe", "attach_images")==="Y")
				{
					$sImagePath = $arItem["PREVIEW_PICTURE"]["SRC"];
				}
				elseif(strpos($arItem["PREVIEW_PICTURE"]["SRC"], "http") !== 0)
				{
					$sImagePath = "http://".$arResult["SERVER_NAME"].$arItem["PREVIEW_PICTURE"]["SRC"];
				}
				else
				{
					$sImagePath = $arItem["PREVIEW_PICTURE"]["SRC"];
				}

				$width = 100;
				$height = 100;

				$width_orig = $arItem["PREVIEW_PICTURE"]["WIDTH"];
				$height_orig = $arItem["PREVIEW_PICTURE"]["HEIGHT"];

				if(($width_orig > $width) || ($height_orig > $height))
				{
					if($width_orig > $width)
						$height_new = ($width / $width_orig) * $height_orig;
					else
						$height_new = $height_orig;

					if($height_new > $height)
						$width = ($height / $height_orig) * $width_orig;
					else
						$height = $height_new;
				}
			}
	?>
		<tr><td>
			<font class="text">
			<?if($arItem["PREVIEW_PICTURE"]):?>
			<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><img hspace='5' vspace='5' align='left' border='0' src="<?echo $sImagePath?>" width="<?echo $width?>" height="<?echo $height?>" alt="<?echo $arItem["PREVIEW_PICTURE"]["ALT"]?>"  title="<?echo $arItem["NAME"]?>"></a>
			<?endif;?>
			<?if(strlen($arItem["DATE_ACTIVE_FROM"])>0):?>
				<font class="newsdata"><?echo $arItem["DATE_ACTIVE_FROM"]?></font><br>
			<?endif;?>
			<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br>
			<?echo $arItem["PREVIEW_TEXT"];?>
			</font>
		</td></tr>
	<?*/
		endforeach;
	endif;
endforeach?>

