<?php
/**
 * The template part for displaying post
 *
 * @package The WP Business
 * @subpackage the_wp_business
 * @since The WP Business 1.0
 */
?>
<div class="postbox smallpostimage">
  <div class="hovereffect">
      <?php the_post_thumbnail(); ?>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-lg-2 col-md-2 ">
      <div class="datebox">
        <div class="date-monthwrap">
          <span class="date-month"><?php echo esc_html( get_the_date( 'M' ) ); ?></span>
          <span class="date-day"><?php echo esc_html( get_the_date( 'd') ); ?></span>
        </div>
        <div class="yearwrap">
          <span class="date-year"><?php echo esc_html( get_the_date( 'Y' ) ); ?></span>
        </div>
      </div>
    </div>
    <div class="col-lg-10 col-md-10 ">
      <h4><?php the_title();?></h4>           
      <p><?php the_excerpt(); ?></p>
      <div class="metabox">
        <i class="fa fa-calendar" aria-hidden="true"></i><?php the_date(); ?>
        <i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?>
        <i class="fas fa-comments"></i><?php comments_number( __('0 Comments','the-wp-business'), __('0 Comments','the-wp-business'), __('% Comments','the-wp-business') ); ?>
      </div>
      <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Read Full', 'the-wp-business' ); ?>"><?php esc_html_e('Read Full','the-wp-business'); ?></a>
    </div>
    <div class="clearfix"></div>
  </div>
</div>