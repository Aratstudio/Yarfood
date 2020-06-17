(function ($) {
    "use strict";




/*--
    Menu Sticky
-----------------------------------*/
var windows = $(window);
/*
var screenSize = windows.width();
var sticky = $('.header-sticky1');

windows.on('scroll', function() {
    var scroll = windows.scrollTop();
    if (scroll < 0 || screenSize <= 991) {
        sticky.removeClass('is-sticky');
    }

    else{
        sticky.addClass('is-sticky');
    }
});
*/

/*--
    Mobile Menu
------------------------*/
/*
var mainMenuNav = $('.main-menu nav');
mainMenuNav.meanmenu({
    meanScreenWidth: '991',
    meanMenuContainer: '.mobile-menu',
    meanMenuClose: '<span class="menu-close"></span>',
    meanMenuOpen: '<span class="menu-bar"></span>',
    meanRevealPosition: 'right',
    meanMenuCloseSize: '0',
});
*/

/*--
    Category Menu
------------------------*/
    
/*-- Variables --*/
var categoryToggleWrap = $('.category-toggle-wrap');
var categoryToggle = $('.category-toggle');
var categoryMenu = $('.category-menu');

/*
*  Category Menu Default Close for Mobile & Tablet Device
*  And Open for Desktop Device and Above
*/
function categoryMenuToggle() {
    var screenSize = windows.width();
    if ( screenSize <= 991) {
        categoryMenu.slideUp();
    } else {
        categoryMenu.slideDown();
    }
}

/*-- Category Menu Toggles --*/
function categorySubMenuToggle() {
    var screenSize = windows.width();
    if ( screenSize <= 991) {

        $('.category-menu .menu-item-has-children > a').prepend('<i class="expand menu-expand"></i>');
        $('.category-menu .menu-item-has-children ul').slideUp();
//        $('.category-menu .menu-item-has-children i').on('click', function(e){
//            e.preventDefault();
//            $(this).toggleClass('expand');
//            $(this).siblings('ul').css('transition', 'none').slideToggle();
//        })
    } else {
        $('.category-menu .menu-item-has-children > a i').remove();
        $('.category-menu .menu-item-has-children ul').slideDown();
    }
}
categoryMenuToggle();
windows.resize(categoryMenuToggle);
categorySubMenuToggle();
windows.resize(categorySubMenuToggle);

categoryToggle.on('click', function(){
    categoryMenu.slideToggle();
});
    
/*-- Category Sub Menu --*/
$('.category-menu').on('click', 'li a, li a .menu-expand', function(e) {
    var $a = $(this).hasClass('menu-expand') ? $(this).parent() : $(this);
    if ($a.parent().hasClass('menu-item-has-children')) {
        if ($a.attr('href') === '#' || $(this).hasClass('menu-expand')) {
            if ($a.siblings('ul:visible').length > 0) $a.siblings('ul').slideUp();
            else {
                $(this).parents('li').siblings('li').find('ul:visible').slideUp();
                $a.siblings('ul').slideDown();
            }
        }
    }
    if ($(this).hasClass('menu-expand') || $a.attr('href') === '#') {
        e.preventDefault();
        return false;
    }
});

/*-- Sidebar Category --*/
var categoryChildren = $('.sidebar-category li .children');
    
    categoryChildren.slideUp();
    categoryChildren.parents('li').addClass('has-children');
    
$('.sidebar-category').on('click', 'li.has-children > a', function(e) {
    
    if ($(this).parent().hasClass('has-children')) {
        if ($(this).siblings('ul:visible').length > 0) $(this).siblings('ul').slideUp();
        else {
            $(this).parents('li').siblings('li').find('ul:visible').slideUp();
            $(this).siblings('ul').slideDown();
        }
    }
    if ($(this).attr('href') === '#') {
        e.preventDefault();
        return false;
    }
});

/*--
    Header Search
------------------------*/
var searchToggle = $('.search-toggle');
var searchContainer = $('.header-search-container');

searchToggle.on('click', function(){
    
    if( !$(this).hasClass('active') ) {
        $(this).addClass('active').find('i').removeClass('icofont-search-alt-1').addClass('icofont-close');
        searchContainer.slideDown();
    } else {
        $(this).removeClass('active').find('i').removeClass('icofont-close').addClass('icofont-search-alt-1');
        searchContainer.slideUp();
    }
    
});
/*--
    Header Cart
------------------------*/

var headerCart = $('.header-cart');
var closeCart = $('.close-cart, .cart-overlay');
var miniCartWrap = $('.mini-cart-wrap');

headerCart.on('click', function(e){
    e.preventDefault();
    $('.cart-overlay').addClass('visible');
    miniCartWrap.addClass('open');
});

closeCart.on('click', function(e){
    e.preventDefault();
    $('.cart-overlay').removeClass('visible');
    miniCartWrap.removeClass('open');
});

/*--
    Hero Slider
--------------------------------------------*/
var heroSlider = $('.hero-slider');
heroSlider.slick({
    arrows: true,
    autoplay: true,
    autoplaySpeed: 7000,
    dots: true,
    pauseOnFocus: false,
    pauseOnHover: false,
    fade: true,
    infinite: true,
    slidesToShow: 1,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-long-arrow-right"></i></button>',
});
    
/*--
	Product Slider
-----------------------------------*/
$('.product-slider-4').slick({
    arrows: true,
    dots: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 4,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-long-arrow-right"></i></button>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                autoplay: true,
                slidesToShow: 1
            }
        }
    ]
});
    
