<?php while (have_posts()) : the_post();
						
						$portfolio_terms = get_the_terms( get_the_ID(), 'gallery-category' );
							$portfolio_term = '';
							if(is_array($portfolio_terms)){
								foreach($portfolio_terms as $term){
									$portfolio_term.= $term->slug.' ';
								}
							}	
				 ?>
				<?php $custom_url = get_post_meta(get_the_ID(), 'si_gallery_custom_url', true); ?>
				
				<div class="portfolio-item <?php echo $portfolio_term; ?>" id="post-<?php the_ID(); ?>"> 							
						<a class="entry-link" href="<?php if (!empty($custom_url)) echo $custom_url; else the_permalink(); ?>">  
								<div class="portfolio-thumb"><?php the_post_thumbnail('portfolio-thumb'); ?></div>											
								<div class="overlay">
									<div class="overlay-inner">
										<div class="overlay-content">
												<h2 class="entry-title"><?php the_title(); ?></h2>
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
                        
 <?php endwhile;?>