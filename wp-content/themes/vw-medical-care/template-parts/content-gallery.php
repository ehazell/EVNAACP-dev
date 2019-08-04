<?php
/**
 * The template part for displaying post
 *
 * @package VW Medical Care 
 * @subpackage vw_medical_care
 * @since VW Medical Care 1.0
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box">
    <?php
      if ( ! is_single() ) {

        // If not a single post, highlight the gallery.
        if ( get_post_gallery() ) {
          echo '<div class="entry-gallery">';
            echo ( get_post_gallery() );
          echo '</div>';
        };
      };
    ?>
    <div class="new-text">
      <h3 class="section-title"><?php the_title();?></h3>
      <div class="post-info">
        <?php if(get_theme_mod('vw_medical_care_toggle_postdate',true)==1){ ?>
          <span class="entry-date"><?php echo get_the_date(); ?></span><span>|</span>
        <?php } ?>

        <?php if(get_theme_mod('vw_medical_care_toggle_author',true)==1){ ?>
          <span class="entry-author"> <?php the_author(); ?></span><span>|</span>
        <?php } ?>

        <?php if(get_theme_mod('vw_medical_care_toggle_comments',true)==1){ ?>
          <span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-medical-care'), __('0 Comments', 'vw-medical-care'), __('% Comments', 'vw-medical-care') ); ?> </span>
        <?php } ?>
        <hr>
      </div>
      <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_medical_care_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_medical_care_excerpt_number','30')))); ?></p>
      <div class="content-bttn">
        <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'READ MORE', 'vw-medical-care' ); ?><i class="fa fa-angle-right"></i></a>
      </div>
    </div>
  </div>
</div>