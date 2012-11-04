jQuery(document).ready(function() { 

/*-----------------------------------------------------------------------------------*/
/*	Menu
/*-----------------------------------------------------------------------------------*/		
	if(jQuery('body').hasClass('mobile')){  // Tablet Hover Fix 		
		jQuery("#main-nav li").each(function(){				
			if(jQuery(this).children('ul').length){ 
				var link = jQuery(this).children('a');					
				if(link.attr('href') == '#'){
					link.toggle( function() {jQuery(this).siblings('ul').slideDown("slow");	}, function() {jQuery(this).siblings('ul').slideUp("slow");	});
				}						
				else{
					var firstClick = true;
					link.click(function(e){
					if (firstClick){
						jQuery(this).siblings('ul').slideDown("slow");
						firstClick = false;
						e.preventDefault();    
					}	
					});						
				}
			}
		});		
	}		
	else{		
			jQuery("#main-nav li").each(function(){				
				if(jQuery(this).children('ul').length){ 
					jQuery(this).hoverIntent({
						interval: 100,
						over: navHoverIn,
						timeout: 300,
						out: navHoverOut            
					});
				}
			});
	}
		
		
	function navHoverIn () {
			jQuery(this).children('ul').slideDown("slow");
			jQuery(this).addClass("down");
    }
		
    function navHoverOut () {
			var menu =  jQuery(this);
			jQuery(this).children('ul').slideUp("slow",function() {
				  menu.removeClass("down");
			});          
    }
		
	var defaultmenu = jQuery('#primary-nav').attr('data-selectname');
	jQuery('#main-nav').mobileMenu({
			defaultText: defaultmenu
	});
				
			
	jQuery.event.special.debouncedresize.threshold = 250;		
	
/*-----------------------------------------------------------------------------------*/
/* Fluid video
/*-----------------------------------------------------------------------------------*/
	jQuery('.entry-content').fitVids();	
	
	if(jQuery('iframe.video-fullpage').length){
		jQuery(window).on("debouncedresize", function( event ) {
			var h = jQuery(window).height();
			if(jQuery(window).width() > 767)
				jQuery('.video-fullpage').height(h);
			else jQuery('.video-fullpage').attr('style','');
		});
		jQuery(window).trigger( "debouncedresize" );	
	}
			
	
	
/*-----------------------------------------------------------------------------------*/
/*	Fancybox Galleries
/*-----------------------------------------------------------------------------------*/
	
	jQuery("a.fullscreen").fancybox({
			'padding'       :   0,
			'overlayOpacity':	1,
			'overlayColor' : '#fff',
			'transitionIn': 'none',
			'transitionOut': 'none',
			'onComplete': function() { jQuery("body").css({'overflow':'hidden'});}, 
			'onClosed': function() { jQuery("body").css({"overflow":"visible"});} 
	});	

	jQuery(".gallery-icon a").fancybox({
			'padding'       :   0,
			'overlayOpacity':	1,
			'overlayColor' : '#fff',
			'titleShow' : false,
			'transitionIn': 'none',
			'transitionOut': 'none',				
			'onComplete': function() { jQuery("body").css({'overflow':'hidden'});}, 
			'onClosed': function() { jQuery("body").css({"overflow":"visible"});} 
	});
				
	jQuery(".gallery-icon a").each(function(){jQuery(this).attr('rel','gallery');});	
	
/*-----------------------------------------------------------------------------------*/
/*	Shortcodes
/*-----------------------------------------------------------------------------------*/
		
	// Toggle
	jQuery(".toggle_content").hide(); 

	jQuery("h4.toggle").toggle(function(){
		jQuery(this).addClass("active");
		}, function () {
		jQuery(this).removeClass("active");
	});

	jQuery("h4.toggle").click(function(){
		jQuery(this).next(".toggle_content").slideToggle();
	});

	
	// Accordion
	jQuery(".accordion").tabs("div.acc_content", {tabs: '.acc_title', effect: 'slide'});
	
	// Tabs 	
	jQuery("ul.tabs").tabs("div.panes > div");

	
/*-----------------------------------------------------------------------------------*/
/*	Slideout Widgets 
/*-----------------------------------------------------------------------------------*/
	var slideout = jQuery('#slideout-wrap');
	var slideoutButton = jQuery('#slideout-button a');	
	var slideoutWidth = slideout.width();	
	 
	slideoutButton.toggle( function() {		
		slideout.animate({marginLeft : 0}, 600, 'easeInOutCirc');		
		slideoutButton.addClass('close');		
	}, function() {		
		slideout.animate({marginLeft : -slideoutWidth}, 600, 'easeInOutCirc');		
		slideoutButton.removeClass('close');		
		
	});		
	

});


/**
* hoverIntent r6 // 2011.02.26 // jQuery 1.5.1+
* <http://cherne.net/brian/resources/jquery.hoverIntent.html>
* 
* @param  f  onMouseOver function || An object with configuration options
* @param  g  onMouseOut function  || Nothing (use configuration options object)
* @author    Brian Cherne brian(at)cherne(dot)net
*/
(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev])}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev])};var handleHover=function(e){var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t)}if(e.type=="mouseenter"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob)},cfg.timeout)}}};return this.bind('mouseenter',handleHover).bind('mouseleave',handleHover)}})(jQuery);
