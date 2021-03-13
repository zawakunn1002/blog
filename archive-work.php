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
        $args = array(
          'post_type' => "work",//投稿タイプ設定
          'posts_per_page' => 1,// 取得記事数
          'paged' => $paged,
        );

        $my_query = new WP_Query($args);
        if ($my_query->have_posts()): while ( $my_query->have_posts() ) : $my_query->the_post();
      ?>
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
        <p class="category">
          <span> 
          
          <?php
            $categories = get_the_category();
            foreach( $categories as $category ){
              // カテゴリーIDを取得
              $cat_id = $category->term_id;
              // 子孫タームのIDを配列で取得
              $cat_child = get_term_children( $cat_id, 'category' );
              // 子孫タームのIDがない場合
              if( !$cat_child ){
                echo $category->name;
                break;
              }
            }
          ?>
          </span>
        </p>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>

    <?php
    if ( function_exists( 'pagination' ) ) :
      pagination( $my_query->max_num_pages, $paged );
    endif;
    ?>

    <?php wp_reset_postdata(); ?>

  </section>
  <?php get_sidebar(); ?>
</div>


<?php get_footer(); ?>