<?php if($content['start_puff_block']) { ?>
	
	<section class="page-content-section start-puff-block">
	
	<div class="wrap">
		
		<div class="start-puff-block__content">
			
			<?php if( $content['start_puff_block_headline'] ) { ?>
			
				<h2 class="start-puff-block__content__headline"><?= $content['start_puff_block_headline'] ?></h2>
				
			<?php } ?>
			
			<?php if( $content['start_puff_block_text'] ) { ?>
			
				<div class="start-puff-block__content__text"><?= $content['start_puff_block_text'] ?></div>
				
			<?php } ?>
			
			<?php if( $content['start_puff_block_cta_link'] ) { ?>
			
				<div class="start-puff-block__content__cta">
			
					<a class="call-to-action" href="<?= $content['start_puff_block_cta_link'] ?>">
						
						<?php if( $content['start_puff_block_cta_link_text'] ) { ?>
						
							<?= $content['start_puff_block_cta_link_text'] ?>
						
						<?php } ?>
						
					</a>
				
				</div>
				
			<?php } ?>
			
		</div>
		
		<div class="start-puff-block__content">
			
			<?php foreach( $content['start_puff_block_links'] as $link ) { ?>
				
				<div class="start-puff-block__content__link">
					
					<div class="start-puff-block__content__link__icon"><?= $link['icon'] ?></div>
					
					<div class="start-puff-block__content__link__content">
						
						<h2 class="start-puff-block__content__link__content__headline"><?= $link['headline'] ?></h2>
						
						<div class="start-puff-block__content__link__content__text"><?= $link['text'] ?></div>
						
					</div>
					
					<div style="clear:both;"></div>
					
				</div>
				
				<div style="clear:both;"></div>
				
			<?php } ?>
				
		</div
		
	</div>
	
</section>

<?php } ?>