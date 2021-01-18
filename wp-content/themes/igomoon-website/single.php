<?php

remove_action('genesis_loop', 'genesis_do_loop');
	
remove_action('genesis_entry_header', 'genesis_post_info', 12);
remove_action('genesis_entry_header', 'genesis_do_post_title');
remove_action('genesis_entry_content', 'genesis_do_post_content');
remove_action('genesis_entry_footer', 'genesis_post_meta');

add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_after_header', function () {
	
	$feat_img = wp_get_attachment_url( get_post_thumbnail_id() );
	
	?>

	<section class="page-content-section top-image bg-cover no-padding" style="background-image:url(<?= $feat_img ?>);">		
			
		<div class="table">
			
			<div class="table-cell">
		
				<div class="top-image-content wrap center">
				
					<div class="top-image-headline">
						
						<h1><?= the_title() ?></h1>
						
					</div>

				</div>
	
			</div>
			
		</div>
	
	</section>
	
	<?php if( get_field('blog_block') ) { ?>
	
		<section class="page-content-section blog-section">
			
			<div class="wrap">
				
				<?php foreach( get_field('blog_block') as $blog ) { ?>
					
					<div class="blog-section__content">
					
						<?php if( $blog['headline'] ) { ?>
						
							<h2 class="blog-section__content__headline"><?= $blog['headline'] ?></h2>
						
						<?php } ?>
						
						<?php if( $blog['image'] ) { ?>
						
							<img class="blog-section__content__image" src="<?= $blog['image']['url'] ?>" alt="<?= the_title() ?>">
						
						<?php } ?>
						
						<?php if( $blog['text'] ) { ?>
						
							<div class="blog-section__content__text"><?= $blog['text'] ?></div>
						
						<?php } ?>
						
						<?php if( $blog['cta_link'] ) { ?>
						
							<div class="blog-section__content__cta">
								
								<a class="call-to-action" href="<?= $blog['cta_link'] ?>">
									
									<?php if( $blog['cta_link_text'] ) { ?>
										
										<?= $blog['cta_link_text'] ?>
										
									<?php } else { ?>
									
										Läs mer
									
									<?php } ?>
									
								</a>
								
							</div>
						
						<?php } ?>
						
					</div>
					
				<?php } ?>
				
			</div>
			
		</section>
		
	<?php } ?>	
	
	
	<?php
	
	$currentID		= get_the_ID();
	
	$currentCats	= get_the_category();
	
	$currentCat		= $currentCats[0]->cat_ID;
	
    $query = new WP_Query(array(
		'post_type' 		=> 'post',
		'orderby'     		=> 'rand',
		'showposts'		 	=> 4,
		'cat'				=> $currentCat,
		'post__not_in'		=> array($currentID)
	));

	if( $query->posts ) {
		
		?><section class="page-content-section related-posts center"><?php
			
			?><div class="wrap"><?php
			
				?>
				<h2 class="related-posts__headline">
					
					<?php if( get_field('news_headline') ) { ?>
					
						<?= get_field('news_headline') ?>
					
					<?php } else { ?>
					
						Våra senaste nyheter
					
					<?php } ?>
					
				</h2>
				<?php
				
				foreach($query->posts as $post) {
				
					?>
					
					<div class="related-posts__post transition">
				
						<h3 class="related-posts__post__headline"><?= $post->post_title ?></h3>
						
						<?php
						
						$blog_block = get_field('blog_block', $post->ID);
						
						$first_blog_block = $blog_block[0];	
						
						$stripped_blog_block = strip_tags($first_blog_block['text'])
						
						?>
						
						<div class="related-posts__post__ingressq"><?= substr($stripped_blog_block, 0, 100) ?>...</div>
						
						<a class="call-to-action" href="<?= get_permalink($post->ID) ?>">Läs mer</a>
					
					</div>
					
					<?php
					
				}
				
			?></div><?php
		
		?></section><?php
		
	}
	
	?>
	
	<style>
		
		.blog-section > .wrap {
			max-width: 800px;
		}
		
		.related-posts {
			border-top: 2px solid #eee;
		}
		
		.related-posts__post {
			display:inline-block;
			padding: 40px;
			width: 23%;
			margin: 0 .5%;
			box-shadow: 0px 20px 20px rgba(0,0,0,.1);
		}
		
		.related-posts__post:hover {
			box-shadow: 0px 10px 10px rgba(0,0,0,.05);
		}
		
	</style>
	
	<?php
	
});
	
	
genesis();
	