function disableMenu() {
	if (window.innerWidth > 1000) {
		$('.im-menu_icon').removeClass('im-open');
		$("body").removeClass('im-has_active_menu');
		$(window).unbind('resize', disableMenu);
	}
}

function scrollToAnchor(hash) {

	var $anchor = $(hash);
	var distance = 0;
	var scrollDuration = 0;

	if(!$anchor) {
		return true;
	}

	distance = Math.abs($anchor.offset().top - $(document).scrollTop());
	scrollDuration = distance / 3.5;

	$.scrollTo($anchor, scrollDuration);
		
	return false;
};


$(document).ready(function() {

	$('.im-menu_icon').click(function() {
		$(this).toggleClass('im-open');
		$("body").toggleClass('im-has_active_menu');
		$(window).bind('resize', disableMenu);
	});

	$('.im-search-toggle').click(function() {
		var $search = $(".im-search");
		var expandedClass = 'im-search__expanded';
		if ($search.hasClass(expandedClass)) {
			$search.removeClass(expandedClass);
			return false;
		}
		$search.addClass(expandedClass).find('input[type="text"]').focus();
	});

	$("span.im-lang-item").click(function() {
		var $langItem = $(this);	
		var $langWrap = $langItem.parent();
		var wrapOpenClass = "im-lang__open";
		var itemActiveClass = "im-lang-item__active";
		$langWrap.toggleClass(wrapOpenClass);
	});

	$('.im-home-bg').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		speed: 200,
		useTransform: true,
		asNavFor: '.im-home-slider'
	});

	$('.im-home-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		asNavFor: '.im-home-bg',
		arrows: false,
		dots: true,
		focusOnSelect: true,
		//adaptiveHeight: true,
		appendDots: $('.im-home-slider-wrapper'),
		autoplay: true,
		autoplaySpeed: 7000,
		speed: 200,
		useTransform: true
	});

	$(".im-carousel").on('setPosition', function(e,slick) {
		if (slick.breakpointSettings && slick.activeBreakpoint) {
			if (slick.breakpointSettings[slick.activeBreakpoint].slidesToShow >= slick.slideCount) {
				slick.$slider.closest('.im-carousel-wrapper').addClass('im-has_no_arrows');
			} else {
				slick.$slider.closest('.im-carousel-wrapper').removeClass('im-has_no_arrows');
			}
		}
	});

	$('.im-carousel').slick({
		nav: true,
		speed: 200,
		slidesToShow: 4,
		useTransform: true,
		infinite: false,
		responsive: [
			{
				breakpoint: 2000,
				settings: { slidesToShow: 4 }
			},
			{
				breakpoint: 320,
				settings: { slidesToShow: 1 }
			},
			{
				breakpoint: 480,
				settings: { slidesToShow: 2 }
			},
			{
				breakpoint: 640,
				settings: { slidesToShow: 3 }
			}
		]
	});


	
	/* Scroll To Anchor
	/* -------------------------------------------------------------------------- */

	$('.im-js-scroll').click(function() {
		return scrollToAnchor(this.hash);
	});
	
	/* Exposition: Gallery
	/* -------------------------------------------------------------------------- */
	
	$('.im-gal').gallery();
	
	$('.im-gal-img-main').click(function() {
		$.dwbox.load($('.im-gal a'), $(this).attr('src'));
	});	
	
	/* Exhibition Photogallery
	/* -------------------------------------------------------------------------- */
	$(".im-photogal-img-slider").owlCarousel({
		itemsCustom: [[320, 2], [640, 3], [960, 4]],
		navigation: true,
		navigationText: ["&#xe080;", "&#xe112;"],
		rewindNav: true,
		pagination: false,
		scrollPerPage: false,
	});

	/*$('.im-photogal-img').click(function () {
		$.dwbox.load($('.im-photogal-img-slider a'), $('.im-photogal-img-active').attr('href'));		
	});		*/
	
	$host = $('[mag-thumb="inner"]');
	$host.mag({			
		toggle: false,
		position: 'drag',		
	});
	
	$controls = $('[mag-ctrl="controls"]');
	$controls.magCtrl({
		mag: $host
	});
	/* -- */	
	
});

