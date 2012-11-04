<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to si_comments() which is
 * located in the functions.php file.
 *
 */
?>


	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'si_theme' ); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>


	<?php if ( have_comments() ) : ?>
	
	        <h3 class="comments-title"><?php comments_number(__('No Comments', 'si_theme'), __('1 Comment', 'si_theme'), __('% Comments', 'si_theme')); ?></h3>
	
        	<ol class="commentlist">
				<?php wp_list_comments( 'callback=si_comments'); ?>
            </ol>

        <?php 
        
   		
		// check for comment navigation 
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    		<div class="comment-navigation">
    			<div class="nav-previous"><?php previous_comments_link(); ?></div>
    			<div class="nav-next"><?php next_comments_link(); ?></div>
    		</div>
		<?php endif; ?>
		
	<?php	
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
	elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		
		<p class="nocomments"><?php _e('Comments are closed.', 'si_theme') ?></p>
		
	<?php endif;?>


	<?php    $fields = array(
			'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'si_theme' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
            'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out &raquo;</a>', 'si_theme' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'title_reply' => __('Leave a Comment', 'si_theme'),
            'title_reply_to' => __('Leave a Reply to %s', 'si_theme'),
            'cancel_reply_link' => __('Cancel Reply', 'si_theme'),
            'label_submit' => __('Submit Comment', 'si_theme')
	    );
		    	
	    comment_form($fields);

  ?>
	

</div><!-- #comments -->
