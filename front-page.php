<?php 
    //Template Name: トップページ
    get_header();
?>

<section class="o-mv is-index">
  <!-- <img src="<!?=get_template_directory_uri(); ?>/images/mv/index_pc.jpg" alt="mv" class="display_mq is-block">
  <img src="<!?=get_template_directory_uri(); ?>/images/mv/index_sp.jpg" alt="mv" class="display_to_mq"> -->
  <a class="index__scroll" href="#about">
      scroll
  </a>
</section>



<section class="p-index is-about" id="about">
  <div class="innerBox">
    <h2 class="o-title is-main">
      <span class="font_yumin">ABOUT</span>
      <span>当サイトについて</span>
    </h2>
    <div class="about__content border-r-b">
        <p>この度は当サイトを閲覧いただきまして誠にありがとうございます。</p>
        <p>当サイトでは元不動産営業マンで、現在都内web制作会社でフロントエンドエンジニアとして働いている、「。ザワくん」が皆様に有益な情報をお届けさせていただきたく、開設したサイトでございます。</p>
        <p>このサイトでは、宅地建物取引士試験合格者が行った効率的な勉強法、未経験からのweb業界転職のノウハウ、などのお役立ち情報から、大好きな音楽に関連する記事などを投稿させていただいています。</p>
        <p class="center">「。ザワくん」のプロフィールは<a href="<?=home_url(); ?>/profile">こちら</a></p>
    </div>
  </div>
</section>

<section class="p-index__blog">
  <div class="innerBox">
    <h2 class="o-title is-main">
      <span class="font_yumin">BLOG</span>
      <span>最新ブログ記事</span>
    </h2>
    <div class="p-index__blog__content border-r-b">
      <?php
        $works = array(
            'posts_per_page' => 6, // 表示件数の指定
            'post_type' => 'blog' 
        );
        $posts = get_posts( $works );
        foreach ( $posts as $post ): // ループの開始
        setup_postdata( $post ); // 記事データの取得
        
      ?>
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
        <p class="category"><span><?php echo $cat_name; ?></span></p>
      </div>
      <?php
          endforeach; // ループの終了
          wp_reset_postdata(); // 直前のクエリを復元する
      ?>
    </div>
    <a class="o-btn is-main" href="<?=home_url(); ?>/blog">
      ブログ一覧はこちら
    </a>
  </div>
</section>

<section class="p-index__blog">
  <div class="innerBox">
    <h2 class="o-title is-main">
      <span class="font_yumin">WORK</span>
      <span>作品　ポートフォリオ</span>
    </h2>
    <div class="p-index__blog__content border-r-b">
      <?php
        $works = array(
            'posts_per_page' => 6, // 表示件数の指定
            'post_type' => 'work' 
        );
        $posts = get_posts( $works );
        foreach ( $posts as $post ): // ループの開始
        setup_postdata( $post ); // 記事データの取得
        
      ?>
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
            $terms = get_the_terms($post->ID, 'workstag');
            // 複数のカスタム分類を指定する場合は配列を使用する
            if ( $terms ) {
              foreach ( $terms as $term ) {
                echo '<span>'.$term->name.'</span>';
              }
            }
          ?>
        </p>
      </div>
      <?php
          endforeach; // ループの終了
          wp_reset_postdata(); // 直前のクエリを復元する
      ?>
    </div>
    <a class="o-btn is-main" href="<?=home_url(); ?>/work">
      作品一覧はこちら
    </a>
  </div>
</section>

<?php get_footer(); ?>