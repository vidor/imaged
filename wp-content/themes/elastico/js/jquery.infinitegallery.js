jQuery(document).ready(function() {

	var sidebarWidth = 280;	
	var leftOffset = sidebarWidth;		
	var $container = jQuery('.photos-gallery');		
	var img_per_page = parseInt($container.attr('data-offset'));
	var currentcount = img_per_page;
	var total = parseInt($container.attr('data-total'));
	var pageid = parseInt($container.attr('data-pageid'));
	var showtitle = true;
	if ($container.attr('data-si-title') == 'false')
		showtitle = false;	
	
	
	$container.imagesLoaded( function(){
		si_setColsWidth();
		$container.isotope({
			itemSelector : '.item-photo',
			resizable : false
		},function(){			
			jQuery(window).bind({scroll: function(){si_addPhotosScroll();}});
			if (($container.height() < jQuery(window).height()) &&  (currentcount < total)){
				si_loadMorePhotos();			
			}			
		});
	});
		
	function si_addPhotosScroll(){
		if ( ($container.height() - jQuery(window).height() <= jQuery(window).scrollTop()) &&  (currentcount < total) ){	
			si_loadMorePhotos();				 
		}
	}

	function si_loadMorePhotos() {

				jQuery("#ajax-loading").show();
				jQuery(window).unbind("scroll");
				
				jQuery(".media-image a,.media-video a").unbind('click.fb'); 
				jQuery(".media-image a,.media-video a").click(function(e){
					e.preventDefault();
				});
				
				jQuery.ajax({
							type: 'POST',
							url: siAjax.ajaxurl,
							data: {
								action: 'si_ajax_gallery',
								nonce : siAjax.nonce,							
								offset: currentcount,
								numberposts : img_per_page,
								pageid : pageid
							},
							success: function(data){
									var $newEls = jQuery(data);									
									$container.imagesLoaded( function(){	
											
											var cols = si_getCols();
											var containerWidth = jQuery(window).width() - leftOffset;
											var colWidth = Math.floor(containerWidth/cols);
											jQuery("#ajax-loading").hide();											
											
											$newEls.each(function(){
												jQuery(this).width(colWidth);
												var ratio = jQuery(this).find('img').attr('width') / jQuery(this).find('img').attr('height');
												jQuery(this).height(Math.floor(colWidth / ratio));
											});
											 
											$container.append($newEls).isotope( 'appended', $newEls,function() {
												$newEls.css("height",'auto');												
												si_setFancybox();												
												currentcount = currentcount + img_per_page;
												if (currentcount >= total) {											
													jQuery('#ajax-loading').remove();
												}
												else {
												  jQuery(window).bind({scroll: function(){ si_addPhotosScroll();}});
												  if ($container.height() < jQuery(window).height())
														si_loadMorePhotos();
												}										
												
											});
																			
									});
							}			
				});
	}	
	
	

	function si_getCols(){
		var cols = 1;
		var windowWidth = jQuery(window).width();		
		if(windowWidth>=321 && windowWidth<1160) cols = 2;
		else if(windowWidth>=1160 && windowWidth<1640) cols = 3;
		else if(windowWidth>=1640  && windowWidth<2100) cols = 4;
		else if(windowWidth>=2100) cols = 5;			
		return cols;
	}
	
	function si_setColsWidth(){			
		if (jQuery(window).width() < 768) leftOffset = 0;
		else leftOffset = sidebarWidth;	
		var containerWidth = jQuery(window).width() - leftOffset;		
		var cols = si_getCols();		
		var colWidth = Math.floor(containerWidth/cols);			
		jQuery(".item-photo").each(function(){jQuery(this).width(colWidth);});
	}	
		
	function si_resetLayout(){
		si_setColsWidth();		
		$container.isotope('reLayout');		
	}	
	
	jQuery(window).on("debouncedresize", function( event ) {
		si_resetLayout();
		si_setVideoDimensions();
	});
	
	var widthVideo = 960;
	var heightVideo = 540;	
	si_setVideoDimensions();
	
	function si_setVideoDimensions(){
		var windowWidth = jQuery(window).width();
		if(windowWidth <480 ) {
			widthVideo = 240;
			heightVideo = 135;			
		}
		else if(windowWidth >=480 && windowWidth < 768){
			widthVideo = 380;
			heightVideo = 214;		
		}		
		else if	(windowWidth >= 768 && windowWidth<1024) {
			widthVideo = 640;
			heightVideo = 360;			
		}
		else {
			widthVideo = 960;
			heightVideo = 540;	
		}
		si_setFancybox();
		
	}

	
	function si_setFancybox(){	
		jQuery(".media-image a").fancybox({
				'transitionIn'	:	'none',
				'transitionOut'	:	'none',
				'titlePosition' : 'outside',
				'titleShow'		: 	showtitle,				
				'padding'       :   0,
				'overlayOpacity':	1,
				'overlayColor' : '#fff',
				'onComplete': function() { 
					jQuery("body").css({'overflow':'hidden'}); 
					jQuery('#fancybox-left, #fancybox-right').css('width',"35%");				
				}, 					
				'onClosed': function() { jQuery("body").css({"overflow":"visible"});} 
		});			
		jQuery(".media-video a").fancybox({
				'width'			: widthVideo,
				'height'		: heightVideo,
				'type'			: 'iframe',
				'titlePosition' : 'outside',
				'titleShow'		: 	showtitle,		
				'padding'       :   0,
				'overlayOpacity':	1,
				'overlayColor' : '#fff',
				'onComplete': function() { 
					jQuery("body").css({'overflow':'hidden'});
					jQuery('#fancybox-left, #fancybox-right').css('width',0);
				}, 
				'onClosed': function() { jQuery("body").css({"overflow":"visible"});} 
		});		

		
	}	

});
