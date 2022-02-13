<main>



		<?php
		while (have_posts()) :the_post();?>

 		<?php 	the_post_thumbnail('medium'); ?>
		
							
		<?php  	the_content(); ?>
		
				
		<?php endwhile; ?>
		
</main>

<hr>