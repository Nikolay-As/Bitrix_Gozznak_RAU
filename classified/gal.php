<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Фотогалерея");
?>

<?/*$APPLICATION->AddHeadScript(SITE_DIR."js/jquery.bridget.js");?>
<?$APPLICATION->AddHeadScript(SITE_DIR."js/PreventGhostClick.js");?>
<?$APPLICATION->AddHeadScript(SITE_DIR."js/mag.js");?>
<?$APPLICATION->AddHeadScript(SITE_DIR."js/mag-jquery.js");?>
<?$APPLICATION->SetAdditionalCSS(SITE_DIR."css/mag.css");*/?>

<style>
@font-face {
	font-family: 'LigatureSymbols';
	src: url('../fonts/LigatureSymbols/LigatureSymbols-2.07.eot');
	src: url('../fonts/LigatureSymbols/LigatureSymbols-2.07.eot?#iefix') format('embedded-opentype'), url('../fonts/LigatureSymbols/LigatureSymbols-2.07.woff') format('woff'), url('../fonts/LigatureSymbols/LigatureSymbols-2.07.ttf') format('truetype'), url('../fonts/LigatureSymbols/LigatureSymbols-2.07.svg#LigatureSymbols') format('svg');
	font-weight: normal;
	font-style: normal;
}

.mag-zone {
	cursor: crosshair;
}

.mag-zoomed {
	background: #fff;
}

.im-gallery-img:hover .mag-thumb img {
	z-index: -1;
	opacity: 0;
}

.im-gallery-img:hover .im-gal-img-bg {
	opacity: 0;
}

.im-gal-img-main {
	z-index: 2;
}


.im-gallery-img .im-icon-loop {
	width: 50px;
	height: 50px;
	position: absolute;
	left: 10px;
	top: 10px;
	display: none;
	color: #23613c;
	pointer-events: none;
	z-index: 2;
}

.im-gallery-img:hover .im-icon-loop {
	display: block;
}

.im-icon-loop {
	font-family: 'LigatureSymbols';
	font-size: 26px;
}

</style>

<script>

$(document).ready(function () {
	
	$host = $('[mag-thumb="inner"]');
	$host.mag();
	
}); 

</script>


<div class="im-common-img im-common-ac im-common-mb30 im-gal_box im-common-shadow im-common-zoom">
	<div class="im-gallery-img">
	
		<img src="/images/content/expo/slider/2.jpg" alt="" class="im-common-img im-gal-img-bg">
		
		<div mag-thumb="inner"><img src="/images/content/expo/slider/2.jpg" alt="" class="im-common-img im-gal-img-main"></div>
		<div mag-zoom="inner"><img src="/images/content/expo/slider/2.jpg" alt="" ></div>
		
		
		<span class="im-gal-preloader" ></span> 
		
		<span class="im-icon-loop im-common-al">&#xe116;</span>
		
	</div>	
</div>
<div class="im-carousel-wrapper">
	<div class="im-carousel im-gal">
		<div class="im-carousel-item">
			<a href="/images/content/expo/slider/2.jpg" style="background-image: url(/images/content/expo/slider/thumbs/2.jpg)" class="im-common-shadow im-common-bg">				
			</a>
		</div>
		<div class="im-carousel-item">
			<a href="/images/content/expo/slider/1.jpg" style="background-image: url(/images/content/expo/slider/thumbs/1.jpg)" class="im-common-shadow im-common-bg">				
			</a>
		</div>
		<div class="im-carousel-item">
			<a href="/images/content/expo/slider/3.jpg" style="background-image: url(/images/content/expo/slider/thumbs/3.jpg)" class="im-common-shadow im-common-bg">				
			</a>
		</div>
		<div class="im-carousel-item">
			<a href="/images/content/expo/slider/4.jpg" style="background-image: url(/images/content/expo/slider/thumbs/4.jpg)" class="im-common-shadow im-common-bg"></a>
		</div>
		<div class="im-carousel-item">
			<a href="/images/content/expo/slider/5.jpg" style="background-image: url(/images/content/expo/slider/thumbs/5.jpg)" class="im-common-shadow im-common-bg"></a>
		</div>
		<div class="im-carousel-item">
			<a href="/images/content/expo/slider/6.jpg" style="background-image: url(/images/content/expo/slider/thumbs/6.jpg)" class="im-common-shadow im-common-bg"></a>
		</div>
		<div class="im-carousel-item">
			<a href="/images/content/expo/slider/7.jpg" style="background-image: url(/images/content/expo/slider/thumbs/7.jpg)" class="im-common-shadow im-common-bg"></a>
		</div>
		<div class="im-carousel-item">
			<a href="/images/content/expo/slider/8.jpg" style="background-image: url(/images/content/expo/slider/thumbs/8.jpg)" class="im-common-shadow im-common-bg"></a>
		</div>
		<div class="im-carousel-item">
			<a href="/images/content/expo/slider/9.jpg" style="background-image: url(/images/content/expo/slider/thumbs/9.jpg)" class="im-common-shadow im-common-bg"></a>
		</div>
	</div>
</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>