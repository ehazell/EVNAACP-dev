<div class="inner-box">
    <div class="image">
        <?php if(has_post_thumbnail()) : the_post_thumbnail();
           endif; 
          ?> 
     </div>
      <div class="lower-content">
          <ul class="post-info">
              <li>
                  <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html__('By','edulite'); ?> : <?php the_author(); ?></a>
              </li>
              <li><?php echo get_the_date(); ?></li>
              
             <li>
                 <?php comments_number( __('Comments : 0', 'edulite'), __('Comments : 1', 'edulite'), __('Comments :  %', 'edulite') ); ?>
              </li>
                 <?php if (has_tag()) : ?>
                <li>
                <?php echo esc_html__('Tags :', 'edulite' ); ?><?php the_tags('&nbsp;'); ?>   
                 </li>
                <?php endif; ?>
          </ul>
            <h3><?php the_title_attribute(); ?></h3>
             <div class="text">     
                 <?php the_content(); ?>
                  <?php
                   wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__('Pages: ', 'edulite' ),
                    'after'  => '</div>',
                    ) );
                  ?>    
            </div>
      </div>
</div>
<?php 
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif; 
?> 