jQuery(document).ready(function($) {


	//cufon	
	if (!($.browser.msie  && parseInt($.browser.version, 10) === 8)) Cufon.replace('.entry_item h2'); 

	Cufon.CSS.ready(function() {
		
		columnize_content();

	}); 

	Cufon.replace('h1,h2,h3,h4,h5,h6, .blog_date, #pagination_wrap a, .dropcap, #copyright');
	Cufon.replace('#nav li a, #footer_nav li a',{hover:true});
	Cufon.now();

	//add nav class
	$('header #nav .sub-menu').siblings('a').addClass('nav-plus');
	
	$('#nav > li > a.nav-plus').click(function(){

		$this=$(this);
		
		if($this.hasClass('nav-minus')){
		
			//$('#nav > li > a.nav-minus').not($this).removeClass('nav-minus').siblings('.sub-menu').slideUp(400,'easeOutCubic');
			//$this.removeClass('nav-minus').siblings('.sub-menu').slideUp(400,'easeOutCubic');
		
		}
		else{
		
			$('#nav > li > a.nav-minus').not($this).removeClass('nav-minus').siblings('.sub-menu').slideUp(400,'easeOutCubic');
			$this.addClass('nav-minus').siblings('.sub-menu').slideDown(400,'easeOutCubic');
		
		}

	});
	
	
	//calculate entry list width
	function calculate_list_width(){
				
		var list_width=0;
		$('#entry_list > li').each(function() {

			$this=$(this);
			list_width+=$this.outerWidth(true);
			console.log($this.outerWidth(true));
		
		});
		
		$('#entry_list').css({width:list_width});
	
	}
	calculate_list_width();
	
	//lightbox
	function lightbox_init(){

		$("a.lightbox").colorbox({
			rel:'lightbox',
			fixed:true,
			maxWidth: '80%',
			maxHeight: '80%',
			opacity : 0.7,
			onComplete: function(){
				Cufon.replace('#cboxTitle');
			}

		});
	
	}
	lightbox_init();
	
	$("body.horizontal-page").mousewheel(function(e, delta) {
		
		$('html, body').stop().animate({scrollLeft: '-='+(150*delta)+'px' }, 200, 'easeOutQuint');
		e.preventDefault();

	});

	//tablet gestures
	$("body.horizontal-page").wipetouch({
		wipeLeft: function(result) { $('html, body').stop().animate({scrollLeft: '+=500px' }, 200, 'easeOutQuint'); },
		wipeRight: function(result) { $('html, body').stop().animate({scrollLeft: '-=500px' }, 200, 'easeOutQuint'); }
	});
	

	function columnize_content(){
	
	
		$('body.single-portfolio #entry_details').columnize({
		
			width:320,
			height:460,
			buildOnce:true,
			
			doneFunc: function(){
			
				Cufon.refresh();

				//remove all the empty columns
				var width=0;
				$('#entry_details > .column').each(function() {

					$this=$(this);
					if($this.text()=='') { $this.addClass('hidden'); width+=320; }
					
				});
				
				$('#entry_details').css({width:'-='+width+'px'});
				$('#entry_details_wrap').css({width:$('#entry_details').width()});
				$('#entry_details_wrap .column').css({height:'400px'});
				calculate_list_width();
			
			}

		});
	
	}
	

	
	$('#entry_list li.more-posts').click(function() {
	
		var $this=$(this);
		$this.addClass('loading');
		var $list=$('#entry_list');
		var $page=$list.attr('data-page');
		var $count=$list.attr('data-count');
		var $cats=$list.attr('data-cats');
	
		$('span#loaded_content').load( global_var.uri + "/get-posts.php", { page: $page, count: $count, cats: $cats }, function() {
		
			$this.removeClass('loading');
			Cufon.replace('#loaded_content h2,#loaded_content .blog_date');
			$('span#loaded_content').children('li').unwrap();
			$('<span id="loaded_content">').insertBefore($this);
			$list.attr('data-page',parseInt($page)+1);
			calculate_list_width();
			

			
		});
		
	});
	

	
	$('#open_btn').click(function() {
	
		$(this).fadeOut(200);
		
		$('#prevslide').animate({left:'-50px'},200,'easeOutCubic');
		$('#nextslide').animate({right:'-50px'},200,'easeOutCubic');
	
		$('header #nav, header #searchform input').slideDown(600,'easeOutCubic', function(){
		
			$('#close_btn').animate({top:'-15px'},100,'easeOutCubic');
		
			$('#main_overlay').slideDown(600,'easeOutCubic', function(){
			
				$('#main_body_wrap').css({zIndex:0}).animate({opacity:1},600,'easeOutCubic');
				
			
			});
		
		});
	
	});
	
	
	$('#close_btn').click(function() {
	
		$(this).animate({top:'-60px'},200,'easeOutCubic');
		
		$('#main_body_wrap').animate({opacity:0},600,'easeOutCubic', function(){
		
			$(this).css({zIndex:-9999});
			$('#main_overlay').slideUp(600,'easeOutCubic', function(){
			
				$('header #nav, header #searchform input').slideUp(400,'easeOutCubic', function(){
				
					$('#open_btn').fadeIn(200);
				
					$('#prevslide').animate({left:'0px'},200,'easeOutCubic');
					$('#nextslide').animate({right:'0px'},200,'easeOutCubic');
				
				});
			
			});
		});
		

	});
	
	//flickr images
	$(".flickr_wrap").each(function(index){
	
		var $this=$(this);
		var count=$this.attr('data-count');
		var id=$this.attr('data-id');

		$.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?id="+id+"&lang=en-us&format=json&jsoncallback=?", function(data){

			$.each(data.items, function(i,item){

				if(i<count) $("<img/>").attr("src", item.media.m.replace('_m.jpg','_s.jpg')).attr("title",item.title).appendTo($this).wrap("<a title="+item.title+" class='lightbox' href='" + (item.media.m).replace("_m.jpg", "_b.jpg") + "'></a>");

			});
			
			lightbox_init();

		});
	
	});
	

	//tiptip
	$('.flickr_wrap > a img, .posts .post_thumbnail a, .widget_portfolio ul li a').tipTip({defaultPosition:'top'});
	//$('#social_icons li a').tipTip({defaultPosition:'left'});
	
	
	$(window).resize(function() {
	
		$('#entry_list').css({marginTop:$(window).height()/2-220+'px'});
		$('#pagination_wrap').css({top:$(window).height()/2+200+'px'});
		
	}).trigger("resize");;

	//like functionality
	$(document).delegate('.entry_likes a', 'click', function() {
	
	
		var $this=$(this);
		if($this.hasClass('voted')) return false;
  
        // Retrieve post ID from data attribute  
        var post_id = $this.attr("data-id");  
	
        // Ajax call  
        jQuery.ajax({  
            type: "post",  
            url: global_var.ajax,  
            data: "action=post-like&nonce="+global_var.nonce+"&post_like=&post_id="+post_id,  
            success: function(count){  
                // If vote successful  
                if(count != "voted")  {  
					
                    $this.addClass("voted");  
                    $this.children("span").text(count);  
                }  
            }  
        });  
  
        return false;  
	
	
	});
	
	$('.contact_form').validate({

		highlight: function(element, errorClass) {
			$(element).addClass('invalid');
		},

		unhighlight: function(element, errorClass) {
			$(element).removeClass('invalid');
		},

		errorPlacement: function(error, element) {

		},

		submitHandler: function(form) {

			$.post(form.action+"?"+$(form).serialize(),function(){
			
				$(form).siblings('.success').fadeIn(400);
				
			});
			
		}
	
	});
	

 
});