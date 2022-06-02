<?php get_header(); ?>
        
        <div class="bl_commonBg">

        <main class="ly_main">

            <div class="bl_commonBox_title bl_commonBox_title__404 hp_mt24">
               <h1 class="el_pageTitle"><span>お探しのページが</span><span>見つかりませんでした</span></h1>
            </div><!-- /.bl_commonBox_title -->

            <div class="bl_commonBox">
                <p class="el_lead">yurilog.をご覧いただき、ありがとうございます。<br>
                申し訳ありませんが、お探しいただいた記事を見つけることができませんでした。</br>
                削除されたか、URLが変更された可能性がございます。</br>
                お手数おかけしますが、以下の方法からもう一度目的のページをお探しください。
                </p><!-- /.el_lead -->

                <section class="ly_section">
                    <h2 class="el_lv2Heading_dashedBottom">検索してみつける</h2><!-- /.el_lv2Heading_dashedBottom -->
                    <p class="hp_mt24">検索ボックスにお探しのコンテンツに該当するキーワードを入力して下さい。<br>
                    近いテーマのページのリストが表示されます。
                    </p>
                    <div class="bl_404_search hp_mt24">
                        <?php get_template_part('/template-parts/widget/search-widget'); ?>
                    </div><!-- /.bl_404_search -->
                </section><!-- /.ly_section -->

                <section class="ly_section">
                    <h2 class="el_lv2Heading_dashedBottom">カテゴリからみつける</h2><!-- /.el_lv2Heading_dashedBottom -->
                    <p class="hp_mt24">それぞれのカテゴリーのトップページからもう一度目的のページをお探しになってみてください。</p>
                    <ul class="bl_404_catList hp_mt24">
                    <?php 
                        $args = array(
                            'parent' => 0,
                            'orderby' => 'term_order',
                            'order' => 'DESC'
                        );
                        $categories = get_categories( $args );

                        foreach( $categories as $category ) {
                            echo '<li class="bl_404_catItem"><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
                        }
                    ?>
                    </ul><!-- /.bl_404_catList -->
                </section><!-- /.ly_section -->

                <div class="bl_commonBox_btnWrap">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="el_btn el_btn__paris el_leftIconBtn el_leftIconBtn__top">トップへもどる</a><!-- /.el_btn -->
                </div><!-- /.bl_commonBox_btnWrap -->
            </div><!-- /.bl_commonBox -->
        </main><!-- /.ly_main -->

    </div><!-- /.bl_commonBg -->
    
<?php get_footer(); ?>
