<?php
	
/*
	Template Name: Page Content 2020
*/

add_action( 'wp_head', function() {
	echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">';	
	echo '<link rel="stylesheet" href="/wp-content/themes/igomoon-website/assets/css/2020/style.css">';
	echo '<script src="/wp-content/themes/igomoon-website/assets/js/scripts.js"></script>';	
	echo '<script src="https://kit.fontawesome.com/9983c20184.js" crossorigin="anonymous"></script>';	
});

remove_action('genesis_loop', 'genesis_do_loop');

remove_action('genesis_entry_header', 'genesis_post_info', 12);
remove_action('genesis_entry_header', 'genesis_do_post_title');
remove_action('genesis_entry_content', 'genesis_do_post_content');
remove_action('genesis_entry_footer', 'genesis_post_meta');

add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
add_filter( 'body_class', 'custom_class' );
function custom_class( $classes ) {
    if ( get_field('dark_menu') ) {
        $classes[] = 'dark_menu';
    }
    return $classes;
}

add_action('genesis_after_header', function() {

	foreach( get_field('page_content') as $content )
	{
		if(isset($content['acf_fc_layout']) && file_exists(get_stylesheet_directory() . '/page-templates/modules/' . $content['acf_fc_layout'] . '.php')) {
		
			require get_stylesheet_directory() . '/page-templates/modules/' . $content['acf_fc_layout'] . '.php';
		
		}
	}
	
});

genesis();