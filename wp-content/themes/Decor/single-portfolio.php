<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	
<div id="main_body_wrap">

	<ul id="entry_list" class="clearfix">
	
		<li class="entry_item">

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
				
				<?php get_template_part( 'content', get_post_format() ); ?>
				
				<div id="entry_details_wrap">
				
					<div id="entry_details" class="clearfix">
					
						<div>
						<h2><?php the_title(); ?></h2>
						
						<ul class="meta_wrap">
					
							<?php
							
							$vote_count = get_post_meta(get_the_id(), "votes_count", true);  
							$voted='';
							if(isset($_COOKIE["like_". get_the_id()])) $voted='voted';			
							if($vote_count==0 || $vote_count=='') { $title=__('be the first to like this','decor'); $vote_count=0; }
							elseif($vote_count==1) $title=__('one person likes this','decor');
							elseif($vote_count>1) $title=$vote_count.__(' people like this','decor');
							
							?>
							
							<li class="entry_likes"><a class="<?php echo $voted; ?>" data-id="<?php echo get_the_id(); ?>" title="<?php echo $title; ?>"><span><?php echo $vote_count; ?></span> likes</a></li>
							<li class="entry_categories">
											
								<?php $categories = get_the_terms( get_the_id(), 'portfolio_category' ); 
									
								foreach($categories as $c):
								
									echo '<a href="'.get_term_link($c).'" title="'.$c->name.'">'.$c->name.'</a> ';
								
								endforeach;
								
								?>
							</li>
							
						</ul><!--end meta_wrap -->
						
						<?php the_content(''); ?>
										
				
						</div>
				
					
					</div><!--end entry_details -->
				
				</div><!--end entry_details_wrap -->
				

				
				
			</article>

		</li><!--end grid_item -->
		
		<?php $gallery=get_meta_option('back_gallery');  ?>
		
		<?php if($gallery!='off'):  ?>
		
			<?php $atts=explode (',', get_meta_option('gallery_items', $gallery)); ?>
			
			<?php foreach($atts as $att): ?>  
			
				<?php  $att=get_post($att);   ?>
				
				
					<li class="entry_item">

						<article class="clearfix">
							
							<div class="post_format_wrap">
							
								
							
							<?php $image_att=wp_get_attachment_image_src( $att->ID, 'full' ); ?>
							
								<a class="lightbox" href="<?php echo $image_att[0]; ?>" title="<?php echo $att->post_title; ?>">
							
									<div class="hover_overlay"></div>
									<?php echo wp_get_attachment_image( $att->ID, 'post_image'); ?>		

								</a>									

							</div><!-- post_format_wrap -->
						
						</article>

					</li><!--end grid_item -->
				
			
			<?php endforeach;  ?>
		
		<?php endif; ?>


	
	</ul><!--end entry_list -->



</div><!-- main_body_wrap -->


<?php endwhile; ?>

<?php get_footer(); ?>

