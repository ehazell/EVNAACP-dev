<?php
/**
 * Template Part, general post method, used by author, category, date, search and tag pages
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017-2018  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */
$use_lazyload = get_theme_mod( 'canuck_use_lazyload' ) ? true : false;
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			<div class="side-feature-wrap">
				<?php
				if ( ! post_password_required() ) {
					if ( has_post_format( 'audio' ) ) {
						get_template_part( '/template-parts/postformat-parts/postformat', 'audio-feature' );
					} elseif ( has_post_format( 'gallery' ) ) {
						get_template_part( '/template-parts/postformat-parts/postformat', 'gallery-feature' );
					} elseif ( has_post_format( 'image' ) ) {
						get_template_part( '/template-parts/postformat-parts/postformat', 'image-feature' );
					} elseif ( has_post_format( 'quote' ) ) {
						get_template_part( '/template-parts/postformat-parts/postformat', 'quote-feature' );
					} elseif ( has_post_format( 'video' ) ) {
						get_template_part( '/template-parts/postformat-parts/postformat', 'video-feature' );
					} else {
						get_template_part( '/template-parts/postformat-parts/postformat', 'standard-feature' );
					}
				} else {
					$background_image_url = get_template_directory_uri() . '/images/password800.jpg';// WPCS: XSS ok.
					if ( true === $use_lazyload ) {
						?>
						<img class="lazyload"
							src="<?php echo get_template_directory_uri() . '/images/placeholder15.png';// WPCS: XSS ok. ?>"
							data-src="<?php echo esc_url( $background_image_url ); ?>"
							alt="<?php esc_attr_e( 'password required', 'canuck' ); ?>">
						<?php
					} else {
						?>
						<img src="<?php echo esc_url( $background_image_url ); ?>" alt="<?php esc_attr_e( 'password required', 'canuck' ); ?>">
						<?php
					}
				}
				?>
			</div>
			<div class="post-wrap-sf">
				<div class="post-overlay-sf">
					<div class="post-header-sf">
						<h2 class="post-title entry-title">
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h2>
					</div>
					<div class="post-content-sf entry-content">
						<?php
						if ( ! post_password_required() ) {
							if ( has_post_format( 'audio' ) ) {
								?>
								<div class="post-content-tf entry-content">
									<?php
									if ( has_excerpt() ) {
										the_excerpt();
										printf( '<div class="read-more-wrap"><a class="read-more" href="%1$s">%2$s</a></div>',
											esc_url( get_permalink( get_the_ID() ) ),
											esc_html__( 'Read More', 'canuck' )
										);
									} else {
										the_excerpt();
									}
									?>
								</div>
								<?php
							} elseif ( has_post_format( 'quote' ) ) {
								if ( has_excerpt() ) {
									the_excerpt();
									printf( '<div class="read-more-wrap"><a class="read-more" href="%1$s">%2$s</a></div>',
										esc_url( get_permalink( get_the_ID() ) ),
										esc_html__( 'Read More', 'canuck' )
									);
								} else {
									$trim_words      = get_theme_mod( 'canuck_excerpt_length', 30 );
									$more            = '&hellip;<div class="read-more-wrap"><a class="read-more" href="' . esc_url( get_permalink() ) . '">' . __( 'Read More', 'canuck' ) . '</a></div>';
									$content         = get_the_content();
									$content         = canuck_strip_extracted_quote( $content );
									$content_trimmed = wp_trim_words( $content, $trim_words, $more );
									$excerpt         = apply_filters( 'the_excerpt', $content_trimmed );
									echo wp_kses_post( $excerpt );
								}
							} else {
								if ( has_excerpt() ) {
									the_excerpt();
									printf( '<div class="read-more-wrap"><a class="read-more" href="%1$s">%2$s</a></div>',
										esc_url( get_permalink( get_the_ID() ) ),
										esc_html__( 'Read More', 'canuck' )
									);
								} else {
									the_excerpt();
								}
							}// End if().
							canuck_post_meta_pages();
						} else {
							echo get_the_password_form(); // XSS OK.
						}// End if().
						?>
					</div>
				</div>
			</div>
			<div class="post-meta-sf">
				<?php canuck_post_meta_full(); ?>
			</div>
		</article>
		<div class="clearfix"></div>
		<?php
	}// End if().
} else {
	get_template_part( '/template-parts/partials', 'post-or-page-not-found' );
}// End if().

