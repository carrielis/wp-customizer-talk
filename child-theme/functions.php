<?php

require get_stylesheet_directory() . '/inc/customizer.php';

/**
 * Enqueue assets.
 */
function wcmcr_enqueue_assets() {
	// Parent theme CSS.
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

	// Child theme CSS.
	wp_enqueue_style( 'cpd-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'wcmcr_enqueue_assets' );

/**
 * Generate CSS using customizer settings data.
 */
function wcmcr_customize_css() {
	?>
		 <style type="text/css">
			 .site-title a { color: <?php echo esc_attr( get_theme_mod( 'wcmcr_title_colour' ) ); ?>; }

			 html,
			 body { background-color: <?php echo esc_attr( get_theme_mod( 'wcmcr_background' ) ); ?>; }

			 .sidebar { background-color: <?php echo esc_attr( get_theme_mod( 'wcmcr_sidebar' ) ); ?>; }

			 /** Repeat for every element/selector you're targeting **/
		 </style>
	<?php
}
add_action( 'wp_head', 'wcmcr_customize_css' );
