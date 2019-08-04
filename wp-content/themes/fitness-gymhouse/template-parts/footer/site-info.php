<?php
/**
 * Displays footer site info
 */

?>

<div class="site-info">
	<div class="container">
		<span><?php fitness_gymhouse_credit(); ?> <?php echo esc_html(get_theme_mod('fitness_gymhouse_footer_text',__('By ThemesEye','fitness-gymhouse'))); ?></span>
		<span class="footer_text"><?php echo esc_html_e('Powered By WordPress','fitness-gymhouse') ?></span>
	</div>
</div>