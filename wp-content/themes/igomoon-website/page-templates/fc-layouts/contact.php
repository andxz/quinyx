<section class="page-content-section contacts white-font turquoise-bg center">
	
	<div class="wrap">
		
		<?php if( $content['contact_headline'] ) { ?>
		
			<h2 class="contact__headline"><?= $content['contact_headline'] ?></h2>
		
		<?php } ?>
		
		<div class="flex-container">
		
			<?php foreach($content['contact']as $content) { ?>
	
				 <div class="contact flex-child">
					
					<div class="bg-cover contact__image shadow" style="background-image: url(<?php if( $content['contact_image']['url'] ) { echo $content['contact_image']['url'];} else { echo 'http://mubarak.se/dev/wp-content/uploads/dummy.jpg';} ?>)">
					</div>
					
					<?php if( $content['contact_name'] ) { ?>
						
							<h3 class="contact__name"><?= $content['contact_name'] ?></h3>
					
					<?php } ?>
					
					
					<?php if( $content['contact_title'] ) { ?>
						
						<strong><?= $content['contact_title'] ?></strong>
						
					<?php }  ?> 

					
					<?php if($content['contact_phone']) { ?>
						
						<p class="contact_info">
							
							<span class="contact-icon">
							
								<i class="fa fa-phone" aria-hidden="true"></i>
								
							</span>
							
							<a href="tel:<?= $content['contact_phone'] ?>"><?= $content['contact_phone'] ?></a>
							
						</p>
					
					<?php } ?>
					
					
					<?php if($content['contact_email']) { ?>
					
						<p class="contact_info">
							
							<span class="contact-icon">
							
								<i class="fa fa-envelope" aria-hidden="true"></i>
								
							</span><a href="mailto:<?= $content['contact_email'] ?>"><?= $content['contact_email'] ?></a>
							
						</p>
					
					<?php } ?>
						
				</div>
			
				<?php } ?>
		
		</div>
		
	</div>

</section>