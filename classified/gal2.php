<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Фотогалерея 2");
?>

<?$APPLICATION->AddHeadScript(SITE_DIR."js/jquery.mousewheel.js");?>
<?$APPLICATION->AddHeadScript(SITE_DIR."js/jquery.event.drag.js");?>
<?$APPLICATION->AddHeadScript(SITE_DIR."js/mag-control.js");?>

<script>
$(document).ready(function() {
	$host = $('[mag-thumb="inner"]');
	$host.mag({			
		toggle: false,
		position: 'drag',	
		initial.zoom : 1,
	});
	
	$controls = $('[mag-ctrl="controls"]');
	$controls.magCtrl({
		mag: $host
	});
});
</script>

<style>


</style>


<div class="im-photogal-img-wrapper">
	<div class="im-photogal-img  im-common-img im-common-ac im-gal_box im-common-shadow im-common-zoom">
		<img src="/images/content/expo/slider/2.jpg" class="im-photogal-img-bg" />
		
		<div mag-thumb="inner"><?/*<img src="/images/content/expo/slider/2.jpg" class="im-photogal-img-main" />*/?></div>
		<div mag-zoom="inner"><img src="/images/content/expo/slider/2.jpg" class="im-photogal-img-main" /></div>
		
		<div class="im-common-img_block-caption"><div>"От керенки до совзнака: деньги и революция"</div></div>
		
		<span class="im-photogal-preloader"></span>			
		<span class="im-icon-loop im-common-al" style="display:none;">&#xe116;</span>
		
	</div>	
	
		
	
	<div mag-ctrl="controls" class="im-mag-ctrl im-common-fl im-common-mr10">
	  <button mag-ctrl-zoom-by="-0.5" title="Уменьшить" class="im-common-mr10"><span class="fa fa-minus im-common-clr-green"></span></button>
	  <button mag-ctrl-zoom-by="0.5" title="Увеличить" class="im-common-mr10"><span class="fa fa-plus im-common-clr-green"></span></button>	  	 
	  <button mag-ctrl-center-and-default-size title="Центрировать и уменьшить" class="im-common-mr10"><span class="fa fa-compress im-common-clr-green"></span></button>	  	 
	  <button title="Посмотреть в всплывающем окне" onclick="$.dwbox.load($('.im-photogal-img-slider a'), $('.im-photogal-img-active').attr('href'));" class="im-common-mr10"><span class="fa fa-arrows-alt im-common-clr-green"></span></button>	  
	</div>		
	 		
	<div >
		<div class="im-photogal-img-slider im-common-pt0">	
			<div>
			<a href="/images/content/expo/slider/2.jpg" data-middle-href="/images/content/expo/slider/2.jpg" alt="Деньги-марки достоинством 1, 2 и 3 копейки" class="im-photogal-img-active im-common-shadow" >
				<img src="/images/content/expo/slider/2.jpg" />				
			</a>
			<?/*<div class="im-gallery-detail-descr im-common-mt5">Деньги-марки достоинством 1, 2 и 3 копейки</div>*/?>
			</div>			
			
			<div>
			<a href="/images/content/expo/slider/1.jpg" data-middle-href="/images/content/expo/slider/1.jpg" class="im-common-shadow">
				<img src="/images/content/expo/slider/1.jpg" />
				
			</a>			
			</div>
			
			<div>
			<a href="/images/content/expo/slider/3.jpg" data-middle-href="/images/content/expo/slider/3.jpg" class="im-common-shadow">
				<img src="/images/content/expo/slider/3.jpg" />				
			</a>			
			</div>
			
			<div>
			<a href="/images/content/expo/slider/4.jpg" data-middle-href="/images/content/expo/slider/4.jpg" class="im-common-shadow">
				<img src="/images/content/expo/slider/4.jpg" />
			</a>
			</div>			
			
			<div>
			<a href="/images/content/expo/slider/5.jpg" data-middle-href="/images/content/expo/slider/5.jpg" class="im-common-shadow">
				<img src="/images/content/expo/slider/5.jpg" />
			</a>
			</div>			
		</div>
	</div>
	
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>