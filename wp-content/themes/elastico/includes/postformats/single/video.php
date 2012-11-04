<?php 	$m4v = get_post_meta($post->ID, 'si_video_m4v', true);
        $ogv = get_post_meta($post->ID, 'si_video_ogv', true);
        $poster = get_post_meta($post->ID, 'si_video_poster', true);
		$youtube_vimeo = get_post_meta($post->ID, 'si_youtube_vimeo_url', true); 
		$embed = get_post_meta($post->ID, 'si_video_embed_code', true); 
		
		$ratio_width = get_post_meta($post->ID, 'si_video_ratio_width', true);
		$ratio_height = get_post_meta($post->ID, 'si_video_ratio_height', true);
										
		$ratio = '';
		if (!empty($ratio_width)) 
		$ratio = ((int)$ratio_height / (int)$ratio_width * 100) .'%';
?>
    
<div class="post-video">      
		<?php if ($youtube_vimeo !='') { ?>
			<div class="fluid-video" <?php if (!empty($ratio)) echo 'style="padding-top:'.$ratio.';padding-bottom:0;"'; ?>>
				<?php si_get_video($post->ID, 800,450);?>
			</div>
		
		<?php } 
		elseif ($embed !='') { ?>
			<div class="fluid-video" <?php if (!empty($ratio)) echo 'style="padding-top:'.$ratio.';padding-bottom:0;"'; ?>>
				<?php echo stripslashes(htmlspecialchars_decode($embed));?>
			</div>
		<?php } 
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
									<div class="jp-controls-holder">
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
											<li><a class="jp-full-screen" tabindex="1" >Full Screen</a></li>
											<li><a class="jp-restore-screen" tabindex="1">Restore Screen</a></li>
										</ul>
									</div>
								</div>							
							</div>
							<div class="jp-no-solution">
								<span><?php _e('Update Required', 'si_theme'); ?> </span>
								<?php _e('To play the media you will need to either update your browser to a recent version or update your Flash plugin.', 'si_theme'); ?>
							</div>
					</div>
			</div>
        
		<?php } ?>
</div>
	
	
<h1 class="entry-title"><?php the_title(); ?></h1>       
<div class="sep"></div>
<div class="entry-content">								
	<?php the_content('');?>	
</div>