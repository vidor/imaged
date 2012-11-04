<?php
function add_shortcode_contactform($atts) {

	extract(shortcode_atts(array(
		'email' => get_bloginfo('admin_email')
	), $atts));
	
	
	$output='';
		
	$output.='
	<div class="contact_form_wrap">
		<form class="contact_form" action="'.THEME_URI.'/mail.php" method="post" novalidate="novalidate">
			<input type="text" required="required" id="contact_name" name="name" value="'.__('name *','decor').'" onfocus="if(this.value == \''.__('name *','decor').'\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \''.__('name *','decor').'\';}" />
			<input type="email" required="required" id="contact_email" name="email" value="'.__('email *','decor').'" onfocus="if(this.value == \''.__('email *','decor').'\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \''.__('email *','decor').'\';}" />
			<textarea required="required" name="content"></textarea>
			<button type="submit" class="button">Submit</button>
			<input type="hidden" value="'.$email.'" name="to"/>
		</form>
		<div class="success hidden">'.__('Your message was successfully sent!','decor').'</div> 
	</div>';
	
	return $output;
	
	
}

add_shortcode('contactform', 'add_shortcode_contactform');
?>
