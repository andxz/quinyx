<?php
	
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );


require_once "activation.php";
require_once "customize-theme.php";
require_once "layouts.php";


//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'iGoMoon Website' );
define( 'CHILD_THEME_URL', 'https://www.igomoon.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );


//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	// Google font
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );

	// Fontawesome
	wp_enqueue_style('fontawesome-4.3', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css');


    wp_enqueue_script('mubarak-script', get_stylesheet_directory_uri() . '/mubarak-scripts.js', array('jquery'));
    wp_enqueue_style('mubarak-style', get_stylesheet_directory_uri() . '/mubarak-styles.css');
    
}


//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );


//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );


//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );


//* Set the favicon to the file in the variants file
add_filter( 'genesis_pre_load_favicon', function($favicon){
    return content_url('/variants/favicon.ico');
});


genesis_set_default_layout( 'full-width-content' );


// Unregister the header right sidebar to make room for the menus.
unregister_sidebar('header-right');


remove_action('genesis_after_header', 'genesis_do_subnav');
add_action('genesis_header_right', 'genesis_do_subnav');

remove_action('genesis_after_header', 'genesis_do_nav');
add_action('genesis_header_right', 'genesis_do_nav');


add_action('genesis_meta', function(){
	if(is_front_page() && is_page()) {
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	}
});


add_action('genesis_header', function() {

	?>
	
	<div id="mobile-menu">
	
		<span></span>
	
		<span></span>
		
		<span></span>
		
	</div>
		
	<?php

});





//* Remove the site description
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );


// Remove site-inner
add_filter( 'genesis_markup_site-inner', '__return_null' );
add_filter( 'genesis_markup_content-sidebar-wrap_output', '__return_false' );
add_filter( 'genesis_markup_content', '__return_null' );


// Remove standard footer
remove_action('genesis_footer', 'genesis_do_footer');
remove_action('genesis_footer', 'genesis_footer_markup_open', 5);
remove_action('genesis_footer', 'genesis_footer_markup_close', 15);


// // Create the post type
// add_action( 'init', 'forskolor_init' );
// function forskolor_init() {
	
// 	$labels = array(
// 		'name'               => _x( 'Mubarak Förskolor', 'post type general name', 'your-plugin-textdomain' ),
// 		'singular_name'      => _x( 'Förskolor', 'post type singular name', 'your-plugin-textdomain' ),
// 		'menu_name'          => _x( 'Förskolor', 'admin menu', 'your-plugin-textdomain' ),
// 		'name_admin_bar'     => _x( 'Förskolor', 'add new on admin bar', 'your-plugin-textdomain' ),
// 		'add_new'            => _x( 'Lägg till Förskola', 'your-plugin-textdomain' ),
// 		'add_new_item'       => __( 'Lägg till Förskola', 'your-plugin-textdomain' ),
// 		'new_item'           => __( 'Ny Förskola', 'your-plugin-textdomain' ),
// 		'edit_item'          => __( 'Redigera Förskola', 'your-plugin-textdomain' ),
// 		'view_item'          => __( 'Visa Förskola', 'your-plugin-textdomain' ),
// 		'all_items'          => __( 'Alla Förskolor', 'your-plugin-textdomain' ),
// 		'search_items'       => __( 'Sök Förskola', 'your-plugin-textdomain' ),
// 		'parent_item_colon'  => __( 'Förälderförskola:', 'your-plugin-textdomain' ),
// 		'not_found'          => __( 'Ingen Förskola funnen', 'your-plugin-textdomain' ),
// 		'not_found_in_trash' => __( 'Ingen Förskola funnen i skräpkorgen', 'your-plugin-textdomain' )
// 	);
	
// 	$args = array(
// 		'labels'             => $labels,
// 		'public'             => true,
// 		'publicly_queryable' => true,
// 		'show_ui'            => true,
// 		'show_in_menu'       => true,
// 		'query_var'          => true,
// 		'capability_type'    => 'post',
// 		'hierarchical'       => false,
// 		'menu_position'      => null,
// 		'has_archive'        => 'forskolor',
// 		'supports'           => array( 'title', 'thumbnail' ),
// 	);
	
// 	register_post_type( 'forskolor', $args );
	
// }



// // Custom post type Grundskolor
// add_action( 'init', 'grundskolor_init' );
// function grundskolor_init() {
	
