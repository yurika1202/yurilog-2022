<?php 

// 関連記事カード
function sc_related($atts) {
    extract(shortcode_atts(array(
        'url' => "",
        'title' => "",
        'date' => "",
        'time' => ""
    ), $atts));

    $id = url_to_postid($url);

    // タイトル
    if (empty($title)) {
        $title = esc_html(get_the_title($id));
    }

    // 投稿日
    if (empty($date)) {
        $date = esc_html(get_the_date('Y.m.j', $id));
    }

    // 更新日
    if (empty($time)) {
        $time = esc_html(get_the_modified_date('Y.m.j', $id));
    }
    if ($date !== $time) {
        $update = '<time class="style_blogCardBlock_date style_blogCardBlock_date__update" datetime="' . $time . '" itemprop="dateModified">' . $time . '</time>';
    }

    $relatedLink .= '<div class="style_blogCardBlock"><a href="' . $url . '">
                    <div class="style_blogCardBlock_label"><p>あわせてよむ</p></div>
                    <div class="style_blogCardBlock_body">
                    <p class="style_blogCardBlock_title">' . $title . '</p>
                    <div class="style_blogCardBlock_dateWrap">
                    <time class="style_blogCardBlock_date style_blogCardBlock_date__posted" datetime="' . $date . '" itemprop="datePublished">' . $date . '</time>'
                    . $update .
                    '</div><!-- /.style_blogCardBlockWrap -->
                    </div></a></div><!-- /.style_blogCardBlock -->';
    return $relatedLink;
}
add_shortcode('link', 'sc_related');


// 外部リンク対応ブログカード
function sc_external($atts) {
    extract (shortcode_atts (array (
        'url' => "",
        'title' => "",
        'name' => "",
    ), $atts));

    $img_width ="100";
    $img_height = "100";
    
    // OGP情報を取得
    require_once 'OpenGraph.php';
    $graph = OpenGraph::fetch($url);
    
    // タイトル
    $title = $graph -> title;
    if (!empty($title)) {
        $title = $title;
    }

    // サイト名
    $name = $graph -> site_name;
    if (!empty($name)) {
        $name = $name;
    }
    if (!$name) {
        $name = $url;
    }

    // アイキャッチ
    $image = $graph -> image;
    if (!empty($image)) {
		$img = '<img src="' . $image . '"alt="" width="100" height="100">';
	} else {
		$img = '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/default/no_image.webp' . '"alt="" width="100" height="100" loading="lazy">';
	}
    
    //ファビコン
    $host = parse_url($url)['host'];
    $searchFavicon = 'https://www.google.com/s2/favicons?domain='.$host;
    if ($searchFavicon) {
        $favicon = '<img src="' . $searchFavicon . '"alt="" width="16" height="16" loading="lazy">';
    }
        
    //外部リンク用ブログカードHTML出力
    $externalLink .= '<div class="style_blogCardBlock"><a href="' . $url . '" target="_blank"">
                    <div class="style_blogCardBlock_label"><p>参考リンク</p></div>
                    <div class="style_blogCardBlock_body style_blogCardBlock_body__external">
                    <div class="style_blogCardBlock_thumbnails">' . $img . '</div>
                    <p>' . $title . '</p>
                    <div class="style_blogCardBlock_dateWrap style_blogCardBlock_dateWrap__external">
                    <div class="style_blogCardBlock_link">' . $favicon . '<p>' . $name . '</p>
                    </div></div></div></a></div><!-- /.style_blogCardBlock -->';    
    return $externalLink;    
}
add_shortcode('exLink', 'sc_external');

?>