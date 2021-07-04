<aside class="p-archive__sidebar">
  <h2 class="o-title is-side">
    <span class="font_yumin">TAG</span>
    <span>タグ</span>
  </h2>
  <ul class="p-archive__sidebar__tag">
  <?php
    $category = 'workstag';
    // $terms = get_terms('blogcategory');
    $terms = get_terms( $category, array('hide_empty' => true) ); 
    echo walk_category_tree( $terms, 0 , array(
      'style' => 'list',  //wp_list_categories() のようなリスト構造になる
      'show_count' => false,
      'use_desc_for_title' => false,
      'hide_empty' => 1,
    ));
    // foreach ( $terms as $term ) {
    // echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
    // }
  ?>
  </ul>
</aside>