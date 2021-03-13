<?php 
    //Template Name: トップページ
    get_header();
?>

<section class="o-bread_list is-lower innerBox">
  <p><a href="<?=home_url(); ?>">トップ</a></p>
  <p><a href="<?=home_url(); ?>/blog">ブログ一覧</a></p>
  <p><?php the_title(); ?></p>
</section>

<article class="p-archive">

</article>

<section class="o-box is-single">
  <div class="innerBox">
    <?php if(have_posts()): while(have_posts()):the_post(); ?>
    <h2 class="o-title is-single center bold"><?php the_title(); ?></h2>
    <p class="single__post__day right">
      投稿日：<?php echo get_the_date('Y/n/j'); ?>
    </p>
    <div class="single__content">
      <?php the_content(); ?>
    </div>
    <?php endwhile; endif; ?>
    <?php previous_post_link('%link', '前の記事へ'); ?>
    <?php next_post_link('%link', '次の記事へ'); ?>
  </div>
</section>


<?php get_footer(); ?>