$('.product-slider-4-full').slick({
    arrows: true,
    dots: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 4,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-long-arrow-right"></i></button>',
    responsive: [
        {
            breakpoint: 1499,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                autoplay: true,
                slidesToShow: 1,
                arrows: false,
            }
        }
    ]
});
    
$('.product-slider-3').slick({
    arrows: true,
    dots: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 3,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-long-arrow-right"></i></button>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                autoplay: true,
                slidesToShow: 1,
                arrows: true,
            }
        }
    ]
});
    
/*-- Single Product Big Image Slider --*/
$('.big-image-slider').slick({
    arrows: false,
    dots: true,
    slidesToShow: 1,
});
    
/*----- 
	Team Slider
--------------------------------*/
$('.team-slider-5').slick({
    arrows: true,
    dots: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 4,
    prevArrow: '<button type="button" class="slick-prev"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="icofont icofont-long-arrow-right"></i></button>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 767,
            settings: {
                autoplay: true,
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 479,
            settings: {
                autoplay: true,
                slidesToShow: 1,
            }
        }
    ]
});
    
/*----- 
	Testimonial Slider
--------------------------------*/
$('.testimonial-slider').slick({
    arrows: true,
    dots: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 1,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
});

$('.testimonial-slider-2').slick({
    arrows: false,
    dots: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 2,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 767,
            settings: {
                autoplay: true,
                slidesToShow: 1,
            }
        }
    ]
});
    
/*-- Image Slider For Sync with Content Slider --*/
$('.testimonial-image-slider').slick({
    arrows: false,
    dots: false,
    autoplay: false,
    infinite: true,
    asNavFor: '.testimonial-content-slider',
    slidesToShow: 3,
    centerMode: true,
    centerPadding: '0',
    focusOnSelect: true,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
});

/*-- Content Slider For Sync with Image Slider --*/
$('.testimonial-content-slider').slick({
    arrows: false,
    dots: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 1,
    asNavFor: '.testimonial-image-slider',
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
});

/*--
	Brand Slider
-----------------------------------*/
$('.brand-slider').slick({
    arrows: true,
    dots: false,
    autoplay: false,
    infinite: false,
    slidesToShow: 5,
    prevArrow: '<button type="button" class="slick-prev slick-arrow"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next slick-arrow"><i class="icofont icofont-long-arrow-right"></i></button>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 5,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 479,
            settings: {
                slidesToShow: 2,
            }
        }
    ]
});

$('.news-slider').slick({
    arrows: true,
    dots: false,
    autoplay: false,
    infinite: false,
    slidesToShow: 5,
    prevArrow: '<button type="button" class="slick-prev slick-arrow"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next slick-arrow"><i class="icofont icofont-long-arrow-right"></i></button>',
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 5,
            }
        },
        {
            breakpoint: 990,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 800,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 479,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});
    
/*--
    Product View Mode
------------------------*/
/*$('.product-view-mode a').on('click', function(e){
    e.preventDefault();
    
    var shopProductWrap = $('.shop-product-wrap');
    var viewMode = $(this).data('target');
    
    $('.product-view-mode a').removeClass('active');
    $(this).addClass('active');
    shopProductWrap.removeClass('grid list').addClass(viewMode);
})*/

