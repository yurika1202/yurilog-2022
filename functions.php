<?php

// セットアップ
// --------------------------------------------------------------------------
function my_setup() {
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
    add_theme_support('title-tag'); // タイトルタグ自動生成
    add_theme_support('html5', array ( //HTML5でマークアップ
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'my_setup');


// ファイル読み込み
// --------------------------------------------------------------------------
function my_script_init() {
    $timestamp = date('YmdHi');
    wp_enqueue_style('font', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Zen+Maru+Gothic:wght@400;500;700&display=swap', array(), NULL, 'all');
    wp_enqueue_style('base', get_template_directory_uri() . '/assets/css/style.min.css', array(), 2.0, 'all');
    wp_enqueue_script('base', get_template_directory_uri() . '/assets/js/script.js', array(), 2.0, true);
    wp_enqueue_style('prism', get_template_directory_uri() . '/assets/css/plugins/prism.css', array(), NULL, 'all');
    wp_enqueue_script('prism', get_template_directory_uri() . '/assets/js/plugins/prism.js', array(), NULL, true);
    wp_enqueue_style('block', get_template_directory_uri() . '/assets/css/editor-style.min.css', array(), 2.0, 'all');
    wp_enqueue_script('anime', get_template_directory_uri() . '/assets/js/animation.js', array(), NULL, true);
    wp_deregister_script('jquery');

    if (!is_single()) {
        wp_deregister_style('prism');
        wp_deregister_script('prism');  
        wp_deregister_style('block');
    }
}
add_action('wp_enqueue_scripts', 'my_script_init');


// ファビコン
// --------------------------------------------------------------------------
function my_favicon() {
  echo '<link rel="icon" href="' . get_template_directory_uri() . '/favicon.png" sizes="32x32">
        <link rel="icon" href="' . get_template_directory_uri() . '/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" type="image/png" href="' . get_template_directory_uri() . '/apple-touch-icon.png" sizes="180x180">
        <link rel="manifest" href="' . get_template_directory_uri() . '/manifest.json">';
}
add_action('wp_head', 'my_favicon');


// 管理画面ブロックスタイル追加
// --------------------------------------------------------------------------
function my_editor_style() {
  $timestamp = date('YmdHi');
  wp_enqueue_style('block', get_template_directory_uri() . '/assets/css/editor-style.css', array(), 1.0, 'all');
  wp_enqueue_script('block', get_template_directory_uri() . '/assets/js/editor.js', array(
    'wp-element',
    'wp-rich-text',
    'wp-editor',
  ), NULL, true);
}
add_action('enqueue_block_editor_assets', 'my_editor_style');


// ショートコード
// --------------------------------------------------------------------------
require get_template_directory() . '/functions/shortcode.php';


// ウィジェット
// --------------------------------------------------------------------------
function my_widget_init() {
  register_sidebar(array(
    'name' => '目次',
    'id' => 'toc'
  ));
  register_sidebar(array(
    'name' => 'カテゴリー',
    'id' => 'cat'
  ));
}
add_action('widgets_init', 'my_widget_init');


// パンくずリスト
// --------------------------------------------------------------------------
function breadcrumb() {
  $home = '<li class="bl_breadcrumb_item bl_breadcrumb_item__home"><a href="' . esc_url(home_url('/')) . '">ホーム</a></li><!-- /.bl_breadcrumb_item -->';
  echo '<nav class="bl_breadcrumb bl_anime bl_anime__in js_anime">';

  if (is_single()) {
    $cat = get_the_category();
    $cat_list = array();

    if (isset($cat[0]->cat_ID)) {
      $cat_id = $cat[0]->cat_ID;
    }
    while ($cat_id != 0) {
      $cat = get_category($cat_id);
      $cat_link = get_category_link($cat_id);
      array_unshift($cat_list, '<li class="bl_breadcrumb_item"><a href="' . $cat_link . '">' . $cat->name . '</a></li><!-- /.bl_breadcrumb_item -->');
      $cat_id = $cat->parent;
    }

    echo $home;
    foreach ($cat_list as $val) {
      echo $val;
    }
    the_title('<li class="bl_breadcrumb_item">', '</li><!-- /.bl_breadcrumb_item -->');
  }

  echo '</nav><!-- /.bl_breadcrumb -->';
}


// 検索結果から固定ページを除外する
// --------------------------------------------------------------------------
function my_posts_search($search, $wp_query) {
  //検索結果ページ・メインクエリ・管理画面以外の3つの条件が揃った場合
  if ($wp_query->is_search() && $wp_query->is_main_query() && !is_admin()) {
    // 検索結果を投稿タイプに絞る
    $search .= " AND post_type = 'post' ";
    return $search;
  }
  return $search;
}
add_filter('posts_search', 'my_posts_search', 10, 2);


// アーカイブページでカテゴリーとタグ情報の取得
// --------------------------------------------------------------------------
function get_current_term()
{
  if (is_category()) {
    $tax_slug = "category";
    $id = get_query_var('cat');
  } else if (is_tag()) {
    $tax_slug = "post_tag";
    $id = get_query_var('tag_id');
  }
  return get_term($id, $tax_slug);
}

// 管理バーの非表示
// --------------------------------------------------------------------------
add_filter('show_admin_bar', '__return_false');
?>