$(window).on('load', function () {

	/* Exhibition Photogallery 
	/* -------------------------------------------------------------------------- */
	$('.im-photogal-img-slider').photogallery();

}); //END load

/* jQuery Validator Settings
/* -------------------------------------------------------------------------- */

$.validator.setDefaults({
	errorClass: "im-field-error-invalid",
	validClass: "im-field-valid",
	errorElement: "i",
	//errorPlacement: function(error, element) { },
	messages: {}
});

$.validator.methods.email = function(a, b) {
	return this.optional(b) || /^[0-9a-z\-_\.]+@[0-9a-z\-]+\.[0-9a-z]+$/.test(a)
};

$.validator.methods.phone = function(a, b) {
	return this.optional(b) || /^[0-9\(\)\s\+\-\.,]+$/.test(a)
};

/* Exposition: Gallery
/* -------------------------------------------------------------------------- */

$.fn.gallery = function(options) {

	function Gallery(elem, options) {

		var gal = this;

		gal.defaults = {
			linkSelector: 'a',
			mainImageSelector: '.im-gal-img-main',
			bgImageSelector: '.im-gal-img-bg',
			activeLinkClass: 'im-gal-img-active',
			preloader: '.im-gal-preloader'
		};

		gal.options = $.extend(gal.defaults, options);

		gal.$elem = $(elem);

		gal.$links = gal.$elem.find(gal.options.linkSelector);

		gal.$image = $(gal.options.mainImageSelector);

		gal.$bg = $(gal.options.bgImageSelector);

		gal.$bgLoader = $('<img>');
		
		gal.$preloader = $(gal.options.preloader);

		gal.newPath = "";

		gal.oldPath = "";

		gal.init = function() {
			gal.$preloader.hide();
			gal.bindEvents();
		};

		gal.bindEvents = function() {

			gal.$bgLoader.load(function() {
					
				gal.$bg.attr('src', gal.oldPath).show();
				gal.$image.hide();				
				gal.$image.attr('src', gal.newPath);
								
				$('.mag-zoomed img').attr('src', gal.newPath);				
			});

			gal.$image.load(function() {	

				
				gal.$bg.fadeOut(400);
				gal.$preloader.css('z-index', 1);
				gal.$image.fadeIn(400);
				gal.$preloader.fadeOut(400);		
			});

			gal.$links.click(function() {

				var link = $(this);

				if(link.attr('href') == gal.$image.attr('src'))
					return false;

				gal.newPath = link.attr('href');
				gal.oldPath = gal.$image.attr('src');

				gal.$preloader.show();
				gal.$preloader.css('z-index', 2);
				gal.$bgLoader.attr('src', gal.oldPath);				
				gal.addActiveClass(link);

				return false;
			});
		};

		gal.addActiveClass = function(a) {
			var activeClass = gal.options.activeLinkClass;
			gal.$links.removeClass(activeClass);
			a.addClass(activeClass);
		};

		gal.init();
	}

	return this.each(function() {
		new Gallery(this, options);
	});
};

