<?php
    $current = get_query_var('paged');
    $current = $current == 0 ? '1' : $current;
    $maxPage = $wp_query -> max_num_pages;

    echo '<div class="bl_pagination bl_articleList_btnWrap">';
    if($current != 1) {
        echo '<div class="el_btn el_paginationBtn el_paginationBtn__prev"><a href="' . esc_url(get_pagenum_link($current - 1)) . '"></a></div>';
    }
    echo '<div class="el_btn el_btn__paris bl_pagination_currentBox"><p>' . $current . '/' . $maxPage . '</p></div>';
    if($current != $pages) {
        echo '<div class="el_btn el_paginationBtn el_paginationBtn__next"><a href="' . esc_url(get_pagenum_link($current + 1)) . '"></a></div>';
    }
    echo '</div>';
?>