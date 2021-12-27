<?php
/**
 * This function generates the necessary sections and fields for the footer panel options in the customizer
 *
 * @package WordPress
 * @subpackage lee-theme
 * @since 1.0
 */

if ( ! function_exists( 'lee_theme_customize_footer_setup' ) ) :

	/**
	 * Add footer section
	 *
	 * @param object $wp_customize The WordPress Customizer object.
	 */
	function lee_theme_customize_footer_setup( $wp_customize ) {
		/**
		 * Footer
		 */
		$wp_customize->add_section(
			'footer_custom',
			array(
				'capability' => 'edit_theme_options',
				'title'      => esc_html__( 'Footer', 'lee-theme' ),
				'priority'   => 60,
			)
		);

		$wp_customize->add_setting(
			'footer_title',
			array(
				'default'           => '',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'footer_title',
			array(
				'type'     => 'text',
				'section'  => 'footer_custom',
				'label'    => esc_html__( 'Footer Title', 'lee-theme' ),
				'priority' => 15,
			)
		);

		/**
		 * Phone
		 */
		$wp_customize->add_setting(
			'contact_phone',
			array(
				'default'           => '',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'contact_phone',
			array(
				'type'     => 'text',
				'section'  => 'footer_custom',
				'label'    => esc_html__( 'Phone', 'xneelo' ),
				'priority' => 15,
			)
		);

		/**
		 * Mail
		 */
		$wp_customize->add_setting(
			'contact_mail',
			array(
				'default'           => '',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'sanitize_email',
			)
		);

		$wp_customize->add_control(
			'contact_mail',
			array(
				'type'     => 'text',
				'section'  => 'footer_custom',
				'label'    => esc_html__( 'Email', 'lee-theme' ),
				'priority' => 18,
				'json'     => array(
					'add_class' => 'pt-2',
				),
			)
		);

		/**
		 * Address
		 */
		$wp_customize->add_setting(
			'contact_addrs',
			array(
				'default'           => '',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'contact_addrs',
			array(
				'type'     => 'textarea',
				'section'  => 'footer_custom',
				'label'    => esc_html__( 'Address', 'lee-theme' ),
				'priority' => 20,
				'json'     => array(
					'add_class' => 'pt-2 pb-1',
				),
			)
		);

		/**
		 * Copyright
		 */
		$wp_customize->add_setting(
			'copy_right',
			array(
				'default'           => get_theme_mod( 'copy_right', '&copy; ' . gmdate( 'Y' ) . ' Copyright - Powered by xneelo (Pty) Ltd' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'copy_right',
			array(
				'type'     => 'textarea',
				'section'  => 'footer_custom',
				'label'    => esc_html__( 'Copyright', 'lee-theme' ),
				'priority' => 22,
				'json'     => array(
					'add_class' => 'pt-2',
				),
			)
		);

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'copy_right',
				array(
					'selector'        => '.copyright',
					'render_callback' => 'xtheme_customize_partial_copy_right',
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'contact_phone',
				array(
					'selector'        => '.site-footer__contact__phone',
					'render_callback' => 'xtheme_customize_partial_contact_phone',
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'contact_mail',
				array(
					'selector'        => '.site-footer__contact__email',
					'render_callback' => 'xtheme_customize_partial_contact_email',
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'contact_addrs',
				array(
					'selector'        => '.site-footer__contact__addrs',
					'render_callback' => 'xtheme_customize_partial_contact_addrs',
				)
			);
		}
	}
	add_action( 'customize_register', 'lee_theme_customize_footer_setup' );
endif;
