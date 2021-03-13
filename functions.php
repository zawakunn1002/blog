<?php
// 管理バーを非表示
add_filter('show_admin_bar', '__return_false');

add_theme_support( 'post-thumbnails' ); 

function post_has_archive( $args, $post_type ) {
 
  if ( 'post' == $post_type ) {
      $args['rewrite'] = true;
      $args['has_archive'] = 'blog'; //任意のスラッグ名
  }
  return $args;

}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );


function SearchFilter( $query ) {
	if ( $query -> is_search ) {
		$query -> set( 'post_type', 'post' );
	}
	return $query;
}
add_filter( 'pre_get_posts', 'SearchFilter' );

function create_post_type(){
  //カスタム投稿タイプがダッシュボードの編集画面で使用する項目を配列で用意
  $supports = array(
    'title',
    'editor',
    'thumbnail',
    'revisions'
  );
  //カスタム投稿タイプを追加するための関数
  //第一引数は任意のカスタム投稿タイプ名
  register_post_type('work',
    array(
      'label' => 'work',
      'public' => true, //フロントエンド上で公開する場合true
      'has_archive' => true, //アーカイブページを表示したい場合true
      'menu_position' => 10, //メニューを表示させる場所
      'supports' => $supports //ダッシュボードの編集画面で使用する項目
    )
  );
  register_taxonomy(
    'workstag', //タグ名（任意）
    'work', //カスタム投稿名
    array(
      'hierarchical' => false, //タグタイプの指定（階層をもたない）
      'update_count_callback' => '_update_post_term_count',
      //ダッシュボードに表示させる名前
      'label' => 'タグ', 
      'public' => true,
      'show_ui' => true,
      
    )
  );
  
}
add_action('init','create_post_type');

/**
 * ページネーション
 * 
 */

function pagination( $pages, $paged, $range = 2 ) {

  $pages = ( int ) $pages;
  $paged = $paged ?: 1;

  $text_before  = "‹";
  $text_next    = "›";

  if ( 1 !== $pages ) {
    //２ページ以上の時
    echo '<div class="Pagination">';
    if ( $paged > 1 ) {
      // 「‹」１ページ前へ戻るリンクを表示
      echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="Pagination-Item">', $text_before ,'</a>';
    }
    for ( $i = 1; $i <= $pages; $i++ ) {

      if ( $i <= $paged + $range && $i >= $paged - $range ) {
        if ( $paged === $i ) {
          echo '<span class="Pagination-Item isActive">', $i ,'</span>'; // 現在のページの数字
        } else {
          echo '<a href="', get_pagenum_link( $i ) ,'" class="Pagination-Item">', $i ,'</a>';
        }
      }

    }
    if ( $paged < $pages ) {
      // 「›」１ページ後へ進むリンクを表示
      echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="Pagination-Item">' ,$text_next ,'</a>';
    }
    echo '</div>';
  }
}

function twpp_change_posts_per_page( $query ) {
  if ( is_admin() || ! $query->is_main_query() ) {
    return;
  }
  if ( $query->is_search() ) {
    $query->set( 'posts_per_page', -1 );
  }
}
add_action( 'pre_get_posts', 'twpp_change_posts_per_page' );

?>