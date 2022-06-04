<?php get_header(); ?>
        
        <div class="bl_commonBg">

        <main class="ly_main">

            <div class="bl_commonBox_title bl_commonBox_title__404 hp_mt24">
               <h1 class="el_pageTitle">わたしについて</h1>
            </div><!-- /.bl_commonBox_title -->

            <div class="bl_commonBox">
                <section class="ly_section__about" itemscope itemtype="https://schema.org/Person">
                    <div class="bl_about_img" itemprop="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profile.webp" alt="" width="160" height="160" loading="lazy">
                    </div><!-- /.bl_about_img -->

                    <h2 class="el_lv2Heading_dashedBottom el_lv2Heading_dashedBottom__center el_lv2Heading_dashedBottom__l" itemprop="name">ゆりか</h2><!-- /.el_lv2Heading_dashedBottom -->

                    <div class="bl_about_profile" itemprop="description">
                        <p>年少の男の子を子育て中のアラサー主婦。<br>
                        コーディングで試行錯誤する時間がすきで、沼にはまって抜け出せません。<br>
                        アクセシビリティの知見を強化したい。いまはフロントエンド開発に興味があるので、JavaScriptを中心にマイペース勉強中🐢<br>
                        いろんなことに目移りしちゃう系の人間です。</p>
                    </div><!-- /.bl_about_profile -->

                    <div class="bl_about_sns">
                        <?php get_template_part('template-parts/widget/sns-widget'); ?>
                    </div><!-- /.bl_about_sns -->
                </section><!-- /.ly_section -->

                <div class="bl_commonBox_btnWrap">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="el_btn el_btn__paris el_leftIconBtn el_leftIconBtn__top el_btn_hover__zoomIn">トップへもどる</a><!-- /.el_btn -->
                </div><!-- /.bl_commonBox_btnWrap -->
            </div><!-- /.bl_commonBox -->
        </main><!-- /.ly_main -->

    </div><!-- /.bl_commonBg -->
    
<?php get_footer(); ?>