/*--
    Product Tab Filter Select Style For Mobile
--------------------------------------------*/
function productTabFilterInit() {
    var productTabFilter = $('.product-tab-filter');
    
    productTabFilter.each(function(){
        var filterToggle = $(this).find('.product-tab-filter-toggle');
        var filterToggleCatElement = $(this).find('.product-tab-filter-toggle span');
        var filterList = $(this).find('.product-tab-list');
        var filterListItem = $(this).find('.product-tab-list li a');
        
        var filterCatText =  filterList.find('.active').text();
        
        filterToggleCatElement.text(filterCatText);
        
        /*-- Open Filter Tab List --*/
        filterToggle.on('click', function(){
            $(this).siblings('.product-tab-list').slideToggle();
        });
        
        /*-- Close Filter Tab List On Select a Category --*/
        filterListItem.on('click', function(){
            var screenSize = windows.width();
            var filterCatText= $(this).text();
            filterToggleCatElement.text(filterCatText);
            
            if ( screenSize < 767) {
                filterList.slideToggle();
            }
            
        });
        
    });
    
}
productTabFilterInit();
    
/*-- Product Tab Filter Show Hide For Mobile & Desktop --*/
function productTabFilterScreen() {
    var screenSize = windows.width();
    var filterList = $('.product-tab-list');
    
    if ( screenSize < 767) {
        filterList.slideUp();
    } else {
        filterList.slideDown();
    }
}
productTabFilterScreen();
windows.resize(productTabFilterScreen);
    
/*--
	Add To Cart Animation
------------------------*/
$('.add-to-cart').on('click', function(e){
    e.preventDefault();
    
    if($(this).hasClass('added')){
       $(this).removeClass('added').find('i').removeClass('ti-check').addClass('ti-shopping-cart').siblings('span').text('в корзину'); 
    } else{
        $(this).addClass('added').find('i').addClass('ti-check').removeClass('ti-shopping-cart').siblings('span').text('добавлено'); 
    }
});
/*--
	Wishlist & Compare
------------------------*/
$('.wishlist-compare a').on('click', function(e){
    e.preventDefault();
    
    if($(this).hasClass('added')){
       $(this).removeClass('added');
    } else{
        $(this).addClass('added');
    }
});

/*--
	Count Down Timer
------------------------*/
$('[data-countdown]').each(function() {
	var $this = $(this), finalDate = $(this).data('countdown');
	$this.countdown(finalDate, function(event) {
		$this.html(event.strftime('<span class="cdown day"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hours</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Minute</p></span> <span class="cdown second"><span class="time-count">%S</span> <p>Second</p></span>'));
	});
});

/*--
	CLose Popup
-----------------------------------*/
$('.close-popup').on('click', function(){
    $('[data-modal="popup-modal"]').fadeOut('slow');
});

/*--
	Video Popup
-----------------------------------*/
var videoPopup = $('.video-popup');
videoPopup.magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
});
    
/*--
	Image Popup
-----------------------------------*/
var imagePopup = $('.image-popup, .big-image-popup');
imagePopup.magnificPopup({
    type: 'image',
    mainClass: 'mfp-fade',
});
    
/*--
	Gallery Popup
-----------------------------------*/
var galleryPopup = $('.gallery-popup');
galleryPopup.magnificPopup({
    type: 'image',
    mainClass: 'mfp-fade',
    gallery: {
        enabled: true,
    },
});


	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
		
		}
	});


/*--
	Counter UP
-----------------------------------*/
var counter = $('.counter');
counter.counterUp({
    delay: 20,
    time: 3000
});
    
/*--
	MailChimp
-----------------------------------*/
/*
$('#mc-form').ajaxChimp({
	language: 'en',
	callback: mailChimpResponse,
	// ADD YOUR MAILCHIMP URL BELOW HERE!
	url: 'http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef'

});
function mailChimpResponse(resp) {
	
	if (resp.result === 'success') {
		$('.mailchimp-success').html('' + resp.msg).fadeIn(900);
		$('.mailchimp-error').fadeOut(400);
		
	} else if(resp.result === 'error') {
		$('.mailchimp-error').html('' + resp.msg).fadeIn(900);
	}  
}
*/


