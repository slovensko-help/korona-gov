<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    include_once 'acf-block.php';

    function id_sk_gov_register_block_container () {
        if ( !function_exists( 'acf_register_block' ) ) {
            return;
        }

        //section-container-open
        acf_register_block( [
                                'name'            => 'section-container-open',
                                'title'           => __( 'Kontainer - začiatok', 'id_sk_gov' ),
                                'description'     => __( 'Otvorenie kontajneru pre template bez kontajneru', 'id_sk_gov' ),
                                'render_callback' => 'render_callback_container_open',
                                'category'        => 'gov-blocks-container',
                                'icon'            => '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"viewBox="0 0 469.333 469.333" style="enable-background:new 0 0 469.333 469.333;" xml:space="preserve"><path d="M458.667,0h-448C4.771,0,0,4.771,0,10.667v448c0,5.896,4.771,10.667,10.667,10.667h448 c5.896,0,10.667-4.771,10.667-10.667v-448C469.333,4.771,464.563,0,458.667,0z M149.333,448h-128V21.333h128V448z M298.667,448 h-128V21.333h128V448z M448,448H320V21.333h128V448z"/></svg>',
                                'mode'            => 'preview',
                                'align'           => 'full',
                                'keywords'        => [ 'kontainer', 'container' ],
                            ] );

        //section-container-close
        acf_register_block( [
                                'name'            => 'section-container-close',
                                'title'           => __( 'Kontainer - koniec', 'id_sk_gov' ),
                                'description'     => __( 'Ukončenie kontajneru pre template bez kontajneru', 'id_sk_gov' ),
                                'render_callback' => 'render_callback_container_close',
                                'category'        => 'gov-blocks-container',
                                'icon'            => '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"viewBox="0 0 469.333 469.333" style="enable-background:new 0 0 469.333 469.333;" xml:space="preserve"><path d="M458.667,0h-448C4.771,0,0,4.771,0,10.667v448c0,5.896,4.771,10.667,10.667,10.667h448 c5.896,0,10.667-4.771,10.667-10.667v-448C469.333,4.771,464.563,0,458.667,0z M149.333,448h-128V21.333h128V448z M298.667,448 h-128V21.333h128V448z M448,448H320V21.333h128V448z"/></svg>',
                                'mode'            => 'preview',
                                'align'           => 'full',
                                'keywords'        => [ 'kontainer', 'container' ],
                            ] );

    }

    add_action( 'acf/init', 'id_sk_gov_register_block_container' );

    // container open
    function render_callback_container_open ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-container/template/tmp-block-container', 'open' );
    }

    // container close
    function render_callback_container_close ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-container/template/tmp-block-container', 'close' );
    }

    function block_init_assets_container () {
        wp_enqueue_style( 'block_init_container', get_theme_file_uri( '/blocks/block-container/template/style.css' ) );
    }

    add_action( 'enqueue_block_editor_assets', 'block_init_assets_container' );