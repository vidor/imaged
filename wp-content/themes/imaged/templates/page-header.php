<div class="page-header">
  <h1>
    <?php
      if (is_home()) {
        if (get_option('page_for_posts', true)) {
          echo get_the_title(get_option('page_for_posts', true));
        } else {
          //_e('Latest Posts', 'roots');
        }
      } elseif (is_archive()) {
        $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
        if ($term) {
          echo $term->name;
        } elseif (is_post_type_archive()) {
          echo get_queried_object()->labels->name;
        } elseif (is_day()) {
          printf(__('Daily Archives: %s', 'roots'), get_the_date());
        } elseif (is_month()) {
          printf(__('Monthly Archives: %s', 'roots'), get_the_date('F Y'));
        } elseif (is_year()) {
          printf(__('Yearly Archives: %s', 'roots'), get_the_date('Y'));
        } elseif (is_author()) {
          global $post;
          $author_id = $post->post_author;
          printf(__('作者: %s', 'roots'), get_the_author_meta('display_name', $author_id));
        } else {
          echo '标签：“'; 
          single_cat_title();
          echo '”';
        }
      } elseif (is_search()) {
        printf(__('搜索: “%s”', 'roots'), get_search_query());
      } elseif (is_404()) {
        _e('File Not Found', 'roots');
      } else {
        the_title();
      }
    ?>
    <?php //echo '，发现' . $wp_query->found_posts . '条结果'; ?>
  </h1>
</div>