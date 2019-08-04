<?php 
/**
* The header for our theme.
*
* Displays all of the <head> section 
*
* @package density
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head> 
<body <?php body_class(); ?>>

<!-- WRAPPER ALL -->
<div class="density_tm_wrapper_all" data-border="none">
<div class="density_tm_animate_menu"></div>
<div class="density_tm_short_contact_content"></div>
<div class="density_tm_short_contact_triangle"></div>
<div class="density_tm_overlay_window"></div>

<!-- BORDER -->
<div class="density_tm_top_border pattern_border"></div>
<div class="density_tm_left_border pattern_border"></div>
<div class="density_tm_right_border pattern_border"></div>
<!-- /BORDER -->

<div class="wrapper_inner">
<!-- LEFTPART -->
<header class="header_area ">
<div class="header_top ">
	<div class="container">                     
		<ul class="col-4-8 clearfix">
			<?php 
			$density_general_section = get_theme_mod('density_general_section_hideshow' , 'show');
			$density_email = get_theme_mod('density-email' );
			$density_contact = get_theme_mod('density-contact' );
			if ($density_general_section =='show') { 
			?>
			<li>

				<ul class="header_link t1">
					<?php if ($density_email !='') {  ?>
						<li><i class="fa fa-envelope"></i><?php echo esc_html(get_theme_mod('density-email')); ?></li>
					<?php } if ($density_contact !='') { ?>
						<li><i class="fa fa-phone"></i><?php echo esc_html(get_theme_mod('density-contact')); ?></li>
					<?php } ?>
				</ul>
			</li>
			<?php }
			$density_social_section = get_theme_mod('density_social_section_hideshow' , 'show');
			if ($density_social_section =='show') { 
				$density_social_link_1 = get_theme_mod('density_social_link_1');
				$density_social_link_2 = get_theme_mod('density_social_link_2');
				$density_social_link_3 = get_theme_mod('density_social_link_3');
				$density_social_link_4 = get_theme_mod('density_social_link_4');
				$density_social_link_5 = get_theme_mod('density_social_link_5');
			?>
				<li>
					<ul class="header_link">
						<?php
						if (!empty($density_social_link_1)) { 
						?>
							<li>
								<a href="<?php echo esc_url(get_theme_mod('density_social_link_1')); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							</li>
						<?php } 
						if (!empty($density_social_link_2)) { ?>
							<li>
								<a href="<?php echo esc_url(get_theme_mod('density_social_link_2')); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							</li>
						<?php } 
						if (!empty($density_social_link_3)) { 
						?>
							<li>
								<a href="<?php echo esc_url(get_theme_mod('density_social_link_3')); ?>">
									<i class="fa fa-instagram" aria-hidden="true"></i>
								</a>
							</li>
						<?php } 
						if (!empty($density_social_link_4)) { 
						?>
							<li>
								<a href="<?php echo esc_url(get_theme_mod('density_social_link_4')); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i>
								</a>
							</li>
						<?php } 
						if (!empty($density_social_link_5)) { ?>
							<li>
								<a href="<?php echo esc_url(get_theme_mod('density_social_link_5')); ?>">
									<i class="fa fa-linkedin" aria-hidden="true"></i>
								</a>
							</li>
						<?php } ?>
					</ul>
				</li>
			<?php } ?>
		</ul>   
	</div>
</div>
<div class="header_btm clearfix">
	<div class="container">
		<ul class="col-3-9 clearfix">
			<li>
			<?php
			if (has_custom_logo()) {
			?> 
			
				<span><?php the_custom_logo(); ?></span>
			
			<?php }else{ 
			if (display_header_text()==true){ ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-menu t3">
					<?php bloginfo( 'title' ); ?>
					<span><?php bloginfo( 'description' ); ?></span>
				</a>									
			<?php } } ?> 
			</li>
		   
			<li>
				<nav class="main-nav pull-right">
					<?php wp_nav_menu(
						array(
							'container'        => 'ul', 
							'theme_location'    => 'primary', 
							'menu_class'        => '', 
							'items_wrap'        => '<ul class="">%3$s</ul>',
							'fallback_cb'       => 'density_wp_bootstrap_navwalker_preset::fallback',
							'walker'            => new density_wp_bootstrap_navwalker_preset()
						)
					); 
					?>    
				</nav>
			</li>
		</ul>
	</div>
</div>
</header>
<!-- /header -->
<!-- RIGHTPART -->
<div class="main_rightpart pl-0">
<div class="density_tm_mobile_menu_wrap">
	<div class="topbar_wrap">
		<div class="inner_wrap">
			<?php 
			$density_social_section = get_theme_mod('density_social_section_hideshow','show');
			if ($density_social_section =='show') { 
				$density_social_link_1 = get_theme_mod('density_social_link_1');
				$density_social_link_2 = get_theme_mod('density_social_link_2');
				$density_social_link_3 = get_theme_mod('density_social_link_3');
				$density_social_link_4 = get_theme_mod('density_social_link_4');
				$density_social_link_5 = get_theme_mod('density_social_link_5');
			?>
				<div class="social_wrap">
					<ul>
						<?php
						if (!empty($density_social_link_1)) { 
						?>
							<li>
								<a href="<?php echo esc_url(get_theme_mod('density_social_link_1')); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							</li>
						<?php } 
						if (!empty($density_social_link_2)) { ?>
							<li>
								<a href="<?php echo esc_url(get_theme_mod('density_social_link_2')); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							</li>
						<?php } 
						if (!empty($density_social_link_3)) { 
						?>
							<li>
								<a href="<?php echo esc_url(get_theme_mod('density_social_link_3')); ?>">
									<i class="fa fa-instagram" aria-hidden="true"></i>
								</a>
							</li>
						<?php } 
						if (!empty($density_social_link_4)) { 
						?>
							<li>
								<a href="<?php echo esc_url(get_theme_mod('density_social_link_4')); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i>
								</a>
							</li>
						<?php } 
						if (!empty($density_social_link_5)) { ?>
							<li>
								<a href="<?php echo esc_url(get_theme_mod('density_social_link_5')); ?>">
									<i class="fa fa-linkedin" aria-hidden="true"></i>
								</a>
							</li>
						<?php } ?>  
					</ul>
				</div>
			<?php } ?>
		</div>
		<div class="bg"></div>
	</div>
	<div class="hamburger_wrap">
		<div class="logo_wrap mobile">
			<?php
			 if (has_custom_logo()) :
			?> 
				<span><?php the_custom_logo(); ?></span>
			<?php endif;
			if (display_header_text()==true){ ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="site-title"><?php bloginfo( 'title' ); ?></span><br>
					<span class="site-description"><?php bloginfo( 'description' ); ?>
					</span>
				</a>                                    
			<?php } ?>
		</div>
		<div class="trigger_wrap">
			<div class="hamburger hamburger--collapse-r">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- MENU LIST -->
	<div class="menu_list_wrap">
		<?php wp_nav_menu( array
			(
			'menu'              => 'primary',
			'container'        => 'ul', 
			'theme_location'    => 'primary', 
			'menu_class'        => 'menu', 
			'items_wrap'        => '<ul class="nav">%3$s</ul>',
			'fallback_cb'       => 'density_wp_bootstrap_navwalker_mobile::fallback',
			'walker'            => new density_wp_bootstrap_navwalker_mobile()
			)); 
		?>   
	</div>
	<!-- /MENU LIST -->
</div>