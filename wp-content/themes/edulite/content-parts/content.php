<div class="inner-box">
    <div class="image">
        <a href="<?php the_permalink(); ?>">
         <?php if(has_post_thumbnail()) : the_post_thumbnail();
           endif; 
          ?>  
      </a>
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
        </ul>
        <h3>
            <a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a>
        </h3>
       <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="theme-btn btn-style-one"><?php echo esc_html__( 'Read More', 'edulite' ); ?></a>
    </div>
</div>