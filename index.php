<?php get_header(); ?>
        
        <div class="bl_commonBg">

        <main class="ly_main">

            <?php
                $cat1 = get_category_by_slug('htmlcss');
                $cat2 = get_category_by_slug('js');
                $cat3 = get_category_by_slug('memo');
            ?>

            <nav class="bl_catTab">
                <ul class="bl_catList">
                    <li class="bl_catList_item bl_catList_item__latest is_select">最新記事</li><!-- /.bl_catList_item -->
                    <li class="bl_catList_item"><?php echo $cat1->name ?></li><!-- /.bl_catList_item -->
                    <li class="bl_catList_item"><?php echo $cat2->name ?></li><!-- /.bl_catList_item -->
                    <li class="bl_catList_item"><?php echo $cat3->name ?></li><!-- /.bl_catList_item -->
                </ul><!-- /.bl_catList -->
            </nav><!-- /.bl_catTab -->
    
            <div class="bl_commonBox bl_commonBox__top hp_mt24">
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
                        <?php post_list($cat1); ?>
                    </div><!-- /.bl_catTab_contents -->
    
                    <div class="bl_catTab_contents">
                        <?php post_list($cat2); ?>
                    </div><!-- /.bl_catTab_contents -->
    
                    <div class="bl_catTab_contents">
                        <?php post_list($cat3); ?>
                    </div><!-- /.bl_catTab_contents -->
                </div><!-- /.bl_articleList_cat -->
            </div><!-- /.bl_commonBox -->
        </main><!-- /.ly_main -->

    </div><!-- /.bl_commonBg -->
    
<?php get_footer(); ?>
