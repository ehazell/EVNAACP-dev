<?php
	
	/*---------------------------First highlight color-------------------*/

	$fitness_gymhouse_theme_color_1 = get_theme_mod('fitness_gymhouse_theme_color_1');

	$custom_css = '';

	if($fitness_gymhouse_theme_color_1 != false){
		$custom_css .='.top-header, .slide-button a, .slide-button a, .about-btn a, button, input[type="button"], input[type="submit"],.site-info, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, .next.page-numbers, .main-navigation li li:hover,.main-navigation li li.focus, #sidebox .tagcloud a,.site-footer .tagcloud a{';
			$custom_css .='background-color: '.esc_html($fitness_gymhouse_theme_color_1).';';
		$custom_css .='}';
	}
	if($fitness_gymhouse_theme_color_1 != false){
		$custom_css .='a,.page-numbers, .nav-subtitle{';
			$custom_css .='color: '.esc_html($fitness_gymhouse_theme_color_1).';';
		$custom_css .='}';
	}
	if($fitness_gymhouse_theme_color_1 != false){
		$custom_css .='{';
			$custom_css .='border-color: '.esc_html($fitness_gymhouse_theme_color_1).';';
		$custom_css .='}';
	}
	if($fitness_gymhouse_theme_color_1 != false){
		$custom_css .='{';
			$custom_css .='border-top-color: '.esc_html($fitness_gymhouse_theme_color_1).';';
		$custom_css .='}';
	}

	/*---------------------------Second highlight color-------------------*/

	$fitness_gymhouse_theme_color_2 = get_theme_mod('fitness_gymhouse_theme_color_2');

	if($fitness_gymhouse_theme_color_2 != false){
		$custom_css .='button:hover,button:focus,input[type="button"]:hover,input[type="button"]:focus,input[type="submit"]:hover,input[type="submit"]:focus,.slide-button a:hover,#sidebox .tagcloud a:hover, .site-footer .tagcloud a:hover, .about-btn a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.slide-button a:hover{';
			$custom_css .='background-color: '.esc_html($fitness_gymhouse_theme_color_2).';';
		$custom_css .='}';
	}
	if($fitness_gymhouse_theme_color_2 != false){
		$custom_css .='.page-template-home-custom .navigation-top .current-menu-item > a, .page-template-home-custom .navigation-top .current_page_item > a, .navigation-top .current-menu-item > a,.navigation-top .current_page_item > a,.page-template-home-custom .main-navigation a:hover, .main-navigation a:hover, .nav-subtitle:hover{';
			$custom_css .='color: '.esc_html($fitness_gymhouse_theme_color_2).';';
		$custom_css .='}';
	}
	if($fitness_gymhouse_theme_color_2 != false){
		$custom_css .='.page-template-home-custom .navigation-top .current-menu-item > a, .page-template-home-custom .navigation-top .current_page_item > a,.navigation-top .current-menu-item > a, .navigation-top .current_page_item > a, .main-navigation a:hover, .page-template-home-custom .main-navigation a:hover, .top-header{';
			$custom_css .='border-bottom-color: '.esc_html($fitness_gymhouse_theme_color_2).';';
		$custom_css .='}';
	}