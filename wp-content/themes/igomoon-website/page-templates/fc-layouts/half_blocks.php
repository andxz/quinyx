<?php foreach( $content['half_block'] as $content ) { ?>
	
	<section class="page-content-section half-blocks">
			
		<div class="half-blocks__background-image bg-cover" style="background-image:url(<?php if( $content['background_image']['url'] ) { echo $content['background_image']['url']; } else { echo 'http://mubarak.se/dev/wp-content/uploads/myran_marsta-1-1.jpg'; } ?>);"></div>
		
		<div class="wrap">
			
			<div class="half-blocks__content">
				
				<?php if( $content['headline'] ) { ?>
				
					<h2 class="half-blocks__content__headline"><?= $content['headline'] ?></h2>
					
				<?php } ?>
				
				<?php if( $content['text'] ) { ?>
				
					<div class="half-blocks__content__text"><?= $content['text'] ?></div>
					
				<?php } ?>
				
				<?php if( $content['cta_link'] ) { ?>
					
					<div class="half-blocks__content__cta">
						
						<a class="call-to-action" href="<?= $content['cta_link'] ?>">
							
							<?php if( $content['cta_link_text'] ) { ?>
							
								<?= $content['cta_link_text'] ?>
							
							<?php } else { ?>
							
								Läs mer
							
							<?php } ?>	
								
						</a>
						
					</div>
					
				<?php } ?>
				
			</div>
			
		</div>
	
	</section>
			
<?php } ?>