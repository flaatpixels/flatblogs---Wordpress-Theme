<?php
/**
 * flatblogs Theme Customizer
 *
 * @package flatblogs
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flatblogs_customize_register( $wp_customize ) {

	//Remove these customizer default settings
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'static_front_page' );
	$wp_customize->remove_section( 'header_image' );
	$wp_customize->remove_section( 'custom_css' );
	$wp_customize->remove_section( 'colors' );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'flatblogs_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'flatblogs_customize_partial_blogdescription',
		) );
	}

	/**
	 * Customizer settings
	 * For adding image in the front banner page
	 */
	$wp_customize->add_section('banner_image', array(
		"title" => __('Load a banner image', "customizer_banner_image_section"),
		"priority" => 32,
	));

	$wp_customize->add_setting('banner_image_load', array(
		"default" => get_template_directory_uri() . '/img/header.jpg',
		"transport" => "refresh"
	));

	$wp_customize->add_control(new WP_Customize_Image_Control(
		$wp_customize,
		"banner_image_file",
		array(
			"label" => "Grab an image",
			"section" => "banner_image",
			"settings" => "banner_image_load",
		)
	));

	/**
	 * Add customizer settings
	 * To add a description in the footer
	 * Of the blog
	 */
	$wp_customize->add_section("footer_about", array(
		"title" => __("About this blog (in footer)", "customizer_footer_about_sections"),
		"priority" => 30,
	));

	$wp_customize->add_setting("footer_about_title_setting", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"footer_about_title",
		array(
			"label" => __("Enter the section title", "customizer_footer_about_label"),
			"section" => "footer_about",
			"settings" => "footer_about_title_setting",
			"type" => "input"
		)
	));

	$wp_customize->add_setting("footer_about_desc_setting", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"footer_about_about",
		array(
			"label" => __('Enter the section title', "customizer_footer_about_label"),
			"section" => "footer_about",
			"settings" => "footer_about_desc_setting",
			"type" => "textarea"
		)
	));
}
add_action( 'customize_register', 'flatblogs_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function flatblogs_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function flatblogs_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function flatblogs_customize_preview_js() {
	wp_enqueue_script( 'flatblogs-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'flatblogs_customize_preview_js' );
