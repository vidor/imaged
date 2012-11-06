jQuery(document).ready(function() { 

	var loadMore = jQuery('#load-more a');	
	var posts_per_page = parseInt(loadMore.attr('data-perpage'));
	var offset = posts_per_page;
	var totalPosts = parseInt(loadMore.attr('data-total-posts'));
	var loader = jQuery('#posts-count').attr('data-loader');

	if (offset < totalPosts) {
		$('#load-more').show();
		loadMoreInit();
	}

	function loadMoreInit() {
		loadMore.click(function(e) {			
			jQuery(this).unbind("click").addClass('active');				
			jQuery('#posts-count').html('<img src="'+ loader +'"/>');	
			loadMorePosts();
			e.preventDefault();			
		});			
	}	

	function loadMorePosts() {
		jQuery.ajax({
            url: ajax.ajaxurl,
            type:'POST',
            data: {
				action : 'imaged_ajax_loadmore',
				nonce : ajax.nonce,
				offset: offset
			},
            success: function(data){		
				var $newEls = jQuery(data);
				$('#load-more').before($newEls);
	
					offset = offset + posts_per_page;
					loadMore.removeClass('active');
					if (offset < totalPosts){
							jQuery('#posts-count').text(offset+'/'+totalPosts);
							loadMore.bind("click", loadMoreInit());
					}
					else{
							$('#load-more').hide();
					}							

			}
		});	

		return false;	
	}
});