<?php
/**
	* The sidebar containing the main widget area
*/

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'fitness-gymhouse' ); ?>">
	<?php dynamic_sidebar('sidebox-1'); ?>
</aside><!-- #secondary -->
