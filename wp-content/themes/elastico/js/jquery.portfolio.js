jQuery(document).ready(function() { 

	var sidebarWidth = 280;	
	var leftOffset = sidebarWidth;	
	var $container = jQuery('#portfolio-grid');	
	var loadMore = jQuery('#load-more a');	
	var posts_per_page = parseInt(loadMore.attr('data-perpage'));
	var offset = posts_per_page;
	var totalPosts = parseInt(loadMore.attr('data-total-posts'));
	var loader = jQuery('#posts-count').attr('data-loader');
	var load = jQuery('#portfolio-grid').attr('data-portfolio-load');
	
	
	$container.imagesLoaded( function(){	
		si_setColsWidth();
		$container.isotope({
				itemSelector : '.portfolio-item',
				resizable : false,
				transformsEnabled : true
		});			
		if (load =="ajax"){
			if (offset < totalPosts) {
				jQuery('#load-more').fadeIn(200);
				si_initLoadMore();
			}	
		}		
	});
	
			
	function si_initLoadMore(){			
		loadMore.click(function(e) {			
			jQuery(this).unbind("click").addClass('active');				
			jQuery('#posts-count').html('<img src="'+ loader +'"/>');				
			si_loadMorePosts();						
			e.preventDefault();			
		});		
	}
	

	function si_loadMorePosts(){ 
				jQuery.ajax({
                    url: siAjax.ajaxurl,
                    type:'POST',
                    data: {
						action : 'si_ajax_portfolio',
						nonce : siAjax.nonce,
						offset: offset
					},
                    success: function(data){					
						var $newEls = jQuery(data);
						
						$newEls.imagesLoaded( function(){	
									jQuery('#filter .all a').trigger('click');
									$container.append($newEls).isotope( 'appended', $newEls);
										si_resetLayout();
										jQuery('a.entry-link').hover( function() {	
											jQuery(this).find('.overlay').stop().css({opacity: 0,display: 'block'}).animate({ opacity: 1}, 150);
										}, function() {
											jQuery(this).find('.overlay').stop().fadeOut(150);
										});
										offset = offset + posts_per_page;
										loadMore.removeClass('active');
										if (offset < totalPosts){
												jQuery('#posts-count').text(offset+'/'+totalPosts);
												loadMore.bind("click", si_initLoadMore());
										}
										else{
												loadMore.fadeOut();
										}							
													
						});
					}
				});
            return false;
	}		
			
			
	var optionFilter = jQuery('#filter'),
        optionFilterLinks = optionFilter.find('a');		
	
	optionFilterLinks.click(function(){
		if ( jQuery(this).hasClass('active')) { return false;}	
		var selector = jQuery(this).attr('data-filter');
        $container.isotope({filter : selector});		                
        optionFilterLinks.removeClass('active');
        jQuery(this).addClass('active');		
        return false;
	});
		       
		
	function si_getCols(){		
		var cols = 1;
		var windowWidth = jQuery(window).width();		
		if(windowWidth>=380 && windowWidth<1160) cols = 2;
		else if(windowWidth>=1160 && windowWidth<1640) cols = 3;
		else if(windowWidth>=1640 && windowWidth<2100) cols = 4;
		else if(windowWidth>=2100) cols = 5;		
		return cols;
	}
	
	function si_setColsWidth(){
		if (jQuery(window).width() < 768) leftOffset = 0;
		else leftOffset = sidebarWidth;		
		var containerWidth = jQuery(window).width() - leftOffset;		
		var cols = si_getCols();		
		var colWidth = Math.floor(containerWidth/cols);			
		jQuery(".portfolio-item").each(function(){jQuery(this).width(colWidth);	});
	}
		
	function si_resetLayout(){
		si_setColsWidth();		
		$container.isotope('reLayout');	
	}	
		
	jQuery(window).on("debouncedresize", function( event ) {	
		si_resetLayout();		
	});
	
	jQuery('a.entry-link').hover( function() {	
		jQuery(this).find('.overlay').stop().css({opacity: 0,display: 'block'}).animate({ opacity: 1}, 150);
	}, function() {
		jQuery(this).find('.overlay').stop().fadeOut(150);
	});
	

});
