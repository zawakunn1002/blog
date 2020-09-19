<?php 
    //Template Name: プロフィールページ
    get_header();
?>

<section class="o-bread_list is-lower innerBox">
  <p><a href="<?=home_url(); ?>">トップ</a></p>
  <p>お問い合わせ</p>
</section>



<div class="p-contact is-main">
  <div class="innerBox">
    <h2 class="o-title is-main">
      <span class="font_yumin">CONTACT</span>
      <span>お問い合わせ</span>
    </h2>
    <?php echo do_shortcode('[contact-form-7 id="39" title="お問い合わせ"]'); ?>
  </div>
</div>



<?php get_footer(); ?>