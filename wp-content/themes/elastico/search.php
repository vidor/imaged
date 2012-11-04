<?php get_header(); ?>			
		
		<?php $total_posts = $wp_query->found_posts; ?>
		<div id="blog-grid">
				<div class="post hentry-header">
					<div class="hentry-inner">
						<div class="hentry-heading">
							<div class="heading-title">
								<h1><?php printf( __( 'Search Results for %s', 'si_theme' ), get_search_query() ); ?></h1>
								<span class="count">
									<?php echo $total_posts;?> 
									<?php if ($total_posts > 1)  _e('Results Found','si_theme');
										  else _e('Result Found','si_theme');?>
								</span>
							</div>
						</div>
					</div>
				</div>		
			<?php get_template_part( 'loop-search'); ?>							
       </div>
		
	
		<div id="load-more">
                <a href="#" data-search="<?php echo get_query_var('s');?>" data-total-posts="<?php echo $total_posts ; ?>" data-perpage="<?php echo get_option('posts_per_page');?>">
						<span id="load-btn-icon"></span><?php _e('Load More', 'si_theme'); ?>                    
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