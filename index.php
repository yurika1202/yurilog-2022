<?php get_header(); ?>
        
        <div class="bl_commonBg">

        <main class="ly_main">

            <?php
                // カテゴリーのスラッグ登録
                $cat1 = get_category_by_slug('投稿フォーマット');
                $cat2 = get_category_by_slug('テンプレート');
                $cat3 = get_category_by_slug('uncategorized');
                // 投稿タイプ
                $postData = 'post';
                // 表示順の基準
                $orderby = 'date';
                // 昇順or降順
                $order = 'DESC';
                // 表示件数
                $no = 12;
            ?>

            <nav class="bl_catTab">
                <ul class="bl_catList">
                    <li class="bl_catList_item is_select">最新記事</li><!-- /.bl_catList_item -->
                    <li class="bl_catList_item"><?php echo $cat1->name ?></li><!-- /.bl_catList_item -->
                    <li class="bl_catList_item"><?php echo $cat2->name ?></li><!-- /.bl_catList_item -->
                    <li class="bl_catList_item"><?php echo $cat3->name ?></li><!-- /.bl_catList_item -->
                </ul><!-- /.bl_catList -->
            </nav><!-- /.bl_catTab -->
    
            <div class="bl_commonBox hp_mt24">
                <ul class="bl_cardUnit bl_catTab_contents is_display">
                    <?php
                        $posts = get_posts(array(
                            'post_type' => $postData,
                            'posts_per_page' => $no,
                            'orderby' => $orderby,
                            'order' => $order
                        ));
                        foreach($posts as $post):
                    ?>
                    <li class="bl_cardUnit_item">
                        <?php get_template_part('/template-parts/component/card'); ?>
                    </li><!-- /.bl_cardUnit_item -->
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); wp_reset_query(); ?>
                </ul><!-- /.bl_cardUnit -->

                <ul class="bl_cardUnit bl_catTab_contents">
                    <?php
                        $cat_posts = get_posts(array(
                            'post_type' => $postData,
                            'category_name' => $cat1->slug,
                            'posts_per_page' => $no,
                            'orderby' => $orderby,
                            'order' => $order
                        ));
                        foreach($cat_posts as $post):
                        setup_postdata($post);
                    ?>
                    <li class="bl_cardUnit_item">
                        <?php get_template_part('/template-parts/component/card'); ?>
                    </li><!-- /.bl_cardUnit_item -->
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); wp_reset_query(); ?>
                </ul><!-- /.bl_cardUnit -->

                <ul class="bl_cardUnit bl_catTab_contents">
                    <?php
                        $cat_posts = get_posts(array(
                            'post_type' => $postData,
                            'category_name' => $cat2->slug,
                            'posts_per_page' => $no,
                            'orderby' => $orderby,
                            'order' => $order
                        ));
                        foreach($cat_posts as $post):
                        setup_postdata($post);
                    ?>

                    <li class="bl_cardUnit_item">
                        <?php get_template_part('/template-parts/component/card'); ?>
                    </li><!-- /.bl_cardUnit_item -->
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); wp_reset_query(); ?>
                </ul><!-- /.bl_cardUnit -->

                <ul class="bl_cardUnit bl_catTab_contents">
                    <?php
                        $cat_posts = get_posts(array(
                            'post_type' => $postData,
                            'category_name' => $cat3->slug,
                            'posts_per_page' => $no,
                            'orderby' => $orderby,
                            'order' => $order
                        ));
                        foreach($cat_posts as $post):
                        setup_postdata($post);
                    ?>

                    <li class="bl_cardUnit_item">
                        <?php get_template_part('/template-parts/component/card'); ?>
                    </li><!-- /.bl_cardUnit_item -->
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); wp_reset_query(); ?>
                </ul><!-- /.bl_cardUnit -->

                <div class="bl_pagination">
                    <ul class="bl_pagination_list">
                        <li class="bl_pagination_item bl_pagination_item__prev">
                            <a href=""></a>
                        </li><!-- /.bl_pagination_item -->
                        <li class="bl_pagination_item" aria-current="page">
                            <a href="">1</a>
                        </li><!-- /.bl_pagination_item -->
                        <li class="bl_pagination_item">
                            <a href="">2</a>
                        </li><!-- /.bl_pagination_item -->
                        <li class="bl_pagination_item bl_pagination_item__omit">
                            <a href=""></a>
                        </li><!-- /.bl_pagination_item -->
                        <li class="bl_pagination_item">
                            <a href="">10</a>
                        </li><!-- /.bl_pagination_item -->
                        <li class="bl_pagination_item bl_pagination_item__next">
                            <a href=""></a>
                        </li><!-- /.bl_pagination_item -->
                    </ul>
                </div><!-- /.bl_pagination -->
            </div><!-- /.bl_commonBox -->
        </main><!-- /.ly_main -->

    </div><!-- /.bl_commonBg -->
    
<?php get_footer(); ?>
