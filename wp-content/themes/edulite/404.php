<?php
/**
 * Template Name: error
 *
 * @package edulite
 */ 
get_header(); ?>


<section class="error-section">
            <div class="container">
                <div class="content">
                    <h1><?php echo esc_html__( '404', 'edulite' ); ?></h1>
                    <h2><?php echo esc_html__( 'Nothig Found', 'edulite' ); ?></h2>
                    <div class="text"><?php echo esc_html__( 'Sorry, but the page you are looking for does not existing
                       ', 'edulite' ); ?></div>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn btn-style-one"><?php echo esc_html__( 'Back To Home
                      ', 'edulite' ); ?></a>
                </div>
            </div>
        </section>


	<?php get_footer(); ?>