<?php get_header(); ?>
        
        <div class="bl_commonBg">

        <main class="ly_main">
            <nav class="bl_catTab">
                <ul class="bl_catList">
                    <li class="bl_catList_item is_select">最新記事</li><!-- /.bl_catList_item -->
                    <li class="bl_catList_item"><a href="">カテゴリ1</a></li><!-- /.bl_catList_item -->
                    <li class="bl_catList_item"><a href="">カテゴリ2</a></li><!-- /.bl_catList_item -->
                    <li class="bl_catList_item"><a href="">カテゴリ3</a></li><!-- /.bl_catList_item -->
                </ul><!-- /.bl_catList -->
            </nav><!-- /.bl_catTab -->
    
            <div class="bl_commonBox hp_mt24">
                <ul class="bl_cardUnit bl_articleList__latest">
                    <?php
                        $posts = get_posts('numberposts=12');
                        foreach($posts as $post):
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
