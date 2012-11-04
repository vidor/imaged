<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

          
	<div class="archives">
						
		<?php	global $wp_locale;	
				$posts = si_get_posts_archives();
				foreach( $posts as $yearmonth => $postentry ) {
						list( $year, $month ) = explode( '.', $yearmonth );							
						$firstpost = true;
						global $post;							
						foreach( $postentry as $post  ) : 
							setup_postdata($post);
			?>
							
							<?php if ( true == $firstpost ) { ?>						
								<div class="archives-post month-header">
									<div class="archives-post-inner">
										<div class="hentry-heading">
											<div class="heading-title">
												<h2><?php printf('%1$s %2$d', $wp_locale->get_month($month), $year );?></h2>
												<span class="count"><?php echo count($postentry);?> <?php if (count($postentry) > 1)  _e('Posts','si_theme'); else _e('Post','si_theme');?></span>
											</div>
										</div>									
									</div>
								</div>
								<?php $firstpost = false;								
							} 
							?>
								
							<?php   $format = get_post_format($post->ID);
									if( false === $format )  $format = 'standard'; 	?>
								
										<div class="archives-post format-<?php echo $format;?>">
											<a href="<?php echo get_permalink( $post->ID );?>">
												<div class="archives-post-inner">
													<div class="archives-content">												
													
														<?php if ($format == 'standard') { ?>
																<h3><span class="post-format"></span><?php echo si_get_the_title_truncated( $post->ID );?></h3>
																<p><?php echo get_the_excerpt();?></p>		
														<?php }
														 
														elseif ($format == 'image') { ?>
																<h3><span class="post-format"></span><?php echo si_get_the_title_truncated( $post->ID );?></h3>
																<?php echo get_the_post_thumbnail($post->ID,'archive-thumb') ;?>
														<?php }
														
														elseif ($format == 'gallery'){
																	$args = array(
																		'orderby'		 => 'menu_order',
																		'order' 			=> 'ASC',
																		'post_type'      => 'attachment',
																		'post_parent'    => get_the_ID(),
																		'post_mime_type' => 'image',
																		'post_status'    => null,
																		'numberposts'    => 1,
																	);
																		$attachment = get_posts($args); 
																?>
																<h3><span class="post-format"></span><?php echo si_get_the_title_truncated( $post->ID );?></h3>
																<?php $src = wp_get_attachment_image_src( $attachment[0]->ID, 'archive-thumb'); ?>
																<img src="<?php echo $src[0];?>" />															
														<?php }	
														
														elseif ($format == 'video') { ?>
																<h3><span class="post-format"></span><?php echo si_get_the_title_truncated( $post->ID );?></h3>
																<?php $youtube_vimeo = get_post_meta($post->ID, 'si_youtube_vimeo_url', true); 
																$poster = get_post_meta($post->ID, 'si_video_poster', true);
																$attachment_id = si_get_attachment_id( $poster );
																if($attachment_id) {
																	$poster_thumb= wp_get_attachment_image_src($attachment_id,'archive-thumb');	
																	$poster = $poster_thumb[0];
																}
																if (!empty($youtube_vimeo)) echo '<img src="'.si_get_video_image($youtube_vimeo).'"/>';
																elseif (!empty($poster)) echo '<img src="'.$poster.'"/>';?>	
														<?php }	
														
														elseif ($format == 'audio') { ?>
																<h3><span class="post-format"></span><?php echo si_get_the_title_truncated( $post->ID );?></h3>
																<?php $poster = get_post_meta($post->ID, 'si_audio_poster', true);
																$attachment_id = si_get_attachment_id( $poster );
																if($attachment_id) {
																	$poster_thumb= wp_get_attachment_image_src($attachment_id,'archive-thumb');	
																	$poster = $poster_thumb[0];
																}
																if (!empty($poster)) echo '<img src="'.$poster.'"/>';	
																else echo get_the_excerpt();	?>													
														<?php }
														
														elseif ($format == 'status') { ?>
																<p><span class="post-format"></span><?php echo get_the_excerpt();?></p>															
														<?php }
														
														elseif ($format == 'quote') { 
																$quote =  get_post_meta($post->ID, 'si_quote', true);
																$quotesource =  get_post_meta(get_the_ID(), 'si_quote_source', true);?>
																<blockquote><span class="post-format"></span><?php echo si_truncate_phrase($quote,120); ?></blockquote>
																<?php if ( $quotesource != '') :?><span class="quote-meta"><?php echo $quotesource; ?></span><?php endif;?>
														<?php }
														
														elseif ($format == 'link') { ?>
																<h3><span class="post-format"></span><?php the_title(); ?></h3>
																<p><?php echo get_the_excerpt();?></p>
														<?php } ?>
														
													</div>
												</div>
											</a>
										</div>
									
							<?php endforeach;wp_reset_postdata();?>
						
		<?php   }  ?>											
							
	</div>			

<?php get_footer(); ?>