/* Exhibition Photogallery 
/* -------------------------------------------------------------------------- */
$.fn.photogallery = function (options) {

	function Photogallery(elem, options) {

		var gal = this;

		gal.defaults = {
			linkSelector: 'a',
			mainImageSelector: '.im-photogal-img-main',		
			bgImageSelector: '.im-photogal-img-bg',			
			activeLinkClass: 'im-photogal-img-active',
			preloader: '.im-photogal-preloader',
			btnDefaultSelector: '[mag-ctrl-center-and-default-size]',
			descriptionSelector: '.im-photogal-description-block',
		};

		gal.options = $.extend(gal.defaults, options);

		gal.$elem = $(elem);

		gal.$links = gal.$elem.find(gal.options.linkSelector);

		gal.$image = $(gal.options.mainImageSelector);
		
		gal.$bg = $(gal.options.bgImageSelector);

		gal.$bgLoader = $('<img>');

		gal.$preloader = $(gal.options.preloader);
		
		gal.$descr = $(gal.options.descriptionSelector);

		gal.newPath = "";

		gal.oldPath = "";
		
		gal.descr = "";

		gal.init = function () {
			gal.$preloader.hide();
			gal.bindEvents();
			$(gal.options.btnDefaultSelector).click();
		};

		gal.bindEvents = function () {

			gal.$bgLoader.load(function () {

				gal.$bg.attr('src', gal.oldPath).show();
				gal.$image.hide();
				$(gal.options.btnDefaultSelector).click();
				gal.$image.attr('src', gal.newPath);
				//$('.mag-zoomed img').attr('src', gal.newPath);
			});

			gal.$image.load(function () {

				gal.$bg.fadeOut(400);
				gal.$preloader.css('z-index', 1);				
				
				if (gal.$descr.find('div').text().length > 0)
				{
					gal.$descr.css('z-index', 3);
				}
				
				gal.$image.fadeIn(400);
				gal.$preloader.fadeOut(400);
			});

			gal.$links.click(function () {

				var link = $(this);

				//if (link.attr('data-middle-href') == gal.$image.attr('src'))
				if (link.attr('href') == gal.$image.attr('src'))
					return false;

				//gal.newPath = link.attr('data-middle-href');
				gal.newPath = link.attr('href');
				gal.oldPath = gal.$image.attr('src');

				gal.$preloader.show();
				gal.$preloader.css('z-index', 2);
				
				gal.descr = link.attr('alt');				
				gal.$descr.css('z-index', 1);	
				gal.$descr.find('div').html(gal.descr);
				
				gal.$bgLoader.attr('src', gal.oldPath);
				gal.addActiveClass(link);

				return false;
			});
		};

		gal.addActiveClass = function (a) {
			var activeClass = gal.options.activeLinkClass;
			gal.$links.removeClass(activeClass);
			a.addClass(activeClass);
		};

		gal.init();
	}

	return this.each(function () {
		new Photogallery(this, options);
	});
};

/*$.fn.photogallery = function (options) {

	function Photogallery(elem, options) {

		var gal = this;

		gal.defaults = {
			linkSelector: 'a',
			mainImageSelector: '.im-photogal-img-main',
			bgImageSelector: '.im-photogal-img-bg',
			activeLinkClass: 'im-photogal-img-active',
			preloader: '.im-photogal-preloader'
		};

		gal.options = $.extend(gal.defaults, options);

		gal.$elem = $(elem);

		gal.$links = gal.$elem.find(gal.options.linkSelector);

		gal.$image = $(gal.options.mainImageSelector);

		gal.$bg = $(gal.options.bgImageSelector);

		gal.$bgLoader = $('<img>');

		gal.$preloader = $(gal.options.preloader);

		gal.newPath = "";

		gal.oldPath = "";

		gal.init = function () {
			gal.$preloader.hide();
			gal.bindEvents();
		};

		gal.bindEvents = function () {

			gal.$bgLoader.load(function () {

				gal.$bg.attr('src', gal.oldPath).show();
				gal.$image.hide();
				gal.$image.attr('src', gal.newPath);
				$('.mag-zoomed img').attr('src', gal.newPath);
			});

			gal.$image.load(function () {

				gal.$bg.fadeOut(400);
				gal.$preloader.css('z-index', 1);
				gal.$image.fadeIn(400);
				gal.$preloader.fadeOut(400);
			});

			gal.$links.click(function () {

				var link = $(this);

				//if (link.attr('data-middle-href') == gal.$image.attr('src'))
				if (link.attr('href') == gal.$image.attr('src'))
					return false;

				//gal.newPath = link.attr('data-middle-href');
				gal.newPath = link.attr('href');
				gal.oldPath = gal.$image.attr('src');

				gal.$preloader.show();
				gal.$preloader.css('z-index', 2);
				gal.$bgLoader.attr('src', gal.oldPath);
				gal.addActiveClass(link);

				return false;
			});
		};

		gal.addActiveClass = function (a) {
			var activeClass = gal.options.activeLinkClass;
			gal.$links.removeClass(activeClass);
			a.addClass(activeClass);
		};

		gal.init();
	}

	return this.each(function () {
		new Photogallery(this, options);
	});
};*/
/* -- */