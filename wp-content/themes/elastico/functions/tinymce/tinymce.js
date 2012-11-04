function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function getCheckedValue(radioObj) {
	if(!radioObj)
		return "";
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return radioObj[i].value;
		}
	}
	return "";
}

function insertSiLink() {
	
	var tagtext;
	
	var styleid = document.getElementById('style_shortcode').value;	
	
		if (styleid != 0) {
			tagtext = "["+ styleid + "]Insert your content here[/" + styleid + "] ";
		}	
		
		if (styleid != 0 && styleid == 'button_black' ){
			tagtext = "["+ styleid + " url=\"#\" target=\"_self\"]Button Text[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'button_red' ){
			tagtext = "["+ styleid + " url=\"#\" target=\"_self\"]Button Text[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'button_blue' ){
			tagtext = "["+ styleid + " url=\"#\" target=\"_self\"]Button Text[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'button_darkblue' ){
			tagtext = "["+ styleid + " url=\"#\" target=\"_self\"]Button Text[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'button_green' ){
			tagtext = "["+ styleid + " url=\"#\" target=\"_self\"]Button Text[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'button_yellow' ){
			tagtext = "["+ styleid + " url=\"#\" target=\"_self\"]Button Text[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'button_orange' ){
			tagtext = "["+ styleid + " url=\"#\" target=\"_self\"]Button Text[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'button_khaki' ){
			tagtext = "["+ styleid + " url=\"#\" target=\"_self\"]Button Text[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'dropcap' ){
			tagtext = "["+ styleid + "]A[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'highlight' ){
			tagtext = "["+ styleid + "]Insert your content to be highlighted here[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'toggle') {
			tagtext = "["+ styleid + " title=\"Toggle Title\"] Insert toggle content here [/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'tabs') {
			tagtext="["+ styleid + "][tab title=\"Tab 1 Title\"]Insert tab 1 content here[/tab] [tab title=\"Tab 2 Title\"]Insert tab 2 content here[/tab] [tab title=\"Tab 3 Title\"]Insert tab 3 content here[/tab] [/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'accordions' ){
			tagtext="["+ styleid + "][accordion title=\"Accordion 1 Title\"]Insert accordion 1 content here[/accordion] [accordion title=\"Accordion 2 Title\"]Insert accordion 2 content here[/accordion] [accordion title=\"Accordion 3 Title\"]Insert accordion 3 content here[/accordion] [/" + styleid + "]";
		}		
				
		if ( styleid == 0 ){
			tinyMCEPopup.close();
		}


	if(window.tinyMCE) {
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
}