<?php

add_action( 'admin_menu', 'fitness_gymhouse_gettingstarted' );
function fitness_gymhouse_gettingstarted() {
	add_theme_page( esc_html__('About Theme', 'fitness-gymhouse'), esc_html__('About Theme', 'fitness-gymhouse'), 'edit_theme_options', 'fitness-gymhouse-guide-page', 'fitness_gymhouse_guide');   
}

function fitness_gymhouse_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/dashboard/get_started_info.css');
   wp_enqueue_script('tabs', get_template_directory_uri() . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'fitness_gymhouse_admin_theme_style');

function fitness_gymhouse_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<p><img src="<?php echo esc_url( get_template_directory_uri() .'/inc/dashboard/media/logo.png' ); ?>" width="200"></p>
			<h2><?php esc_html_e( 'Thanks for installing Fitness Gymhouse Lite Theme', 'fitness-gymhouse' ) ?> </h2>
			<p><?php esc_html_e( "Please Click on the link below to know the theme setup information", 'fitness-gymhouse' ) ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=fitness-gymhouse-guide-page' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Get Started ', 'fitness-gymhouse' ); ?></a></p>
		</div>
	</div>
	<?php }
}
add_action('admin_notices', 'fitness_gymhouse_notice');


/**
 * Theme Info Page
 */
