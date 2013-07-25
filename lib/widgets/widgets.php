<?php
/**
 * Main Widgets File
 *
 * This file registers all of this child theme's widgets
 *
 * @package      Core_Functionality
 * @author       Travis Smith <travis@wpsmith.net>
 * @copyright    Copyright (c) 2012, Travis Smith
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0
 *
 */
 
/** Include widget class files */
//include_once( SBRIDGE_DIR . '/lib/widgets/widget-category.php' );
include_once( SBRIDGE_DIR . '/lib/widgets/widget-authors.php' );

add_action( 'widgets_init', 'sbridge_load_widgets' , 25 );
/**
 * Register widgets for use in the Child theme.
 */
function sbridge_load_widgets() {
	//register_widget( 'Sbridge_Category_Widget' );
	register_widget( 'Sbridge_Authors_Widget' );
}

// add_action('widgets_init', 'sbridge_remove_widgets', 20);
/**
 * Unregister default widgets.
 */
function sbridge_remove_widgets() {

	// Remove these WordPress widgets:
	//unregister_widget('WP_Widget_Pages');
	//unregister_widget('WP_Widget_Calendar');
	//unregister_widget('WP_Widget_Archives');
	//unregister_widget('WP_Widget_Links');
	//unregister_widget('WP_Widget_Meta');
	//unregister_widget('WP_Widget_Search');
	//unregister_widget('WP_Widget_Text');
	//unregister_widget('WP_Widget_Categories');
	//unregister_widget('WP_Widget_Recent_Posts');
	//unregister_widget('WP_Widget_Recent_Comments');
	//unregister_widget('WP_Widget_RSS');
	//unregister_widget('WP_Widget_Tag_Cloud');
	//unregister_widget('WP_Nav_Menu_Widget');

	// Remove these Genesis widgets:
	//unregister_widget('Genesis_eNews_Updates');
	//unregister_widget('Genesis_Featured_Page');
	//unregister_widget('Genesis_User_Profile_Widget');
	//unregister_widget('Genesis_Menu_Pages_Widget');
	//unregister_widget('Genesis_Widget_Menu_Categories');
	//unregister_widget('Genesis_Featured_Post');
	//unregister_widget('Genesis_Latest_Tweets_Widget');

	// Remove other widgets

}
