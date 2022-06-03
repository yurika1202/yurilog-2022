<?php get_header(); ?>
        
        <div class="bl_commonBg">

        <main class="ly_main">

            <div class="bl_commonBox_title bl_commonBox_title__404 hp_mt24">
               <h1 class="el_pageTitle">わたしについて</h1>
            </div><!-- /.bl_commonBox_title -->

            <div class="bl_commonBox">
                <div class="bl_about_img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profile.png" alt="プロフィール画像" width="160" height="160" loading="lazy">
                </div><!-- /.bl_about_img -->

                <section class="ly_section__about">
                    <h2 class="el_lv2Heading_dashedBottom el_lv2Heading_dashedBottom__center el_lv2Heading_dashedBottom__l">ゆりか</h2><!-- /.el_lv2Heading_dashedBottom -->

                    <div class="bl_about_profile">
                        <p>年少の男の子を子育て中のアラサー主婦。<br>
                        コーディングで試行錯誤する時間がすきで、沼にはまって抜け出せません。<br>
                        アクセシビリティの知見を強化したい。いまはフロントエンド開発に興味があるので、JavaScriptを中心にマイペース勉強中🐢<br>
                        いろんなことに目移りしちゃう系の人間です。</p>
                    </div><!-- /.bl_about_profile -->

                    <div class="bl_about_sns">
                        <ul class="bl_sns_list">
                            <li class="bl_sns_item bl_sns_item__twitter"><a href="https://twitter.com/bnku212"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter.svg" alt="Twitterのアイコン"></a></li><!-- /.bl_sns_item -->
                            <li class="bl_sns_item bl_sns_item__github"><a href="https://github.com/yurika1202"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/github.svg" alt="GitHubのアイコン"></a></li><!-- /.bl_sns_item -->
                            <li class="bl_sns_item bl_sns_item__codepen"><a href="https://codepen.io/yurika1202"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/codepen.svg" alt="CodePenのアイコン"></a></li><!-- /.bl_sns_item -->
                        </ul><!-- /.bl_sns_list -->
                    </div><!-- /.bl_about_sns -->
                </section><!-- /.ly_section -->

                <div class="bl_commonBox_btnWrap">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="el_btn el_btn__paris el_leftIconBtn el_leftIconBtn__top el_btn_hover__zoom">トップへもどる</a><!-- /.el_btn -->
                </div><!-- /.bl_commonBox_btnWrap -->
            </div><!-- /.bl_commonBox -->
        </main><!-- /.ly_main -->

    </div><!-- /.bl_commonBg -->
    
<?php get_footer(); ?>
