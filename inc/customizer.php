<?php
/**
 * Hacked: Customizer
 *
 * @package Hacked
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hacked_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'hacked_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'hacked_customize_partial_blogdescription',
		)
	);
}

add_action( 'customize_register', 'hacked_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @see hacked_customize_register()
 *
 * @return void
 */
function hacked_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @see hacked_customize_register()
 *
 * @return void
 */
function hacked_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function hacked_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function hacked_customize_preview_js() {
	wp_enqueue_script( 'hacked-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'hacked_customize_preview_js' );


