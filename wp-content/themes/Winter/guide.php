<?php
function theme_guide(){
add_theme_page( 'Theme guide','Theme documentation','edit_themes', 'theme-documentation', 'w2f_theme_guide');
}
add_action('admin_menu', 'theme_guide');

function w2f_theme_guide(){
		echo '
		
<div id="welcome-panel" class="welcome-panel">

	<div class="wpbadge" style="float:left; margin-right:30px; "><img src="'. get_template_directory_uri() . '/screenshot.png" width="200" height="150" /></div>

	<div class="welcome-panel-content">
	
	<h3>Welcome to '.wp_get_theme().' WordPress theme!</h3>
	
	<p class="about-description"> Winter is a single column free premium tumblog WordPress theme. This is a WordPress 3+ ready theme with features like custom menu, featured images, Metabox, widgetized footer, and tumblog feature using the WordPress post formats. Winter theme supports Audio, Video, Image, Link, Chat, Quote, Aside, Gallery  and Standard post formats. </p>
	
	<div class="welcome-panel-column-container">

		<div class="guide-panel-column" style="width:80%">
		<h4><span class="icon16 icon-settings"></span> Required plugins </h4>
		<p>The theme often requires few plugins to work the way it is originally intended to. You will find a notification on the admin panel prompting you to install the required plugins. Please install and activate the plugins.  </p>
		<ol>
			<li><a href="http://wordpress.org/extend/plugins/options-framework/">Options framework</a></li>
		</ol>
		</div>
	
	
		<div class="guide-panel-column" style="width:80%">
		<h4><span class="icon16 icon-settings"></span> Post formats </h4>
		<p>This is a tumblog theme. This is done using the post format feature of WordPress. This theme supports the following post formats.  </p>
		<ol>
			<li><b>Image format</b></li>
			<p>This format is used to post images. You can use the image metabox to upload the image. Images support fancybox feature.</p>
			<li><b>Video format</b></li>
			<p>This format is used to post videos. You can use the metabox to add the video embed code.</p>
			<li><b>Quote format</b></li>
			<p> Use this format to post a quote. Post your quote in the post editor and enter the name of the quote author in the metabox.</p>
			<li><b>Audio format</b></li>
			<p>This can be used to post an audio file in the post. Use the audio metabox to add the audio url.</p>
			<li><b>Link format</b></li>
			<p>This can be used to post a link. Add the link url in the metabox sectiona nd it will be assigned to the post title.</p>
			<li><b>Gallery format</b> </li>
			<p>Insert wordpress image gallery in the post and it will create a jquery flexslider for you.</p>
			<li><b>Chat format</b></li>
			<p>Can be used to post a chat or conversation. Post your caht lines as list items and they will be styled by the theme.</p>
			<li><b>Standard</b></li>
			<p>Standard post format. Nothing too exciting about it..</p>
		</ol>
		
		</div>
	
	

	


				
		<div class="guide-panel-column" style="width:80%">
		<h4><span class="icon16 icon-settings"></span> Theme License </h4>
		<p>	The PHP code of the theme is licensed under the GPL license as is WordPress itself. You can read it here: http://codex.wordpress.org/GPL.All other parts of the theme including, but not limited to the CSS code, images, and design are licensed for free personal usage. </p>
		<ul>
		<li> You are requested to retain the credit banners on the template.</li>
		<li> You are allowed to use the theme on multiple installations, and to edit the template for your personal/client use.</li>
		<li> You are NOT allowed to edit the theme or change its form with the intention to resell or redistribute it. </li>
		<li> You are NOT allowed to use the theme as a part of a template repository for any paid CMS service.</li>
		</ul>
	</div>
	
				
	</div>
	<p class="welcome-panel-dismiss">WordPress theme designed by <a href="http://www.web2feel.com">web2feel.com</a>.</p>

	</div>
	</div>
		
		';
		

}