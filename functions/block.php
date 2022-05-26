<?php 

function my_block_enqueue() {
    wp_enqueue_script(
      'my-block-script',
      get_theme_file_uri('/functions/block.js'),
      array('wp-blocks', 'wp-element', 'wp-block-editor'),
      filemtime (get_theme_file_path ('/functions/block.js'))
    );
    
    register_block_type(
        'my-block/my-block-richText',
        array(
            'editor_script' => 'my-block-script',
        )
    );

    wp_enqueue_style(
        'my-block-editor',
        get_theme_file_uri('/functions/editor-style.css'),
        array('wp-edit-blocks'),
        filemtime(get_theme_file_path ('/functions/editor-style.css'))
    );
}
add_action ('enqueue_block_editor_assets', 'my_block_enqueue');

function my_block_enqueue_2() {
    if (!is_admin()) {
        wp_enqueue_style (
            'my-block-front',
            get_theme_file_uri('/functions/front-style.css'),
            array(),
            filemtime(get_theme_file_path ('/functions/front-style.css'))
        );
    }
}
add_action('enqueue_block_assets', 'my_block_enqueue_2');

?>