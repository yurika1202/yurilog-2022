<!DOCTYPE html>
<html lang="ja">

<?php $attr = is_home() || is_front_page() ? 'website' : 'article'; ?>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#  <?php echo $attr?>: http://ogp.me/ns/<?php echo $attr?>#">
<meta charset="utf-8">
<title><?php bloginfo('name'); ?></title>
<meta name="description"  content="<?php bloginfo('description'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="format-detection" content="telephone=no,address=no">

<?php wp_head(); ?>
</head>

<body id="js_fixed" itemscope itemtype="http://schema.org/WebPage">
    <header class="ly_header">
        <div class="ly_header_inner is_openNav">
            <div class="bl_header_logo">
                <h1 class="el_logo"><a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="yurilog." width="84" height="26"></a></h1><!-- /.el_logo -->
            </div><!-- /.bl_header_logo -->
            <nav class="bl_headerNav" itemprop="hasPart" itemscope itemtype="https://schema.org/SiteNavigationElement">
                <ul class="bl_globalNav_list">
                    <li class="bl_globalNav_item"><a href="<?php echo esc_url(home_url('/about/')) ?>">About</a></li><!-- /.bl_globalNav_item -->
                    <li class="bl_globalNav_item"><a href="<?php echo esc_url(home_url('/contact/')) ?>">Contact</a></li><!-- /.bl_globalNav_item -->
                </ul><!-- /.bl_globalNav_list -->
                <div class="bl_header_search bl_search__header">
                    <?php get_template_part('template-parts/widget/search-widget'); ?>
                </div><!-- /.bl_header_search -->
                <button class="bl_header_navBtn el_circleBtn el_btn_hover__opacity el_btn_hover__bound" id="js_drawerBtn" type="button" aria-expanded="false" aria-label="メニューを開く" aria-controls="headerNav">
                    <span></span><span></span><span></span>
                    <span></span><span></span><span></span>
                </button><!-- /.bl_header_navBtn -->
            </nav><!-- /.bl_headerNav -->
        </div><!-- /.ly_header_inner -->
    </header><!-- /.ly_header -->

    <div class="bl_drawerNav_wrapper" id="js_drawerNav">
        <nav id="headerNav" itemprop="hasPart" itemscope itemtype="https://schema.org/SiteNavigationElement">
            <ul class="bl_drawerNav">
                <li class="bl_drawerNav_list"><a href="<?php echo esc_url(home_url('/about/')) ?>" class="el_btn el_btn__drawerNav">About</a></li><!-- /.bl_drawerNav_list -->
                <li class="bl_drawerNav_list"><a href="<?php echo esc_url(home_url('/contact/')) ?>" class="el_btn el_btn__drawerNav el_leftIconBtn el_leftIconBtn__contact">Contact</a></li><!-- /.bl_drawerNav_list -->
            </ul><!-- /.bl_drawerNav -->

            <div class="bl_drawerNav_widgetWrapper">
                <div class="bl_drawerNav_search">
                    <?php get_template_part('template-parts/widget/search-widget'); ?>
                </div><!-- /.bl_drawerNav_search -->

                <?php get_template_part('template-parts/widget/category-widget'); ?>
                <?php get_template_part('template-parts/widget/tag-widget'); ?>
            </div><!-- /.bl_drawerNav_widgetWrapper -->
        </nav>
    </div><!-- /.bl_drawerNav_wrapper -->
