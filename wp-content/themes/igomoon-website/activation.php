<?php



/*
	File is run when activation theme.
*/

add_action('after_switch_theme', 'activate_igomoon_website');

function activate_igomoon_website() {
	
	// If the custom styling directory isn't there. Create it.
	if( ! file_exists( ABSPATH . 'wp-content/variants') ) {
		wp_mkdir_p( ABSPATH . 'wp-content/variants' );
	}

	// If the file variant.js isnt present in the directory. Create it.
	if( !file_exists(ABSPATH . 'wp-content/variants/variant.js') ) {
		file_put_contents(ABSPATH . 'wp-content/variants/variant.js', "/* Write your custom javascript here… */");
	}
	// If the file variant.css isnt present in the directory. Create it.
	if( !file_exists( ABSPATH . 'wp-content/variants/variant.css' ) ) {
		file_put_contents(ABSPATH . 'wp-content/variants/variant.css', "/* Write your custom styling here… */");
	}
    // Create a favicon
    if( !file_exists( ABSPATH . 'wp-content/variants/favicon.ico' )) {
        $file = file_get_contents(__DIR__ . '/images/favicon.ico');
        file_put_contents(ABSPATH . 'wp-content/variants/favicon.ico', $file);
    }
}
