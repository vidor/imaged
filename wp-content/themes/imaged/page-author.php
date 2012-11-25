<?php
/*
Template Name: author Template
*/
?>
<?php get_template_part('templates/page', 'header'); ?>


<?php  $args = array( 'orderby' => 'display_name', 'order' => 'ASC', 'who' => 'authors' ); $authors = get_users( $args ); ?>

<?php foreach ( $authors as $author ) { ?>
	<?php $args = array( 'author' => $author->ID, 'posts_per_page' => -1); $posts = query_posts( $args ); ?>
	<?php $desc = get_the_author_meta('description', $author->ID);
		  $imaged_url = get_the_author_meta('imaged_url', $author->ID);
		  $url = get_the_author_meta('url', $author->ID);
		  $weibo = get_the_author_meta('weibo', $author->ID);
	?>

	<div class="author-list">
    <h2><?php echo get_avatar($author->ID, 40); ?><?php echo $author->user_nicename; ?><a href="<?php echo $imaged_url ?>">博文：<?php echo count($posts);?>篇</a></h2>
    <section>
    	<?php if( $desc ) : ?><p><span>简介：</span><?php echo $desc ?></p><?php endif; ?>
    	<?php if( $imaged_url ) : ?><p><span>作者页面：</span><a href="<?php echo $imaged_url ?>"><?php echo $imaged_url ?></a></p><?php endif; ?>
    	<?php if( $url ) : ?><p><span>个人网站：</span><a href="<?php echo $url; ?>"><?php echo $url ?></a></p><?php endif; ?>
    	<?php if( $url ) : ?><p><span>微博：</span><a href="<?php echo $weibo; ?>"><?php echo $weibo ?></a></p><?php endif; ?>
    </section>


	</div>

<?php } ?>