/*--
    Scroll Up
-----------------------------------*/
$.scrollUp({
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade',
    scrollText: '<i class="icofont icofont-swoosh-up"></i>',
});
    
/*--
    Nice Select
------------------------*/
$('.nice-select').niceSelect()
    
/*--
	Price Range Slider
------------------------*/
$('#price-range').slider({
   range: true,
   min: 0,
   max: 2000,
   values: [ 25, 970 ],
   slide: function( event, ui ) {
	$('#price-amount').val( 'ОТ ' + ui.values[ 0 ] + ' ДО ' + ui.values[ 1 ] + ' руб. ' );
   }
  });
$('#price-amount').val( 'ОТ ' + $('#price-range').slider( 'values', 0 ) +
   ' ДО ' + $('#price-range').slider('values', 1 )  + ' руб. ' ); 

/*--
    Power Range Slider
------------------------*/
$('#power-range').slider({
   range: true,
   min: 0,
   max: 20,
   values: [ 2, 6 ],
   slide: function( event, ui ) {
    $('#power-amount').val( 'ОТ ' + ui.values[ 0 ] + ' ДО ' + ui.values[ 1 ] + ' кВТ ' );
   }
  });
$('#power-amount').val( 'ОТ ' + $('#power-range').slider( 'values', 0 ) +
   ' ДО ' + $('#power-range').slider('values', 1 )  + ' кВТ ' ); 
    
/*----- 
	Quantity
--------------------------------*/
$('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
$('.pro-qty').append('<span class="inc qtybtn">+</span>');
$('.qtybtn').on('click', function() {
	var $button = $(this);
    var oldValue = $button.parent().find('input').val();
	if ($button.hasClass('inc')) {
	  var newVal = parseFloat(oldValue) + 1;
	} else {
	   // Don't allow decrementing below zero
	  if (oldValue > 0) {
		var newVal = parseFloat(oldValue) - 1;
		} else {
		newVal = 0;
	  }
	  }
	$button.parent().find('input').val(newVal);
});  
    
/*----- 
	Shipping Form Toggle
--------------------------------*/ 
$('[data-shipping]').on('click', function(){
    if( $('[data-shipping]:checked').length > 0 ) {
        $('#shipping-form').slideDown();
    } else {
        $('#shipping-form').slideUp();
    }
})
    
/*----- 
	Payment Method Select
--------------------------------*/
$('[name="payment-method"]').on('click', function(){
    
    var $value = $(this).attr('value');

    $('.single-method p').slideUp();
    $('[data-method="'+$value+'"]').slideDown();
    
})
    
/*----- 
	Account Image Upload
--------------------------------*/
$('#account-image-upload').on('change', function () {
  var filename = $(this).val();
  if (/^\s*$/.test(filename)) {
    $(".account-image-label").text("Choose your image"); 
  }
  else {
    $(".account-image-label").text(filename.replace("C:\\fakepath\\", ""));
  }
});

/*----- 
	Change show in GET params in url
--------------------------------*/
$('.product-showing .nice-select li').on('click', function(){
    var select = $(this),
        currentUrl = window.location.href,
        params = window.location.search,
        value = select.data('value');

    if(params.length == 0) {
        document.location.href = currentUrl + '?show=' + value;
    } else {
        var arUrl = window.location.search.split('&');
        var hasShow = false;
        arUrl[0] = arUrl[0].slice(1);
        var arr = [];
        $.each(arUrl,function(i,elem) {
            arr[i] = elem.split('=');
            if(arr[i][0] == 'show') {
                arr[i][1] = value;
                hasShow = true;
            }
        });
        var newUrl = '';
        var arrCount = arr.length - 1;
        $.each(arr,function(i,elem) {
            newUrl = newUrl + elem[0] + '=' + elem[1];
            if(i < arrCount) {
                newUrl = newUrl + '&';
            }
        });
        if(hasShow == false) {
            newUrl = newUrl + '&' + 'show=' + value;
        }
        document.location.href = window.location.pathname + '?' + newUrl;
    }
});
/*----- 
	Change sort in GET params in url
--------------------------------*/
$('.product-short .nice-select li').on('click', function(){
    var select = $(this),
        currentUrl = window.location.href,
        params = window.location.search,
        value = select.data('value');

    if(params.length == 0) {
        document.location.href = currentUrl + '?sort=' + value;
    } else {
        var arUrl = window.location.search.split('&');
        var hasSort = false;
        arUrl[0] = arUrl[0].slice(1);
        var arr = [];
        $.each(arUrl,function(i,elem) {
            arr[i] = elem.split('=');
            if(arr[i][0] == 'sort') {
                arr[i][1] = value;
                hasSort = true;
            }
        });
        var newUrl = '';
        var arrCount = arr.length - 1;
        $.each(arr,function(i,elem) {
            newUrl = newUrl + elem[0] + '=' + elem[1];
            if(i < arrCount) {
                newUrl = newUrl + '&';
            }
        });
        if(hasSort == false) {
            newUrl = newUrl + '&' + 'sort=' + value;
        }
        document.location.href = window.location.pathname + '?' + newUrl;
    }
});    
    
})(jQuery);	



