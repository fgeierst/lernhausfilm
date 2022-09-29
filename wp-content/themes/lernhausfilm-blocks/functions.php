<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lernhausfilm-blocks
 * @since 1.0.0
 */

/**
 * Enqueue the style.css file.
 * 
 * @since 1.0.0
 */
function lhfb_styles() {
	wp_enqueue_style(
		'lhbf-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'lhfb_styles' );

/**
 * Theme support for wp-block-styles 
 * 
 */
if ( ! function_exists( 'lhfb_setup' ) ) {
	function lhfb_setup() {
            add_theme_support( 'wp-block-styles' );
        }
}
add_action( 'after_setup_theme', 'lhfb_setup' );

/**
 * Remove jQuery JavaScript
 * 
 */
function lhfb_jquery_enqueue() {
	wp_deregister_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'lhfb_jquery_enqueue' );