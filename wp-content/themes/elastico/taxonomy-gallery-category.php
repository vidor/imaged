<?php get_header(); ?>

		
		<div id="portfolio-grid" >
            	
				<?php 	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							
						query_posts( array(
								'post_type' => 'gallery',
								'gallery-category' => $term->slug,
								'paged' => $paged  ,
								'posts_per_page' => -1    
								)
						);

					if( have_posts() ) :  while (have_posts() ): the_post(); 
					
						$portfolio_terms = get_the_terms( get_the_ID(), 'gallery-category' );
							$portfolio_term = '';
								if(is_array($portfolio_terms)){
									foreach($portfolio_terms as $term){
											$portfolio_term.= $term->slug.' ';
									}
								}	
				 ?>
				
				<div class="portfolio-item <?php echo $portfolio_term; ?>" id="post-<?php the_ID(); ?>"> 							
						<a class="entry-link" href="<?php the_permalink(); ?>">  
								<div class="portfolio-thumb"><?php the_post_thumbnail('portfolio-thumb'); ?></div>							
								<div class="overlay">
									<div class="overlay-inner">
										<div class="overlay-content">
												<h2><?php the_title(); ?></h2>
												<div class="portfolio-subtitle">
												<?php if (of_get_option('gallery_meta') =='excerpt'){ 
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
					          
                <?php endwhile; endif;
					wp_reset_query(); ?>                      
            
        </div>
		
<?php get_footer(); ?>