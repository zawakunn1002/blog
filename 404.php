<?php 
    //Template Name: トップページ
    get_header();
?>

<section class="o-box is-error">
  <div class="innerBox">
  <h1 class="error__message center bold">404 File not found.</h1>
  <p class="error__text center">
    申し訳ございません。<br class="display_to_mq">お探しのページが見つかりませんでした。<br>
    下記ボタンから<br class="display_to_mq">トップページに遷移することができます。
  </p>
  <a href="<?= home_url() ?>" class="o-btn is-main center">
    トップページはこちら
  </a>
  </div>
</section>

<?php get_footer(); ?>