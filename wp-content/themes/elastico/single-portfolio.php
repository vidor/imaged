<?php get_header(); ?>

<?php if (post_password_required() ) : ?>
	<div class="password-protected">
		<div class="gallery-password-protected">
			<h1><?php echo the_title();?></h1>
			<div class="sep"></div>
			<?php the_content();?>
		</div>
	</div>
<?php else : ?>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php
				$mediaType = get_post_meta(get_the_ID(), 'si_portfolio_type', true);
				$projecturl  = get_post_meta(get_the_ID(), 'si_portfolio_url', true);
				$projectclient = get_post_meta(get_the_ID(), 'si_portfolio_client', true);
				$projectdate = get_post_meta(get_the_ID(), 'si_portfolio_date', true);			
	
			?>			
            
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
					<div class="portfolio-media">
						<?php  switch( $mediaType ) {
								case 'Images': ?>
								  
								   <?php  $args = array(
										'orderby'		 => 'menu_order',
										'order' 		 => 'ASC',
										'post_type'      => 'attachment',
										'post_parent'    => get_the_ID(),
										'post_mime_type' => 'image',
										'post_status'    => null,
										'numberposts'    => -1,
										'exclude'     => get_post_thumbnail_id()
									);
									$attachments = get_posts($args);    
									?>
									
									<?php if ($attachments) : ?>
								
									 <script type="text/javascript">
										jQuery(window).load(function(){										
											jQuery('.slides li').first().find('img').css('opacity', 1);
											jQuery('.flexslider').css('background-image','none');
											jQuery('.flexslider').flexslider({
												animation: "fade",
												slideshow: false,
												smoothHeight : true
											});
										});
									</script>
								
									 <div id="slider-<?php the_ID(); ?>" class="flexslider">	
										 <ul class="slides">
												<?php foreach ( $attachments as $attachment) : ?>   
													<?php $slider_exclude = get_post_meta($attachment->ID, 'si-slider-exclude', true);
														if($slider_exclude != '1') { ?>	
															<?php $src = wp_get_attachment_image_src( $attachment->ID, 'full'); 
																$attachmenttitle = apply_filters('the_title', $attachment->post_title); 
																$attachmentcaption =  $attachment->post_excerpt;
																$customSize = get_post_meta( $attachment->ID, 'si-attachment-percentage-size', true );
																$sizePercent = si_get_image_size_percentage($src[1],$src[2]);
																$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
																
															?>
															<li>
															<img src="<?php echo $src[0]; ?>" alt="<?php if(!empty($alt)) echo $alt; else the_title(); ?>" <?php if($customSize) echo 'style="width:'.$customSize.'%;"'; else echo 'style="width:'.$sizePercent.'%;"';?> />
																	<?php if (!empty($attachmentcaption)) :?>
																		<p class="flex-caption"><?php echo $attachmentcaption;?></p>
																	<?php endif;?>
															</li>
														<?php } ?>
												<?php endforeach; ?>
										</ul>
									</div>   
									<?php endif; ?>
								
								<?php  break;

								case 'Video': 
										$m4v = get_post_meta(get_the_ID(), 'si_video_m4v', true);
										$ogv = get_post_meta(get_the_ID(), 'si_video_ogv', true);
										$poster = get_post_meta(get_the_ID(), 'si_video_poster', true);
										$youtubevimeo_url = get_post_meta(get_the_ID(), 'si_youtube_vimeo_url', true);
										$embed = get_post_meta(get_the_ID(), 'si_video_embed_code', true);
										$ratio_width = get_post_meta(get_the_ID(), 'si_video_ratio_width', true);
										$ratio_height = get_post_meta(get_the_ID(), 'si_video_ratio_height', true);
										
										$ratio = '';
										if (!empty($ratio_width)) 
											$ratio = ((int)$ratio_height / (int)$ratio_width * 100) .'%';
										
										
								?>
								
								<?php if (!empty($youtubevimeo_url )){?>
									<div class="fluid-video" <?php if (!empty($ratio)) echo 'style="padding-top:'.$ratio.';padding-bottom:0;"'; ?>>
										<?php si_get_video(get_the_ID(),1400,786); ?>
									</div>
								<?php
								}
								
								elseif ($embed!= ''){?>
									<div class="fluid-video" <?php if (!empty($ratio)) echo 'style="padding-top:'.$ratio.';padding-bottom:0;"'; ?>>
									<?php echo stripslashes(htmlspecialchars_decode($embed));?>
									</div>
								<?php
								}
																								
								else { ?>
									<script type="text/javascript">
										jQuery(document).ready(function(){										
											jQuery("#jquery_jplayer_<?php the_ID(); ?>").jPlayer({
													ready: function () {
														jQuery(this).jPlayer("setMedia", {
															<?php if($m4v != '') : ?>
															m4v: "<?php echo $m4v; ?>",
															<?php endif; ?>
															<?php if($ogv != '') : ?>
															ogv: "<?php echo $ogv; ?>",
															<?php endif; ?>
															<?php if ($poster != '') : ?>
															poster: "<?php echo $poster; ?>"
															<?php endif; ?>
														});
													},
													size: {
														width: "100%",
														height: "100%",
														cssClass: "fullwidth"   
													},
													autohide :{hold:2000},
													swfPath: "<?php echo get_template_directory_uri(); ?>/js",
													cssSelectorAncestor: "#jp_container_<?php the_ID(); ?>",
													supplied: "<?php if($m4v != '') : ?>m4v, <?php endif; ?><?php if($ogv != '') : ?>ogv, <?php endif; ?> all"
												});
											
										});
									</script>

									<div id="jp_container_<?php the_ID(); ?>" class="jp-video">
											<div class="jp-type-single">
													<div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer jp-jplayer-video" <?php if (!empty($ratio)) echo 'style="padding-top:'.$ratio.';padding-bottom:0;"'; ?>></div>
													<div class="jp-gui">
														<div class="jp-video-play">
															<a class="jp-video-play-icon" tabindex="1">Play</a>
														</div>
														<div class="jp-interface">
															<div class="jp-progress">
																<div class="jp-seek-bar">
																	<div class="jp-play-bar"></div>
																</div>
															</div>
															<div class="jp-current-time">00:00</div>								
															<div class="jp-duration">00:00</div>								
															
																<ul class="jp-controls">
																	<li><a class="jp-play" tabindex="1">Play</a></li>
																	<li><a class="jp-pause" tabindex="1">Pause</a></li>
																	<li><a class="jp-mute" tabindex="1">Mute</a></li>
																	<li><a class="jp-unmute" tabindex="1">Unmute</a></li>
																</ul>
																<div class="jp-volume-bar">
																	<div class="jp-volume-bar-value"></div>
																</div>
																<ul class="jp-toggles">										
																	<li><a class="jp-full-screen" tabindex="1">Full Screen</a></li>
																	<li><a class="jp-restore-screen" tabindex="1">Restore Screen</a></li>
																</ul>
														
														</div>							
													</div>
													<div class="jp-no-solution">
														<span><?php _e('Update Required', 'si_theme'); ?> </span>
														<?php _e('To play the media you will need to either update your browser to a recent version or update your Flash plugin.', 'si_theme'); ?>
													</div>
											</div>
									</div>
									
								<?php }
									break;

								case 'Audio': 
									$mp3 = get_post_meta(get_the_ID(), 'si_audio_mp3', true);
									$ogg = get_post_meta(get_the_ID(), 'si_audio_ogg', true);
									$audioposter = get_post_meta(get_the_ID(), 'si_audio_poster', true);
									$audioembed = get_post_meta(get_the_ID(), 'si_audio_embed_code',true);
									?>
									
									<?php if ($audioembed !='') { ?>
										<?php echo stripslashes(htmlspecialchars_decode($audioembed));?>								
									<?php }
									else { ?>
										<script type="text/javascript">									
											jQuery(document).ready(function(){								
												if(jQuery().jPlayer) {
													jQuery("#jquery_jplayer_<?php the_ID(); ?>").jPlayer({
														ready: function () {
															jQuery(this).jPlayer("setMedia", {
																<?php if($mp3 != '') : ?>
																mp3: "<?php echo $mp3; ?>",
																<?php endif; ?>
																<?php if($ogg != '') : ?>
																oga: "<?php echo $ogg; ?>"
																<?php endif; ?>													
															});
														},
														size: {
															width: "100%",
															height: "auto"													
														},
														swfPath: "<?php echo get_template_directory_uri(); ?>/js",
														cssSelectorAncestor: "#jp_container_<?php the_ID(); ?>",
														supplied: "<?php if($ogg != '') : ?>oga,<?php endif; ?><?php if($mp3 != '') : ?>mp3, <?php endif; ?> all"
													});												
												}
											});
										</script>
										<?php if ($audioposter): ?>
											<div class="audio-poster"><img src="<?php echo $audioposter;?>"/></div>
										<?php endif;?>
										<div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer-audio"></div>
										<div id="jp_container_<?php the_ID(); ?>" class="jp-audio">
											<div class="jp-type-single">
												<div class="jp-gui jp-interface">
													<div class="jp-progress">
														<div class="jp-seek-bar">
															<div class="jp-play-bar"></div>
														</div>
													</div>
													<div class="jp-current-time">00:00</div>
													<div class="jp-duration">00:00</div>												
														<ul class="jp-controls">
															<li><a class="jp-play" tabindex="1">Play</a></li>
															<li><a class="jp-pause" tabindex="1">Pause</a></li>
															<li><a class="jp-mute" tabindex="1">Mute</a></li>
															<li><a class="jp-unmute" tabindex="1">Unmute</a></li>
													
														</ul>
														<div class="jp-volume-bar">
															<div class="jp-volume-bar-value"></div>
														</div>
														<ul class="jp-toggles">
															<li><a class="jp-repeat" tabindex="1">repeat</a></li>
															<li><a class="jp-repeat-off" tabindex="1">jp-repeat-off</a></li>
														</ul>
													
												</div>
												<div class="jp-no-solution">
														<span><?php _e('Update Required', 'si_theme'); ?> </span>
														<?php _e('To play the media you will need to either update your browser to a recent version or update your Flash plugin.', 'si_theme'); ?>
												</div>
											</div>
										</div>
									<?php } ?>
									<?php
										break;

									default:
									break;
							}
							
							
							?>
							</div>
							
							<div class="portfolio-content">
							
								<div class="portfolio-description">
									<h1 class="entry-title"><?php the_title(); ?></h1>
									<div class="sep"></div>
									<div class="entry-content">
											<?php the_content(); ?>
									</div>
								</div>
								
								<div class="portfolio-meta">
										<?php if ($projectdate) :?><span><strong><?php _e('Date', 'si_theme') ?>:</strong> <?php echo $projectdate ;?></span><?php endif;?>
										<?php if( $projectclient) :?><span><strong><?php _e('Client', 'si_theme') ?>:</strong> <?php echo $projectclient;?></span><?php endif;?>
										<?php $portfolio_terms = get_the_terms( $post->ID, 'portfolio-category' );
												$countTerms = 1;
												if($portfolio_terms): ?>
													<span><strong><?php _e('Skills', 'si_theme') ?>:</strong>
													<?php foreach ($portfolio_terms as $term) {
														if ($countTerms == sizeof($portfolio_terms)) echo $term->name;
														else echo $term->name. ', ';
														$countTerms ++;
													}
													?>
													</span>
												<?php endif;?>
									   
										<?php if ($projecturl) :?>
											<span><strong><?php _e('Website', 'si_theme') ?>:</strong>
											<a href="<?php echo $projecturl;?>" target="_blank"><?php echo str_replace('http://','',$projecturl);?></a></span>
										<?php endif;?>
									   <div class="separator"></div>
									   <div class="portfolio-navigation">
											<?php if (of_get_option('portfolio_page') ) { ?>
												<span class="btn-back"><a href="<?php echo get_permalink( of_get_option('portfolio_page') ); ?>"><?php _e('Back', 'si_theme'); ?></a></span>
											<span class="nav-sep">|</span>
											<?php } ?>
											<?php if( get_next_post() ) : ?>
												<span class="btn-prev"><?php next_post_link('%link', __('Previous', 'si_theme')) ?></span>
												<?php if( get_previous_post() ) : ?>  <span class="nav-sep">|</span> <?php endif; ?>
											<?php endif; ?>
											<?php if( get_previous_post() ) : ?>
												<span class="btn-next"><?php previous_post_link('%link', __('Next', 'si_theme')) ?></span>
											<?php endif; ?>
										</div>								  
								</div>			
								</div>
                
				</div>
					
            
				<?php endwhile; else: ?>				
					<div id="post-0" <?php post_class() ?>>					
						<h1 class="page-title"><?php _e('Page Not Found', 'si_theme'); ?></h1>	
						<div class="sep"></div>	
						<div class="entry-content">
							<p><?php _e("Sorry, but you are looking for something that isn't here.", "si_theme"); ?></p>
						</div>					
					</div>				
				<?php endif; ?>	
<?php endif; ?>

<?php get_footer(); ?>