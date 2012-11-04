<?php 
		$mp3 = get_post_meta($post->ID, 'si_audio_mp3', true);
		$ogg = get_post_meta($post->ID, 'si_audio_ogg', true);
		$audioposter = get_post_meta($post->ID, 'si_audio_poster', true);
		
		$audioembed = get_post_meta($post->ID, 'si_audio_embed_code',true);
?>
			
<div class="post-audio" >   

		<?php if ($audioembed !='') { ?>
			<?php echo stripslashes(htmlspecialchars_decode($audioembed));?>
	
		<?php } else { ?>
	
			<?php if ($audioposter): ?>
				<div class="audio-poster"><img src="<?php echo $audioposter;?>"/></div>
			<?php endif;?>
	 
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
											oga: "<?php echo $ogg; ?>",
											<?php endif; ?>									
										});
									},									
									swfPath: "<?php echo get_template_directory_uri(); ?>/js",
									cssSelectorAncestor: "#jp_container_<?php the_ID(); ?>",
									supplied: "<?php if($ogg != '') : ?>oga,<?php endif; ?><?php if($mp3 != '') : ?>mp3, <?php endif; ?> all"
								});								
							}
						});
			</script>
    
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
												<li><a class="jp-pause" tabindex="1">Pause<</a></li>
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
</div>
      
<h1 class="entry-title"><?php the_title(); ?></h1>      
<div class="sep"></div>		
<div class="entry-content">								
	<?php the_content('');?>		
</div>  