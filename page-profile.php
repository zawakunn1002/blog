<?php 
    //Template Name: プロフィールページ
    get_header();
?>

<ul class="o-bread_list is-lower innerBox">
  <li><a href="<?=home_url(); ?>">トップ</a></li>
  <li>プロフィール</li>
</ul>

<section class="p-profile is-main">
  <div class="innerBox">
    <h1 class="o-title is-main">
      <span class="font_yumin">PROFILE</span>
      <span>プロフィール</span>
    </h1>
    <div class="profile__content">
      <ul class="profile__content__right">
        <li class="right__content">
          <p class="text__left">
            2018年4月
          </p>
          <p class="text__right">
            大学卒業後不動産会社に就職
          </p>
        </li>
        <li class="right__content">
          <p class="text__left">
            2018年12月
          </p>
          <p class="text__right">
            宅地建物取引士試験合格
          </p>
        </li>
        <li class="right__content">
          <p class="text__left">
            2019年5月
          </p>
          <p class="text__right">
            不動産会社退職、プログラミング学習開始
          </p>
        </li>
        <li class="right__content">
          <p class="text__left">
            2020年1月
          </p>
          <p class="text__right">
            都内web制作会社に<br class="display_to_mq">フロントエンドエンジニアとして就職
          </p>
        </li>
        <li class="right__content">
          <p class="text__left">
            2020年4月
          </p>
          <p class="text__right">
            ボーカロイドを使用した作曲活動開始
          </p>
        </li>
        <li class="right__content">
          <p class="text__left">
            2021年6月
          </p>
          <p class="text__right">
            2級ファイナンシャル・プランニング技能士試験合格
          </p>
        </li>
      </ul>
      <div class="profile__content__left" id="profile__slick">
        <picture>
          <source type="image/webp" srcset="<?=get_template_directory_uri(); ?>/images/profile/profile.webp">
          <img src="<?=get_template_directory_uri(); ?>/images/profile/profile.jpg" alt="profile1">
        </picture>
        <picture>
          <source type="image/webp" srcset="<?=get_template_directory_uri(); ?>/images/profile/profile2.webp">
          <img src="<?=get_template_directory_uri(); ?>/images/profile/profile2.jpg" alt="profile2">
        </picture>
      </div>
    </div>
    <a class="o-btn is-main" href="<?=home_url(); ?>/work">
      実績はこちら
    </a>
  </div>
</section>



<?php get_footer(); ?>