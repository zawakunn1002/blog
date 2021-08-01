<?php 
    //Template Name: タクソノミー 一覧(ブログ)
    get_header();
?>

<ul class="o-bread_list is-lower innerBox">
  <li><a href="<?=home_url(); ?>">トップ</a></li>
  <li><a href="<?=home_url(); ?>/blog">ブログ一覧</a></li>
  <li><?php single_term_title(); ?></li>
</ul>

<div class="innerBox p-archive">
  <section class="p-index__blog p-archive__main">
    <h2 class="o-title is-main">
      <span class="font_yumin">BLOG</span>
      <span><?php single_term_title('カテゴリー : '); ?></span>
    </h2>
    <div class="p-index__blog__content border-r-b">
      <?php
      
      $type = get_query_var( 'blogcategory' );
      $args = array(
          'post_type' => array('blog'), 
          'tax_query' => array(

              array(
                  'taxonomy' => 'blogcategory', 
                  'field' => 'slug',
                  'terms' => $type,
              ),
          ),
          'paged' => $paged,
          'posts_per_page' => '9'
      ); ?>
      <?php query_posts( $args ); ?>
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <div class="detail">
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
              $length = count($terms);
              for ($i = 0; $i <= $length - 1; $i++){
                echo '<span>'.$terms[$i]->name.'</span>';
              }
            ?>
          </p>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      <?php else: ?>
        <p>投稿はありません。</p>
      <?php endif; ?>
    </div>

    <?php
    if ( function_exists( 'pagination' ) ) :
      pagination( $custom_query->max_num_pages, $paged );
    endif;
    ?>

    <a class="o-btn is-main" href="<?=home_url(); ?>/blog">
      ブログ一覧に戻る
    </a>

  </section>
  <?php get_sidebar(); ?>
</div>


<?php get_footer(); ?>



