<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 7]><div class="alert">您现正在使用的浏览器已经 <em>过时了! </em>建议使用 <a href="http://browsehappy.com/">现代浏览器</a> 或安装 <a href="http://www.google.com/chromeframe/?redirect=true">Google Chrome Frame</a> 能获得更好的显示和体验。</div><![endif]-->

  <?php
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  <div id="wrap" class="container" role="document">
    <div id="content" class="row">
      <?php get_search_form(); ?>
      <div id="main" class="<?php echo roots_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
      </div>
      <?php /*if (roots_display_sidebar()) : 
      <aside id="sidebar" class="<?php echo roots_sidebar_class(); ?>" role="complementary">
        <?php get_template_part('templates/sidebar'); ?>
      </aside>
      <?php endif; */?>
    </div><!-- /#content -->
  </div><!-- /#wrap -->

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
