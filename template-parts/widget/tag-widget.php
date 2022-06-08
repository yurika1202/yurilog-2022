<div class="bl_widget">
    <div class="bl_widget_title">
        <p>タグでさがす</p>
    </div><!-- /.bl_widget_title -->

    <ul class="bl_widget_body bl_widget_tagList">
    <?php 
        $args = array(
            'orderby' => 'name',
            'order' => 'DESC'
        );
        $tags = get_tags( $args );

    	foreach( $tags as $tag ) {
            echo '<li class="bl_widget_tagItem"><a href="'. get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li>';
        }
    ?>
    </ul><!-- /.bl_widget_body -->
</div><!-- /.bl_widget -->
