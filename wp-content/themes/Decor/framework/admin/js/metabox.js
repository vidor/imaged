jQuery(document).ready( function($) {



	jQuery('.gallery_items_wrap').sortable({
	   update: function(event, ui) { 

		update_gallery_input();

	   }
	});
	
	jQuery('.gallery_items_wrap .image_remove').live('click', function() {
	
		jQuery(this).parent().remove();
		update_gallery_input();
		
	});
	
	function update_gallery_input(){
	
		input_gallery_items.val('');

		jQuery('.gallery_items_wrap img').each(function(){

			if(input_gallery_items.val()=='') input_gallery_items.val(jQuery(this).attr('data-image'));
			else input_gallery_items.val(input_gallery_items.val()+','+jQuery(this).attr('data-image'));

		});
	
	}
	

	var textField;

	jQuery('#gallery_upload').click(function() {
		
		tb_show('Add Gallery Images', 'media-upload.php?post_id='+jQuery('#post_ID').val()+'&tab=type&TB_iframe=1');
		

	});
	
	

	jQuery('.op_upload_wrap button').click(function(e) {

		e.preventDefault();
		tb_show('Insert Adress URL', 'media-upload.php?tab=type&TB_iframe=1');
		textField= jQuery(this).prev();
		
		

	});

	var tb_show_temp = window.tb_show; 
	var input_gallery_items=jQuery('input#gallery_items');
	
	
	window.tb_show = function() { 

		tb_show_temp.apply(null, arguments); 

		var iframe = jQuery('#TB_iframeContent');
		iframe.load(function() {

			var iframeJQuery = iframe[0].contentWindow.jQuery;

			jQuery('<input id="add_gallery_images" class="button-primary" value="Add Gallery Images">').insertAfter(iframeJQuery('#save-all'));
			jQuery('<input class="add_image_to_gallery button-primary" value="Add Image to Gallery">').insertBefore(iframeJQuery('.savesend .del-link'));

			//jQuery('<input class="insert_adress button-primary" value="Insert ID">').insertBefore(iframeJQuery('.savesend .del-link'));
			


			iframeJQuery('#add_gallery_images').click(function(){

				var gallery_items=iframeJQuery('.media-item');
				

				input_gallery_items.val('');


				gallery_items.each(function(){

					jQuery('.gallery_items_wrap').append('<li><img data-image="'+jQuery(this).attr('id').slice(11)+'" src="'+jQuery(this).find('.pinkynail').attr('src')+'"><div class="image_close"></li>');

					if(input_gallery_items.val()=='') input_gallery_items.val(jQuery(this).attr('id').slice(11));
					else input_gallery_items.val(input_gallery_items.val()+','+jQuery(this).attr('id').slice(11));

				});

				tb_remove();

			});
			

		
			
			iframeJQuery('.add_image_to_gallery').click(function(){

				var img_id=jQuery(this).siblings('.del-attachment').attr('id').slice(15);
			
				if(input_gallery_items.val()=='') input_gallery_items.val(img_id);
				else input_gallery_items.val(input_gallery_items.val()+','+img_id);
				
				
				
				jQuery('.gallery_items_wrap').append('<li><img data-image="'+img_id+'" src="'+jQuery(this).parent().parent().parent().parent().parent().find('.pinkynail').attr('src')+'"><div class="image_remove hidden"></li>');


				
			});
			
		});
	}
	
	
	var pf_val=jQuery('#post-formats-select :checked').val();
	jQuery('.op_pf_'+pf_val).show();
	
	jQuery('#post-formats-select').change(function(){

		jQuery('.op_pf').hide();
		pf_val=jQuery('#post-formats-select :checked').val();
		jQuery('.op_pf_'+pf_val).show();

	});
	



	
	value= jQuery('.op_theme_page_type_i select').val();
	jQuery('.op_theme_page_type').hide();
	jQuery('.op_theme_page_type_'+value).stop().fadeTo(300,1);
	
						
	if(value=='1') {

		hide_and_show('display_sidebar');
		hide_and_show('background_type');
		


	}

	if(value=='3' || value=='4') {

		hide_and_show('portfolio_type');

	}

	jQuery('.op_theme_page_type_i select').change(function(e){
	
		e.preventDefault();
	
		jQuery('.op_theme_page_type').hide();
		jQuery('.op_theme_page_type_'+this.value).stop().fadeTo(300,1);
		
		if(this.value=='1') {

			hide_and_show('display_sidebar');
			hide_and_show('background_type');

		}

		if(this.value=='3' || this.value=='4') {

			hide_and_show('portfolio_type');

		}

	});

	
	jQuery('.range-input-container input').rangeinput();
	
	//shortcode tabs 
	jQuery('#sc_tabs_count').parent().parent().parent().siblings().hide();
	
	jQuery('#sc_tabs_count').change(function(event, value) {

		jQuery(this).parent().parent().parent().parent().children('tr:gt(0)').hide();
		jQuery(this).parent().parent().parent().parent().children('tr:lt('+(value*2+1)+')').show();
		
	});

	
	
	jQuery('#add_shortcode').click(function(){
		send_to_editor( generate_sc_code() );
	});
	
	jQuery('#first_sc_select').val('none');
	jQuery('#first_sc_select').change(function(e){
	
		jQuery('.first_sc_container').hide();
		jQuery('.secondary_sc_container').hide();
		jQuery('.secondary_sc_select').val('none');	
		jQuery('.first_sc_container_'+this.value).stop().fadeTo(300,1);

		jQuery('#sc_error').hide();
		jQuery('#add_shortcode').hide();
		var sec=jQuery('.first_sc_container_'+this.value).find('.secondary_sc_container');
		if(sec.size()==0 && this.value!='none') jQuery('#add_shortcode').show();
		
		
	});
	
	
	jQuery('.secondary_sc_select').change(function(){
	
		jQuery('.secondary_sc_container').hide();
		jQuery('.secondary_sc_container_'+this.value).stop().fadeTo(300,1);
		jQuery('#sc_error').hide();		
		jQuery('#add_shortcode').show();	
		
	});
	

	
	function hide_and_show(val){
	
		sec_value= jQuery('.op_'+val+'_i select').val();
		jQuery('.op_'+val).hide();
		jQuery('.op_'+val+'_'+sec_value).stop().fadeTo(300,1);
	
	}
	
	var val1, val2, error;
	
	function get_text_value(val){
	
		if (val2 == undefined) return jQuery('#sc_'+val1+'_'+val).val();
		else return jQuery('#sc_'+val1+'_'+val2+'_'+val).val();

	}
	
	function display_error(){
	
		jQuery('#sc_error').html('Please fill all the required fields:'+error).stop().fadeTo(300,1);
	
	}
	
	function generate_sc_code(e){
	
		val1 = jQuery('#first_sc_select').val();
		val2 = jQuery('.secondary_sc_select_'+val1).val();
		error='';
		var sc='';
		
		switch(val1){

			case 'contactform':
						
				var email=get_text_value('email');
				
				if(email!='') email=' email="'+email+'"';
				
				sc='\n[contactform'+email+']\n';
				
			break;
			
				
			case 'gmap':
			
				var height=get_text_value('height');
				var latitude=get_text_value('latitude');
				var longitude=get_text_value('longitude');
				var zoom=get_text_value('zoom');
				var html=get_text_value('html');
				var maptype=get_text_value('maptype');

				if(height!=0) height= ' height="'+height+'"';
				else height='';
				if(latitude!= '') latitude= ' latitude="'+latitude+'"';
				else error +='<br/>Latitude';
				if(longitude!='') longitude= ' longitude="'+longitude+'"';
				else error +='<br/>Longitude';
				if(zoom!=0) zoom= ' zoom="'+zoom+'"';
				else zoom='';
				if(html!= '') html= ' html="'+html+'"';
				if(maptype!='...') maptype= ' maptype="'+maptype+'"';
				else maptype='';

				sc='\n[gmap'+height+latitude+longitude+zoom+html+maptype+']\n';
				
			break;
			
			case 'gallery':
			
				var categories=get_text_value('galleries');
				var size=get_text_value('size');
				

				if(categories!='') categories=' categories="'+categories+'"';
				else error +='<br/>Galleries';
				if(size!='...') size=' size="'+size+'"';
				else size='';
				
				sc='[gallery'+categories+size+']';
			
			break;
				
			case 'images':
		
				var id=get_text_value('id');

				if(id!='') id=' id="'+id+'"';
				else error +='<br/>Image ID';

				
				sc='[image'+id+']';
				
			break;
				
			
				
			case 'typography':

				switch( val2 ){
		
					case 'blockquote':
					
						var content=get_text_value('content');
						
				        if(content=='') error +='<br/>Content';
						
						sc='[blockquote'+']'+content+'[/blockquote]';
					break;

					case 'lists':
					
						var content=get_text_value('content');
						var style=get_text_value('style');
						
						if(content=='') error +='<br/>Content';
						if(style!='...') style=' style="'+style+'"';
						else style='';
						
						sc='\n[list'+style+']\n'+content+'\n[/list]\n';
					break;
						
					case 'highlight':
					
						var content=get_text_value('content');
						var color=get_text_value('color');
						
						if(content=='') error +='<br/>Content';
						if(color!='...') color = ' color="'+color+'"';
						else color='';
						
						sc='[highlight'+color+']'+content+'[/highlight]';
						
					break;
					
					case 'dropcap':
					
						var text=get_text_value('text');
						
						if(text!='') text = ' text="'+text+'"';
						else error +='<br/>Text';
						
						sc='[dropcap'+text+']';
						
					break;
					

				
					}
					
				break;
				
			case 'layout':

				switch(val2){
				
					case '1_2_1_2':
					
						sc='\n[one_half]\n'+get_text_value('1')+'\n[/one_half]\n\n[one_half_last]\n'+get_text_value('2')+'\n[/one_half_last]\n';
					
					break;
					
					case '1_3_1_3_1_3':
					
						sc='\n[one_third]\n'+get_text_value('1')+'\n[/one_third]\n\n[one_third]\n'+get_text_value('2')+'\n[/one_third]\n\n[one_third_last]\n'+get_text_value('3')+'\n[/one_third_last]\n';
					
					break;
					
					case '1_4_1_4_1_4_1_4':
					
						sc='\n[one_fourth]\n'+get_text_value('1')+'\n[/one_fourth]\n\n[one_fourth]\n'+get_text_value('2')+'\n[/one_fourth]\n\n[one_fourth]\n'+get_text_value('3')+'\n[/one_fourth]\n\n[one_fourth_last]\n'+get_text_value('4')+'\n[/one_fourth_last]\n';
					
					break;
					
					case '1_3_2_3':
					
						sc='\n[one_third]\n'+get_text_value('1')+'\n[/one_third]\n\n[two_third_last]\n'+get_text_value('2')+'\n[/two_third_last]\n';
					
					break;
					
					case '2_3_1_3':
					
						sc='\n[two_third]\n'+get_text_value('1')+'\n[/two_third]\n\n[one_third_last]\n'+get_text_value('2')+'\n[/one_third_last]\n';
					
					break;
					
					case '1_4_3_4':
					
						sc='\n[one_fourth]\n'+get_text_value('1')+'\n[/one_fourth]\n\n[three_fourth_last]\n'+get_text_value('2')+'\n[/three_fourth_last]\n';
					
					break;
					
					case '3_4_1_4':
					
						sc='\n[three_fourth]\n'+get_text_value('1')+'\n[/three_fourth]\n\n[one_fourth_last]\n'+get_text_value('2')+'\n[/one_fourth_last]\n';
					
					break;
					
					case '1_4_1_4_1_2':
					
						sc='\n[one_fourth]\n'+get_text_value('1')+'\n[/one_fourth]\n\n[one_fourth]\n'+get_text_value('2')+'\n[/one_fourth]\n\n[one_half_last]\n'+get_text_value('3')+'\n[/one_half_last]\n';
					
					break;
					
					case '1_4_1_2_1_4':
					
						sc='\n[one_fourth]\n'+get_text_value('1')+'\n[/one_fourth]\n\n[one_half]\n'+get_text_value('2')+'\n[/one_half]\n\n[one_fourth_last]\n'+get_text_value('3')+'\n[/one_fourth_last]\n';
					
					break;
					
					case '1_2_1_4_1_4':
					
						sc='\n[one_half]\n'+get_text_value('1')+'\n[/one_half]\n\n[one_fourth]\n'+get_text_value('2')+'\n[/one_fourth]\n\n[one_fourth_last]\n'+get_text_value('3')+'\n[/one_fourth_last]\n';
					
					break;
				}
				
			break;
			
			case 'tabs':
			
				var count=get_text_value('count');				
				var tabs='';
				
				for(i=1;i<=count;i++) tabs+='\n[tab title="'+get_text_value('tab_title_'+i)+'"]\n'+get_text_value('tab_content_'+i)+'\n[/tab]\n';
				
				sc='\n[tabgroup]'+tabs+'[/tabgroup]\n';
				
			break;
			 
			case 'videos':

				switch(val2){
				
					case 'youtube':
					
						var id=get_text_value('id');

						if(id!='') id=' id="'+id+'"';
						else error +='<br/>Video ID';

						sc='[youtube'+id+']';
						
					break;
					case 'vimeo':
					
						var id=get_text_value('id');
	
						if(id!='') id=' id="'+id+'"';
						else error +='<br/>Video ID';

						sc='[vimeo'+id+']';
					break;
				
				}
				break;
			
		}
		

		if(error!='') display_error();
		else {
				jQuery('#sc_error').hide();
				return sc;
		}
			 
		e.preventDefault();
		return '';
	
	}
	
});


