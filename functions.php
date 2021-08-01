<?php
// 管理バーを非表示
add_filter('show_admin_bar', '__return_false');

add_theme_support( 'post-thumbnails' ); 


function create_post_type(){
  //カスタム投稿タイプがダッシュボードの編集画面で使用する項目を配列で用意
  $supports = array(
    'title',
    'editor',
    'thumbnail',
    'revisions',
  );
  //カスタム投稿タイプを追加するための関数
  //第一引数は任意のカスタム投稿タイプ名
  register_post_type('blog',
    array(
      'label' => 'blog',
      'public' => true,
      'has_archive' => true,
      'menu_position' => 10,
      'show_in_rest' => true,
      'supports' => $supports
    )
  );
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
  register_taxonomy(
    'blogcategory', //カテゴリー名（任意）
    'blog', //カスタム投稿名
    array(
      'hierarchical' => true, //タグタイプの指定（階層をもつ）
      'update_count_callback' => '_update_post_term_count',
      //ダッシュボードに表示させる名前
      'label' => 'カテゴリー', 
      'public' => true,
      'show_ui' => true,
      'exclude_from_search' => true,
    )
  );
  
}
add_action('init','create_post_type');



// 固定カスタムフィールドボックス
function add_work_fields() {
  //add_meta_box(表示される入力ボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
  //第4引数のpostをpageに変更すれば固定ページにオリジナルカスタムフィールドが表示されます(custom_post_typeのslugを指定することも可能)。
  //第5引数はnormalの他にsideとadvancedがあります。
  add_meta_box( 'work_setting', '必須事項', 'insert_work_fields', 'work', 'normal');
}
add_action('admin_menu', 'add_work_fields');

// カスタムフィールドの入力エリア
function insert_work_fields() {
  global $post;

  //下記に管理画面に表示される入力エリアを作ります。「get_post_meta()」は現在入力されている値を表示するための記述です。
  echo '<span style="display: block; margin-bottom: 8px;">作品URL： </span><input type="url" name="work_url" value="'.get_post_meta($post->ID, 'work_url', true).'" style="display: block; width: 100%; margin-bottom: 8px;" />　<br>';
  
}

// カスタムフィールドの値を保存
function save_work_fields( $post_id ) {

  if(!empty($_POST['work_url'])){
    update_post_meta($post_id, 'work_url', $_POST['work_url'] );
  }else{
    delete_post_meta($post_id, 'work_url');
  }
}
add_action('save_post', 'save_work_fields');

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
    echo '<div class="o-pagenation center">';
    if ( $paged > 1 ) {
      // 「‹」１ページ前へ戻るリンクを表示
      echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="o-pagenation__link">', $text_before ,'</a>';
    }
    for ( $i = 1; $i <= $pages; $i++ ) {

      if ( $i <= $paged + $range && $i >= $paged - $range ) {
        if ( $paged === $i ) {
          echo '<span class="o-pagenation__current">', $i ,'</span>'; // 現在のページの数字
        } else {
          echo '<a href="', get_pagenum_link( $i ) ,'" class="o-pagenation__link">', $i ,'</a>';
        }
      }

    }
    if ( $paged < $pages ) {
      // 「›」１ページ後へ進むリンクを表示
      echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="o-pagenation__link">' ,$text_next ,'</a>';
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

//カスタム投稿の検索機能追加
add_filter('template_include','custom_search_template');
function custom_search_template($template){
  if ( is_search() ){
    $post_types = get_query_var('post_type');
    foreach ( (array) $post_types as $post_type )
      $templates[] = "search-{$post_type}.php";
    $templates[] = 'search.php';
    $template = get_query_template('search',$templates);
  }
  return $template;
}

//* WebP File Upload
function add_file_types_to_uploads( $mimes ) {
  $mimes['webp'] = 'image/webp';
  return $mimes;
}
add_filter( 'upload_mimes', 'add_file_types_to_uploads' );

//* WebP image thumbnail display on media　Library
function webp_is_displayable($result, $path) {
  if ($result === false) {
      $displayable_image_types = array( IMAGETYPE_WEBP );
      $info = @getimagesize( $path );

      if (empty($info)) {
          $result = false;
      } elseif (!in_array($info[2], $displayable_image_types)) {
          $result = false;
      } else {
          $result = true;
      }
  }
  return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);


function is_my_mobile()
{
 $size = $_SESSION[windowSize];
 if($size == 0)
  {
  if(is_mobile()){return 'sp';}
  else{return 'pc';}
  }
 elseif($size <= 1023){return 'sp';}
 else{return 'pc';}
}

?>