/* SNOW */
/*
var snowmax=20;
var snowcolor=new Array("#AAAACC","#DDDDFF","#CCCCDD","#F3F3F3","#F0FFFF","#FFFFFF","#EFF5FF")
var snowtype=new Array("Arial Black","Arial Narrow","Times","Comic Sans MS");
var snowletter="*";
var sinkspeed=0.4; 
var snowmaxsize=40;
var snowminsize=8;
var snowingzone=1;
  
  
var snow=new Array();
var marginbottom;
var marginright;
var timer;
var i_snow=0;
var x_mv=new Array();
var crds=new Array();
var lftrght=new Array();
var browserinfos=navigator.userAgent;
var ie5=document.all&&document.getElementById&&!browserinfos.match(/Opera/);
var ns6=document.getElementById&&!document.all;
var opera=browserinfos.match(/Opera/);
var browserok=ie5||ns6||opera;
function randommaker(range) {
    rand=Math.floor(range*Math.random());
    return rand;
}
function initsnow() {
    if (ie5 || opera) {
        marginbottom=document.body.clientHeight;
        marginright=document.body.clientWidth;
    }
    else if (ns6) {
        marginbottom=window.innerHeight;
        marginright=window.innerWidth;
    }
    var snowsizerange=snowmaxsize-snowminsize;
    for (i=0;i<=snowmax;i++) {
        crds[i]=0;
        lftrght[i]=Math.random()*15;
        x_mv[i]=0.03+Math.random()/10;
        snow[i]=document.getElementById("s"+i);
        snow[i].style.fontFamily=snowtype[randommaker(snowtype/length)];
        snow[i].size=randommaker(snowsizerange)+snowminsize;
        snow[i].style.fontSize=snow[i].size+"px";
        snow[i].style.color=snowcolor[randommaker(snowcolor.length)];
        snow[i].sink=sinkspeed*snow[i].size/5;
        if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
        if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
        if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
        if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
        snow[i].posy=randommaker(2*marginbottom-marginbottom-2*snow[i].size);
        snow[i].style.left=snow[i].posx+"px";
        snow[i].style.top=snow[i].posy+"px";
    }
    movesnow();
}
function movesnow() {
    for(i=0;i<=snowmax;i++) {
        crds[i]+=x_mv[i];
        snow[i].posy+=snow[i].sink;
        snow[i].style.left=snow[i].posx+lftrght[i]*Math.sin(crds[i])+"px";
        snow[i].style.top=snow[i].posy+"px";
        if (snow[i].posy>=marginbottom-2*snow[i].size || parseInt(snow[i].style.left)>(marginright-3*lftrght[i])) {
            if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
            if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
            if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
            if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
            snow[i].posy=0;
        }
    }
    var timer=setTimeout("movesnow()",50);
}
for (i=0;i<=snowmax;i++) {
    document.write("<span id='s"+i+"' style='position:absolute;top:-"+snowmaxsize+"px;'>"+snowletter+"</span>");
}
if (browserok) {
    window.onload=initsnow;
}


*/

/* ---------------------------------- Slider in --> catalog --> product ---------------------------------- */


let productSliderInCatalog = $('.sliderProduct__inCatalog');
productSliderInCatalog.slick({
    arrows: true,
    autoplay: false,
    dots: false,
    pauseOnFocus: false,
    pauseOnHover: false,
    fade: true,
    infinite: true,
    slidesToShow: 1,
    prevArrow: '<button type="button" class="slick-prev position-left"><i class="icofont icofont-long-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next position-right"><i class="icofont icofont-long-arrow-right"></i></button>',
});


