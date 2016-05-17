<?php
/**
 * Hashcore Theme Customizer.
 *
 * @package Hashcore
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hashcore_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport				 = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport	= 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'hashcore_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hashcore_customize_preview_js() {
	wp_enqueue_script( 'hashcore_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hashcore_customize_preview_js' );

/**
 * Add alternative logo used in footer
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hashcore_theme_customizer( $wp_customize ) {

	$wp_customize->add_section( 'hashcore_alt_logo_section' , array(
		'title'			 => __( 'Alternative Logo', 'hashcore' ),
		'priority'		=> 31,
		'description' => 'Upload alternative logo for footer.',
	) );

	$wp_customize->add_setting(
		'hashcore_alt_logo',
		array(
			'sanitize_callback' => 'hashcore_sanitize_upload',
			'default'	=> get_template_directory_uri() . '/assets/images/logo_alfacent_alt.png',
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hashcore_alt_logo', array(
		'label'		=> __( 'Alternative Logo', 'hashcore' ),
		'section'	=> 'hashcore_alt_logo_section',
		'settings' => 'hashcore_alt_logo',
	) ) );
}
add_action( 'customize_register', 'hashcore_theme_customizer' );


function hashcore_sanitize_upload( $input ) {
	return esc_url_raw( $input );
}
