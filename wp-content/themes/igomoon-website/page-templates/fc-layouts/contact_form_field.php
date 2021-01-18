<section class="page-content-section contact-field center ">
	
	<div class="wrap">
		
		<div class="contact-field__content max-width">
			
			<?php if( $content['contact_form_field_headline'] ) { ?>
			
				<h2 class="contact-field__content__headline"><?= $content['contact_form_field_headline'] ?></h2>
				
			<?php } ?>	
			
			
			<?php if( $content['contact_form_field_text'] ) { ?>
			
				<div class="contact-field__content__text">
					
					<?= $content['contact_form_field_text'] ?>
					
				</div>
			
			<?php } ?>
			
			<div class="contact-field__content__form">
			
				<?= do_shortcode('[gravityform id="' . $content['contact_form_field_form_id'] . '" title="false" description="false" ajax="true"]') ?>
			
			</div>
			
		</div>
	
	</div>
	
</section>