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
        $update = '<time class="style_relatedBlock_date style_relatedBlock_date__update" datetime="' . $time . '" itemprop="dateModified">' . $time . '</time>';
    }

    $relatedLink .= '<div class="style_relatedBlock"><a href="' . $url . '">
                    <div class="style_relatedBlock_label"><p>あわせてよむ</p></div>
                    <div class="style_relatedBlock_card">
                    <p class="style_relatedBlock_title">' . $title . '</p>
                    <div class="style_relatedBlock_dateWrap">
                    <time class="style_relatedBlock_date style_relatedBlock_date__posted" datetime="' . $date . '" itemprop="datePublished">' . $date . '</time>'
                    . $update .
                    '</div><!-- /.style_relatedBlockWrap -->
                    </div></a></div><!-- /.style_relatedBlock -->';
    return $relatedLink;
}
add_shortcode('link', 'sc_related');

?>