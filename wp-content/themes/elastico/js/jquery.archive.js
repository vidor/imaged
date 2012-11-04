jQuery(document).ready(function() { 

	var sidebarWidth = 280;		
	var $container = jQuery('.archives');
	
	$container.imagesLoaded( function(){		
		var windowWidth = jQuery(window).width();		
		si_setColsWidth();		
		$container.isotope({
				itemSelector : '.archives-post',
				resizable: false,
				transformsEnabled : false
		},function(){		
			if(jQuery(window).width() != windowWidth) 
				setTimeout(function(){ si_resetLayout();},10);				
		});		
	});	
			
	function si_setColsWidth(){
		var archiveWidth = 150;
		var windowWidth = jQuery(window).width() ;		
		var leftOffset = sidebarWidth;		
		if (windowWidth < 768) leftOffset = 0;		
		var containerWidth = windowWidth - leftOffset;
		var cols =  Math.floor(containerWidth / archiveWidth);		
		var colWidth = Math.floor(containerWidth/cols) + 1;
		jQuery(".archives-post").each(function(){jQuery(this).width(colWidth);});
	}
	
	function si_resetLayout(){
		var windowWidth = jQuery(window).width();
		si_setColsWidth();
		$container.isotope('reLayout',function(){
			if(jQuery(window).width() != windowWidth) 
				setTimeout(function(){ si_resetLayout();},10);
		});		
	}
	
	jQuery(window).on("debouncedresize", function( event ) {
		si_resetLayout();		
	});	
	

});