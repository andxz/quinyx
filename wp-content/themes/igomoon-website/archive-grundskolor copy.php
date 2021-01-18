<?php

remove_action('genesis_entry_header', 'genesis_post_info', 12);
remove_action('genesis_entry_header', 'genesis_do_post_title');
remove_action('genesis_entry_content', 'genesis_do_post_content');
remove_action('genesis_entry_footer', 'genesis_post_meta');

add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


add_action('genesis_site_title', function () {
	
	if( get_field('header_text', 1100) ) :
	
		?>
	
		<span class="school-header-text"><?= get_field('header_text') ?></span>
	
		<?php
	
	endif;
	
});


add_action('genesis_after_header', function() {
	
	?>
	
	<section class="page-content-section top-field bg-cover flex-container dark" style="background-image: url(<?= get_field('top_image', 632)['url'] ?>)" title="<?= the_title() ?>">
		
		<div class="top-field__inner flex-child flex-child__center">
				
			<div class="top-field__inner__content white-font">
				
				<h1 class="top-field__inner__content__headline"><?= get_field('top_field_headline', 632) ?></h1>
				
				<?php if( get_field('top_field_text', 632) ) { ?>
					
					<div class="top-field__inner__content__text">
						
						<?= get_field('top_field_text', 632) ?>
					
					</div>
					
				<?php } ?>
				
			</div>
			
		</div>
		
	</section>
	
	
	
	<section class="page-content-section information-blocks">
		
		<div class="wrap">
			
			<div class="flex-container shadow">
				
				<?php foreach( get_field('information_blocks', 632) as $puff ) { ?>
				
					<div class="puff flex-child">
					
						<?php if( $puff['icon'] ) { ?>
						
							<div class="puff__icon"><?= $puff['icon'] ?></div>
						
						<?php } ?>
						
						<?php if( $puff['headline'] ) { ?>
						
							<h2 class="puff__headline"><?= $puff['headline'] ?></h2>
						
						<?php } ?>
						
						<?php if( $puff['text'] ) { ?>
						
							<div class="puff__text"><?= $puff['text'] ?></div>
						
						<?php } ?>
											
					</div>
				
				<?php } ?>
			</div>
				
		</div>
		
	</section>

	
	
	<section class="page-content-section text-field center">
	
		<div class="wrap">
			
			<div class="text-field__content max-width">
				
				<?php if( get_field('text_field_headline', 632) ) { ?>
				
					<h2 class="text-field__content__headline"><?= get_field('text_field_headline', 632) ?></h2>
					
				<?php } ?>
				
				<?php if( get_field('text_field_text', 632) ) { ?>
				
					<div class="text-field__content__text"><?= get_field('text_field_text', 632) ?></div>
					
				<?php } ?>
								
			</div>
		
		</div>
		
	</section>
	

<?php if( get_field('half_blocks', 632) ) { ?> 
	
	<?php foreach(get_field('half_blocks', 632) as $post ) { ?> 			
	
		<section class="page-content-section half-blocks">	
		
				<div class="half-blocks__background-image bg-cover" style="background-image:url(<?= $post['image']['url'] ?>);"></div>
				
					<div class="wrap">
				
						<div class="half-blocks__content">
					
					
							<?php if($post['headline']) { ?>
							<h2 class="half-blocks__content__headline"><?= $post['headline'] ?></h2>
							<?}?>
						
							<?php if($post['text']) { ?>
							<div class="half-blocks__content__text"><?= $post['text'] ?></div>
							<?}?>
					
					</div>
		</section>
		
			<?php } ?>
	
<?php } ?>
	
	
	<?php if( get_field('pdf', 632) ) { ?> 
	
		<section class="page-content-section pdfs blue-bg white-font center">
			
			<div class="wrap">
				
				<?php if( get_field('pdf_headline', 632) ) { ?>
				
					<h2 class="pdfs__headline"><?= get_field('pdf_headline', 632) ?></h2>
				
				<?php } else { ?>
				
					<h2>Blanketter och Dokument</h2>
				
				<?php } ?>
				
				<div class="flex-container">
				
					<?php foreach( get_field('pdf', 632) as $pdf ) { ?>
			
						 <a class="flex-child pdf"  href="<?= $pdf['pdf_link']['url'] ?>" target="_blank">
							
								<?php if($pdf['pdf_icon']) { ?>
								
									<span class="pdf-icon" style="font-size: 36px;"><?= $pdf['pdf_icon'] ?></span>
									
									<p class="pdf-link__text">
										
										<?= $pdf['pdf_link_text'] ?>
									
									</p>
									
									
							<?php } ?>
							
						</a>
					
						<?php } ?>
				
				</div>
				
			</div>
		
		</section>
	
	<?php } ?>
		
	
	<?php
	
	$query = new WP_Query(array(
		'post_type' 		=> 'grundskolor',
		'orderby'			=> 'date',
		'order'   			=> 'ASC'
	));
	
	foreach( $query->posts as $post ) {
		
		?>
		
		<section class="page-content-section half-blocks">
				
			<?php if(get_field('top_image', $post->ID)) { ?>
			
			<div class="half-blocks__background-image bg-cover" style="background-image:url(<?= get_field('top_image', $post->ID) ?>);"></div>
			
			<?php } ?>
		
			<div class="wrap">
				
				<div class="half-blocks__content">
					
					<?php if( get_field('logo', $post->ID) ) { ?>
					
						<img class="archive-school-logo" src="<?= get_field('logo', $post->ID)['url'] ?>" alt="<?= get_the_title($post->ID) ?>" title="<?= get_the_title($post->ID) ?>">
					
					<?php } ?>
					
					<?php if(get_the_title($post->ID)) { ?>
					
						<h2 class="half-blocks__content__headline"><?= get_the_title($post->ID)?></h2>
					
					<?php } ?>
					
					<?php if(get_field('textblock_text', $post->ID)) { ?><div class="half-blocks__content__text"><?= get_field('textblock_text', $post->ID) ?>
					</div><?php } ?>
					
					<div class="half-blocks__content__cta">
							
						<?php if(get_permalink($post->ID)) { ?><a class="call-to-action" href="<?= get_permalink($post->ID) ?>">Läs mer</a><?php } ?>
						
					</div>
						
					
				</div>
				
			</div>
		
		</section>
		
		<?php
		
	} 
	
	
	
	
});

genesis();