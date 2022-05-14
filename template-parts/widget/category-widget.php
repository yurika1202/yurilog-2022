<div class="bl_widget">
    <div class="bl_widget_title">
        <p>カテゴリでさがす</p>
    </div><!-- /.bl_widget_title -->

    <ul class="bl_widget_body bl_widget_catList">
    <?php 
        $args = array(
            'parent' => 0,
            'orderby' => 'term_order',
            'order' => 'DESC'
        );
        $categories = get_categories( $args );

        foreach( $categories as $category ) {
            echo '<li class="bl_widget_catItem"><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
        }
    ?>
    </ul><!-- /.bl_widget_body -->
</div><!-- /.bl_widget -->
