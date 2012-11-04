<?php

/*--------------------------------------------------------------------------------------*/
/*	Custom Widget for Twitter Feed Display
/*--------------------------------------------------------------------------------------*/


class si_Twitter_Widget extends WP_Widget {
	
function si_Twitter_Widget() {

	$widget_ops = array(
		'classname' => 'si_twitter_widget',
		'description' => __('Use this custom widget to display your latest tweets', 'si_theme')
	);

	$this->WP_Widget( 'si_twitter_widget', __('Custom Twitter Feed','si_theme'), $widget_ops );
	
}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );

	$title = apply_filters('widget_title', $instance['title'] );
	$username = $instance['username'];
	$postcount = $instance['postcount'];
	$followtext = $instance['followtext'];

	echo $before_widget;

	if ( $title )
		echo $before_title . $title . $after_title;

	 ?>
		
		<div id="recent-tweets" class="clearfix">
			<ul class="twitter_update_list">
				<li>&nbsp;</li>
			</ul>
           <?php if($followtext != '') { ?>
			   <a href="http://twitter.com/<?php echo $username ?>" id="twitter-link"><?php echo $followtext ?></a>
           <?php } ?>
		</div>
		<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $username ?>.json?callback=twitterCallbackSI&amp;count=<?php echo $postcount ?>"></script>
	
	<?php 

	echo $after_widget;
	
}


/*--------------------------------------------------------------------------------------*/
/*	Update Widget
/*--------------------------------------------------------------------------------------*/

function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['username'] = strip_tags( $new_instance['username'] );
	$instance['postcount'] = strip_tags( $new_instance['postcount'] );
	$instance['followtext'] = strip_tags( $new_instance['followtext'] );
	
	return $instance;
}

/*--------------------------------------------------------------------------------------*/
/*	Widget Settings 
/*--------------------------------------------------------------------------------------*/
	 
function form( $instance ) {

	$defaults = array(
	'title' => 'Latest Tweets',
	'username' => '',
	'postcount' => '4',
	'followtext' => '',
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'si_theme') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Twitter username:', 'si_theme') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id('postcount'); ?>"><?php _e('Number of tweets:', 'si_theme') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
	</p>
	
    <p>
		<label for="<?php echo $this->get_field_id(''); ?>"><?php _e('Follow Text e.g. Follow on Twitter:', 'si_theme') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('followtext'); ?>" name="<?php echo $this->get_field_name('followtext'); ?>" value="<?php echo $instance['followtext']; ?>" />
	</p>
		
	<?php
	}
}

/*--------------------------------------------------------------------------------------*/
/*	Register widget
/*--------------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'si_twitter_widgets' );

function si_twitter_widgets() {
	register_widget( 'si_Twitter_Widget' );
}

function si_twitter_js() {
	if( !is_admin() ){
		wp_register_script('twitter-widget', get_template_directory_uri() . '/js/twitter.js');
		wp_enqueue_script('twitter-widget');    	
	}
}
add_action('init', 'si_twitter_js');

?>