<?php 
// Edit any custom section 
if(have_posts()) : 
	while(have_posts()) : the_post();  
		if(get_the_content()!= "")
		{
		?>
			<!-- RIGHTPART -->
			
				<section class="section-content section-spacing ptb-100">
					<div class="container">
						<?php the_content(); ?> 
					</div> 
				</section>
			
		<?php 
		}	
	endwhile;
endif; ?>