<?php
	
$query = new WP_Query(array(
	'post_type' 		=> 'job',
	'orderby'			=> 'date',
	'order'   			=> 'DESC',
));

?><section class="page-content-section related-posts center"><?php
		
	?><div class="wrap"><?php

		if( $query->posts ) {
			
			 if( $content['job_listing_headline'] ) { ?>
			
				<h2 class="related-posts__headline"><?= $content['job_listing_headline'] ?></h2>
				
			<?php } else { ?>
			
				<h2 class="related-posts__headline">Lediga tjänster</h2>
			
			<?php } ?>
			
			<?php
			
			foreach( $query->posts as $post ) {
			
				?>
				
				<div class="related-posts__post transition">
			
					<h3 class="related-posts__post__headline"><?= $post->post_title ?></h3>
					
					<div class="related-posts__post__ingressq"><?= get_field('job_ingress', $post->ID) ?></div>
					
					<a class="call-to-action" href="<?= get_permalink($post->ID) ?>">Läs mer</a>
				
				</div>
				
				<?php
				
			}
			
		} else {
			
			?>
			
			<strong>Det finns inga tillgängliga jobb för tillfället.</strong>
			
			<?php
			
		}

	?></div><?php
	
?></section><?php
