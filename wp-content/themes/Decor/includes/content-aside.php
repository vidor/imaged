<div class="post_format_wrap booklet_wrap">

	<div class="booklet_arrows">
	
		<a class="prev"></a>
		<a class="next"></a>
	
	</div><!-- booklet_arrows -->

	<div id="mybook_<?php echo get_the_id(); ?>">
		<div class="b-load">
	
			<?php echo get_post_field('post_content', get_meta_option('select_booklet')); ?>
			
		</div>
	</div>

</div><!-- post_format_wrap -->

<script>

jQuery(document).ready(function($){


	var $this=$('#mybook_<?php echo get_the_id(); ?>');

	$this.booklet({
		width:  640,
	    height: 400,
		manual: false,
		overlays: false,
		pagePadding: 0,
		pageNumbers: false,
        shadows: true,
		auto: true
		
    });
	
	
	$this.siblings('.booklet_arrows').children('.next').click(function(e){
		e.preventDefault();
		$this.booklet("next");
	});

	$this.siblings('.booklet_arrows').children('.prev').click(function(e){
		e.preventDefault();
		$this.booklet("prev");
	});
		
});

</script>
