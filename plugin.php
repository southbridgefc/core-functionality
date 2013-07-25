<?php
/**
 * Plugin Name: Southbridge Core Functionality
 * Plugin URI: https://wpsmith.net
 * Description: This contains all your site's core functionality so that it is theme independent.
 * Version: 1.1.0
 * Author: Travis Smith
 * Author URI: http://wpsmith.net
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume 
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

// Plugin Directory 
define( 'SBRIDGE_DIR', dirname( __FILE__ ) );
 
// Post Types
//include_once( SBRIDGE_DIR . '/lib/functions/post-types.php' );

// Taxonomies 
//include_once( SBRIDGE_DIR . '/lib/functions/taxonomies.php' );

// Metaboxes
//include_once( SBRIDGE_DIR . '/lib/functions/metaboxes.php' );
 
// Shortcodes
//include_once( SBRIDGE_DIR . '/lib/functions/shortcodes.php' );

// Facebook Open Graph Tags
// -- Set default image in general.php
include_once( SBRIDGE_DIR . '/lib/functions/facebook.php' );

// Widgets
include_once( SBRIDGE_DIR . '/lib/widgets/widgets.php' );

// General
include_once( SBRIDGE_DIR . '/lib/functions/general.php' );

// Debug
include_once( SBRIDGE_DIR . '/lib/functions/debug.php' );