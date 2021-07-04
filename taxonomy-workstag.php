<?php 
    //Template Name: タクソノミー 一覧(作品)
    get_header();
?>

<section class="o-bread_list is-lower innerBox">
  <p><a href="<?=home_url(); ?>">トップ</a></p>
  <p><a href="<?=home_url(); ?>/work">作品一覧</a></p>
  <p><?php single_term_title(); ?></p>
</section>

<div class="innerBox p-archive">
  <section class="p-index__blog p-archive__main">
    <h2 class="o-title is-main">
      <span class="font_yumin">WORK</span>
      <span><?php single_term_title('タグ : '); ?></span>
    </h2>
    <div class="p-index__blog__content border-r-b">
      <?php
      
      $type = get_query_var( 'workstag' );
      $args = array(
          'post_type' => array('work'), 
          'tax_query' => array(

              array(
                  'taxonomy' => 'workstag', 
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
              <img src="<?= get_template_directory_uri(); ?>/images/index/no-image.png" alt="no-image" />
              <?php endif; ?>
            </a>
          </p>
          <p class="text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
          <p class="category">
            <?php
              $terms = get_the_terms( $post ->ID, 'workstag' );
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

    <a class="o-btn is-main" href="<?=home_url(); ?>/work">
      作品一覧に戻る
    </a>

  </section>
  <?php get_sidebar(work); ?>
</div>


<?php get_footer(); ?>



