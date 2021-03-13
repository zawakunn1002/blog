<?php 
    //Template Name: トップページ
    get_header();
?>

<section class="o-bread_list is-lower innerBox">
  <p><a href="<?=home_url(); ?>">トップ</a></p>
  <p>ブログ一覧</p>
</section>



<div class="innerBox p-archive">
  <section class="p-index__blog p-archive__main">
    <h2 class="o-title is-main">
      <span class="font_yumin">BLOG</span>
      <span>最新ブログ記事</span>
    </h2>
    <div class="p-index__blog__content border-r-b">
      <?php
      
        $paged = get_query_var('paged') ?: 1;
        $cat = get_the_category();
        $cat_name = $cat[0]->cat_name; // カテゴリー名
        $cat_slug  = $cat[0]->category_nicename; // カテゴリースラッグ
        $args = array(
            'post_type' => 'post', //投稿を表示
            'posts_per_page' => -1, //表示する件数
            'category_name' => $cat_slug, 
            'paged' => $paged,
        );
        $my_query = new WP_Query( $args );
        if ( $my_query->have_posts() ) :
        ?>
        <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
        <!-- <?php echo $cat_name?> -->
        <div class="detail">
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
          <p class="category"><span><?php echo $cat_name?></span></p>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      <?php else: ?>
        <p>投稿はありません。</p>
      <?php endif; ?>
    </div>

    <?php
    if ( function_exists( 'pagination' ) ) :
      pagination( $my_query->max_num_pages, $paged );
    endif;
    ?>

  </section>
  <?php get_sidebar(); ?>
</div>


<?php get_footer(); ?>



