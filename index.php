<?php get_header(); ?>
        
        <div class="bl_commonBg">

        <main class="ly_main">

            <?php
                $cat1 = get_category_by_slug('uncategorized');
                $cat2 = get_category_by_slug('マークアップ');
                $cat3 = get_category_by_slug('memo');
            ?>

            <nav class="bl_catTab">
                <div class="bl_catList" role="tablist">
                    <button class="bl_catList_item bl_catList_item__latest is_select" type="button" role="tab" id="tab01" aria-controls="tabpanel01" aria-selected="true" tabindex="0">最新記事</button><!-- /.bl_catList_item -->
                    <button class="bl_catList_item" type="button" role="tab" id="tab02" aria-controls="tabpanel02" aria-selected="false" tabindex="-1"><?php echo $cat1->name ?></button><!-- /.bl_catList_item -->
                    <button class="bl_catList_item" type="button" role="tab" id="tab03" aria-controls="tabpanel03" aria-selected="false" tabindex="-1"><?php echo $cat2->name ?></button><!-- /.bl_catList_item -->
                    <button class="bl_catList_item" type="button" role="tab" id="tab04" aria-controls="tabpanel04" aria-selected="false" tabindex="-1"><?php echo $cat3->name ?></button><!-- /.bl_catList_item -->
                </div><!-- /.bl_catList -->
            </nav><!-- /.bl_catTab -->
    
            <div class="bl_commonBox bl_commonBox__top hp_mt24">
                <div class="bl_articleList bl_articleList__latest bl_catTab_contents is_display" tabindex="0" role="tabpanel" id="tabpanel01" aria-labelledby="tab01">
                    <ul class="bl_cardUnit">
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
                    <div class="bl_catTab_contents" tabindex="0" role="tabpanel" id="tabpanel02" aria-labelledby="tab02" hidden>
                        <?php post_list($cat1); ?>
                    </div><!-- /.bl_catTab_contents -->
    
                    <div class="bl_catTab_contents" tabindex="0" role="tabpanel" id="tabpanel03" aria-labelledby="tab03" hidden>
                        <?php post_list($cat2); ?>
                    </div><!-- /.bl_catTab_contents -->
    
                    <div class="bl_catTab_contents" tabindex="0" role="tabpanel" id="tabpanel04" aria-labelledby="tab04" hidden>
                        <?php post_list($cat3); ?>
                    </div><!-- /.bl_catTab_contents -->
                </div><!-- /.bl_articleList_cat -->
            </div><!-- /.bl_commonBox -->
        </main><!-- /.ly_main -->

    </div><!-- /.bl_commonBg -->
    
<?php get_footer(); ?>
