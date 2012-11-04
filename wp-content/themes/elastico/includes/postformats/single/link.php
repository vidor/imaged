<?php $url =  get_post_meta(get_the_ID(), 'si_link_url', true); ?>                
<h1 class="entry-title"><span class="icon"></span><a target="_blank" href="<?php echo $url; ?>"><?php the_title(); ?></a></h1>
<div class="sep"></div>
<div class="entry-content">
	<?php the_content(''); ?>
</div>