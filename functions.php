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
  register_post_type('works',
    array(
      'label' => 'works',
      'public' => true, //フロントエンド上で公開する場合true
      'has_archive' => true, //アーカイブページを表示したい場合true
      'menu_position' => 10, //メニューを表示させる場所
      'supports' => $supports //ダッシュボードの編集画面で使用する項目
    )
  );
  register_taxonomy(
    'workstag', //タグ名（任意）
    'works', //カスタム投稿名
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


?>