function fitness_gymhouse_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'fitness-gymhouse' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
				<div class="intro">
					<div class="pad-box">
						<h2 align="center"><?php esc_html_e( 'Welcome to Fitness Gymhouse Theme', 'fitness-gymhouse' ); ?>
						<span class="version" align="center">Version: <?php echo esc_html($theme['Version']);?></span></h2>	
						</span>
						<div class="powered-by">
							<p align="center"><strong><?php esc_html_e( 'Theme created by ThemesEye', 'fitness-gymhouse' ); ?></strong></p>
							<p align="center">
								<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/logo.png'); ?>"/>
							</p>
						</div>
					</div>
				</div>

			<div class="tab">
			  <button class="tablinks" onclick="openCity(event, 'lite_theme')">Getting Started</button>		  
			  <button class="tablinks" onclick="openCity(event, 'pro_theme')">Get Premium</button>
			</div>

			<!-- Tab content -->
			<div id="lite_theme" class="tabcontent open">
				<h2 class="tg-docs-section intruction-title" id="section-4" align="center"><?php esc_html_e( '1). Fitness Gymhouse Lite Theme', 'fitness-gymhouse' ); ?></h2>
				<div class="row">
					<div class="col-md-5">
						<div class="pad-box">
	              			<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/screenshot.png'); ?>"/>
	              		 </div> 
					</div>
					<div class="theme-instruction-block col-md-7">
						<div class="pad-box">
		                    <p><?php esc_html_e( 'Fitness Gymhouse Theme is an exceptional WordPress theme which best suits for gym, fitness center, yoga center. This theme offers various personalization options to help you give a look you require on your website. It very easy to navigate and fits various screen sizes. You can showcase full-width images, call to action buttons(CTA), sections such as testimonial section to lure as many customers as possible. Furthermore, the social media integration will help you gain exposure in every nook and corner. Its an entirely SEO friendly theme that offers faster page load time and high performance. The theme has few shortcodes and numerous customizable options to fill your website with your colors. It emphasizes on the high-quality banner image that is impressive enough to attract any visitor the moment they visit your website. Built up of optimized, secure and clean codes, It is well worth your purchase. Its Bootstrap base aids web development by enabling multiple features and functionalities on the theme.', 'fitness-gymhouse' ); ?></p>
							<ol>
								<li><?php esc_html_e( 'Start','fitness-gymhouse'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','fitness-gymhouse'); ?></a> <?php esc_html_e( 'your website.','fitness-gymhouse'); ?> </li>
								<li><?php esc_html_e( 'Fitness Gymhouse','fitness-gymhouse'); ?> <a target="_blank" href="<?php echo esc_url( FITNESS_GYMHOUSE_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation','fitness-gymhouse'); ?></a> </li>
							</ol>
	                    </div>
	                </div>
				</div><br><br>
				
	        </div>
	        <div id="pro_theme" class="tabcontent">
				<h2 class="dashboard-install-title" align="center"><?php esc_html_e( '2.) Premium Theme Information.','fitness-gymhouse'); ?></h2>
            	<div class="row">
					<div class="col-md-7">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive.png'); ?>" alt="">
						<div class="pro-links" >
					    	<a href="<?php echo esc_url( FITNESS_GYMHOUSE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'fitness-gymhouse'); ?></a>
							<a href="<?php echo esc_url( FITNESS_GYMHOUSE_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'fitness-gymhouse'); ?></a>
							<a href="<?php echo esc_url( FITNESS_GYMHOUSE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'fitness-gymhouse'); ?></a>
						</div>
						<div class="pad-box">
							<h3><?php esc_html_e( 'Pro Theme Description','fitness-gymhouse'); ?></h3>
                    		<p class="pad-box-p"><?php esc_html_e( 'Fitness Gymhouse Theme is an exceptional WordPress theme which best suits for gym, fitness center, yoga center. This theme offers various personalization options to help you give a look you require on your website. It very easy to navigate and fits various screen sizes. You can showcase full-width images, call to action buttons(CTA), sections such as testimonial section to lure as many customers as possible. Furthermore, the social media integration will help you gain exposure in every nook and corner. Its an entirely SEO friendly theme that offers faster page load time and high performance. The theme has few shortcodes and numerous customizable options to fill your website with your colors.It emphasizes on the high-quality banner image that is impressive enough to attract any visitor the moment they visit your website. Built up of optimized, secure and clean codes, It is well worth your purchase. Its Bootstrap base aids web development by enabling multiple features and functionalities on the theme.', 'fitness-gymhouse' ); ?><p>
                    	</div>
					</div>
					<div class="col-md-5 install-plugin-right">
						<div class="pad-box">								
							<h3><?php esc_html_e( 'Pro Theme Features','fitness-gymhouse'); ?></h3>
							<div class="dashboard-install-benefit">
								<ul>
									<li><?php esc_html_e( 'Easy install 10 minute setup Themes','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Multiplue Domain Usage','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Premium Technical Support','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'FREE Shortcodes','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Multiple page templates','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Google Font Integration','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Customizable Colors','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Theme customizer ','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Documention','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Unlimited Color Option','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Plugin Compatible','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Social Media Integration','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Incredible Support','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Eye Appealing Design','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Simple To Install','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Fully Responsive ','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Translation Ready','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'Custom Page Templates ','fitness-gymhouse'); ?></li>
									<li><?php esc_html_e( 'WooCommerce Integration','fitness-gymhouse'); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
          	<div class="dashboard__blocks">
				<div class="row">
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Get Support','fitness-gymhouse'); ?></h3>
						<ol>
							<li><a target="_blank" href="<?php echo esc_url( FITNESS_GYMHOUSE_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','fitness-gymhouse'); ?></a></li>
							<li><a target="_blank" href="<?php echo esc_url( FITNESS_GYMHOUSE_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','fitness-gymhouse'); ?></a></li>
						</ol>
					</div>

					<div class="col-md-3">
						<h3><?php esc_html_e( 'Getting Started','fitness-gymhouse'); ?></h3>
						<ol>
							<li><?php esc_html_e( 'Start','fitness-gymhouse'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','fitness-gymhouse'); ?></a> <?php esc_html_e( 'your website.','fitness-gymhouse'); ?> </li>
						</ol>
					</div>
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Buy Premium','fitness-gymhouse'); ?></h3>
						<ol>
							<a href="<?php echo esc_url( FITNESS_GYMHOUSE_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'fitness-gymhouse'); ?></a>
						</ol>
					</div>
				</div>
			</div>
		</div>
		
	</div>

<?php
}?>