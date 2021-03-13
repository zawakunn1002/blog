<aside class="p-archive__sidebar">
  <h2 class="o-title is-side">
    <span class="font_yumin">SEARCH</span>
    <span>検索</span>
  </h2>
  <div class="p-archive__sidebar__search">
    <?php get_search_form(); ?>
  </div>
  <h2 class="o-title is-side">
    <span class="font_yumin">CATEGORY</span>
    <span>カテゴリー</span>
  </h2>
  <ul class="p-archive__sidebar__category">
  <li class="cat-item">
    <a href="<?=home_url(); ?>/blog">
    全て</a>(<?php 
        $count_posts     = wp_count_posts();
        $published_posts = $count_posts->publish;
        $published_number = mb_convert_kana( $published_posts , "a");
        echo $published_number;
      ?>)
    
  </li>
  <?php wp_list_categories('title_li=&orderby=name&show_count=1'); ?>
  </ul>
</aside>