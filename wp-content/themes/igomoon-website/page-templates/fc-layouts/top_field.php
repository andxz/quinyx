<section class="page-content-section top-field bg-cover flex-container dark" style="background-image: url(<?= $content['top_field_background_image']['url'] ?>)" title="<?= the_title() ?>">
	
	<div class="top-field__inner flex-child flex-child__center">
			
		<div class="top-field__inner__content white-font">
			
			<h1 class="top-field__inner__content__headline"><?php if( $content['top_field_headline'] ) {
				
				echo $content['top_field_headline'];
				
			} else {
				
				echo the_title();
					
			}?></h1>
			
			<?php if( $content['top_field_text'] ) { ?>
				
				<div class="top-field__inner__content__text">
					
					<?= $content['top_field_text'] ?>
				
				</div>
				
			<?php } ?>
			
			<?php if( $content['top_field_cta_link'] ) { ?>
				
				<div class="top-field__inner__content__ctas">
				
					<a class="call-to-action__dark top-field__inner__content__cta" href="<?= $content['top_field_cta_link'] ?>"><?= $content['top_field_cta_text'] ?></a>
					
				</div>
				
			<?php } ?>
			
		</div>
		
	</div>
	
</section>