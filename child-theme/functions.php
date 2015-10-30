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

/**
 * Generate CSS using customizer settings data.
 */
function dtg_customize_css() {
	?>
		 <style type="text/css">
			 .site-title a { color: <?php echo esc_attr( get_theme_mod( 'dtg_title_colour' ) ); ?>; }

			 html,
			 body { background-color: <?php echo esc_attr( get_theme_mod( 'dtg_background' ) ); ?>; }

			 .sidebar { background-color: <?php echo esc_attr( get_theme_mod( 'dtg_sidebar' ) ); ?>; }

			 /** Repeat for every element/selector you're targeting **/
		 </style>
	<?php
}
add_action( 'wp_head', 'dtg_customize_css' );
