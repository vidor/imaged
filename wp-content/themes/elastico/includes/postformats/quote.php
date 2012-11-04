<?php get_template_part('includes/postformats/post-meta'); ?>
<?php   $quote =  get_post_meta(get_the_ID(), 'si_quote', true); 
		$quotesource =  get_post_meta(get_the_ID(), 'si_quote_source', true); ?>
                	
<div class="quote-wrap clearfix">
        <blockquote>"<?php echo $quote; ?>"</blockquote>
        <?php if ( $quotesource != '') :?><span class="quote-meta"><?php echo $quotesource; ?></span><?php endif;?>
</div>
