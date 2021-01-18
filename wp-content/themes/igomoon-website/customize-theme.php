<?php

function igomoon_website_enqueue_customize_script(){
	wp_enqueue_script( 'igomoon-website-customizer-script', get_stylesheet_directory_uri() . '/assets/js/customize.js', array('jquery', 'customize-preview'));
}
add_action('customize_preview_init', 'igomoon_website_enqueue_customize_script');



function igomoon_website_customize_register( $wp_customize ) {
	//All our sections, settings, and controls will be added here

	$wp_customize->add_panel('igomoon', array(
		'title' => 'iGoMoon'
	));


	// Color section
	$wp_customize->add_section( 'igomoon_colors' , array(
		'title'      => __( 'Colors', 'igomoon' ),
		'priority'   => 200,
		'panel'		 => 'igomoon'
	) );


	$wp_customize->add_setting( 'igomoon_link_color', array( 
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control(  new WP_Customize_Color_Control( $wp_customize, 'igomoon_link_color', array(
		'label'        => __( 'Body link Color', 'mytheme' ),
		'section'    => 'igomoon_colors',
		'settings'   => 'igomoon_link_color',
	) ));


	//************** TODO **************//
	//*** header
	// 

	// Body Background

	//*** Footer
	// Footer background
	// Footer link color
	// Footer text color
	// Footer header color
	


	$wp_customize->get_setting( 'igomoon_link_color' )->transport = 'postMessage';

}
add_action( 'customize_register', 'igomoon_website_customize_register' );