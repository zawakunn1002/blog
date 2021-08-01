<?php 
    //Template Name: トップページ
    get_header();
?>

<ul class="o-bread_list is-lower innerBox">
  <li><a href="<?=home_url(); ?>">トップ</a></li>
  <li><a href="<?=home_url(); ?>/blog">ブログ一覧</a></li>
  <li><?php the_title(); ?></li>
</ul>

<div class="p-single is-blog">
  <div class="innerBox p-single__blog">
    <div class="p-single__blog__content">
      <?php if(have_posts()): while(have_posts()):the_post(); ?>
      <h1 class="o-title is-single bold"><?php the_title(); ?></h1>
      <p class="day right">
        投稿日：<?php echo get_the_date('Y/n/j'); ?>
      </p>
      <div class="text">
        <?php the_content(); ?>
      </div>
      <?php endwhile; endif; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>


<?php get_footer(); ?>