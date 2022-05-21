<?php get_header(); ?>
        
    <div class="bl_commonBg">

        <main class="ly_main">

            <?php my_breadcrumb(); ?>

            <div class="bl_toc">
                <button class="bl_toc_navBtn el_btn" id="js_drawerBtn" type="button" aria-expanded="false" aria-label="もくじを開く" aria-controls="tocNav">もくじ</button><!-- /.bl_toc_navBtn -->
            </div><!-- /.bl_toc -->

            <div class="bl_toc_contents" id="js_drawerContents">
                <nav id="tocNav">
                    <ul class="bl_toc_list">
                        <li class="bl_toc_item">一つ目のh2タイトルがはいります</li><!-- /.bl_toc_item -->
                        <li class="bl_toc_item">二つ目のh2タイトルがはいります</li><!-- /.bl_toc_item -->
                        <ul class="bl_toc_list bl_toc_list__lv3">
                            <li class="bl_toc_item bl_toc_item__lv3">一つ目のh3タイトルがはいります</li><!-- /.bl_toc_item -->
                            <li class="bl_toc_item bl_toc_item__lv3">二つ目のh3タイトルがはいります</li><!-- /.bl_toc_item -->
                        </ul><!-- /.bl_toc_list__lv3 -->
                    </ul><!-- /.bl_toc_list -->
                </nav>
            </div><!-- /.bl_drawerNav_wrapper -->

            <div class="bl_commonBox" itemscope itemtype="https://schema.org/Blog">
                <article class="bl_entry" itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
                    <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>

                    <div class="bl_entry_category" itemprop="articleSection">
                        <?php 
                            $cat = get_the_category(); 
                            $cat_name = $cat[0]->name;  
                            
                            echo '<p>' . $cat_name . '</p>';
                        ?>
                    </div><!-- /.bl_entry_category -->

                    <div class="bl_entry_head">
                        <h1 class="el_Lv1Heading" itemprop="name headline"><?php the_title(); ?></h1>
        
                        <div class="bl_entry_dateWrap">
                            <time class="bl_entry_date bl_entry_date__posted" datetime="<?php the_time('c'); ?>" itemprop="datePublished"><?php the_time('Y.n.j') ?></time><!-- /.bl_entry_date -->

                            <?php if (get_the_modified_time('Y.m.j') !== get_the_time('Y.m.j')) : ?>
                                <time class="bl_entry_date bl_entry_date__update" datetime="<?php the_modified_time('c'); ?>" itemprop="dateModified"><?php the_modified_time('Y.n.j') ?>></time><!-- /.bl_entry_date -->
                            <?php endif; ?>
                        </div><!-- /.bl_entry_dateWrap -->
                    </div><!-- /.bl_entry_head -->

                    <div class="bl_entry_body" itemprop="articleBody">
                        <?php the_content(); ?>
                    </div><!-- /.bl_entry_body -->

                    <div class="bl_entry_foot">
                        <ul class="bl_meta_list">
                            <?php
                                $cats = get_the_category();
                                foreach ($cats as $cat) {
                                    echo '<li class="bl_meta_item bl_meta_item__category" itemprop="articleSection"><a href="' . esc_url(get_category_link(($cat->term_id))) . '">' . $cat->name . '</a></li>';
                                }
                            ?>
                        </ul><!-- /.bl_meta_list -->

                        <ul class="bl_meta_list">
                            <?php
                                $tags = get_the_tags();
                                if (has_tag()) {
                                    foreach ($tags as $tag) {
                                        echo '<li class="bl_meta_item bl_meta_item__tag" itemprop="keywords"><a href="' . esc_url(get_tag_link(($tag->term_id))) . '">' . $tag->name . '</a></li>';
                                    }
                                }
                            ?>
                        </ul><!-- /.bl_meta_list -->
                    </div><!-- /.bl_entry_foot -->

                    <?php endwhile; ?>
                    <?php endif; ?>
                </article><!-- /.bl_entry -->

                <div class="bl_share">
                    <ul class="bl_share_list">
                        <li class="bl_share_item bl_share_item__twitter"><a href=""></a></li><!-- /.bl_share_item -->
                        <li class="bl_share_item bl_share_item__facebook"><a href=""></a></li><!-- /.bl_share_item -->
                        <li class="bl_share_item bl_share_item__hatena"><a href=""></a></li><!-- /.bl_share_item -->
                        <li class="bl_share_item bl_share_item__feedly"><a href=""></a></li><!-- /.bl_share_item -->
                    </ul><!-- /.bl_share_list -->
                </div><!-- /.bl_share -->

            </div><!-- /.bl_commonBox -->

            <div class="bl_entry_profile" itemprop="author">
                <div class="bl_profile_img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profile.png" alt="プロフィール画像" width="80" height="80" loading="lazy">
                </div><!-- /.bl_profile_img -->

                <div class="bl_profile_body">
                    <p class="bl_profile_name">ゆりか</p><!-- /.bl_profile_name -->
                    <p class="bl_profile_text">広島県に住んでいる、1993年生まれの1児の母。はじめてWeb制作にふれた時から、コーディングの虜です。沼にはまって抜け出せません。フロントエンドを目指し日々勉強をしています。</p><!-- /.bl_profile_text -->

                    <div class="bl_profile_sns">
                        <ul class="bl_sns_list">
                            <li class="bl_sns_item bl_sns_item__twitter"><a href=""></a></li><!-- /.bl_sns_item -->
                            <li class="bl_sns_item bl_sns_item__github"><a href=""></a></li><!-- /.bl_sns_item -->
                            <li class="bl_sns_item bl_sns_item__codepen"><a href=""></a></li><!-- /.bl_sns_item -->
                        </ul><!-- /.bl_sns_list -->
                    </div><!-- /.bl_profile_sns -->

                    <div class="bl_profile_btnWrap">
                        <a href="" class="el_btn el_btn__paris el_rightIconBtn el_rightIconBtn__arrow">くわしくみる</a><!-- /.el_btn -->
                    </div><!-- /.bl_profile_btnWrap -->
                </div><!-- /.bl_profile_body -->
            </div><!-- /.bl_entry_profile -->

            <div class="bl_commonBox bl_related">
                <div class="bl_related_title">
                    <p>あわせてよむ</p>
                </div><!-- /.bl_related_title -->

                <div class="bl_articleList bl_articleList__related">
                    <ul class="bl_cardUnit">
                        <?php 
                            $post_cats = get_the_category($post->ID);
                            $cat_ids = array();
                    
                            foreach ($post_cats as $cat) {
                                array_push($cat_ids, $cat->cat_ID);
                            }
                    
                            $args = array(
                                'post_type' => 'post',
                                'post_per_page' => 6,
                                'post__not_in' => array($post->ID),
                                'category__in' => $cat_ids,
                                'orderby' => 'rand',
                            );
                    
                            $query = new WP_Query($args);
                    
                            if ($query->have_posts()) :
                                $i = 0;
                                while ($query->have_posts()) : $query->the_post();
                                    if ($i > 5) : break;
                                    endif;
                            ?>
                                    <?php get_template_part('/template-parts/component/card'); ?>
                            <?php
                                    $i++;
                                endwhile;
                            endif;
                            wp_reset_postdata();
                        ?>
                    </ul><!-- /.bl_cardUnit -->
                </div><!-- /.bl_articleList__latest -->
            </div><!-- /.bl_commonBox -->

            <div class="bl_entry_btnWrap">
                <?php 
                    $cat = get_the_category(); 
                    $cat_id = $cat[0]->cat_ID; 

                    echo '<a class="el_btn el_leftIconBtn el_leftIconBtn__arrow"href="' . esc_url(get_category_link($cat_id)) . '">カテゴリ一覧へもどる</a>';
                ?>
            </div><!-- /.bl_entry_btnWrap -->

        </main><!-- /.ly_main -->

    </div><!-- /.bl_commonBg -->
    
<?php get_footer(); ?>
