<?php
	
remove_action('genesis_entry_header', 'genesis_post_info', 12);
remove_action('genesis_entry_header', 'genesis_do_post_title');
remove_action('genesis_entry_content', 'genesis_do_post_content');
remove_action('genesis_entry_footer', 'genesis_post_meta');

add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
	
add_action('genesis_after_header', function () {
	
	?>

	<section class="page-content-section top-field bg-cover flex-container dark" style="background-image:url(<?= wp_get_attachment_url( get_post_thumbnail_id() ) ?>);">		
			
		<div class="top-field__inner flex-child flex-child__center">
			
			<div class="top-field__inner__content white-font">
		
				<div class="top-image-content wrap center white-font">
				
					<h1 class="top-field__inner__content__headline"><?= get_field('top_field_headline', 632) ?></h1>
					
					<?php if( get_field('job_ingress') ) { ?>
					
						<div class="top-field__inner__content__text">
							
							<?= get_field('job_ingress') ?>
						
						</div>
						
					<?php } ?>
					
				</div>
	
			</div>
			
		</div>
	
	</section>

	<section class="page-content-section">
		
		<div class="wrap max-width">
			
			<?php foreach( get_field('job_text_blocks') as $block ) { ?>
			
				<div class="job-text-blocks">
					
					<?php if( $block['image'] ) { ?>
					
						<img class="job-text-blocks__image" src="<?= $block['image'] ?>" alt="<?= the_title() ?>">
					
					<?php } ?>
					
					<?php if( $block['headline'] ) { ?>
					
						<h2 class="job-text-blocks__headline"><?= $block['headline'] ?></h2>
					
					<?php } ?>
					
					<?php if( $block['text'] ) { ?>
					
						<div class="job-text-blocks__text"><?= $block['text'] ?></div>
					
					<?php } ?>
					
				</div>
			
			<?php } ?>
			
		</div>
		
	</section>
	
	<?php
	
});

genesis();