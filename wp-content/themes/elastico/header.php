<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<!-- Theme by SpadeInvaders (http://www.spadeinvaders.com) -->

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" type="text/css" media="screen" /> 
	<![endif]-->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />	
	<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div id="container" >	
		<div id="sidebar">
			<div id="logo">					
				<?php if (of_get_option('logo')) { ?>
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo of_get_option('logo'); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
                <?php } else { ?>
						<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
                <?php } ?>
			</div>
				 
				 
			 <div id="sidebar-footer"> 
	  
					<ul id="socials-menu" class="clearfix">					
								<?php
										$twitter_url = of_get_option('twitter_url');
										$facebook_url = of_get_option('facebook_url');
										$google_url = of_get_option('google_url');
										$linkedin_url = of_get_option('linkedin_url');
										$flickr_url = of_get_option('flickr_url');
										$dribbble_url = of_get_option('dribbble_url');
										$behance_url = of_get_option('behance_url');
										$pinterest_url = of_get_option('pinterest_url');
										$youtube_url = of_get_option('youtube_url');
										$vimeo_url = of_get_option('vimeo_url');
										$tumblr_url = of_get_option('tumblr_url');
										$instagram_url = of_get_option('instagram_url');
										$rss_url = of_get_option('rss_url');
								?>
								<?php if ($facebook_url !="") { ?>
									<li class="facebook"><a href="<?php echo $facebook_url;?>" target="_blank">Facebook</a> </li>
								<?php } ?>   
								<?php if ($twitter_url !="") { ?>
									<li class="twitter"> <a href="<?php echo $twitter_url;?>" target="_blank">Twitter</a></li>		  
								<?php } ?>   
								<?php if ($google_url !="") { ?>
									<li class="google"> <a href="<?php echo $google_url;?>" target="_blank">Google</a></li>		  
								<?php } ?> 
								<?php if ($pinterest_url !="") { ?>
									<li class="pinterest"><a href="<?php echo $pinterest_url;?>" target="_blank">Pinterest</a> </li>   
								<?php } ?>
								<?php if ($tumblr_url !="") { ?>
									<li class="tumblr"> <a href="<?php echo $tumblr_url;?>" target="_blank">Tumblr</a> </li>
								<?php } ?>
								<?php if ($flickr_url !="") { ?>
									<li class="flickr"><a href="<?php echo $flickr_url;?>" target="_blank">Flickr</a></li>
								<?php } ?>
								<?php if ($instagram_url !="") { ?>
									<li class="instagram"><a href="<?php echo $instagram_url;?>" target="_blank">Instagram</a>  </li>
								<?php } ?>	
								<?php if ($behance_url !="") { ?>
									<li class="behance"><a href="<?php echo $behance_url;?>" target="_blank">Behance</a> </li>   
								<?php } ?>
								<?php if ($dribbble_url !="") { ?>
									<li class="dribbble"><a href="<?php echo $dribbble_url;?>" target="_blank">Dribbble</a> </li>   
								<?php } ?>								
								<?php if ($linkedin_url !="") { ?>
									<li class="linkedin"><a href="<?php echo $linkedin_url;?>" target="_blank">Linkedin</a> </li>   
								<?php } ?>  
								<?php if ($vimeo_url !="") { ?>
									<li class="vimeo"> <a href="<?php echo $vimeo_url;?>" target="_blank">Vimeo</a> </li>
								<?php } ?>
								<?php if ($youtube_url !="") { ?>
									<li class="youtube"><a href="<?php echo $youtube_url;?>" target="_blank">Youtube</a>  </li>
								<?php } ?>
								<?php if ($rss_url !="") { ?>
									<li class="rss"><a href="<?php echo $rss_url;?>" target="_blank">RSS</a></li>
								 <?php } ?>
					</ul>
			
					<div id="copyright">
						<?php if (of_get_option('footer_copy')!='') {?>
							<?php echo stripslashes(of_get_option('footer_copy')); ?>
						<?php } else {?>
							&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?> By Imaged  
						 <?php } ?>			  
					 </div>

			</div>
				 
				 
			<div id="primary-nav" data-selectname="<?php _e('Navigate to...', 'si_theme'); ?>">
                    <?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
						<?php wp_nav_menu( array( 'theme_location' => 'primary-menu','menu_id' => 'main-nav' ) ); ?>
                    <?php } ?> 
			</div>
				
			<?php get_sidebar(); ?>
		
		</div>
	
		<div id="content">
	