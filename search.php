<?php get_header(); ?>
        
        <div class="bl_commonBg">

        <main class="ly_main">

            <div class="bl_commonBox_title bl_commonBox_title__leftIcon hp_mt24">
                <?php
                    if (isset($_GET['s']) && empty($_GET['s'])) {
                        echo '<h1 class="el_pageTitle el_pageTitle_leftIcon el_pageTitle__search">No Word</h1>';
                    } else {
                        echo '<h1 class="el_pageTitle el_pageTitle_leftIcon el_pageTitle__search">' . $_GET['s'] . '</h1>';
                    }
                ?>
            </div><!-- /.bl_commonBox_title -->

            <div class="bl_commonBox">
                <ul class="bl_cardUnit bl_catTab_contents is_display">
                <?php if (have_posts()):  ?>
                <?php while (have_posts()) : the_post(); ?>
                <li class="bl_cardUnit_item">
                    <?php get_template_part('/template-parts/component/card'); ?>
                </li><!-- /.bl_cardUnit_item -->
                <?php endwhile; endif; ?>
                </ul><!-- /.bl_cardUnit -->
                <?php get_template_part('/template-parts/component/pagination'); ?>
            </div><!-- /.bl_commonBox -->
        </main><!-- /.ly_main -->

    </div><!-- /.bl_commonBg -->
    
<?php get_footer(); ?>
