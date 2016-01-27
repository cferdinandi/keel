<?php

/**
 * Custom Logo
 * @link http://kwight.ca/2012/12/02/adding-a-logo-uploader-to-your-wordpress-site-with-the-theme-customizer/
 * @link http://ottopress.com/tag/customizer/
 */


	function keel_add_custom_logo_support( $wp_customize ) {

		// Check if activated
		$dev_options = keel_developer_options();
		if ( !$dev_options['custom_logo'] ) return;

		$wp_customize->add_section( 'keel_logo_section' , array(
			'title'       => __( 'Logo', 'keel' ),
			'priority'    => 30,
			'description' => 'Upload a logo to replace the default site name and description in the header',
		) );

		$wp_customize->add_setting( 'keel_logo' );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'keel_logo', array(
			'label'    => __( 'Logo', 'keel' ),
			'section'  => 'keel_logo_section',
			'settings' => 'keel_logo',
		) ) );
	}
	add_action( 'customize_register', 'keel_add_custom_logo_support' );
