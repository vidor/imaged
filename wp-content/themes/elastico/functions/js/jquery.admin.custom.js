/***************************************************************************************
				Custom Javascript for Admin 
***************************************************************************************/
 
jQuery(document).ready(function() {

	/******* Portfolio Admin - Switch between Images/Video/Audio types *************/
    
	var portfolioTypeSelect = jQuery('#si_portfolio_type'),
		portfolioImage = jQuery('#si-meta-box-portfolio-images'),
		portfolioVideo = jQuery('#si-meta-box-portfolio-video'),
		portfolioAudio = jQuery('#si-meta-box-portfolio-audio');
		currentType = portfolioTypeSelect.val();
        
	portfolioSwitch(currentType);

	portfolioTypeSelect.change( function() {
		currentType = jQuery(this).val();       
		portfolioSwitch(currentType);
	});
    
	function portfolioSwitch(currentType) {
		if( currentType == 'Audio' ) {
			portfolioHideAllExcept(portfolioAudio);
		} else if( currentType == 'Video' ) {
			portfolioHideAllExcept(portfolioVideo);
		} else {
			portfolioHideAllExcept(portfolioImage);
		}
	}
    
	function portfolioHideAllExcept(metabox) {
		portfolioImage.css('display', 'none');
		portfolioVideo.css('display', 'none');
		portfolioAudio.css('display', 'none');
		metabox.css('display', 'block');
	}
		
	
	/******* Post Admin - Show Approprite Metaboxes when Post Format selected ********/
	
	var imageMetabox = jQuery('#si-meta-box-post-image');
	var imageTrigger = jQuery('#post-format-image');	
	imageMetabox.css('display', 'none');
	
	var galleryMetabox = jQuery('#si-meta-box-post-gallery');
	var galleryTrigger = jQuery('#post-format-gallery');	
	galleryMetabox.css('display', 'none');

	var videoMetabox = jQuery('#si-meta-box-post-video');
	var videoTrigger = jQuery('#post-format-video');	
	videoMetabox.css('display', 'none');
	
	var audioMetabox = jQuery('#si-meta-box-post-audio');
	var audioTrigger = jQuery('#post-format-audio');	
	audioMetabox.css('display', 'none');
		
	var quoteMetabox = jQuery('#si-meta-box-post-quote');
	var quoteTrigger = jQuery('#post-format-quote');	
	quoteMetabox.css('display', 'none');
	
	var linkMetabox = jQuery('#si-meta-box-post-link');
	var linkTrigger = jQuery('#post-format-link');	
	linkMetabox.css('display', 'none');
	
	
	jQuery('#post-formats-select input').change( function() {		
		if(jQuery(this).val() == 'image') {
			hideAllExcept(imageMetabox);			
		} else if(jQuery(this).val() == 'gallery') {
			hideAllExcept(galleryMetabox);			
		} else if (jQuery(this).val() == 'video') {
			hideAllExcept(videoMetabox);			
		} else if(jQuery(this).val() == 'audio') {
			hideAllExcept(audioMetabox);			
		} else if(jQuery(this).val() == 'quote') {
			hideAllExcept(quoteMetabox);			
		} else if(jQuery(this).val() == 'link') {
			hideAllExcept(linkMetabox);			
		} 
		else {
			videoMetabox.css('display', 'none');
			audioMetabox.css('display', 'none');
			quoteMetabox.css('display', 'none');
			linkMetabox.css('display', 'none');
			galleryMetabox.css('display', 'none');
			imageMetabox.css('display', 'none');
		}		
	});
		
	if(audioTrigger.is(':checked'))
		audioMetabox.css('display', 'block');
		
	if(videoTrigger.is(':checked'))
		videoMetabox.css('display', 'block');
		
	if(quoteTrigger.is(':checked'))
		quoteMetabox.css('display', 'block');
		
	if(linkTrigger.is(':checked'))
		linkMetabox.css('display', 'block');
		
	if(galleryTrigger.is(':checked'))
		galleryMetabox.css('display', 'block');
		
	if(imageTrigger.is(':checked'))
		imageMetabox.css('display', 'block');
		
	function hideAllExcept(metabox) {
		imageMetabox.css('display', 'none');
		galleryMetabox.css('display', 'none');
		videoMetabox.css('display', 'none');
		audioMetabox.css('display', 'none');
		quoteMetabox.css('display', 'none');
		linkMetabox.css('display', 'none');		
		metabox.css('display', 'block');
	}
	
	
	/******* Page Admin - Show Appropriate Metaboxes when Template selected *************/
	
	var pageGallery = jQuery('#si-meta-box-page-photos');
	pageGallery.css('display', 'none');
	var pageVideo = jQuery('#si-meta-box-page-video');
	pageVideo.css('display', 'none');
	var pageBg = jQuery('#si-meta-box-page-background');
	pageBg.css('display', 'none');
	var pageSlider = jQuery('#si-meta-box-page-photos-slider');
	pageSlider.css('display', 'none');
	var pagePortfolio = jQuery('#si-meta-box-page-portfolio');
	pagePortfolio.css('display', 'none');
	var pageGalleryList = jQuery('#si-meta-box-page-gallery');
	pageGalleryList.css('display', 'none');
	
	
	if (jQuery('#page_template').val() == 'template-gallery.php' ) {
			pageGallery.css('display', 'block');
	}
	else if (jQuery('#page_template').val() == 'template-video.php' ) {
			pageVideo.css('display', 'block');
	}
	else if (jQuery('#page_template').val() == 'template-bg.php' ) {
			pageBg.css('display', 'block');
	}
	else if (jQuery('#page_template').val() == 'template-slider.php' ) {
			pageSlider.css('display', 'block');
	}
	else if (jQuery('#page_template').val() == 'template-portfolio-category.php' ) {
			pagePortfolio.css('display', 'block');
	}
	else if (jQuery('#page_template').val() == 'template-gallery-listing-category.php' ) {
			pageGalleryList.css('display', 'block');
	}
	
	jQuery("#page_template").change(function(){
		if(jQuery(this).val() == 'template-gallery.php'){
			pageGallery.css('display', 'block');
			pageVideo.css('display', 'none');
			pageBg.css('display', 'none');
			pageSlider.css('display', 'none');
			pagePortfolio.css('display', 'none');
			pageGalleryList.css('display', 'none');
		}
		else if(jQuery(this).val() == 'template-video.php'){
			pageVideo.css('display', 'block');
			pageGallery.css('display', 'none');
			pageBg.css('display', 'none');
			pageSlider.css('display', 'none');
			pagePortfolio.css('display', 'none');
			pageGalleryList.css('display', 'none');
		}
		else if(jQuery(this).val() == 'template-bg.php'){
			pageBg.css('display', 'block');
			pageGallery.css('display', 'none');
			pageVideo.css('display', 'none');
			pageSlider.css('display', 'none');
			pagePortfolio.css('display', 'none');
			pageGalleryList.css('display', 'none');			
		}
		else if(jQuery(this).val() == 'template-slider.php'){
			pageSlider.css('display', 'block');	
			pageBg.css('display', 'none');
			pageGallery.css('display', 'none');
			pageVideo.css('display', 'none');	
			pagePortfolio.css('display', 'none');			
			pageGalleryList.css('display', 'none');
		}
		else if(jQuery(this).val() == 'template-portfolio-category.php'){
			pageSlider.css('display', 'none');	
			pageBg.css('display', 'none');
			pageGallery.css('display', 'none');
			pageVideo.css('display', 'none');	
			pageGalleryList.css('display', 'none');
			pagePortfolio.css('display', 'block');	
		}		
		else if(jQuery(this).val() == 'template-gallery-listing-category.php'){
			pageSlider.css('display', 'none');	
			pageBg.css('display', 'none');
			pageGallery.css('display', 'none');
			pageVideo.css('display', 'none');	
			pagePortfolio.css('display', 'none');	
			pageGalleryList.css('display', 'block');
		}
		
		else{
			pageGallery.css('display', 'none');
			pageVideo.css('display', 'none');
			pageBg.css('display', 'none');
			pageSlider.css('display', 'none');
			pagePortfolio.css('display', 'none');
			pageGalleryList.css('display', 'none');
		}
	});
	
	
	/******* Gallery Admin - Switch between Infinite Scroll/Fullscren Galleries *************/
	
  
	var galleryTypeSelect = jQuery('#si_gallery_script'),
		galleryFullscreen = jQuery('#si-meta-box-gallery-fullscreen'),
		galleryInfinite = jQuery('#si-meta-box-gallery-infinite'),
		currentGallery = galleryTypeSelect.val();
        
	gallerySwitch(currentGallery);

	galleryTypeSelect.change( function() {
		currentGallery = jQuery(this).val();       
		gallerySwitch(currentType);
	});
    
	function gallerySwitch(currentType) {
		if( currentGallery == 'infinite-scroll' ) {
			galleryFullscreen.css('display', 'none');
			galleryInfinite.css('display', 'block');
		} else {
			galleryInfinite.css('display', 'none');
			galleryFullscreen.css('display', 'block');			
		} 
	}

	
	/*************** Ajax Attachments Metabox ********************/
	
	// thickbox window closed
		
	if( "function" === typeof(jQuery.fn.on) ) // WP >= 3.3
		jQuery(document.body).on("tb_unload", "#TB_window",refreshGalleryMetabox);
	else  // WP < 3.3
		jQuery('#TB_window').live("unload", refreshGalleryMetabox);
		
	function refreshGalleryMetabox() {
			if(jQuery('.si_attachments').parents('.postbox').is(":visible")){
				var post_id = jQuery("#post_ID").val();
				
				jQuery.ajax({
							type: 'POST',
							url: ajaxurl,
							dataType:'html',
							data: {
								action: 'refresh_metabox',
								post_id: post_id
							},
							success:function(res) {
							jQuery('.si_attachments').html(res);
						}
				   });
			}				
	}
	
	
});