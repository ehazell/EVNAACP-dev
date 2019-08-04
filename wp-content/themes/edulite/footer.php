<footer class="main-footer">
    <div class="container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row clearfix">
                <?php dynamic_sidebar('edulite-footer-widget-area'); ?>
            </div>
        </div>

        <!--Footer Bottom-->

        <?php $edulite_footer_section = get_theme_mod('edulite_footer_section_hideshow','show');
		$edulite_footer_title = get_theme_mod('edulite-footer_title');
		if ($edulite_footer_section =='show') { 
		?>
            <div class="footer-bottom clearfix">
                <div class="pull">
                    <?php if( $edulite_footer_title ) : ?>

                        <div class="copyright">
                            <?php echo wp_kses_post( html_entity_decode(esc_html($edulite_footer_title))); ?>
                        </div>

                </div>

                <div class="copyright">
                    <?php else : 
							/* translators: 1: poweredby, 2: link, 3: span tag closed  */
						   printf( esc_html__( ' %1$sPowered by %2$s%3$s', 'edulite' ), '<span>', '<a href="'. esc_url( __( 'https://wordpress.org/', 'edulite' ) ) .'" target="_blank">'.esc_html__('WordPress', 'edulite').'</a>', '</span>' );
						   /* translators: 1: poweredby, 2: link, 3: span tag closed  */
						   printf( esc_html__( ' Theme: edulite  %1$sDesign By : %2$s%3$s', 'edulite' ), '<span>', '<a href="'. esc_url( __( 'http://hubblethemes.com', 'edulite' ) ) .'" target="_blank">'.esc_html__('hubblethemes', 'edulite').'</a>', '</span>' );
						 ?>

                </div>

                <?php endif;  ?>

            </div>
            <?php } ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>