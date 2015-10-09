<?php

/**
 * Customizer API.
 */

/**
 * Validation setting data
 * @param  string $data Setting data.
 * @return string       Validated setting data.
 */
function wcmcr_validate_phone( $data ) {

	$sanitized = preg_replace( '/[^0-9 ]+/', '', $data );

	return $sanitized;
}

/**
 * Enqueue our customizer Javascriot
 */
function wcmcr_customizer_js() {

	wp_enqueue_script(
		'wcmcr-customizer-js',
		get_stylesheet_directory_uri() . '/js/customizer.js',
		array( 'jquery','customize-preview' ),
		false,
		true // In the footer!
	);
}
add_action( 'customize_preview_init', 'wcmcr_customizer_js' );

/**
 * Demo part one - phone number.
 * @param  object $wp_customize Customizer object.
 */
function wcmcr_customize_one( $wp_customize ) {
	// SETTING.
	$wp_customize->add_setting( 'wcmcr_phone_number',
		array(
			'default'    => '07890 123 456',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'wcmcr_validate_phone',
		)
	);

	// SECTION.
	$wp_customize->add_section( 'wcmcr_section_contact',
		array(
			'title'          => 'Contact Info',
			'description'    => 'Section for WCMCR controls.',
			'capability'     => 'manage_options',
			'theme-supports' => '',
			'priority'       => 10,
			'panel'          => 'wcmcr_panel',
		)
	);

	// PANEL.
	$wp_customize->add_panel( 'wcmcr_panel',
		array(
			'title'          => 'WCMCR Panel',
			'description'    => 'Panel for WCMCR.',
			'capability'     => 'manage_options',
			'theme-supports' => '',
			'priority'       => 10,
		)
	);

	// CONTROL.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wcmcr_phone_number',
			array(
				'label'    => 'Phone Number',
				'section'  => 'wcmcr_section_contact',
				'settings' => 'wcmcr_phone_number',
				'type'     => 'text',
				'priority' => 10,
				'active_callback' => 'is_front_page',
			)
		)
	);

	// ADDITIONAL CONTROLS FOR DEMO IMAGES.

}
add_action( 'customize_register', 'wcmcr_customize_one' );

/**
 * Demo part two - title colour.
 * @param  object $wp_customize Customizer object.
 */
function wcmcr_customize_two( $wp_customize ) {
	// SETTING.
	$wp_customize->add_setting( 'wcmcr_title_colour',
		array(
			'default'    => '#000',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
			'priority'   => 10,
		)
	);

	// SECTION.
	$wp_customize->add_section( 'wcmcr_section_colour',
		array(
			'title'       => 'Colour Options',
			'description' => 'Colour options for WCMCR.',
			'capability'  => 'manage_options',
			'priority'    => 20,
			'panel'       => 'wcmcr_panel',
		)
	);

	// CONTROL.
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wcmcr_title_colour',
			array(
				'label'    => 'Title Colour',
				'section'  => 'wcmcr_section_colour',
				'settings' => 'wcmcr_title_colour',
			)
		)
	);
}
add_action( 'customize_register', 'wcmcr_customize_two' );

/**
 * Demo part three - one I made earlier
 */
function wcmcr_customize_three( $wp_customize ) {

	// SETTINGS.
	$wp_customize->add_setting( 'wcmcr_logo',
		array(
			'default'    => '',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_setting( 'wcmcr_heading_text',
		array(
			'default'    => '',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_setting( 'wcmcr_paragraph_text',
		array(
			'default'    => '',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_setting( 'wcmcr_sidebar',
		array(
			'default'    => '#ffffff',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	$wp_customize->add_setting( 'wcmcr_background',
		array(
			'default'    => '#f1f1f1',
			'capability' => 'manage_options',
			'transport'  => 'postMessage',
		)
	);

	// SECTION.
	$wp_customize->add_section( 'wcmcr_section_crazy',
		array(
			'title'       => 'Something I Made Earlier',
			'capability'  => 'manage_options',
			'priority'    => 30,
			'panel'       => 'wcmcr_panel',
		)
	);

	// CONTROLS.
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'wcmcr_logo',
			array(
				'label'    => 'Site Logo',
				'section'  => 'wcmcr_section_crazy',
				'settings' => 'wcmcr_logo',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wcmcr_foreground',
			array(
				'label'    => 'Sidebar Colour',
				'description' => 'Try #FFDF00',
				'section'  => 'wcmcr_section_crazy',
				'settings' => 'wcmcr_sidebar',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'wcmcr_background',
			array(
				'label'    => 'Background Colour',
				'description' => 'Try #F4CA16',
				'section'  => 'wcmcr_section_crazy',
				'settings' => 'wcmcr_background',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wcmcr_heading_text',
			array(
				'label'    => 'Heading Text',
				'section'  => 'wcmcr_section_crazy',
				'settings' => 'wcmcr_heading_text',
				'type'     => 'text',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wcmcr_paragraph_text',
			array(
				'label'    => 'Paragraph Text',
				'section'  => 'wcmcr_section_crazy',
				'settings' => 'wcmcr_paragraph_text',
				'type'     => 'textarea',
			)
		)
	);
}
add_action( 'customize_register', 'wcmcr_customize_three' );