// 	$labels = array(
// 		'name'               => _x( 'Grundskolor', 'post type general name', 'your-plugin-textdomain' ),
// 		'singular_name'      => _x( 'Grundskolor', 'post type singular name', 'your-plugin-textdomain' ),
// 		'menu_name'          => _x( 'Grundskolor', 'admin menu', 'your-plugin-textdomain' ),
// 		'name_admin_bar'     => _x( 'Grundskolor', 'add new on admin bar', 'your-plugin-textdomain' ),
// 		'add_new'            => _x( 'Lägg till Grundskola', 'your-plugin-textdomain' ),
// 		'add_new_item'       => __( 'Lägg till Grundskola', 'your-plugin-textdomain' ),
// 		'new_item'           => __( 'Ny Grundskola', 'your-plugin-textdomain' ),
// 		'edit_item'          => __( 'Redigera Grundskola', 'your-plugin-textdomain' ),
// 		'view_item'          => __( 'Visa Grundskola', 'your-plugin-textdomain' ),
// 		'all_items'          => __( 'Alla Grundskolor', 'your-plugin-textdomain' ),
// 		'search_items'       => __( 'Sök Grundskola', 'your-plugin-textdomain' ),
// 		'parent_item_colon'  => __( 'Föräldergrundskola:', 'your-plugin-textdomain' ),
// 		'not_found'          => __( 'Ingen Grundskola funnen', 'your-plugin-textdomain' ),
// 		'not_found_in_trash' => __( 'Ingen Grundskola funnen i skräpkorgen', 'your-plugin-textdomain' )
// 	);
	
// 	$args = array(
// 		'labels'             => $labels,
// 		'public'             => true,
// 		'publicly_queryable' => true,
// 		'show_ui'            => true,
// 		'show_in_menu'       => true,
// 		'query_var'          => true,
// 		'capability_type'    => 'post',
// 		'hierarchical'       => false,
// 		'menu_position'      => null,
// 		'has_archive'        => 'grundskolor',
// 		'supports'           => array( 'title', 'thumbnail' ),
// 	);
	
// 	register_post_type( 'grundskolor', $args );
	
// }


// Custom post type Jobb
add_action( 'init', 'jobs_init' );
function jobs_init() {
	
	$labels = array(
		'name'               => _x( 'Jobb', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Jobb', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Jobb', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Jobb', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Lägg till Jobb', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Lägg till Jobb', 'your-plugin-textdomain' ),
		'new_item'           => __( 'Ny Jobb', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Redigera Jobb', 'your-plugin-textdomain' ),
		'view_item'          => __( 'Visa Jobb', 'your-plugin-textdomain' ),
		'all_items'          => __( 'Alla Jobb', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Sök Jobb', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'FörälderJobb:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'Inget Jobb funnen', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'Inget Jobb funnen i skräpkorgen', 'your-plugin-textdomain' )
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'menu_position'      => 52,
		'has_archive'        => false,
		'supports'           => array( 'title', 'thumbnail' ),
		'rewrite'			 => array( 'slug' => 'jobba-hos-oss', 'with_front'  => false)
	);
	
	register_post_type( 'job', $args );
	
}




// Add settings
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page( array(
	'page_title'	=> 'Mubarak settings',
	'menu_title'	=> 'Mubarak',
	'menu_slug'		=> 'mubarak-settings',
	'capability'	=> 'edit_posts',
	'icon_url'		=> 'dashicons-star-filled',
	'position'		=> 50
	) );
}

// Custom header
add_action('genesis_site_title', function(){
	
	?>
	
	<a class="logos" href="/">
		
		<img class="logos__logo logos__logo--white" src="<?= get_field('logo_white', 'option')['url'] ?>" alt="<?= get_bloginfo() ?>" title="<?= get_bloginfo() ?>">
		
		<img class="logos__logo logos__logo--black" src="<?= get_field('logo_color', 'option')['url'] ?>" alt="<?= get_bloginfo() ?>" title="<?= get_bloginfo() ?>">
		
	</a>

	<?php

});


// Add custom footer
add_action('genesis_footer', function() {
	
	?>
	
	<section class="page-content-section footer dark-blue-bg center pt-5 pt-lg-5 px-lg-5">
		
		<div class="wrap flex-container">
		
			<div class="footer__block flex-child">
			
				<!-- <img class="logos__logo logos__logo--white" src="<?= get_field('logo_white', 'option')['url'] ?>" alt="<?= get_bloginfo() ?>" title="<?= get_bloginfo() ?>"> -->
				
					<div class="socials">
				
					<?php if(get_field('instagram', 'option') )	{ ?>
					
						<div class="footer__info__link footer__info__link--facebook">
							
							<a target="_blank" href="<?= get_field('instagram', 'option') ?>"><img src="https://mubarak.se/wp-content/uploads/instagram.png" alt="instagram"></a>
								 
						</div>
				
					<?php }	?>
					
				
					<?php if(get_field('facebook_link', 'option') )	{ ?>
					
						<div class="footer__info__link footer__info__link--facebook">
							
							<a target="_blank" href="<?= get_field('facebook_link', 'option') ?>"><img src="https://mubarak.se/wp-content/uploads/facebook_.png" alt="Facebook"></a>
								 
						</div>
				
					<?php }	?>
					
				
				</div>
				
				<?php if(get_field('phone_number', 'option') ) { ?>
					
					<div class="footer__info__link footer__info__link--phone bold">
						
						Telefonnummer: <a href="tel:<?= get_field('phone_number', 'option') ?>"><?= get_field('phone_number', 'option') ?></a>
					
					</div>
				
				<?php } ?>
					
				
				
				<?php if(get_field('e-mail', 'option') ) { ?>
					
					<div class="footer__info__link footer__info__link--email pb-1">
					
						E-mail: <a class="info_email text-decoration-none" href="mailto:<?= get_field('e-mail', 'option') ?>"><?= get_field('e-mail', 'option') ?></a>
						
					</div>
				
				<?php } ?>	
				
				
				<?php if(get_field('adress', 'option')) { ?>
					
					<div class="footer__info__adress pb-1">
						
						Adress: <?= get_field('adress', 'option') ?>
					
					</div>
				
				<?php } ?>		
				
				
				<?php if(get_field('org_number', 'option')) { ?>
					
					<div class="footer__info__org pb-1">
						
						Org.nummer: <?= get_field('org_number', 'option') ?>
					
					</div>
				
				<?php } ?>
			
				
			</div>
				
				
			
			</div>
			
		</div>
		
	</section>	
	
	<section class="site-creds dark-blue-bg text-white pt-4 pb-5 p-lg-5">
		
				<div class="site-creds__image">
								
				<a target="_blank" href="https://www.friskola.se/"><img class="site-creds__friskola" src="<?= get_field('friskolornas_riskforbund_image', 'option')['url'] ?>" alt="<?=  get_field('friskolornas_riskforbund_image', 'option')?>" title="<?=  get_field('alt_text', 'option')?> "></a>
				
				<a target="_blank" href="https://www.almega.se/"><img class="site-creds__almega" src="<?= get_field('almega_image', 'option')['url'] ?>" alt="<?=  get_field('almega_image', 'option')?>" title="<?=  get_field('alt_text', 'option')?> "></a>
				
			</div>
		
		<div class="site-creds__copy">Copyright &copy; <?= date('Y') ?> Mubarak Utbildning AB</div>
			
		<?php if(get_field('friskolornas_riskforbund_image', 'option') ) { ?>
			

		
		<?php } ?>
		
	</section>


	<?php

});









// Google api
add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyCbct4jPG-ZN9tjOmUd0E2ZUiiapPJ1c8U');
}




