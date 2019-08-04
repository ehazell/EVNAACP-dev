<?php
/**
* The template for displaying comments
*
* The area of the page that contains both current comments
* and the comment form.
*
* @package WordPress
* @subpackage edulite
* @since edulite 
*/

/*
* If the current post is protected by a password and
* the visitor has not yet entered the password we will
* return early without loading the comments.
*/          
	               
	                           
	  if ( post_password_required() ) {
	      return;
	  }
	  ?>
	                          
		<div class="user-comments">
		      <?php if ( have_comments() ) : ?>
		      	<div class="sec-title type-2">
		          
				  <h2 class="comments-title">
						<?php
							$comments_number = get_comments_number();
							if ( 1 === $comments_number ) {
								/* translators: %s: post title */
								printf( esc_html__( 'One thought on &ldquo;%s&rdquo;','edulite' ), get_the_title() );
							} else {					
								printf(
									esc_html(
										/* translators: 1: number of comments, 2: post title */
										_nx( 
											'%1$s thought on &ldquo;%2$s&rdquo;',
											'%1$s thoughts on &ldquo;%2$s&rdquo;',
											$comments_number,
											'comments title',
											'edulite'
										)
									),
									esc_html (number_format_i18n( $comments_number ) ),
									get_the_title()
								);
							}
						?>
					</h2>
				  
				  </div>

		         <?php the_comments_navigation(); ?>

		         <ul>
		              <?php
		                   wp_list_comments( array(
		                       'style'       => 'ul',
		                       'short_ping'  => true,
		                       'avatar_size' => 42		                      
		                  ) );
		              ?>
		          </ul>

		          <?php the_comments_navigation(); ?>

		      <?php endif; ?>

		      <?php
		         if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'edulite' ) ) :
		          ?>
		           <p class="no-comments"><?php esc_html__( 'Comments are closed.', 'edulite' ); ?></p> 
		          <?php endif; ?>
		  
		      
		  </div>    
		 
		<div class="comment-form">
		    <?php
		      comment_form();
		    ?>
		</div>