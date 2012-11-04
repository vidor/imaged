<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	
<div id="main_body_wrap">

	<ul id="entry_list" class="">
	

			<?php $atts=explode (',', get_meta_option('gallery_items')); ?>
			
			<?php foreach($atts as $att): ?>  
			
				<?php  $att=get_post($att);   ?>
				
				
					<li class="entry_item">

						<article class="clearfix">
							
							<div class="post_format_wrap">
							
							<?php $image_att=wp_get_attachment_image_src( $att->ID, 'full' ); ?>
							
								<a class="lightbox" href="<?php echo $image_att[0]; ?>" title="<?php echo $att->post_name; ?>">
							
									<div class="hover_overlay"></div>
									<?php echo wp_get_attachment_image( $att->ID, 'post_image'); ?>		

								</a>									

							</div><!-- post_format_wrap -->
						
						</article>

					</li><!--end grid_item -->
				
			
			<?php endforeach;  ?>
		



	
	</ul><!--end entry_list -->



</div><!-- main_body_wrap -->


<?php endwhile; ?>

<?php get_footer(); ?>

