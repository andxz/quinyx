<?php

/*
Plugin Name: iGoMoon Functions
Plugin URI: http://igomoon.com/
Description: Extra functions.
Version: 1.0
Author: iGoMoon AB
Author URI: http://igomoon.com/
*/

add_filter( 'widget_text', 'do_shortcode');

//ADD IGOMOON CUSTOM SCRIPTS 
add_action( 'wp_enqueue_scripts', 'igomoon_custom_scripts' );
function igomoon_custom_scripts() {
	wp_enqueue_script( 'igomoon-custom-scripts', plugins_url( '/igomoon-custom-scripts.js', __FILE__ ), array( 'jquery' ), PARENT_THEME_VERSION );
}

// FIX CLASSES FOR STICKY SIDEBAR
add_filter('body_class', 'addClassTobody');
function addClassTobody($classes){
	if ( get_field('top_image') ) {
		$classes[] = 'fixedSidebar';	
	}
	return $classes;
}

// FOOD
add_action( 'genesis_entry_content', 'food');
function food() {
	if( get_field('matsedel') ) {
		$matsedel = get_field('matsedel');
		foreach( $matsedel as $mat ) {
			echo '<div class="food">';
				echo '<h4>Vecka ' . $mat['weeknumber'] . '</h4>';
				$m = $mat['week'];
				foreach( $m as $mats ) {
					echo '<strong>' . $mats['weekday'] . '</strong><br>';
						$food = $mats['food'];
						foreach( $food as $f ) {
							echo $f['title'] . '<br>';
							echo $f['content'] . '<br><br>';
						}
				}
			echo '</div>';
		}
	}
}

// DOCUMENT
add_action( 'genesis_entry_content', 'document');
function document() {
	if( get_field('document') ) {
		$document = get_field('document');
		foreach( $document as $docs ) {
			echo '<h4>' . $docs['header'] . '</h4>';
			if ($docs['ingress']){
				echo $docs['ingress'];
			}
			
			$doc = $docs['document'];
			foreach( $doc as $d ) {
				echo '<a href="' . $d['file'] . '" target="_blank">' . $d['file_name'] . ' »</a><br>';
			}
			echo '<br>';
		}
	}
}

// COWORKERS
add_action( 'genesis_after_entry_content', 'coworkers');
	function coworkers() {
		if ( get_field('medarbetare') ) {
			echo '<div class="entry-content">';
				echo '<h4>Ledning</h4>';
				$coworkers = get_field('medarbetare');
				foreach( $coworkers as $coworker ) {
					echo '<div class="coworker">';
					if ( $coworker['image'] ) {
						echo '<img src="' . $coworker['image'] . '" /><br>';
					}
					echo '<strong>' . $coworker['name'] . '</strong><br>';
					echo '<p>' . $coworker['text'] . '</p>';
					echo '</div>';
				}
			echo '</div>';
		}
}

// JOB FEED
add_action( 'genesis_after_entry_content', 'jobs');
function jobs() {
	if ( is_page('109') ) {
		echo '<div class="entry-content">';
		echo '<div class="if-empty" style="font-weight:600;"></div>';
		echo do_shortcode( '[ic_add_posts category="jobb" template="job-template.php" order="ASC"]' );
		echo '</div>';
	}
}

