<article class="bl_card" itemscope itemtype="https://schema.org/Blog">
    <div class="bl_card_body">
        <h2 class="bl_card_title" itemprop="headline"><a class="bl_card_link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><!-- /.bl_card_title -->
        <ul class="bl_card_tagList">
            <?php
                $tags = get_the_tags();
                if (has_tag()) {
                    foreach ($tags as $tag) {
                        echo '<li itemprop="keywords">' . $tag->name . '</li>';
                    }
                }
            ?>
        </ul><!-- /.bl_card_tagList -->
        <time class="bl_card_date" datetime="<?php the_time('c'); ?>" itemprop="datePublished"><?php the_time('Y.n.j') ?></time><!-- /.bl_card_date -->
    </div><!-- /.bl_card_body -->
    <div class="bl_card_thumbnail">
        <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('large');
            } else {
                echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/default/no_thmbnails.svg" alt="" width="64" height="64" loading="lazy">';
            }
        ?>
    </div><!-- /.bl_card_thumbnail -->
</article><!-- /.bl_card -->
