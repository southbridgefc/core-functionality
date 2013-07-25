<?php
/**
 * Social Widget
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Travis Smith <t@wpsmith.net>
 * @copyright    Copyright (c) 2011, Travis Smith
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
class WPS_Social_Widget extends WP_Widget {
	
    /**
     * Constructor
     *
     * @return void
     **/
	function WPS_Social_Widget() {
		$widget_ops = array( 'classname' => 'widget_socials', 'description' => 'Social icon widget' );
		$this->WP_Widget( 'social-widget', 'Mt Horeb Social Widget', $widget_ops );
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
		echo '<a href="'. $instance['wps_googleplus'] .'" class="btn-gp"><span class="hidden">Google+</span></a>';
		echo '<a href="'. $instance['wps_linkedin'] .'" class="btn-li"><span class="hidden">LinkedIn</span></a>';
		echo '<a href="'. $instance['wps_twitter'] .'" class="btn-tw"><span class="hidden">Twitter</span></a>';
		echo '<a href="'. $instance['wps_facebook'] .'" class="btn-fb"><span class="hidden">Facebook</span></a>';
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
		$instance = $old_instance;
	
		$instance['wps_googleplus'] = esc_url( $new_instance['wps_googleplus'] );			
		$instance['wps_linkedin'] = esc_url( $new_instance['wps_linkedin'] );			
		$instance['wps_facebook'] = esc_url( $new_instance['wps_facebook'] );
		$instance['wps_twitter'] = esc_url( $new_instance['wps_twitter'] );
		
		return $instance;
	}

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void Echoes it's output
     **/
	function form( $instance ) {
	
		$defaults = array( 'wps_googleplus' => '', 'wps_linkedin' => '', 'wps_facebook' => '', 'wps_twitter' => '', );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p><label for="<?php echo $this->get_field_id( 'wps_googleplus' ); ?>"><?php _e( 'Google Plus URL', 'mthoreb' ); ?><input class="widefat" id="<?php echo $this->get_field_id( 'wps_googleplus' ); ?>" name="<?php echo $this->get_field_name( 'wps_googleplus' ); ?>" value="<?php echo $instance['wps_googleplus']; ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id( 'wps_linkedin' ); ?>"><?php _e( 'LinkedIn URL', 'mthoreb' ); ?><input class="widefat" id="<?php echo $this->get_field_id( 'wps_linkedin' ); ?>" name="<?php echo $this->get_field_name( 'wps_linkedin' ); ?>" value="<?php echo $instance['wps_linkedin']; ?>" /></label></p>
		
		<p><label for="<?php echo $this->get_field_id( 'wps_facebook' ); ?>"><?php _e( 'Facebook URL', 'mthoreb' ); ?><input class="widefat" id="<?php echo $this->get_field_id( 'wps_facebook' ); ?>" name="<?php echo $this->get_field_name( 'wps_facebook' ); ?>" value="<?php echo $instance['wps_facebook']; ?>" /></label></p>

		<p><label for="<?php echo $this->get_field_id( 'wps_twitter' ); ?>"><?php _e( 'Twitter URL', 'mthoreb' ); ?><input class="widefat" id="<?php echo $this->get_field_id( 'wps_twitter' ); ?>" name="<?php echo $this->get_field_name( 'wps_twitter' ); ?>" value="<?php echo $instance['wps_twitter']; ?>" /></label></p>


		<?php

	}
}
