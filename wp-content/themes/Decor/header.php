
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />

	<link rel="shortcut icon" href="<?php echo get_theme_option('favicon'); ?>" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head();  ?>

	<!--[if lte IE 9]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!--[if IE 8]>
	<link rel="stylesheet" href="<?php echo THEME_CSS; ?>/ie8.css" type="text/css" media="screen" />
	<![endif]-->
	
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400italic' rel='stylesheet' type='text/css'>

	<title><?php tf_title(); ?></title>
	

</head>



<body <?php body_class(); ?>>

	<header>
	
		<div id="logo">
		
			<a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_theme_option('logo_image'); ?>"></a>
		
		</div><!--end logo -->
		
		
		<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container' => false, 'theme_location'  =>'main_nav', 'menu_id' => 'nav')); ?>
		
		<form method="get" id="searchform" action="<?php echo home_url(); ?>">
			<input type="text" class="text_input" value="<?php _e('Search...', 'decor');?>" name="s" id="s" onfocus="if(this.value == '<?php _e('Search...', 'decor');?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search...', 'decor');?>';}" />
		</form>
		
		<div id="open_btn"><?php _e('enter', 'decor');?></div>
		<div id="close_btn"><?php _e('close', 'decor');?></div>
	
	</header>



<div id="main_overlay"></div>

<?php tf_supersized(); ?>

