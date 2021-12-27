<?php
/**
 * Lee Theme: This file defines all the global variables used in the theme
 *
 * @package WordPress
 * @subpackage lee-theme
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	echo 'Hi there!  I\'m just a file, not much I can do when called directly.';
	exit; // Exit if accessed directly.
}

define( 'LEE_THEME_VERSION', '1.0.0' );

$default_theme_values = array(
	'BACKGROUND_COLOR' => '#',
	'SITE_TITLE'       => 'Lee Tockar Art',
	'FOOTER_TITLE'     => 'LEE TOCKAR ARTWORK',
	'FOOTER_COPYRIGHT' => '&copy; Lee Tockar',
);

foreach ( $default_theme_values as $key => $value ) {
	define( $key, $value );
}
