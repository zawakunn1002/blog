<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=get_template_directory_uri(); ?>/css/slick.css">
  <link href="<?=get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
  <script src="<?=get_template_directory_uri(); ?>/js/jquery-3.5.1.min.js"></script>
  <script src="<?=get_template_directory_uri(); ?>/js/slick.min.js"></script>
  <? wp_head(); ?>
</head>
<body>
  <header class="header-r">
    <?php if ( is_home() || is_front_page() ) : ?>
    <h1 class="center font_yumin header-r__title"><a href="<?=home_url(); ?>">。ザワくんブログ</a></h1>
    <?php else : ?>
    <p class="center font_yumin header-r__title"><a href="<?=home_url(); ?>">。ザワくんブログ</a></p>
    <?php endif; ?>
    <div class="header-r__target">
      <span class="line1"></span>
      <span class="line2"></span>
      <span class="line3"></span>
    </div>
    <div class="header-r__navi">
      <ul>
        <li class="center"><a href="<?=home_url(); ?>">トップ</a></li>
        <li class="center"><a href="<?=home_url(); ?>/profile">プロフィール</a></li>
        <li class="center"><a href="<?=home_url(); ?>/blog">ブログ一覧</a></li>
        <li class="center"><a href="<?=home_url(); ?>">作品</a></li>
        <li class="center"><a href="<?=home_url(); ?>/contact">お問い合わせ</a></li>
        <li class="center"><a href="<?=home_url(); ?>/contact#privacy">プライバシーポリシー</a></li>
      </ul>
      <div class="header-r__navi__icon">
        <a href="https://twitter.com/zawakun1002" target="_blank" rel=”noopener noreferrer”><i class="fab fa-twitter"></i></a>
        <a href="https://www.youtube.com/channel/UC8jc8RCOk-buQv8h1gx1ChQ" target="_blank" rel=”noopener noreferrer”><i class="fab fa-youtube"></i></a>
      </div>
    </div>
  </header>

  <header class="header">
    <div class="innerBox relative__wrap">
      <?php if ( is_home() || is_front_page() ) : ?>
      <h1 class="center font_yumin header__title"><a href="<?=home_url(); ?>">。ザワくんブログ</a></h1>
      <?php else : ?>
      <p class="center font_yumin header__title"><a href="<?=home_url(); ?>">。ザワくんブログ</a></p>
      <?php endif; ?>
      <div class="header__icon">
          <a href="https://twitter.com/zawakun1002" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
          <a href="https://www.youtube.com/channel/UC8jc8RCOk-buQv8h1gx1ChQ" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
  </header>

  <div class="header__bottom">
    <ul>
      <li><a href="<?=home_url(); ?>">トップ</a></li>
      <li><a href="<?=home_url(); ?>/profile">プロフィール</a></li>
      <li><a href="<?=home_url(); ?>/blog">ブログ一覧</a></li>
      <li><a href="<?=home_url(); ?>">作品</a></li>
      <li><a href="<?=home_url(); ?>/contact">お問い合わせ</a></li>
      <li><a href="<?=home_url(); ?>/contact#privacy">プライバシーポリシー</a></li>
    </ul>
  </div>



