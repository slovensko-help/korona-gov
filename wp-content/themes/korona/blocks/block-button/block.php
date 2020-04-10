<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    include_once 'acf-block.php';

    function gov_register_block_button () {
        if ( !function_exists( 'acf_register_block' ) ) {
            return;
        }

        //button block
        acf_register_block( [
                                'name'            => 'section-button',
                                'title'           => __( 'Tlačidlo s odkazom', 'gov' ),
                                'description'     => __( 'Tlačidlo s odkazom', 'gov' ),
                                'render_callback' => 'render_callback_button',
                                'category'        => 'gov-blocks',
                                'icon'            => 'admin-links',
                                'mode'            => 'preview',
                                'align'           => 'full',
                                'keywords'        => [ 'tlačidlo', 'link' ],
                            ] );

    }

    add_action( 'acf/init', 'gov_register_block_button' );

    function render_callback_button ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-button/template/tmp', 'block' );
    }

    function block_init_assets_button () {
        wp_enqueue_style( 'block_init_button', get_theme_file_uri( '/blocks/block-button/template/style.css' ) );
    }

    add_action( 'enqueue_block_editor_assets', 'block_init_assets_button' );