<?php
//* Start the engine
require_once( get_template_directory() . '/lib/init.php' );

//* Apollo Library
require 'lib/init.php';



add_filter( 'genesis_footer_creds_text', 'apollo_footer_text' );
function apollo_footer_text() {
    echo '<div class="creds"><p>';
    echo 'Copyright &copy; ';
    echo date('Y');
    echo ' &middot; <a href="'.get_bloginfo('wpurl').'">'.get_bloginfo('name').'</a> &middot; Flyger <a href="http://www.igomoon.com" rel="nofollow" title="iGoMoon Rocket">iGoMoon</a> &middot; '.do_shortcode('[footer_loginout]');
    echo '</p></div>';
}


//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'iGoMoon Apollo Theme', 'igomoon-apollo' );
define( 'CHILD_THEME_URL', 'http://www.igomoon.com/products/themes/' );
define( 'CHILD_THEME_VERSION', '1.0' );
define( 'ROCKET_NAME', 'apollo' );
define('ROCKET_UPGRADE_KEY', 'Asdf1234%');


//* Enqueue Lato Google font
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Open+Sans:300,400,700', array(), PARENT_THEME_VERSION );
	wp_enqueue_script( 'apollo-scripts', get_bloginfo( 'stylesheet_directory' ) . '/script.min.js', array( 'jquery' ), PARENT_THEME_VERSION );
}

add_action('admin_enqueue_scripts', 'atlantis_admin_enqueue');
function atlantis_admin_enqueue(){
	wp_enqueue_style('atlantis-admin-style', get_bloginfo('stylesheet_directory') . '/lib/css/admin.css');
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );


// Add support for custom header
add_theme_support( 'genesis-custom-header', array(
	'width' => 300,
	'height' => 85
) );

//* Disable some sidebar settings
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );


// Add new image sizes 
add_image_size( 'featured-img', 730, 420, TRUE );
add_image_size( 'featured-page', 341, 173, TRUE );
add_image_size( 'portfolio-thumbnail', 264, 200, TRUE );

// Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

// Reposition the Secondary Navigation
remove_action( 'genesis_after_header', 'genesis_do_subnav' ) ;
add_action( 'genesis_header_right', 'genesis_do_subnav' );

// Before Header Wrap
add_action( 'genesis_before_header', 'before_header_wrap' );
function before_header_wrap() {
	echo '<div class="head-wrap">';
}

// Reposition the Primary Navigation
remove_action( 'genesis_after_header', 'genesis_do_nav' ) ;
add_action( 'genesis_header_right', 'genesis_do_nav' );

// After Header Wrap
add_action( 'genesis_after_header', 'after_header_wrap' );
function after_header_wrap() {
	echo '</div>';
}

// Customize search form input box text
add_filter( 'genesis_search_text', 'custom_search_text' );
function custom_search_text($text) {
    return esc_attr( 'Search...' );
}

add_action( 'admin_menu', 'apollo_theme_settings_init', 15 ); 


//* Unregister header right widget
unregister_sidebar( 'header-right' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 4 );

// Register widget areas
genesis_register_sidebar( array(
	'id'			=> 'slider-wide',
	'name'			=> __( 'Slider Wide', 'igomoon-apollo' ),
	'description'	=> __( 'This is the wide slider section of the homepage.', 'igomoon-apollo' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'welcome-feature-1',
	'name'			=> __( 'Welcome Feature #1', 'igomoon-apollo' ),
	'description'	=> __( 'This is the first column of the Welcome feature section of the homepage.', 'igomoon-apollo' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'welcome-feature-2',
	'name'			=> __( 'Welcome Feature #2', 'igomoon-apollo' ),
	'description'	=> __( 'This is the second column of the Welcome feature section of the homepage.', 'igomoon-apollo' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'welcome-feature-3',
	'name'			=> __( 'Welcome Feature #3', 'igomoon-apollo' ),
	'description'	=> __( 'This is the third column of the Welcome feature section of the homepage.', 'igomoon-apollo' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-feature-1',
	'name'			=> __( 'Home Feature #1 (Left)', 'igomoon-apollo' ),
	'description'	=> __( 'This is the first column of the feature section of the homepage.', 'igomoon-apollo' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-feature-2',
	'name'			=> __( 'Home Feature #2 (Right)', 'igomoon-apollo' ),
	'description'	=> __( 'This is the second column of the feature section of the homepage.', 'igomoon-apollo' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'welcome-feature-4',
	'name'			=> __( 'Welcome Feature #4', 'igomoon-apollo' ),
	'description'	=> __( 'This is the first column of the Welcome feature section of the homepage.', 'igomoon-apollo' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'welcome-feature-5',
	'name'			=> __( 'Welcome Feature #5', 'igomoon-apollo' ),
	'description'	=> __( 'This is the second column of the Welcome feature section of the homepage.', 'igomoon-apollo' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'welcome-feature-6',
	'name'			=> __( 'Welcome Feature #6', 'igomoon-apollo' ),
	'description'	=> __( 'This is the third column of the Welcome feature section of the homepage.', 'igomoon-apollo' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-feature-3',
	'name'			=> __( 'Home Feature #3 (Left)', 'igomoon-apollo' ),
	'description'	=> __( 'This is the first column of the feature section of the homepage.', 'igomoon-apollo' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-feature-4',
	'name'			=> __( 'Home Feature #4 (Right)', 'igomoon-apollo' ),
	'description'	=> __( 'This is the second column of the feature section of the homepage.', 'igomoon-apollo' ),
) );

