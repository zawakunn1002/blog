<?php 
    //Template Name: トップページ
    get_header();
?>

<?php
    global $wp_query;
    $total_results = $wp_query->found_posts;
    $search_query = get_search_query();

?>


<section class="o-bread_list is-lower innerBox">
  <p><a href="<?=home_url(); ?>">トップ</a></p>
  <p><a href="<?=home_url(); ?>/blog">ブログ一覧</a></p>
</section>

      


<div class="innerBox p-archive">
  <section class="p-index__blog p-archive__main">
    <h2 class="o-title is-main">
      <span class="font_yumin">BLOG</span>
      <span><?php echo $search_query; ?>の検索結果</span>
    </h2>
    <div class="p-index__blog__content border-r-b">
    
    　
      <?php
      if ( empty( get_search_query() ) ) :
        // 検索キーワードがないとき
        echo '<p class="leftbumpk1002">検索キーワードが未入力です。</p>';
      else :

      if( $total_results >0 ):
      if(have_posts()):
      while(have_posts()): the_post();
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
        <p class="category"><span><?php echo $cat_name; ?></span></p>
      </div>
      
      <?php endwhile; endif; else: ?>
      
      <?php echo $search_query; ?> に一致する情報は見つかりませんでした。
      
      <?php endif; ?>

      <?php endif; ?>
      
      
    </div>
    <a class="o-btn is-main" href="<?=home_url(); ?>">
      ブログ一覧に戻る
    </a>
  </section>
  <?php get_sidebar(); ?>
</div>


<?php get_footer(); ?>