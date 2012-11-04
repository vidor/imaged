<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to decor_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<div id="comments" class="clearfix">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'decor' ); ?></p>
	</div><!-- #comments -->
	<?php
		return;
		endif;
	?>
	
	

	<?php if ( have_comments() ) : ?>
	

			<div id="comments_title_wrap">
				<h3 id="comments-title">
					<?php
						printf( _n( 'one comment', '%1$s comments', get_comments_number(), 'decor' ),
							number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
					?>
				</h3>
			</div>
			
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-below">
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'decor' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'decor' ) ); ?></div>
			</nav>
			<?php endif;  ?>

			<ol class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'decor_comment' ) ); ?>
			</ol>

	
			
		<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			
				<p class="nocomments"><?php _e( 'Comments are closed.', 'decor' ); ?></p>
			</div>
		
	<?php endif; ?>
	


	<?php comment_form(); ?>
	


	
</div><!-- #comments -->



<?php
function decor_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'decor' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'decor' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	

	
		<article id="comment-<?php comment_ID(); ?>" >
		
			<div class="comment_sticker"></div>

		
			<?php echo get_avatar( $comment, 40 ); ?>
			
	
			<div class="comment-content"><?php comment_text(); ?></div>
			
			<div class="comment-meta">
			
				
			
				<div class="comment-author vcard">
					<?php
	

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s %2$s', 'decor' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s', 'decor' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'decor' ), '<span class="edit-link">', '</span>' ); ?>
					
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '- reply', 'decor' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'decor' ); ?></em>
					<br />
				<?php endif; ?>

			</div>


		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
