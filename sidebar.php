<aside class="p-archive__sidebar">
  <h2 class="o-title is-side">
    <span class="font_yumin">SEARCH</span>
    <span>検索</span>
  </h2>
  <div class="p-archive__sidebar__search">
    <?php get_template_part('searchform','blog'); ?>
  </div>
  <h2 class="o-title is-side">
    <span class="font_yumin">CATEGORY</span>
    <span>カテゴリー</span>
  </h2>
  <ul class="p-archive__sidebar__category">
  <?php
    $category = 'blogcategory';
    // $terms = get_terms('blogcategory');
    $terms = get_terms( $category, array('hide_empty' => true) ); 
    echo walk_category_tree( $terms, 0 , array(
      'style' => 'list',  //wp_list_categories() のようなリスト構造になる
      'show_count' => true,
      'use_desc_for_title' => false,
      'hide_empty' => 1,
    ));
    // foreach ( $terms as $term ) {
    // echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
    // }
  ?>
  </ul>
</aside>