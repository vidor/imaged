<?php
/*
Template Name: Portfolio by Category 
*/
?>

<?php get_header(); ?>
					
		
		<div id="portfolio-grid">
            	               
				 <?php 	$cats_include = get_post_meta( $post->ID, 'si_portfolio_categories', false); 
					$the_query = new WP_Query( array ('post_type' => 'portfolio','posts_per_page' => -1,
						"tax_query" => array(
							array(
							"taxonomy" => "portfolio-category",
							"field" => "slug",
							"terms" => $cats_include
							)
						)
					));
					
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
		

<?php get_footer(); ?>