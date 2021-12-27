<?php
/**
 * Lee Theme: Single Page Customizer
 *
 * @package WordPress
 * @subpackage lee-theme
 * @since 1.0
 */

if ( isset( $wp_customize ) ) {
	/*
	 * Adding custom sections
	 */
	require get_template_directory() . '/inc/custom/custom-footer.php';
	require get_template_directory() . '/inc/custom/custom-header.php';
}
