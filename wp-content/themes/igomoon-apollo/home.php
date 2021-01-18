<?php

add_action( 'genesis_meta', 'apollo_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function apollo_home_genesis_meta() {

	if ( is_active_sidebar( 'slider-wide' ) || is_active_sidebar( 'slider' ) || is_active_sidebar( 'welcome-wide' ) || is_active_sidebar( 'welcome-feature-1' ) || is_active_sidebar( 'welcome-feature-2' ) || is_active_sidebar( 'welcome-feature-3' ) || is_active_sidebar( 'home-feature-4' ) || is_active_sidebar( 'home-feature-5' ) || is_active_sidebar( 'home-feature-6' )) {

		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_after_header', 'apollo_home_loop_helper_top' );
		add_action( 'genesis_after_header', 'apollo_home_loop_helper_welcome' );		
		add_action( 'genesis_after_header', 'apollo_home_loop_helper_middle' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	}
}


/**
 * Display widget content for "Slider Wide" and "Slider" sections.
 *
 */
function apollo_home_loop_helper_top() {
	
	genesis_widget_area( 'slider-wide', array(
		'before' => '<div class="slider-wide"><div class="wrap">',
		'after' => '</div></div>',
	) );		
}


/**
 * Display widget content for the "Welcome-wide", "Welcome Feature 1", "Welcome Feature 2", and "Welcome Feature 3" sections.
 *
 */
function apollo_home_loop_helper_welcome() {

	if ( is_active_sidebar( 'welcome-wide' ) || is_active_sidebar( 'welcome-feature-1' ) || is_active_sidebar( 'welcome-feature-2' ) || is_active_sidebar( 'welcome-feature-3' ) ) {

		echo '<div class="welcome"><div class="wrap">';
		
			genesis_widget_area( 'welcome-wide', array(
				'before' => '<div class="welcome-wide">',
				'after' => '</div>',
			) );
			
		echo '<div class="welcome-features">';
			
			genesis_widget_area( 'welcome-feature-1', array(
				'before' => '<div class="welcome-feature-1">',
				'after' => '</div>',
			) );
			
			genesis_widget_area( 'welcome-feature-2', array(
				'before' => '<div class="welcome-feature-2">',
				'after' => '</div>',
			) );
			
			genesis_widget_area( 'welcome-feature-3', array(
				'before' => '<div class="welcome-feature-3">',
				'after' => '</div>',
			) );				
		
		echo '</div><!-- end .welcome-features --></div><!-- end .wrap --></div><!-- end #welcome -->';
		
		
			genesis_widget_area( 'welcome-wide', array(
				'before' => '<div class="welcome-wide">',
				'after' => '</div>',
			) );
			

	}
		
}


/**
 * Display widget content for "Home Feature 1, 2, 3, and 4" sections.
 *
 */
function apollo_home_loop_helper_middle() {

	if ( is_active_sidebar( 'home-feature-1' ) || is_active_sidebar( 'home-feature-2' ) ) {								
		
		echo '<div class="home-feature-bg-alt"><div class="wrap">';
		
			genesis_widget_area( 'home-feature-1', array(
				'before' => '<div class="home-feature-1">',
				'after' => '</div>',
			) );
			
			genesis_widget_area( 'home-feature-2', array(
				'before' => '<div class="home-feature-2">',
				'after' => '</div>',
			) );									
		
		echo '</div><!-- end .wrap --></div><!-- end #home-feature-bg-alt -->';
				
	}	
	if(is_active_sidebar( 'welcome-feature-1' ) || is_active_sidebar( 'welcome-feature-2' ) || is_active_sidebar( 'welcome-feature-3' ) ){
	echo '<div class="home-feature-bg"><div class="wrap">';
	
	echo '<div class="welcome-features">';
			
			genesis_widget_area( 'welcome-feature-4', array(
				'before' => '<div class="welcome-feature-1">',
				'after' => '</div>',
			) );
			
			genesis_widget_area( 'welcome-feature-5', array(
				'before' => '<div class="welcome-feature-2">',
				'after' => '</div>',
			) );
			
			genesis_widget_area( 'welcome-feature-6', array(
				'before' => '<div class="welcome-feature-3">',
				'after' => '</div>',
			) );				
		
	echo '</div><!-- end .welcome-features --></div><!-- end .wrap --></div><!-- end #welcome -->';
	}
	
	if ( is_active_sidebar( 'home-feature-3' ) || is_active_sidebar( 'home-feature-4' ) ) {	
	echo '<div class="home-feature-bg-dark"><div class="wrap">';
		
			genesis_widget_area( 'home-feature-3', array(
				'before' => '<div class="home-feature-1">',
				'after' => '</div>',
			) );
			
			genesis_widget_area( 'home-feature-4', array(
				'before' => '<div class="home-feature-2">',
				'after' => '</div>',
			) );									
		
		echo '</div><!-- end .wrap --></div><!-- end #home-feature-bg-alt -->';
	
	}
}

genesis();
