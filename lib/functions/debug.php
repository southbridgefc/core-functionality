<?php
/**
 * Debug
 *
 * This file contains any general debug functions
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Travis Smith <t@wpsmith.net>
 * @copyright    Copyright (c) 2011, Travis Smith
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
 
if ( ! function_exists( 'wps_printr' ) ) {
function wps_printr( $args ) {
	echo '<pre>';
	htmlentities( print_r( $args ) );
	echo '</pre>';
}
}

if ( ! function_exists( 'wps_debug' ) ) {
add_action( 'template_redirect', 'wps_debug' );
function wps_debug() {
	global $wp_query;
	if ( isset( $_GET['debug'] ) ) {
		wps_printr( $wp_query );
	}
}
}