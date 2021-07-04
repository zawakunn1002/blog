<?php 
    //Template Name: 作品詳細
    get_header();
?>

<section class="o-bread_list is-lower innerBox">
  <p><a href="<?=home_url(); ?>">トップ</a></p>
  <p><a href="<?=home_url(); ?>/work">作品一覧</a></p>
  <p><?php the_title(); ?></p>
</section>

<section class="p-single">
  <div class="innerBox">
    <?php if(have_posts()): while(have_posts()):the_post(); ?>
    <div class="p-single__content is-work">
      <div class="p-single__content__image">
        <a href="<?php echo get_post_meta($post->ID, 'work_url', true); ?>" target="_blank" rel="noopener noreferrer">
          <?php
            if(has_post_thumbnail()):
              the_post_thumbnail();
            else:
          ?>
          <img src="<?= get_template_directory_uri(); ?>/images/index/no-image.png" alt="no-image" />
          <?php endif; ?>
        </a>
      </div>
      <div class="p-single__content__text">
        <h2 class="title bold"><?php the_title(); ?></h2>
        <p class="day right">
          投稿日：<?php echo get_the_date('Y/n/j'); ?>
        </p>
        <div class="detail">
          <?php the_content(); ?>
          <p>画像クリックで関連サイトに飛びます。</p>
        </div>
      </div>
    </div>
    <?php endwhile; endif; ?>
    <a class="o-btn is-main" href="<?=home_url(); ?>/work">
      作品一覧に戻る
    </a>
  </div>
</section>


<?php get_footer(); ?>