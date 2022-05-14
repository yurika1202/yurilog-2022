<?php get_header(); ?>
        
        <div class="bl_commonBg">

        <main class="ly_main">

            <div class="bl_commonBox_title hp_mt24">
                <?php
                    if (isset($_GET['s']) && empty($_GET['s'])) {
                        echo '<h1 class="el_pageTitle el_pageTitle__search">No Word</h1>';
                    } else {
                        echo '<h1 class="el_pageTitle el_pageTitle__search">' . $_GET['s'] . '</h1>';
                    }
                ?>
            </div><!-- /.bl_commonBox_title -->

            <div class="bl_commonBox">
                <div class="bl_articleList bl_articleList__latest is_display">
                    <ul class="bl_cardUnit bl_catTab_contents is_display">
                    <?php if (have_posts()):  ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <li class="bl_cardUnit_item">
                        <?php get_template_part('/template-parts/component/card'); ?>
                    </li><!-- /.bl_cardUnit_item -->
                    <?php endwhile; endif; ?>
                    </ul><!-- /.bl_cardUnit -->
                    <?php get_template_part('/template-parts/component/pagination'); ?>
                </div><!-- /.bl_articleList__latest -->
                
                <div class="bl_articleList bl_articleList__cat">
                    <div class="bl_catTab_contents">
                        <ul class="bl_cardUnit">
                            <?php post_list($cat1); ?>
                        </ul><!-- /.bl_cardUnit -->
                        <div class="bl_articleList_btnWrap">
                            <a href="<?php echo esc_url(get_category_link($cat1->term_id)); ?>" class="el_btn el_btn__paris">もっとみる</a>
                        </div><!-- /.bl_articleList_btnWrap -->
                    </div><!-- /.bl_catTab_contents -->
    
                    <div class="bl_catTab_contents">
                        <ul class="bl_cardUnit">
                            <?php post_list($cat2); ?>
                        </ul><!-- /.bl_cardUnit -->
                        <div class="bl_articleList_btnWrap">
                            <a href="<?php echo esc_url(get_category_link($cat2->term_id)); ?>" class="el_btn el_btn__paris">もっとみる</a>
                        </div><!-- /.bl_articleList_btnWrap -->
                    </div><!-- /.bl_catTab_contents -->
    
                    <div class="bl_catTab_contents">
                        <ul class="bl_cardUnit">
                            <?php post_list($cat3); ?>
                        </ul><!-- /.bl_cardUnit -->
                        <div class="bl_articleList_btnWrap">
                            <a href="<?php echo esc_url(get_category_link($cat3->term_id)); ?>" class="el_btn el_btn__paris">もっとみる</a>
                        </div><!-- /.bl_articleList_btnWrap -->
                    </div><!-- /.bl_catTab_contents -->
                </div><!-- /.bl_articleList_cat -->
            </div><!-- /.bl_commonBox -->
        </main><!-- /.ly_main -->

    </div><!-- /.bl_commonBg -->
    
<?php get_footer(); ?>
