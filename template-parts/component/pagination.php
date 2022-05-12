<?php if (paginate_links()) : ?>

<div class="bl_pagination">
    <?php
    the_posts_pagination(array(
        'mid_size' => 2,
        'prev_next' => true,
        'prev_text' => '<i class="fas fa-caret-left"></i>',
        'next_text' => '<i class="fas fa-caret-right"></i>',
        'type' => 'list'
    ));
    ?>
</div><!-- /.bl_pagination -->
<div class="bl_pagination">
    <div class="el_btn el_paginationBtn el_paginationBtn__prev">
        <a href=""></a>
    </div><!-- /.el_paginationBtn -->
    <div class="el_btn el_btn__paris bl_pagination_currentBox"><p>1/10</p></div>
    <div class="el_btn el_paginationBtn el_paginationBtn__next">
        <a href=""></a>
    </div><!-- /.el_paginationBtn -->
</div><!-- /.bl_pagination -->

<?php endif; ?>
