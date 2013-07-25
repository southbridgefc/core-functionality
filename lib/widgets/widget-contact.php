<?php
/**
 * Contact Widget
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @author       Travis Smith <t@wpsmith.net>
 * @copyright    Copyright (c) 2011, Travis Smith
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
class WPS_Contact_Widget extends WP_Widget {
	
    /**
     * Constructor
     *
     * @return void
     **/
	function WPS_Contact_Widget() {
		$widget_ops = array( 'classname' => 'widget_contact', 'description' => 'Contact widget' );
		$this->WP_Widget( 'contact-widget', 'Mt Horeb Contact Widget', $widget_ops );
	}

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme 
     * @param array  An array of settings for this widget instance 
     * @return void Echoes it's output
     **/
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		echo $before_widget;
		echo '<p class="title">Mt. Horeb United Methodist Church.</p>';
		echo '<p>P: (803) 359-3495 &#124; F: (803) 359-2029</p>';
		echo '<p>1205 Old Cherokee Rd.</p>';
		echo '<p>Lexington, SC 29072</p>';
		echo $after_widget;
	}

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings 
     * @return array The validated and (if necessary) amended settings
     **/
	function update( $new_instance, $old_instance ) {
		return $old_instance;
	}

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void Echoes it's output
     **/
	function form( $instance ) {
		// Do Nothing
	}
}
