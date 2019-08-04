<?php
//about theme info
add_action( 'admin_menu', 'the_wp_business_gettingstarted' );
function the_wp_business_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'the-wp-business'), esc_html__('Get Started', 'the-wp-business'), 'edit_theme_options', 'the_wp_business_guide', 'the_wp_business_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function the_wp_business_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'the_wp_business_admin_theme_style');

//guidline for about theme
function the_wp_business_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'the-wp-business' );
?>
<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to The WP Business WordPress Theme', 'the-wp-business' ); ?></h3>
		</div>
		<div class="color_bg_blue">
			<p>Version: <?php echo esc_html($theme['Version']);?></p>
				<p class="intro_version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'the-wp-business' ); ?></p>
				<div class="blink">
					<h4><?php esc_html_e( 'Theme Created By Themesglance', 'the-wp-business' ); ?></h4>
				</div>
			<div class="intro-text"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/themesglance-logo.png" alt="" /></div>
			<div class="coupon-code"><?php esc_html_e( 'Get', 'the-wp-business' ); ?> <span><?php esc_html_e( '20% off', 'the-wp-business' ); ?></span> <?php esc_html_e( 'on Premium Theme with the discount code: ', 'the-wp-business' ); ?> <span><?php esc_html_e( '" Get20 "', 'the-wp-business' ); ?></span></div>
		</div>
		<div class="started">
			<h3><?php esc_html_e( 'Lite Theme Info', 'the-wp-business' ); ?></h3>
			<p><?php esc_html_e( 'The WP Business WordPress Theme is a highly customizable, mobile-friendly and user-friendly theme created precisely for business enterprises, business portfolios, non-profit organizations, personal, commercial, health, construction, corporate businesses, digital agency, product showcase, portfolio, consultants, bloggers and freelancers. Its helpful to create corporate identity of multiple industries like hotels, tours, hospitals, and even shop stores. This elegant and stylish business WordPress theme is cross browser compatible and suits the latest WordPress version. It is made completely using secure and clean code due to which even a non-coder finds it extremely easy to use. It is SEO friendly making your website found on search engines. You can even spread your site on social media platforms. Its built on Bootstrap. It offers various personalization options. Moreover, this beautiful and professional The WP Business WordPress Theme is free. The testimonial section tells clients reviews and the banner has Call to Action Button (CTA) directing the visitor to another page. The customization becomes very easy because of optimized codes. Some shortcodes are there to create new sections. You can engage the audience because of the multipurpose nature and fast page loading time. So, grab away this stunning and interactive The WP Business WordPress theme now.', 'the-wp-business')?></p>
			<hr>
			<h3><?php esc_html_e( 'Help Docs', 'the-wp-business' ); ?></h3>
			<ul>
				<p><?php esc_html_e( 'The WP Business', 'the-wp-business' ); ?> <a href="<?php echo esc_url( THE_WP_BUSINESS_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'the-wp-business' ); ?></a></p>
			</ul>
			<hr>
			<h3><?php esc_html_e( 'Get started with Business Theme', 'the-wp-business' ); ?></h3>
			<div class="col-left-inner"> 
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>		
			<div class="col-right-inner">
				<p><?php esc_html_e( 'Go to', 'the-wp-business' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'the-wp-business' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'the-wp-business' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Easily customizable ', 'the-wp-business' ); ?> </li>
					<li><?php esc_html_e( 'Absolutely free', 'the-wp-business' ); ?> </li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'the-wp-business'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/responsive-tg.png" alt="" />
			<hr class="firsthr">
			<a href="<?php echo esc_url( THE_WP_BUSINESS_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'the-wp-business'); ?></a>
			<a href="<?php echo esc_url( THE_WP_BUSINESS_PRO_THEME_URL ); ?>"><?php esc_html_e('Buy Pro', 'the-wp-business'); ?></a>
			<a href="<?php echo esc_url( THE_WP_BUSINESS_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'the-wp-business'); ?></a>
			<hr class="secondhr">
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'the-wp-business'); ?></h3>
		<ul>
		 	<li><?php esc_html_e( 'Theme options using customizer API', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Inbuilt BMI Calculator', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Responsive Design', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Advanced Color Options and Color Pallets', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( '100+ Font Family Options', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'RTL & Translation Ready', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Support to Add Custom CSS/JS', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'SEO Friendly', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Pagination Option', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Footer Customization Options', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Fully Integrated with Font Awesome Icon', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Short Codes', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Woo Commerce Compatible', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Multiple Inner Page Templates', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Customizable Home Page', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Advance Social Media Feature', 'the-wp-business'); ?></li>
		 	<li><?php esc_html_e( 'Left and Right Sidebar', 'the-wp-business'); ?></li>
		</ul>
	</div>
	<div class="service">
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-media-document"></span> <?php esc_html_e('Get Support', 'the-wp-business'); ?></h3>
			<ol>
				<li>
				<a href="<?php echo esc_url( THE_WP_BUSINESS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'the-wp-business'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-welcome-widgets-menus"></span> <?php esc_html_e('Getting Started', 'the-wp-business'); ?></h3>
			<ol>
				<li> <?php esc_html_e('Start', 'the-wp-business'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'the-wp-business'); ?></a> <?php esc_html_e('your website.', 'the-wp-business'); ?></li>
			</ol>
		</div>
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e('Rate This Theme', 'the-wp-business'); ?></h3>
			<ol>
				<li>
					<a href="<?php echo esc_url( THE_WP_BUSINESS_REVIEW ); ?>" target="_blank"><?php esc_html_e('Rate it here', 'the-wp-business'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-editor-help"></span> <?php esc_html_e( 'Help Docs', 'the-wp-business' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'The WP Business Lite', 'the-wp-business' ); ?> <a href="<?php echo esc_url( THE_WP_BUSINESS_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'the-wp-business' ); ?></a></li>
			</ol>
		</div>
	</div>
</div>
<?php } ?>