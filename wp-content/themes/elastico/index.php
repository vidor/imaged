<?php get_header(); ?>
				
		<div id="blog-grid">				
			<?php get_template_part( 'loop'); ?>						
        </div>
		
		<?php $total_posts = $wp_query->found_posts; ?>
		
		<div id="load-more">                
                <a data-total-posts="<?php echo $total_posts ; ?>" data-perpage="<?php echo get_option('posts_per_page');?>">
                     	<span id="load-btn-icon"></span><?php _e('加载更多', 'si_theme'); ?>  
                        <span id="posts-count" data-loader="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif">
                                <?php echo get_option('posts_per_page').'/'.$total_posts; ?>
                        </span>                            
                </a>
        </div>
		<div class="navigation">
				<div class="nav-next"><?php next_posts_link(__('&laquo; Older Entries', 'si_theme')) ?></div>
				<div class="nav-previous"><?php previous_posts_link(__('Newer Entries &raquo;', 'si_theme')) ?></div>						
		</div>					
				
		
<?php get_footer(); ?>