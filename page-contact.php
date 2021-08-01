<?php 
    //Template Name: 　お問い合わせ
    get_header();
?>

<ul class="o-bread_list is-lower innerBox">
  <li><a href="<?=home_url(); ?>">トップ</a></li>
  <li>お問い合わせ</li>
</ul>



<div class="p-contact is-main">
  <div class="innerBox">
    <h1 class="o-title is-main">
      <span class="font_yumin">CONTACT</span>
      <span>お問い合わせ</span>
    </h1>
    <?php echo do_shortcode('[mwform_formkey key="8"]'); ?>
  </div>
</div>



<?php get_footer(); ?>