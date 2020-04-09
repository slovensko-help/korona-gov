<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    include_once 'acf-block.php';

    function gov_register_block_accordion () {
        if ( !function_exists( 'acf_register_block' ) ) {
            return;
        }

        acf_register_block( [
            'name'            => 'section-accordion-open',
            'title'           => __( 'Otvorenie accordionu hlavná časť', 'gov' ),
            'description'     => __( 'Otvorenie accordionu hlavná časť, vždy sa ukladá na prvé miesto pri skladaní accordionu.', 'gov' ),
            'render_callback' => 'render_callback_accordion',
            'category'        => 'gov-blocks-accordion',
            'icon'            => 'format-aside',
            'mode'            => 'preview',
            'align'           => 'full',
            'keywords'        => [ 'accordion' ],
            'example' => []
        ] );

        acf_register_block( [
            'name'            => 'section-accordion-close',
            'title'           => __( 'Zatvorenie accordionu hlavná časť', 'gov' ),
            'description'     => __( 'Otvorenie accordionu hlavná časť, vždy sa ukladá na posledné miesto pri skladaní accordionu.', 'gov' ),
            'render_callback' => 'render_callback_accordion_close',
            'category'        => 'gov-blocks-accordion',
            'icon'            => 'format-aside',
            'mode'            => 'preview',
            'align'           => 'full',
            'keywords'        => [ 'accordion' ],
            'example' => []
        ] );

        acf_register_block( [
            'name'            => 'section-accordion-open-body',
            'title'           => __( 'Otvorenie a hlavička accordionu v hlavnej časti', 'gov' ),
            'description'     => __( 'Otvorenie a hlavička accordionu v hlavnej časti.', 'gov' ),
            'render_callback' => 'render_callback_accordion_open_body',
            'category'        => 'gov-blocks-accordion',
            'icon'            => 'format-aside',
            'mode'            => 'preview',
            'align'           => 'full',
            'keywords'        => [ 'accordion' ],
            'example' => []
        ] );

        acf_register_block( [
            'name'            => 'section-accordion-close-body',
            'title'           => __( 'Zatvorenie accordionu v hlavnej časti', 'gov' ),
            'description'     => __( 'Zatvorenie accordionu v hlavnej časti.', 'gov' ),
            'render_callback' => 'render_callback_accordion_close_body',
            'category'        => 'gov-blocks-accordion',
            'icon'            => 'format-aside',
            'mode'            => 'preview',
            'align'           => 'full',
            'keywords'        => [ 'accordion' ],
            'example' => []
        ] );
    }

    add_action( 'acf/init', 'gov_register_block_accordion' );

    function render_callback_accordion ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-accordion/template/tmp', 'open' );
    }

    function render_callback_accordion_close ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-accordion/template/tmp', 'close' );
    }

    function render_callback_accordion_open_body ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-accordion/template/tmp', 'bopen' );
    }

    function render_callback_accordion_close_body ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-accordion/template/tmp', 'bclose' );
    }

    function block_init_assets_accordion () {
        wp_enqueue_style( 'block_init_accordion', get_theme_file_uri( '/blocks/block-accordion/template/style.css' ) );
    }

    add_action( 'enqueue_block_editor_assets', 'block_init_assets_accordion' );