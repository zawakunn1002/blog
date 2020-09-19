<?php 
    //Template Name: トップページ
    get_header();
?>

<section class="o-bread_list is-lower innerBox">
  <p><a href="<?=home_url(); ?>">トップ</a></p>
  <p>ブログ一覧</p>
</section>

<section class="p-index is-blog">
  <div class="innerBox">
    <h2 class="o-title is-main">
      <span class="font_yumin">BLOG</span>
      <span>最新ブログ記事</span>
    </h2>
    <div class="blog__content border-r-b">
      <?php
        $args = array(
            'posts_per_page' => -1 // 表示件数の指定
        );
        $posts = get_posts( $args );
        foreach ( $posts as $post ): // ループの開始
        setup_postdata( $post ); // 記事データの取得
        $category = get_the_category();
        $cat_name = $category[0]->cat_name;
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
          <p class="category"><span><?php echo $cat_name; ?></span></p>
      </div>
      <?php
          endforeach; // ループの終了
          wp_reset_postdata(); // 直前のクエリを復元する
      ?>
    </div>
    <a class="o-btn is-main" href="<?=home_url(); ?>">
      ブログ一覧はこちら
    </a>
  </div>
</section>


<?php get_footer(); ?>