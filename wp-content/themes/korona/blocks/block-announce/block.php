<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    include_once 'acf-block.php';

    function gov_register_block_announce () {
        if ( !function_exists( 'acf_register_block' ) ) {
            return;
        }

        //announce block
        acf_register_block( [
            'name'            => 'section-announce',
            'title'           => __( 'Upozornenie', 'gov' ),
            'description'     => __( 'Blok pre dôležitý oznam', 'gov' ),
            'render_callback' => 'render_callback_announce',
            'category'        => 'gov-blocks',
            'icon'            => 'format-aside',
            'mode'            => 'preview',
            'align'           => 'full',
            'keywords'        => [ 'announce' ],
            'example' => []
        ] );

    }

    add_action( 'acf/init', 'gov_register_block_announce' );

    function render_callback_announce ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-announce/template/tmp', 'block' );
    }

    function block_init_assets_announce () {
        wp_enqueue_style( 'block_init_announce', get_theme_file_uri( '/blocks/block-announce/template/style.css' ) );
    }

    add_action( 'enqueue_block_editor_assets', 'block_init_assets_announce' );