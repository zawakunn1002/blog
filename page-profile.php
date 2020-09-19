<?php 
    //Template Name: プロフィールページ
    get_header();
?>

<section class="o-bread_list is-lower innerBox">
  <p><a href="<?=home_url(); ?>">トップ</a></p>
  <p>プロフィール</p>
</section>

<section class="p-profile is-main">
  <div class="innerBox">
    <h2 class="o-title is-main">
      <span class="font_yumin">PROFILE</span>
      <span>プロフィール</span>
    </h2>
    <div class="profile__content">
      <div class="profile__content__right">
        <div class="right__content">
          <p class="text__left">
            2018年4月
          </p>
          <p class="text__right">
            神奈川県の不動産会社に就職
          </p>
        </div>
        <div class="right__content">
          <p class="text__left">
            2018年12月
          </p>
          <p class="text__right">
            宅地建物取引士試験合格
          </p>
        </div>
        <div class="right__content">
          <p class="text__left">
            2019年5月
          </p>
          <p class="text__right">
            不動産会社退職、<br class="display_to_mq">プログラミングスクールへ
          </p>
        </div>
        <div class="right__content">
          <p class="text__left">
            2020年1月
          </p>
          <p class="text__right">
            都内web制作会社に<br class="display_to_mq">フロントエンドエンジニアとして就職
          </p>
        </div>
        <div class="right__content">
          <p class="text__left">
            2020年4月
          </p>
          <p class="text__right">
            ボーカロイドを使用した作曲を開始、<br class="display_to_mq">現在に至る
          </p>
        </div>
      </div>
      <div class="profile__content__left" id="profile__slick">
        <img src="<?=get_template_directory_uri(); ?>/images/profile/profile.jpg" alt="profile">
        <img src="<?=get_template_directory_uri(); ?>/images/profile/profile2.jpg" alt="profile">
      </div>
    </div>
    <a class="o-btn is-main" href="<?=home_url(); ?>">
      実績はこちら
    </a>
  </div>
</section>



<?php get_footer(); ?>