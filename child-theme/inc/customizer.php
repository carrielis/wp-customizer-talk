<?php
/**
 * Functions relating to the Customizer API.
 */

/**
 * Validation utlity function for use with setting data.
 * @param  string $data Setting data.
 * @return string       Validated setting data.
 */
function dtg_validate_phone( $data ) {

	$sanitized = preg_replace( '/[^0-9 ]+/', '', $data );

	return $sanitized;
}

/**
 * Demo part one - adding a phone number.
 * @param  object $wp_customize Customizer object.
 */
function dtg_customize_one( $wp_customize ) {

	// SETTING.
	$wp_customize->add_setting( 'dtg_phone_number',
		array(
			'default'    => '07890 123 456',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'dtg_validate_phone',
		)
	);

	// SECTION.
	$wp_customize->add_section( 'dtg_section_contact',
		array(
			'title'          => 'Contact Info',
			'description'    => 'Section for DTG controls.',
			'capability'     => 'manage_options',
			'theme-supports' => '',
			'priority'       => 10,
			'panel'          => 'dtg_panel',
		)
	);

	// PANEL.
	$wp_customize->add_panel( 'dtg_panel',
		array(
			'title'          => 'DTG Panel',
			'description'    => 'Panel for DTG sections.',
			'capability'     => 'manage_options',
			'theme-supports' => '',
			'priority'       => 10,
		)
	);

	// CONTROL.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'dtg_phone_number',
			array(
				'label'    => 'Phone Number',
				'section'  => 'dtg_section_contact',
				'settings' => 'dtg_phone_number',
				'type'     => 'text',
				'priority' => 10,
				'active_callback' => 'is_front_page',
			)
		)
	);
}
add_action( 'customize_register', 'dtg_customize_one' );

/**
 * Demo part two - title colour.
 * @param  object $wp_customize Customizer object.
 */
function dtg_customize_two( $wp_customize ) {

	// SETTING.
	$wp_customize->add_setting( 'dtg_title_colour',
		array(
			'default'    => '#000',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
			'priority'   => 10,
		)
	);

	// SECTION.
	$wp_customize->add_section( 'dtg_section_colour',
		array(
			'title'       => 'Colour Options',
			'description' => 'Colour options for DTG.',
			'capability'  => 'manage_options',
			'priority'    => 20,
			'panel'       => 'dtg_panel',
		)
	);

	// CONTROL.
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'dtg_title_colour',
			array(
				'label'    => 'Title Colour',
				'section'  => 'dtg_section_colour',
				'settings' => 'dtg_title_colour',
			)
		)
	);
}
add_action( 'customize_register', 'dtg_customize_two' );

/**
 * Demo part three - "one I made earlier" WCMCR clone.
 */
function dtg_customize_three( $wp_customize ) {

	// SETTINGS.
	$wp_customize->add_setting( 'dtg_logo',
		array(
			'default'    => '',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_setting( 'dtg_heading_text',
		array(
			'default'    => '',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_setting( 'dtg_paragraph_text',
		array(
			'default'    => '',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_setting( 'dtg_sidebar',
		array(
			'default'    => '#ffffff',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_setting( 'dtg_background',
		array(
			'default'    => '#f1f1f1',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	// SECTION.
	$wp_customize->add_section( 'dtg_section_crazy',
		array(
			'title'       => 'One I Made Earlier',
			'capability'  => 'manage_options',
			'priority'    => 30,
			'panel'       => 'dtg_panel',
		)
	);

	// CONTROLS.
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'dtg_logo',
			array(
				'label'    => 'Site Logo',
				'section'  => 'dtg_section_crazy',
				'settings' => 'dtg_logo',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'dtg_foreground',
			array(
				'label'    => 'Sidebar Colour',
				'description' => 'Use #FFDF00',
				'section'  => 'dtg_section_crazy',
				'settings' => 'dtg_sidebar',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'dtg_background',
			array(
				'label'    => 'Background Colour',
				'description' => 'Use #F4CA16',
				'section'  => 'dtg_section_crazy',
				'settings' => 'dtg_background',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'dtg_heading_text',
			array(
				'label'    => 'Heading Text',
				'section'  => 'dtg_section_crazy',
				'settings' => 'dtg_heading_text',
				'type'     => 'text',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'dtg_paragraph_text',
			array(
				'label'    => 'Paragraph Text',
				'section'  => 'dtg_section_crazy',
				'settings' => 'dtg_paragraph_text',
				'type'     => 'textarea',
			)
		)
	);
}
add_action( 'customize_register', 'dtg_customize_three' );

/**
 * Enqueue our customizer Javascriot
 */
function dtg_customizer_js() {

	wp_enqueue_script(
		'dtg-customizer-js',
		get_stylesheet_directory_uri() . '/js/customizer.js',
		array( 'jquery','customize-preview' ),
		false,
		true // In the footer!
	);
}
add_action( 'customize_preview_init', 'dtg_customizer_js' );

/**
 * Generate CSS using customizer settings data.
 */
function dtg_customize_css() {
	?>
		 <style type="text/css">
			 .site-title a {
			 	color: <?php echo esc_attr( get_theme_mod( 'dtg_title_colour' ) ); ?>;
			 }

			 html,
			 body {
			 	background-color: <?php echo esc_attr( get_theme_mod( 'dtg_background' ) ); ?>;
			 }

			 .sidebar {
			 	background-color: <?php echo esc_attr( get_theme_mod( 'dtg_sidebar' ) ); ?>;
			 }

			 /** Repeat for every element/selector you're targeting **/
		 </style>
	<?php
}
add_action( 'wp_head', 'dtg_customize_css' );
