<?php

require get_stylesheet_directory() . '/inc/customizer.php';

/**
 * Enqueue assets.
 */
function dtg_enqueue_assets() {
	// Parent theme CSS.
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

	// Child theme CSS.
	wp_enqueue_style( 'cpd-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'dtg_enqueue_assets' );
