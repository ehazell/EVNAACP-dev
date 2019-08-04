<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package The WP Business
 */
?>
  <div  id="footer" class="copyright-wrapper">
    <div class="container">        
      <div class="footerinner row">
        <div class="col-lg-3 col-md-3">
          <?php dynamic_sidebar('footer-1');?>
        </div>
        <div class="col-lg-3 col-md-3">
          <?php dynamic_sidebar('footer-2');?>
        </div>
        <div class="col-lg-3 col-md-3">
          <?php dynamic_sidebar('footer-3');?>
        </div>
        <div class="col-lg-3 col-md-3">
          <?php dynamic_sidebar('footer-4');?>
        </div>
      </div>
    </div>
    <div class="inner">
      <div class="copyright text-center">
        <p><?php echo esc_html(get_theme_mod('the_wp_business_footer_copy',__('Copyright 2017','the-wp-business'))); ?> <?php the_wp_business_credit_link(); ?></p>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <?php wp_footer(); ?>
</body>
</html>