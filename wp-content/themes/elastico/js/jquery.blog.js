jQuery(document).ready(function($) { 
	
	var sidebarWidth = 280;	
	var leftOffset = sidebarWidth;	
	var $container = jQuery('#blog-grid');
	var loadMore = jQuery('#load-more a');	
	var posts_per_page = parseInt(loadMore.attr('data-perpage'));
	var offset = posts_per_page;
	var totalPosts = parseInt(loadMore.attr('data-total-posts'));
	var author = parseInt(loadMore.attr('data-author'));
	var category = parseInt(loadMore.attr('data-category'));	
	var tag = loadMore.attr('data-tag');
	var datemonth = loadMore.attr('data-month');
	var dateyear = loadMore.attr('data-year');
	var search = loadMore.attr('data-search');
	var loader = jQuery('#posts-count').attr('data-loader');
	
	if (!author) author = 0;		
	if (!category) category = 0;
	if (!tag) tag = '';		
	if (!datemonth) datemonth = 0;
	if (!dateyear) dateyear = 0;	
	if (!search) search = '';	
	
	jQuery(window).load(function(){
		si_setColsWidth();		
		$container.isotope({
				itemSelector : '.post',
				resizable: false,
				transformsEnabled: false // Flash issue	  
		},function(){
			si_forceScrollbar();
		});			
	
		jQuery('.flexslider').flexslider({
				animation: "fade",
				slideshow: false,
				controlNav: false					
		});		
		//setTimeout(function(){ si_resetLayout();},1000);		
		if (offset < totalPosts) jQuery('#load-more').fadeIn(200);	
	});
	
	
	if (jQuery('body').hasClass('opera') && jQuery('.jp-jplayer-video').length){   // fix for opera & Jplayer load
			jQuery(window).trigger('load');
	}	
	
	function si_forceScrollbar(){ // force scrollbar if isotope content > window height
		if ($container.height() > jQuery(window).height()) 
			jQuery('body').css('overflow-y','scroll');
	}
	
	si_initLoadMore();
	
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
						action : 'si_ajax_blog',
						nonce : siAjax.nonce,
						category: category,
						author: author,
						tag: tag,
						datemonth: datemonth,
						dateyear: dateyear,
						search: search,
						offset: offset
					},
                    success: function(data){					
						var $newEls = jQuery(data);
						$newEls.imagesLoaded( function(){		
									$container.append($newEls).isotope( 'appended', $newEls);
									jQuery('.flexslider').flexslider({
											animation: "fade",
											slideshow: false,
											controlNav: false			
									});
									jQuery('.entry-content').fitVids();	
									setTimeout(function(){ 
										si_resetLayout();
										offset = offset + posts_per_page;
										loadMore.removeClass('active');
										if (offset < totalPosts){
											jQuery('#posts-count').text(offset+'/'+totalPosts);
											loadMore.bind("click", si_initLoadMore());
										}
										else{
											loadMore.fadeOut();
										}							
									},1000);						
						});
					}
				});
            return false;
	}

		
	function si_getCols(){	
		var cols = 1;		
		var windowWidth = jQuery(window).width();		
		if(windowWidth>=420 && windowWidth<1300) cols = 2;			
		else if(windowWidth>=1300 && windowWidth<1620) cols = 3;
		else if(windowWidth>=1620 && windowWidth<2200) cols = 4;
		else if(windowWidth>= 2200) cols = 5;		
		return cols;
	}
	
	function si_setColsWidth(){			
		if (jQuery(window).width() < 768) leftOffset = 0;
		else leftOffset = sidebarWidth;		
		var containerWidth = jQuery(window).width() - leftOffset;
		var cols = si_getCols();			
		var colWidth = Math.floor(containerWidth/cols) + 1;	
		jQuery(".post").each(function(){jQuery(this).width(colWidth);});
	}
		
	function si_resetLayout(){
		var windowWidth = jQuery(window).width();
		si_setColsWidth();		
		$container.isotope('reLayout',function(){
			si_forceScrollbar();
			if(jQuery(window).width() != windowWidth) 
				setTimeout(function(){ si_resetLayout();},10);
		});		
	}	 	
	
	jQuery(window).on("debouncedresize", function( event ) {
		si_resetLayout();
	});	
	
	jQuery('#blog-grid .post a').live({
		mouseover:  function() {$(this).find('h2').fadeIn();},
		mouseleave: function() {$(this).find('h2').stop().fadeOut();}
	});

});