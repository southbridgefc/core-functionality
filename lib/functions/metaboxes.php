<?php
/**
 * Metaboxes
 *
 * This file registers any custom metaboxes
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         http://wpsmith.net/
 * @author       Travis Smith <t@wpsmith.net>
 * @copyright    Copyright (c) 2011, Travis Smith
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */


add_filter( 'cmb_meta_boxes' , 'wps_metaboxes' );
/**
 * Create Metaboxes
 * @since 1.0.0
 * @link http://www.billerickson.net/wordpress-metaboxes/
 */
function wps_metaboxes( $meta_boxes ) {
	$meta_boxes[] = array(
		'id'         => 'page-options',
		'title'      => 'Page Options',
		'pages'      => array( 'page' ), 
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, 
		'fields'     => array(
			array(
				'name' => 'Subtitle',
				'desc' => '',
				'id'   => 'wps_page_subtitle',
				'type' => 'text'
			),
		),
	);
	
	return $meta_boxes;
}
 
add_action( 'init', 'wps_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize Metabox Class
 * @since 1.0.0
 * see /lib/metabox/example-functions.php for more information
 *
 */
function wps_initialize_cmb_meta_boxes() {
	if ( ! class_exists( 'cmb_Meta_Box' ) ) {
		require_once( SBRIDGE_DIR . '/lib/metabox/init.php' );
	}
}
