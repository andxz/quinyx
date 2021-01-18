<section class="page-content-section text-field center white-font turquoise-bg <?php if( $content['white_background'] ) { echo 'white-bg'; } ?>">
	
	<div class="wrap">
		
		<div class="text-field__content max-width">
			
			<?php if( $content['text_field_headline'] ) { ?>
			
				<h2 class="text-field__content__headline"><?= $content['text_field_headline'] ?></h2>
				
			<?php } ?>
			
			<?php if( $content['text_field_text'] ) { ?>
			
				<div class="text-field__content__text"><?= $content['text_field_text'] ?></div>
				
			<?php } ?>
			
			<?php if( $content['text_field_cta_link'] ) { ?>
			
				<div class="text-field__content__cta">
			
					<a class="call-to-action" href="<?= $content['text_field_cta_link'] ?>">
						
						<?php if( $content['text_field_cta_link_text'] ) { ?>
						
							<?= $content['text_field_cta_link_text'] ?>
						
						<?php } ?>
						
					</a>
				
				</div>
				
			<?php } ?>
			
		</div>
	
	</div>
	
</section>