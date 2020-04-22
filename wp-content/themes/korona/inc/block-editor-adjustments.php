<?php
// Disable support for custom text color in WYSIWYG editor
function korona_remove_text_color_from_mce( $buttons ) {
    array_splice($buttons, array_search('forecolor', $buttons ), 1);
    return $buttons;
}

add_filter( 'mce_buttons_2', 'korona_remove_text_color_from_mce' );

function korona_gutenberg_disable_all_colors() {
    add_theme_support( 'editor-color-palette', array() );
    add_theme_support( 'disable-custom-colors' );
}

add_action( 'after_setup_theme', 'korona_gutenberg_disable_all_colors' );
