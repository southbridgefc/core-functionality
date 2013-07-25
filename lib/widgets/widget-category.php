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
class Sbridge_Category_Widget extends WP_Widget {
	
    /**
     * Constructor
     *
     * @return void
     **/
	function Sbridge_Category_Widget() {
		$widget_ops = array( 'classname' => 'widget_category', 'description' => 'Southbridge - Current Category Widget' );
		$this->WP_Widget( 'category-widget', 'Southbridge - Current Category Widget', $widget_ops );
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

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Category' ) : $instance['title'], $instance, $this->id_base );
		
		$cats = wp_get_post_categories();
		$args = array(
			'orderby'            => 'name',
			'order'              => 'ASC',
			'style'              => 'list',
			'use_desc_for_title' => 0,
			'include'            => $cats,
			'hierarchical'       => true,
			'title_li'           => '',
			'number'             => null,
			'echo'               => 0,
			'depth'              => 0,
			'taxonomy'           => 'category',
		);
		
		$cat_list = wp_list_categories( $args );
		
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
	
		$instance['title'] = strip_tags( $new_instance['title'] );
		
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
			'title' => '', 
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		$title    = strip_tags( $instance['title'] ); ?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'sbridge' ); ?><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" /></label></p>

		<?php
	}
}
