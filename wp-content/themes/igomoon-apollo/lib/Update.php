<?php


add_filter( 'site_transient_update_themes', 'apollo_remote_update_theme' );
add_filter( 'transient_update_themes', 'apollo_remote_update_theme' );

function apollo_remote_update_theme( $update_plugins ) {
	if ( ! is_object( $update_plugins ) )
		return $update_plugins;

	if ( ! isset( $update_plugins->response ) || ! is_array( $update_plugins->response ) )
		$update_plugins->response = array();
 
	if(get_transient( 'rocket_version' ) === false){
		$json = file_get_contents('http://api.igomoon.com/'.ROCKET_NAME.'/version.json');
		set_transient( 'rocket_version', json_decode($json)->latest, 3600 );
	}
	
	$version = get_transient( 'rocket_version' );
	
	if(ROCKET_VERSION < $version) {
		// Do whatever you need to see if there's a new version of your plugin
		// Your response will need to look something like this if it's out of date:	
		$update_plugins->response['iGoMoon-Apollo'] = array(
				'slug'         => 'igomoon-apollo', // Whatever you want, as long as it's not on WordPress.org
				'new_version'  => $version, // The newest versionersio
				'url'          => 'https://bitbucket.org/igomoon/apollo', // Informational
				'package'      => 'http://api.igomoon.com?version='.$version.'&rocket=apollo&key='.ROCKET_UPGRADE_KEY.'&site='.home_url()   // Where WordPress should pull the ZIP from.	
		);
	}
 	return $update_plugins;
}