<aside class="o-sidebar">
  <h2 class="o-title is-side">
    <span class="font_yumin">SEARCH</span>
    <span>検索</span>
  </h2>
  <div class="o-sidebar__search">
    <?php get_template_part('searchform','blog'); ?>
  </div>
  <h2 class="o-title is-side">
    <span class="font_yumin">CATEGORY</span>
    <span>カテゴリー</span>
  </h2>
  <ul class="o-sidebar__category">
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
  <?php if (get_post_type() === 'blog' && is_single()): ?>
  <h2 class="o-title is-side">
    <span class="font_yumin">BLOG</span>
    <span>最新ブログ記事</span>
  </h2>
  <div class="o-sidebar__content">
    <?php
      $paged = get_query_var('paged') ?: 1;
      $args = array(
        'post_type' => "blog",//投稿タイプ設定
        'posts_per_page' => 6,// 取得記事数
        'paged' => $paged,
      );

      $my_query = new WP_Query($args);
      if ($my_query->have_posts()): while ( $my_query->have_posts() ) : $my_query->the_post();
    ?>
    <div class="o-sidebar__content__detail">
      <p class="image">
        <a href="<?php the_permalink(); ?>">
          <?php
            if(has_post_thumbnail()):
              the_post_thumbnail();
            else:
          ?>
          <picture>
            <source type="image/webp" srcset="<?= get_template_directory_uri(); ?>/images/index/no-image.webp">
            <img src="<?= get_template_directory_uri(); ?>/images/index/no-image.png" alt="no-image" />
          </picture>
          <?php endif; ?>
        </a>
      </p>
      <p class="text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
      <p class="category">
        <?php
          $terms = get_the_terms( $post ->ID, 'blogcategory' );
          if (is_array($terms)){
            $length = count($terms);
            for ($i = 0; $i <= $length - 1; $i++){
              echo '<span>'.$terms[$i]->name.'</span>';
            }
          } 
        ?>
      </p>
    </div>

    <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <?php endif; ?>
</aside>
