<?php
/**
 * This function generates the necessary sections and fields for the header panel options in the customizer
 *
 * @package WordPress
 * @subpackage lee-theme
 * @since 1.0
 */

if ( ! function_exists( 'lee_theme_customize_header_setup' ) ) :

	/**
	 * Add header section
	 *
	 * @param object $wp_customize The WordPress Customizer object.
	 */
	function lee_theme_customize_header_setup( $wp_customize ) {

		/**
		 * Header
		 */
		$wp_customize->add_section(
			'header_custom',
			array(
				'capability' => 'edit_theme_options',
				'title'      => esc_html__( 'Header', 'lee-theme' ),
				'priority'   => 50,
			)
		);

		$wp_customize->add_setting(
			'header_textcolor',
			array(
				'section'   => 'header_custom',
				'default'   => '#ffffff',
				'transport' => 'postMessage',
			)
		);
	}

	add_action( 'customize_register', 'lee_theme_customize_header_setup' );
	endif;

?>