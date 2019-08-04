<?php
/**
 * The header for our theme 
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'fitness-gymhouse' ) ); ?>">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<?php if( get_theme_mod( 'fitness_gymhouse_contact','' ) != '' || get_theme_mod( 'fitness_gymhouse_email','' ) != '' || get_theme_mod( 'fitness_gymhouse_timming','' ) != '') { ?>
		<div class="top-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 call">
						<?php if( get_theme_mod( 'fitness_gymhouse_contact','' ) != '') { ?>
				            <span><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('fitness_gymhouse_contact','' )); ?></span>
			            <?php } ?>
					</div>
					<div class="col-lg-4 col-md-4 email">
						<?php if( get_theme_mod( 'fitness_gymhouse_email','' ) != '') { ?>
				            <span><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('fitness_gymhouse_email','' )); ?></span>
			            <?php } ?>
					</div>
					<div class="col-lg-4 col-md-4 time">
						<?php if( get_theme_mod( 'fitness_gymhouse_timming','' ) != '') { ?>
				            <span><i class="fa fa-clock" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('fitness_gymhouse_timming','' )); ?></span>
			            <?php } ?>
					</div>
				</div>
			</div>
		</div>	
	<?php }?>
	<header id="masthead" class="site-header" role="banner">
		
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="logo">
				      	<?php if( has_custom_logo() ){ the_custom_logo();
				         }else{ ?>
				        	<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				        	<?php $description = get_bloginfo( 'description', 'display' );
				        	if ( $description || is_customize_preview() ) : ?> 
				          	<p class="site-description"><?php echo esc_html($description); ?></p>       
				      	<?php endif; }?>       
				    </div>
				</div>
				<div class="col-lg-9 col-md-9">
					<?php if ( has_nav_menu( 'top' ) ) : ?>
						<div class="navigation-top">
							<div class="wrap">
								<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'fitness-gymhouse' ); ?>">
									<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
										<?php
											esc_html_e( 'Menu', 'fitness-gymhouse' );
										?>
									</button>

									<?php wp_nav_menu( array(
										'theme_location' => 'top',
										'menu_id'        => 'top-menu',
									) ); ?>
									
								</nav>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>

	<div class="site-content-contain">
		<div id="content" class="site-content">
