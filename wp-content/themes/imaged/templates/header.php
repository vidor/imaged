<header id="banner" role="banner">
  <div class="container">
    <a class="brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
    <nav id="nav-main" role="navigation">
      <ul id="nav-icon"><li><a id="search-icon">搜索</a></li><li><a href="http://feed.imaged.me" id="feed-icon">RSS订阅</a></li></ul> 
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills'));
        endif;
      ?>
      
    </nav>
  </div>
</header>