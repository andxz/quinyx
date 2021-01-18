<?php
	
remove_action('genesis_entry_header', 'genesis_post_info', 12);
remove_action('genesis_entry_header', 'genesis_do_post_title');
remove_action('genesis_entry_content', 'genesis_do_post_content');
remove_action('genesis_entry_footer', 'genesis_post_meta');

add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_site_title', function () {
	
	if( get_field('header_text') ) :
	
		?>
	
		<span class="school-header-text"><?= get_field('header_text') ?></span>
	
		<?php
	
	endif;
	
});

add_action('genesis_after_header', function () {
	
	?>

	<section class="page-content-section top-field flex-container bg-cover dark" style="background-image:url(<?php if(get_field('top_image')) { ?><?= get_field('top_image') ?><?php } else { echo '/wp-content/uploads/hagersten_profil-1024x576.jpg';} ?>);">		
			
		<div class="top-field__inner flex-child flex-child__center">
			
			<div class="top-field__inner__content white-font">
		
				<div class="top-image-content wrap center">
				
					<div class="top-image-headline">
						
					<h1 class="top-field__inner__content__headline"><?php if(get_field('top_image_headline')) {?>
								
								<?= get_field('top_image_headline')?>
								
								<?php } else { the_title(); } ?>
						</h1>
						
					</div>
					
					<div class="top-field__inner__content__text">
						
						<p><?= get_field('top_image_text') ?></p>
						
					</div>
					
					<?php if(get_field('top_image_cta_link') ) { ?>
				
				<div class="top-field__inner__content__ctas">
				
					<a class="call-to-action__dark top-field__inner__content__cta" href="<?= get_field('top_image_cta_link') ?>"><?= get_field('top_image_cta_text') ?></a>
					
				</div>
				
			<?php } ?>


				</div>
	
			</div>
			
		</div>
	
	</section>
	

	<section class="page-content-section puffar" >
		
		<div class="puff-wrapper wrap">
			
			<div class="flex-wrapper">
		
				<!--
				<div class="puff school-puff flex-child" id="show-food">
					
					<span class="puff-icon"><?= get_field('food_icon') ?></span>
					
					<h3 class="puff-header"><?= get_field('food_headline') ?></h3>
					
				</div>
				-->
				
				<!--
				<section class="page-content-section center show-in-mobile">
		
					<div class="wrap">
									
						<?php
				
						$todaysDate = get_the_date('Y-m-d');
						
						if(get_field('food_menu') ) {  
							
							foreach( get_field('food_menu') as $food_menu ) {
								
								if( $todaysDate > $food_menu['start_date'] && $todaysDate < $food_menu['end_date']  ) { ?>
							
									<div class="food-menu">
								
										<?php if( $food_menu['headline'] ) { ?>
									
											<h2 class="food-menu__headline center"><?= $food_menu['headline'] ?></h2>
									
										<?php } ?>
									
										<div class="flex-container food-menu__wrapper">
											
											<?php if( $food_menu['monday'] ) { ?>
												
												<div class="flex-child food-menu__weekday">
													
													<h4>Måndag</h4>
													
													<?= $food_menu['monday'] ?>
													
												</div>
												
											<?php } ?>
											
											<?php if( $food_menu['tuesday'] ) { ?>
												
												<div class="flex-child food-menu__weekday">
													
													<h4>Tisdag</h4>
													
													<?= $food_menu['tuesday'] ?>
													
												</div>
												
											<?php } ?>
											
											<?php if( $food_menu['wednesday'] ) { ?>
												
												<div class="flex-child food-menu__weekday">
													
													<h4>Onsdag</h4>
													
													<?= $food_menu['wednesday'] ?>
													
												</div>
												
											<?php } ?>
											
											<?php if( $food_menu['thirsday'] ) { ?>
												
												<div class="flex-child food-menu__weekday">
													
													<h4>Torsdag</h4>

													<?= $food_menu['thirsday'] ?>
													
												</div>
												
											<?php } ?>
											
											<?php if( $food_menu['friday'] ) { ?>
												
												<div class="flex-child food-menu__weekday">
													
													<h4>Fredag</h4>

													<?= $food_menu['friday'] ?>
													
												</div>
												
											<?php } ?>
											
										</div>
									
									</div>
									
									<?php
									
								}
								
							}
							
						}
						
						?>
						
					</div>
					
				</section>
				-->
				
					
				<div class="puff school-puff flex-child" id="show-information">
				
					<span class="puff-icon"><?= get_field('information_icon') ?></span>
					
					<h3 class="puff-header"><?= get_field('textblock_headline') ?></h3>
					
				</div>
				
				<section class="page-content-section center show-in-mobile">
					
					<div class="wrap">
						
						<?= get_field('textblock_text') ?>
						
					</div>
					
				</section>
				
				<div class="puff school-puff flex-child" id="show-sjukanmalan">
				
					<span class="puff-icon"><?= get_field('sjukanmalan_icon') ?></span>
					
					<h3 class="puff-header"><?= get_field('sjukanmalan_headline') ?></h3>
					
				</div>
				
				<section class="page-content-section center show-in-mobile">
					
					<div class="wrap">
							
						<h3 class="sjukanmalan-ingress"><?= get_field('sjukanmalan_ingress') ?></h3>
						
						<p class"sjukanmalan-text"><?= get_field('sjukanmalan_text') ?></p>
							
						<p class="sjukanmalan-tel">
							<a href="tel:<?= get_field('sjukanmalan_tel') ?>">Tel: <?= get_field('sjukanmalan_tel') ?></a>
						</p>
					
						<?php if(get_field('sjukanmalan_email') ) { ?>
						
							Du kan också anmäla frånvaro till: 
						
							<a href="mailto:<?= get_field('sjukanmalan_email') ?>" target="_blank" class="sjukanmalan-link">
								
								<?= get_field('sjukanmalan_email') ?>
								
							</a>
						
						<?php } ?>
				 
						<?php if(get_field('sjukanmalan_infomentor') ) { ?>
						
							Du kan även anmäla frånvaro till: 
						
							<a href="<?= get_field('sjukanmalan_infomentor') ?>" target="_blank" class="sjukanmalan-link">
								
								<?= get_field('sjukanmalan_infomentor') ?>
							
							</a>
							
						<?php } ?>
																	
					</div>
					
				</section>
			
			</div>
		
		</div>
		
		<div style="clear:both"></div>
		
	</section>
	
	
<!--
	<section class="page-content-section text-field center white-font turquoise-bg hidden-field hide-in-mobile show-food">
		
		<div class="wrap">
						
			<?php
	
			$todaysDate = get_the_date('Y-m-d');
			
			if(get_field('food_menu') ) {  
				
				foreach( get_field('food_menu') as $food_menu ) {
					
					if( $todaysDate > $food_menu['start_date'] && $todaysDate < $food_menu['end_date']  ) { ?>
				
						<div class="food-menu">
					
							<?php if( $food_menu['headline'] ) { ?>
						
								<h2 class="food-menu__headline center"><?= $food_menu['headline'] ?></h2>
						
							<?php } ?>
						
							<div class="flex-container food-menu__wrapper">
								
								<?php if( $food_menu['monday'] ) { ?>
									
									<div class="flex-child food-menu__weekday">
										
										<h4>Måndag</h4>

										<?= $food_menu['monday'] ?>
										
									</div>
									
								<?php } ?>
								
								<?php if( $food_menu['tuesday'] ) { ?>
									
									<div class="flex-child food-menu__weekday">
										
										<div>
										
											<h4>Tisdag</h4>
	
											<?= $food_menu['tuesday'] ?>
										
										</div>
										
									</div>
									
								<?php } ?>
								
								<?php if( $food_menu['wednesday'] ) { ?>
									
									<div class="flex-child food-menu__weekday">
										
										<div>
										
											<h4>Onsdag</h4>
											
											<?= $food_menu['wednesday'] ?>
											
										</div>
										
									</div>
									
								<?php } ?>
								
								<?php if( $food_menu['thirsday'] ) { ?>
									
									<div class="flex-child food-menu__weekday">
										
										<h4>Torsdag</h4>
										
										<?= $food_menu['thirsday'] ?>
										
									</div>
									
								<?php } ?>
								
								<?php if( $food_menu['friday'] ) { ?>
									
									<div class="flex-child food-menu__weekday">
										
										<h4>Fredag</h4>

										<?= $food_menu['friday'] ?>
										
									</div>
									
								<?php } ?>
								
							</div>
						
						</div>
						
						<?php
						
					}
					
				}
				
			}
			
			?>
			
		</div>
		
	</section>
-->
	
	
	<section class="page-content-section text-field  white-font turquoise-bg hidden-field hide-in-mobile show-information">
		
		<div class="wrap">
			
			<?= get_field('textblock_text') ?>
			
		</div>
		
	</section>
	
	
	<section class="page-content-section text-field center white-font turquoise-bg hidden-field hide-in-mobile show-sjukanmalan">
		
		<div class="wrap">
		
			<h3 class="sjukanmalan-ingress"><?= get_field('sjukanmalan_ingress') ?></h3>
			
			<p class="sjukanmalan-text"><?= get_field('sjukanmalan_text') ?></p>
			
			<p class="sjukanmalan-tel">Tel: <?= get_field('sjukanmalan_tel') ?></p>
			
			<!-- <?= get_field('sjukanmalan_ingress') ?> -->
			
		</div>
		
	</section>
	
	
	
	<?php if( get_field('text_text') ) { ?>
		
		<section class="page-content-section centered_text">
		
			<div class="wrap">
				
				<?php if( get_field('text_headline') ) { ?>
				
					<h2><?= get_field('text_headline') ?></h2>
				
				<?php } ?>
				
				<?php if( get_field('text_text') ) { ?>
				
					<div><?= get_field('text_text') ?></div>
				
				<?php } ?>
				
			</div>
		
		</section>
		
	<?php } ?>
	
	
	
	<?php if(get_field('about') ) {

		 foreach( get_field('about') as $content ) { ?>
			
			<section class="page-content-section half-blocks">
					
				<div class="half-blocks__background-image bg-cover" style="background-image:url(<?= $content['about_image'] ?>);"></div>
				
				<div class="wrap">
					
					<div class="half-blocks__content">
						
						<?php if( $content['about_headline'] ) { ?>
						
							<h2 class="half-blocks__content__headline"><?= $content['about_headline'] ?></h2>
							
						<?php } ?>
						
						<?php if( $content['about_text'] ) { ?>
						
							<div class="half-blocks__content__text"><?= $content['about_text'] ?></div>
							
						<?php } ?>
						
					</div>
					
				</div>
			
			</section>
					
		<?php } 
	} ?>
	
	<!-- 	PDF section -->
	
	<?php if( get_field('pdf') ) { ?>

		<section class="page-content-section pdfs blue-bg white-font center">
			
			<div class="wrap">
				
				<?php if( get_field('pdf_headline') ) { ?>
				
					<h2 class="pdfs__headline"><?= get_field('pdf_headline') ?></h2>
				
				<?php } else { ?>
				
					<h2>Blanketter och Dokument</h2>
				
				<?php } ?>
				
				<div class="flex-container">
				
					<?php foreach( get_field('pdf') as $pdf ) { ?>
			
						 <div class="flex-child pdf">
							 
							 	<?php if($pdf['pdf_icon']) { ?>
								
								<a class="pdf_link" href="<?= $pdf['pdf_link']['url'] ?>" target="_blank">
									<span class="pdf-icon" style="font-size: 36px;"><?= $pdf['pdf_icon'] ?></span>
								</a>
							
							<?php } ?>
							
							
							<?php if( $pdf['pdf_link_text'] ) { ?>
							
								<a href="<?= $pdf['pdf_link']['url'] ?>"><p class="pdf-link__text" <?php if( $pdf['pdf_link']['url'] ) { ?> >
									
									
									 <?php } ?>  
									
									<?= $pdf['pdf_link_text'] ?>
								</p></a>
								
							<?php } ?>
									
						</div>
					
						<?php } ?>
				
				</div>
				
			</div>
		
		</section>
	
	<?php } ?>	
		
<!--
	<section class="page-content-section contact-field center ">
		
		<div class="wrap">
			
			<div class="contact-field__content max-width">
				
				<?php if( get_field('application_headline') ) { ?>
				
					<h2 class="contact-field__content__headline"><?= get_field('application_headline') ?></h2>
					
				<?php } ?>	
				
				
				<?php if( get_field('application_text') ) { ?>
				
					<div class="contact-field__content__text">
						
						<?= get_field('application_text') ?>
						
					</div>
				
				<?php } ?>
				
				<div class="contact-field__content__form hide-form">
				
					<?= do_shortcode('[gravityform id= "11" title="false" description="false" ajax="true"]') ?>
				
				</div>
				
				<a class="call-to-action application">Ansök</a>
				
			</div>
		
		</div>
		
	</section>	
-->
		
	
	<section class="page-content-section contacts white-font turquoise-bg center">
		
		<div class="wrap">
			
			<?php if( get_field('contact_headline') ) { ?>
			
				<h2 class="contact__headline"><?= get_field('contact_headline') ?></h2>
			
			<?php } else { ?>
			
				<h2>Kontaktpersoner</h2>
			
			<?php } ?>
			
			<div class="flex-container">
			
				<?php foreach( get_field('contact') as $contact ) { ?>
		
					 <div class="contact flex-child">
						
						<div class="bg-cover contact__image shadow" style="background-image: url(<?php if($contact['contact_image']['url']) { echo $contact['contact_image']['url'];} else { echo 'http://mubarak.se/dev/wp-content/uploads/dummy.jpg';} ?>)">
						</div>
						
						<?php if($contact['contact_name']) { ?>
							
								<h3 class="contact-name"><?= $contact['contact_name'] ?></h3>
						
						<?php } ?>
						
						
						<?php if($contact['contact_headline']) { ?>
							
							<h6><?=$contact['contact_headline'] ?></h6>
							
						<?php }  ?> 
	
						
						<?php if($contact['contact_phone']) { ?>
							
							<p class="contact_info"><span class="contact-icon"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:<?=$contact['contact_phone'] ?>"><?=$contact['contact_phone'] ?></a></p>
						
						<?php } ?>
						
						
						<?php if($contact['contact_email']) { ?>
						
							<p><span class="contact-icon"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="mailto:<?=$contact['contact_email'] ?>"><?=$contact['contact_email'] ?></a></p>
						
						<?php } ?>
							
					</div>
				
					<?php } ?>
					
			
			</div>
			
		</div>
	
	</section>
	
	
	<?php
		
	$cat = get_field('news_category');
	
	$query = new WP_Query(array(
		'post_type' 		=> 'post',
		'orderby'			=> 'date',
		'order'   			=> 'DESC',
		'cat' 				=> $cat
	));

	if( $query->posts ) {
		
		?><section class="page-content-section related-posts center"><?php
			
			?><div class="wrap"><?php
			
				?><h2 class="related-posts__headline">Andra inlägg</h2><?php
				
				foreach( $query->posts as $post ) {
				
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
	

	<?php if(get_field('map') ) { ?>
	
		<section class="page-content-section address center">
		
			<div class="wrap">
				
				<div class="contact-address__headline">
					
					<h4 style="margin-bottom: 0;">
						Adress:
					
						<span>
					
							<?php $map = get_field('map'); ?>
							
							<?= $map['address'] ?>
						
						</div>
					
					</h4>
				
				</div>
				
			</div>
		
		</section>
		
	<?php $map = get_field('map'); ?>
		
				
		<section class="page-content-section map">
			
			<div class="marker" data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>"></div>
			
		</section>
		
	<?php } 
		
});
	
genesis();
	