<div class="innerBox p-archive">
  <section class="p-index__blog p-archive__main">
    <h2 class="o-title is-main">
      <span class="font_yumin">BLOG</span>
      <span>最新ブログ記事</span>
    </h2>
    <div class="blog__content border-r-b">
      <?php
        $paged = get_query_var('paged') ?: -1;
        $args = array(
          'post_type' => "post",//投稿タイプ設定
          'posts_per_page' => -1,// 取得記事数
          'paged' => $paged,
        );
        $category = get_the_category();
        $cat_name = $category[0]->cat_name;

        $my_query = new WP_Query($args);
        if ($my_query->have_posts()): while ( $my_query->have_posts() ) : $my_query->the_post();
      ?>
      <div class="blog__content__detail">
          <p class="image">
            <a href="<?php the_permalink(); ?>">
              <?php
                if(has_post_thumbnail()):
                  the_post_thumbnail();
                else:
              ?>
              <img src="<?= get_template_directory_uri(); ?>/images/index/no-image.png" alt="no-image" />
              <?php endif; ?>
            </a>
          </p>
          <p class="text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
          <div class="category"><span><?php the_category('') ?></span></div>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>

    <!-- <?php
    if ( function_exists( 'pagination' ) ) :
      pagination( $my_query->max_num_pages, $paged );
    endif;
    ?> -->

    <?php wp_reset_postdata(); ?>

  </section>
  <?php get_sidebar(); ?>
</div>