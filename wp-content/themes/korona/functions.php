<?php
include 'inc/frontend.php';


//add_action('get_header', 'korona_filter_head');
//
//function korona_filter_head() {
//    remove_action('wp_head', '_admin_bar_bump_cb');
//}

/**
 * Register and Enqueue Styles.
 */
function korona_register_styles() {

    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'korona-style', get_stylesheet_uri(), array(), $theme_version );
//	wp_style_add_data( 'twentytwenty-style', 'rtl', 'replace' );
//
//	// Add output of Customizer settings as inline style.
//	wp_add_inline_style( 'twentytwenty-style', twentytwenty_get_customizer_css( 'front-end' ) );
//
//	// Add print CSS.
//	wp_enqueue_style( 'twentytwenty-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );

}

add_action( 'wp_enqueue_scripts', 'korona_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function korona_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script( 'korona-js', get_template_directory_uri() . '/assets/js/index.js', array(), $theme_version, true );
	wp_enqueue_script( 'korona-js-autocomplete', get_template_directory_uri() . '/assets/js/autocomplete.js', array(), $theme_version, true );
	wp_enqueue_script( 'korona-js-upsvr-emails', get_template_directory_uri() . '/assets/js/upsvr-emails.js', array(), $theme_version, true );
}

add_action( 'wp_enqueue_scripts', 'korona_register_scripts' );

add_theme_support( 'title-tag' );