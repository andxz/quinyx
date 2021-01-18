<?php
	
/*
	Template Name: Page Content
*/

remove_action('genesis_loop', 'genesis_do_loop');

remove_action('genesis_entry_header', 'genesis_post_info', 12);
remove_action('genesis_entry_header', 'genesis_do_post_title');
remove_action('genesis_entry_content', 'genesis_do_post_content');
remove_action('genesis_entry_footer', 'genesis_post_meta');

add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action('genesis_after_header', function() {

	foreach( get_field('page_content') as $content )
	{
		if(isset($content['acf_fc_layout']) && file_exists(get_stylesheet_directory() . '/page-templates/fc-layouts/' . $content['acf_fc_layout'] . '.php')) {
		
			require get_stylesheet_directory() . '/page-templates/fc-layouts/' . $content['acf_fc_layout'] . '.php';
		
		}
	}
	
});

genesis();