add_action( 'genesis_meta', function() {
	
	echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
	
	echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbct4jPG-ZN9tjOmUd0E2ZUiiapPJ1c8U"></script>';

	echo '<script type="text/javascript">
	(function($) {
	
	function new_map( $el ) {
		
		var $markers = $el.find(".marker");
		
		var args = {
		
			zoom		: 25,
			
			center		: new google.maps.LatLng(0, 0),
			
			mapTypeId	: google.maps.MapTypeId.ROADMAP,
			
			scrollwheel	: false,	
			
			styles: [
			{"featureType":"water","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":-100},
			{"lightness":0},{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},
			{"lightness":0},{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#bbc0c4"},{"saturation":-100},
			{"lightness":0},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},
			{"lightness":0},{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#e9ebed"},{"saturation":-100},
			{"lightness":0},{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":-100},
			{"lightness":0},{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"hue":"#2c2e33"},{"saturation":-100},
			{"lightness":0},{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-100},
			{"lightness":0},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-100},
			{"lightness":-2},{"visibility":"simplified"}]}]		
		};
		
		var map = new google.maps.Map( $el[0], args);
		
		map.markers = [];
		
		$markers.each(function(){
			
	    	add_marker( $(this), map );
			
		});
		
		center_map( map );
		
		return map;
		
	}
	
	
	function add_marker( $marker, map ) {
	
		var latlng = new google.maps.LatLng( $marker.attr("data-lat"), $marker.attr("data-lng") );
	
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map,
			icon		: "https://www.mubarak.se/wp-content/uploads/marker.png"
		});
	
		map.markers.push( marker );
	
		if( $marker.html() )
		{
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});
	
			google.maps.event.addListener(marker, "click", function() {
	
				infowindow.open( map, marker );
	
			});
		}
	
	}
	
	function center_map( map ) {
	
		var bounds = new google.maps.LatLngBounds();
	
		$.each( map.markers, function( i, marker ){
	
			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
	
			bounds.extend( latlng );
	
		});
	
		if( map.markers.length == 1 )
		{
			// set center of map
		    map.setCenter( bounds.getCenter() );
		    map.setZoom( 16 );
		}
		else
		{
			// fit to bounds
			map.fitBounds( bounds );
		}
	
	}
	
	var map = null;
	
	$(document).ready(function(){
	
		$(".map").each(function(){
	
			// create map
			map = new_map( $(this) );
	
		});
	
	});
	
	})(jQuery);
	</script>';
	
	
}, 1);

