<?php get_header(); ?>
			
		<?php $total_posts = $wp_query->found_posts; ?>
		<div id="blog-grid">
				<div class="post hentry-header">
					<div class="hentry-inner">
						<div class="hentry-heading">
							<div class="heading-title">
								<h1><?php if (is_category()) { ?> 
									<?php _e('All posts in', 'si_theme') ?> <?php single_cat_title(); ?> 					
								<?php } elseif( is_tag() ) { ?>
									<?php _e('All posts tagged', 'si_theme') ?> <?php single_tag_title(); ?>
								<?php } elseif (is_day()) { ?>
									<?php _e('Archives for', 'si_theme') ?> <?php the_time('F jS, Y'); ?>
								<?php } elseif (is_month()) { ?>
									<?php _e('Archives for', 'si_theme') ?> <?php the_time('F, Y'); ?>
								<?php } elseif (is_year()) { ?>				
									<?php _e('Archives for', 'si_theme') ?> <?php the_time('Y'); ?>		  
								<?php } elseif (is_author()) {  $curauth = get_user_by( 'login', get_query_var('author_name') ); ?> 
									<?php _e('All posts by', 'si_theme') ?> <?php echo $curauth->display_name; ?>
								<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
									<?php _e('Blog Archives', 'si_theme') ?>
								<?php } ?>
								</h1>
								<span class="count">
									<?php echo $total_posts;?> 
									<?php if ($total_posts > 1) _e('Posts','si_theme');
										  else _e('Post','si_theme');?>
								</span>
							</div>
						</div>
					</div>
				</div>
				
				<?php get_template_part( 'loop'); ?>
		</div>
		
		<?php 	$print = "";					
				if(is_category())
					$print = 'data-category="'.get_query_var('cat').'"'; 
				if(is_author())
					$print = 'data-author="'.get_query_var('author').'"'; 
				if(is_tag())
					$print = 'data-tag="'.get_query_var('tag').'"'; 
				if(is_date())
					$print = 'data-month="'.get_query_var('monthnum').'" data-year="'.get_query_var('year').'"';
		?>
			
				<div id="load-more">                
                     <a	href="#" <?php echo $print;?>  data-total-posts="<?php echo $total_posts ; ?>" data-perpage="<?php echo get_option('posts_per_page');?>">
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