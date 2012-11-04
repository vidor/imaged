<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>
							
		
		<div id="portfolio-grid" data-portfolio-load="<?php echo of_get_option('portfolio_ajax');?>">
            	               
				<?php $portfolioNumber = -1;						
				if(of_get_option('portfolio_ajax') == 'ajax') $portfolioNumber = of_get_option('portfolio_number') ;
				?>
				
                <?php $the_query = new WP_Query( array ('post_type' => 'portfolio','posts_per_page' => $portfolioNumber)); 
					while ($the_query->have_posts()) : $the_query->the_post(); 
						
						$portfolio_terms = get_the_terms( get_the_ID(), 'portfolio-category' );
							$portfolio_term = '';
							if(is_array($portfolio_terms)){
								foreach($portfolio_terms as $term){
									$portfolio_term.= $term->slug.' ';
								}
							}	
				 ?>
				<?php $custom_url = get_post_meta(get_the_ID(), 'si_portfolio_custom_url', true); ?>
				
				<div class="portfolio-item <?php echo $portfolio_term; ?>" id="post-<?php the_ID(); ?>"> 							
						<a class="entry-link" href="<?php if (!empty($custom_url)) echo $custom_url; else the_permalink(); ?>">  
								<div class="portfolio-thumb"><?php the_post_thumbnail('portfolio-thumb'); ?></div>											
								<div class="overlay">
									<div class="overlay-inner">
										<div class="overlay-content">
												<h2 class="entry-title"><?php the_title(); ?></h2>
												<div class="portfolio-subtitle">
												<?php if (of_get_option('portfolio_meta') =='excerpt'){ 
														the_excerpt();
													}
													else { 		
														$countTerms = 1;
																if($portfolio_terms){
																	foreach ($portfolio_terms as $term) {
																		if ($countTerms == sizeof($portfolio_terms)) echo $term->name;
																		else echo $term->name. ' + ';
																		$countTerms ++;
																	}																
																}
													} ?>
												</div>
										</div>
									</div>
								</div>								
						</a>							
				</div>					
                        
                <?php endwhile; wp_reset_postdata(); ?>         

        </div>
		
		<?php if(of_get_option('portfolio_ajax') == 'ajax') :?>
			<?php $total_posts = $the_query->found_posts; ?>
			<div id="load-more">                
					<a data-total-posts="<?php echo $total_posts ; ?>" data-perpage="<?php echo $portfolioNumber ;?>">
							<span id="load-btn-icon"></span><?php _e('Load More', 'si_theme'); ?>  
							<span id="posts-count" data-loader="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif">
									<?php echo $portfolioNumber.'/'.$total_posts; ?>
							</span>                            
					</a>
			</div>
		<?php endif; ?>

<?php get_footer(); ?>