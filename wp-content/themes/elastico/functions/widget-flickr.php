<?php

/*--------------------------------------------------------------------------------------*/
/*	 Custom Widget for Flickr Photostream Display
/*--------------------------------------------------------------------------------------*/

class si_Flickr_Widget extends WP_Widget {

function si_Flickr_Widget() {

	$widget_ops = array(
		'classname' => 'si_flickr_widget','description' => __('Use this custom widget to display your Flickr Photostream', 'si_theme')
	);

	$this->WP_Widget( 'si_flickr_widget', __('Custom Flickr Photostream', 'si_theme'), $widget_ops );	
}


/*--------------------------------------------------------------------------------------*/
/* Display Widget
/*--------------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );

	$title = apply_filters('widget_title', $instance['title'] );
	$flickrID = $instance['flickrID'];
	$count = $instance['count'];
	$type = $instance['type'];
	$display_mode = $instance['display_mode'];

	echo $before_widget;

	if ( $title )
		echo $before_title . $title . $after_title;
	?>
		
	<div id="flickr_badge_wrapper" class="clearfix">	
		<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $count ?>&amp;display_mode=<?php echo $display_mode ?>&amp;size=s&amp;layout=x&amp;source=<?php echo $type ?>&amp;<?php echo $type ?>=<?php echo $flickrID ?>"></script>
	</div>
	
	<?php
	echo $after_widget;
	
}


/*--------------------------------------------------------------------------------------*/
/*	Update Widget
/*--------------------------------------------------------------------------------------*/
	
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['flickrID'] = strip_tags( $new_instance['flickrID'] );
	$instance['count'] = $new_instance['count'];
	$instance['type'] = $new_instance['type'];
	$instance['display_mode'] = $new_instance['display_mode'];

	return $instance;
}


/*--------------------------------------------------------------------------------------*/
/*	Widget Settings 
/*--------------------------------------------------------------------------------------*/
	 
function form( $instance ) {

	$defaults = array(
		'title' => __( 'Flickr Photostream', 'si_theme' ),
		'flickrID' => '',
		'count' => '6',
		'type' => 'user',
		'display_mode' => 'latest',
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'si_theme') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'flickrID' ); ?>"><?php _e('Flickr ID:', 'si_theme') ?> (<a href="http://idgettr.com/">idGettr</a>)</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'flickrID' ); ?>" name="<?php echo $this->get_field_name( 'flickrID' ); ?>" value="<?php echo $instance['flickrID']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('Number of Photos:', 'si_theme') ?></label>
		<select id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" class="widefat">
			<option <?php if ( '3' == $instance['count'] ) echo 'selected="selected"'; ?>>3</option>
            <option <?php if ( '6' == $instance['count'] ) echo 'selected="selected"'; ?>>6</option>
			<option <?php if ( '9' == $instance['count'] ) echo 'selected="selected"'; ?>>9</option>
		</select>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e('Type (user or group):', 'si_theme') ?></label>
		<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
			<option <?php if ( 'user' == $instance['type'] ) echo 'selected="selected"'; ?>>user</option>
			<option <?php if ( 'group' == $instance['type'] ) echo 'selected="selected"'; ?>>group</option>
		</select>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'display_mode' ); ?>"><?php _e('Display Mode (latest or random):', 'si_theme') ?></label>
		<select id="<?php echo $this->get_field_id( 'display_mode' ); ?>" name="<?php echo $this->get_field_name( 'display_mode' ); ?>" class="widefat">			
			<option <?php if ( 'latest' == $instance['display_mode'] ) echo 'selected="selected"'; ?>>latest</option>
			<option <?php if ( 'random' == $instance['display_mode'] ) echo 'selected="selected"'; ?>>random</option>
		</select>
	</p>
		
	<?php
	}
}

/*--------------------------------------------------------------------------------------*/
/*	Register widget
/*--------------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'si_flickr_widgets' );

function si_flickr_widgets() {
	register_widget( 'si_Flickr_Widget' );
}


?>