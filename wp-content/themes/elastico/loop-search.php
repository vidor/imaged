<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
	
		<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">
				<div class="hentry-inner">
						<?php if( get_post_type() == 'portfolio' ) { ?>
						
							<?php $custom_url = get_post_meta(get_the_ID(), 'si_portfolio_custom_url', true); ?>
							<div class="post-image">
								<a class="entry-link" href="<?php if (!empty($custom_url)) echo $custom_url; else the_permalink(); ?>">  
									<?php the_post_thumbnail('portfolio-thumb'); ?>	
								</a>
							</div>
							<h2 class="entry-title"><a class="entry-link" href="<?php if (!empty($custom_url)) echo $custom_url; else the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="sep"></div>
							<div class="entry-content"><?php the_excerpt(); ?></div> 	
							 
						<?php } elseif ( get_post_type() == 'gallery' ) { ?>
							
							<?php $custom_url = get_post_meta(get_the_ID(), 'si_gallery_custom_url', true); ?>
							<div class="post-image">
								<a class="entry-link" href="<?php if (!empty($custom_url)) echo $custom_url; else the_permalink(); ?>">  
									<?php the_post_thumbnail('portfolio-thumb'); ?>	
								</a>
							</div>
							<h2 class="entry-title"><a class="entry-link" href="<?php if (!empty($custom_url)) echo $custom_url; else the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="sep"></div>
							<div class="entry-content"><?php the_excerpt(); ?></div>
											
						<?php }	elseif ( get_post_type() == 'page' ) { ?>
							
							<h2 class="entry-title"><a class="entry-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="sep"></div>
							<div class="entry-content"><?php the_excerpt(); ?></div>
						
						<?php } else{ ?>
							<?php 	$format = get_post_format();   
									if( false === $format )  $format = 'standard'; 
									get_template_part( 'includes/postformats/'.$format );
						} ?>
				</div>
		</div>
									
<?php endwhile; endif; ?>	