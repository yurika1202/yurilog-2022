<?php

// セットアップ
// --------------------------------------------------------------------------
function my_setup() {
    add_theme_support('editor-styles');
    add_editor_style('/assets/css/editor-style.min.css');
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
    add_theme_support('title-tag'); // タイトルタグ自動生成
    add_theme_support('html5', array ( //HTML5でマークアップ
        'search-form',
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
    wp_enqueue_style('base', get_template_directory_uri() . '/assets/css/style.min.css', array(), 1.0, 'all');
    wp_enqueue_script('base', get_template_directory_uri() . '/assets/js/script.js', array(), 1.0, true);
    wp_enqueue_script('anime', get_template_directory_uri() . '/assets/js/animation.js', array(), NULL, true);
    wp_deregister_script('jquery');

    if (is_single()) {
      wp_enqueue_style('prism', get_template_directory_uri() . '/assets/css/plugins/prism.css', array(), NULL, 'all');
      wp_enqueue_script('prism', get_template_directory_uri() . '/assets/js/plugins/prism.js', array(), NULL, true);
      wp_enqueue_style('editor', get_template_directory_uri() . '/assets/css/editor-style.min.css', array(), 1.0, 'all');
      wp_enqueue_script('editor', get_template_directory_uri() . '/assets/js/editor.js', array(), 1.0, 'all');
    }
    if (is_page('contact')) {
      wp_enqueue_script('contact', get_template_directory_uri() . '/assets/js/contact.js', array(), NULL, true);
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
  wp_enqueue_style('my-editor', get_template_directory_uri() . '/assets/css/editor-style.min.css', array(), 1.0, 'all');
  wp_enqueue_script('my-editor', get_theme_file_uri('/assets/js/editor.js'), [
    'wp-element',
    'wp-rich-text',
    'wp-editor',
    'wp-blocks',
  ]);
}
add_action('enqueue_block_editor_assets', 'my_editor_style');


// ショートコード
// --------------------------------------------------------------------------
require get_template_directory() . '/functions/shortcode.php';


// パンくずリスト
// --------------------------------------------------------------------------
function my_breadcrumb() {
  $breadcrumbLevel = 1;
  $home = '<li class="bl_breadcrumb_item bl_breadcrumb_item__home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url(home_url('/')) . '" itemprop="item"><span itemprop="name">ホーム</span></a></li><meta itemprop="position" content="' . $breadcrumbLevel++ . '" />';
  
  echo '<nav class="bl_breadcrumb"><ul class="bl_breadcrumb_list" itemscope itemtype="https://schema.org/BreadcrumbList">';

  if (is_single()) {
    $cat = get_the_category();
    $cat_list = array();

    if (isset($cat[0]->cat_ID)) {
      $cat_id = $cat[0]->cat_ID;
    }
    while ($cat_id != 0) {
      $cat = get_category($cat_id);
      $cat_link = get_category_link($cat_id);
      array_unshift($cat_list, '<li class="bl_breadcrumb_item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . $cat_link . '"itemprop="item"><span itemprop="name">' . $cat->name . '</a></li><meta itemprop="position" content="' . $breadcrumbLevel++ . '" />');
      $cat_id = $cat->parent;
    }
    echo $home;
    foreach ($cat_list as $val) {
      echo $val;
    }
    the_title('<li class="bl_breadcrumb_item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="item name">', '</li><meta itemprop="position" content="' . $breadcrumbLevel++ . '" />');
  }

  echo '</ul></nav>';
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


// OGP
// --------------------------------------------------------------------------
function my_meta_ogp() {
  if (is_front_page() || is_home() || is_singular()) {
    $ogp_image = 'http://yurika122.com/OGP.png';
    $twitter_site = '@bnku212';
    $twitter_card = 'summary';
    
    global $post;
    $ogp_title = '';
    $ogp_description = '';
    $ogp_url = '';
    $html = '';

    if (is_singular()) {
      setup_postdata($post);
      $ogp_title = $post->post_title;
      $ogp_description = mb_substr(get_the_excerpt(), 0, 100);
      $ogp_url = get_permalink();
      wp_reset_postdata();
    } elseif (is_front_page() || is_home()) {
      $ogp_title = get_bloginfo('name');
      $ogp_description = get_bloginfo('description');
      $ogp_url = home_url();
    }
 
    $ogp_type = (is_front_page() || is_home()) ? 'website' : 'article';
  
    if (is_singular() && has_post_thumbnail()) {
      $ps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
      $ogp_image = $ps_thumb[0];
    }
  
    $html = "\n";
    $html .= '<meta property="og:title" content="' . esc_attr($ogp_title) . '">' . "\n";
    $html .= '<meta property="og:description" content="' . esc_attr($ogp_description) . '">' . "\n";
    $html .= '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
    $html .= '<meta property="og:url" content="' . esc_url($ogp_url) . '">' . "\n";
    $html .= '<meta property="og:image" content="' . esc_url($ogp_image) . '">' . "\n";
    $html .= '<meta property="og:locale" content="ja_JP">' . "\n";
    $html .= '<meta property="og:type" content="' . $ogp_type . '">' . "\n";
    $html .= '<meta name="twitter:card" content="' . $twitter_card . '">' . "\n";
    $html .= '<meta name="twitter:site" content="' . $twitter_site . '">' . "\n";
  }
  echo $html;
}
add_action('wp_head', 'my_meta_ogp');


// カテゴリタブ切り替え
// --------------------------------------------------------------------------
function post_list($cat_slug) {
  global $post;
  $postData = 'post';
  $orderby = 'date';
  $order = 'DESC';
  $no = 12;
  $posts = get_posts(array(
    'post_type' => $postData,
    'category_name' => $cat_slug -> slug,
    'posts_per_page' => $no,
    'orderby' => $orderby,
    'order' => $order,
  ));

  echo '<ul class="bl_cardUnit">';
  foreach($posts as $post) {
    setup_postdata($post);
    ?>
    <li class="bl_cardUnit_item">
      <?php get_template_part('/template-parts/component/card'); ?>
    </li><!-- /.bl_cardUnit_item -->
  <?php 
    }
    echo '</ul>';
    if(count($posts) >= 12) {
      echo '<div class="bl_commonBox_btnWrap"><a href="' . esc_url(get_category_link($cat_slug->term_id)) . '" class="el_btn el_btn__paris el_btn_hover__zoom">もっとみる</a></div><!-- /.bl_articleList_btnWrap -->';
    }
  wp_reset_postdata(); wp_reset_query();
}

?>