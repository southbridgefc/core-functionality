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
class Sbridge_Authors_Widget extends WP_Widget {
	
    /**
     * Constructor
     *
     * @return void
     **/
	function Sbridge_Authors_Widget() {
		$widget_ops = array( 'classname' => 'widget_authors', 'description' => 'Southbridge - Authors Widget' );
		$this->WP_Widget( 'authors-widget', 'Southbridge - Authors Widget', $widget_ops );
	}

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme 
     * @param array  An array of settings for this widget instance 
     * @return void Echoes it's output
     **/
	function widget( $args, $instance ) {
		global $post;
		if ( !is_single() && 'post' != $post->post_type ) return;
		
		extract( $args, EXTR_SKIP );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Authors' ) : $instance['title'], $instance, $this->id_base );
		
		$args = array(
			'orderby'       => 'name', 
			'order'         => 'ASC', 
			'number'        => null,
			'optioncount'   => $instance['optioncount'], 
			'exclude_admin' => $instance['exclude_admin'], 
			'show_fullname' => $instance['show_fullname'],
			'hide_empty'    => $instance['hide_empty'],
			'echo'          => false,
			'style'         => 'list',
			'html'          => true
		);
		
		$cat_list = wp_list_authors( $args );
		
		if ( '' == $cat_list ) return;
		
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
		
		?>
		<ul>
		<?php echo $cat_list; ?> 
		</ul>
		<?php
		
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

		$instance['title']         = strip_tags( $new_instance['title'] );
		$instance['optioncount']   = isset( $new_instance['optioncount'] ) ? intval( $new_instance['optioncount'] ) : '';
		$instance['exclude_admin'] = isset( $new_instance['exclude_admin'] ) ? intval( $new_instance['exclude_admin'] ) : '';
		$instance['show_fullname'] = isset( $new_instance['show_fullname'] ) ? intval( $new_instance['show_fullname'] ) : '';
		$instance['hide_empty']    = isset( $new_instance['hide_empty'] ) ? intval( $new_instance['hide_empty'] ) : '';
		
		return $instance;
	}

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void Echoes it's output
     **/
	function form( $instance ) {
		
		$defaults = array(
			'title'         => '', 
			'optioncount'   => '', 
			'exclude_admin' => '', 
			'show_fullname' => '', 
			'hide_empty'    => '', 
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
		$title    = strip_tags( $instance['title'] ); ?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'sbridge' ); ?><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" /></label></p>
		
		<p><label for="<?php echo $this->get_field_id( 'optioncount' ); ?>"><input type="checkbox" id="<?php echo $this->get_field_id( 'optioncount' ); ?>" name="<?php echo $this->get_field_name( 'optioncount' ); ?>" value="1" <?php checked( absint( $instance['optioncount'] ), 1 ); ?> style="margin-right: 5px;" /><?php _e( 'Display number of published posts?', 'sbridge' ); ?></label></p>
		
		<p><label for="<?php echo $this->get_field_id( 'exclude_admin' ); ?>"><input type="checkbox" id="<?php echo $this->get_field_id( 'exclude_admin' ); ?>" name="<?php echo $this->get_field_name( 'exclude_admin' ); ?>" value="1" <?php checked( absint( $instance['exclude_admin'] ), 1 ); ?> style="margin-right: 5px;" /><?php _e( 'Exclude admin?', 'sbridge' ); ?></label></p>
		
		<p><label for="<?php echo $this->get_field_id( 'show_fullname' ); ?>"><input type="checkbox" id="<?php echo $this->get_field_id( 'show_fullname' ); ?>" name="<?php echo $this->get_field_name( 'show_fullname' ); ?>" value="1" <?php checked( absint( $instance['show_fullname'] ), 1 ); ?> style="margin-right: 5px;" /><?php _e( 'Show full name?', 'sbridge' ); ?></label></p>
		
		<p><label for="<?php echo $this->get_field_id( 'hide_empty' ); ?>"><input type="checkbox" id="<?php echo $this->get_field_id( 'hide_empty' ); ?>" name="<?php echo $this->get_field_name( 'hide_empty' ); ?>" value="1" <?php checked( absint( $instance['hide_empty'] ), 1 ); ?> style="margin-right: 5px;" /><?php _e( 'Hide those with no published posts?', 'sbridge' ); ?></label></p>
		
		<?php
	}
}
