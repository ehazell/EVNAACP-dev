(function($) {
	
	"use strict";
	
	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(200).fadeOut(500);
		}
	}
		//Update Header Style and Scroll to Top
		function headerStyle() {
			if($('.main-header').length){
				var windowpos = $(window).scrollTop();
				var siteHeader = $('.main-header');
				var scrollLink = $('.scroll-to-top');
				if (windowpos >= 250) {
					siteHeader.addClass('fixed-header');
					scrollLink.fadeIn(300);
				} else {
					siteHeader.removeClass('fixed-header');
					scrollLink.fadeOut(300);
				}
			}
		}
		
		headerStyle();
	
	//Submenu Dropdown Toggle
	if($('.main-header .navigation li.dropdown ul').length){
		$('.main-header .navigation li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
		
		//Dropdown Button
		$('.main-header .navigation li.dropdown .dropdown-btn').on('click', function() {
			$(this).prev('ul').slideToggle(500);
		});
		
		//Disable dropdown parent link
		$('.navigation li.dropdown > a').on('click', function(e) {
			e.preventDefault();
		});
	}
	
	
	  

	  //box-hover
	  if($('.box-hover').length){	  
			var dazBoxHover = function(){
				jQuery('.box-hover').on('mouseenter',function(){
					jQuery('.box-hover').removeClass('active');
					jQuery(this).addClass('active');
					
				})
			}
			dazBoxHover();
		}


	//Fixed Right Top Consultation Form Toggle
	if($('.main-header .outer-box .nav-btn').length){
		//Show Form
		$('.main-header .outer-box .nav-btn').on('click', function(e) {
			e.preventDefault();
			$('body').addClass('appointment-form-visible');
		});
		//Hide Form
		$('.appointment-box .inner-box .cross-icon,.form-back-drop').on('click', function(e) {
			e.preventDefault();
			$('body').removeClass('appointment-form-visible');
		});
	}

if ($('.four-item-carousel').length) {
		$('.four-item-carousel').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 700,
			autoplay: 5000,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:1
				},
				768:{
					items:2
				},
				800:{
					items:2
				},
				960:{
					items:3
				},
				1024:{
					items:3
				}
			}
		});
	}
		
	
	
	
	// Scroll to a Specific Div
		
	$(window).on("scroll", function() {
		if ($(this).scrollTop() > 250) {
			$(".scroll-to-target").fadeIn(200);
		} else {
			$(".scroll-to-target").fadeOut(200);
		}
		});
		$(".scroll-to-target").on("click", function() {
		$("html, body").animate(
			{
			scrollTop: 0
			},
			"slow"
		);
		return false;
		});
		
	
	

/* ==========================================================================
   When document is loaded, do
   ========================================================================== */
	
	$(window).on('load', function() {
		handlePreloader();
	});	

})(window.jQuery);