<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    include_once 'acf-block.php';

    function id_sk_gov_register_block_tab () {
        if ( !function_exists( 'acf_register_block' ) ) {
            return;
        }

        //tab-open block
        acf_register_block( [
                                'name'            => 'section-tab-open',
                                'title'           => __( 'Tab - Otvorenie + zoznam', 'id_sk_gov' ),
                                'description'     => __( 'Tab element zoznam tabov', 'id_sk_gov' ),
                                'render_callback' => 'render_callback_tab_open',
                                'category'        => 'gov-blocks-tabs',
                                'icon'            => '<svg viewBox="0 -20 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m465 81.433594v-21.433594c0-33.085938-26.914062-60-60-60h-345c-33.085938 0-60 26.914062-60 60v352c0 33.085938 26.914062 60 60 60h392c33.085938 0 60-26.914062 60-60v-272c0-28.617188-20.148438-52.609375-47-58.566406zm-40-21.433594v20h-90v-20c0-7.011719-1.21875-13.738281-3.441406-20h73.441406c11.027344 0 20 8.972656 20 20zm-150-20c11.027344 0 20 8.972656 20 20v20h-91v-20c0-7.011719-1.21875-13.738281-3.441406-20zm197 372c0 11.027344-8.972656 20-20 20h-392c-11.027344 0-20-8.972656-20-20v-352c0-11.027344 8.972656-20 20-20h84c11.027344 0 20 8.972656 20 20v60h288c11.027344 0 20 8.972656 20 20zm0 0"/></svg>',
                                'mode'            => 'preview',
                                'align'           => 'full',
                                'keywords'        => [ 'zoznam tabov' ],
                            ] );

        //tab-section-open block
        acf_register_block( [
                                'name'            => 'section-tab-section-open',
                                'title'           => __( 'Tab - Sekcia otvorenie', 'id_sk_gov' ),
                                'description'     => __( 'Tab element obsah tabu otvorenie', 'id_sk_gov' ),
                                'render_callback' => 'render_callback_tab_section_open',
                                'category'        => 'gov-blocks-tabs',
                                'icon'            => '<svg viewBox="0 -20 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m465 81.433594v-21.433594c0-33.085938-26.914062-60-60-60h-345c-33.085938 0-60 26.914062-60 60v352c0 33.085938 26.914062 60 60 60h392c33.085938 0 60-26.914062 60-60v-272c0-28.617188-20.148438-52.609375-47-58.566406zm-40-21.433594v20h-90v-20c0-7.011719-1.21875-13.738281-3.441406-20h73.441406c11.027344 0 20 8.972656 20 20zm-150-20c11.027344 0 20 8.972656 20 20v20h-91v-20c0-7.011719-1.21875-13.738281-3.441406-20zm197 372c0 11.027344-8.972656 20-20 20h-392c-11.027344 0-20-8.972656-20-20v-352c0-11.027344 8.972656-20 20-20h84c11.027344 0 20 8.972656 20 20v60h288c11.027344 0 20 8.972656 20 20zm0 0"/></svg>',
                                'mode'            => 'preview',
                                'align'           => 'full',
                                'keywords'        => [ 'zoznam tabov' ],
                            ] );

        //tab-section-close block
        acf_register_block( [
                                'name'            => 'section-tab-section-close',
                                'title'           => __( 'Tab - Sekcia ukončenie', 'id_sk_gov' ),
                                'description'     => __( 'Tab element obsah tabou ukončenie', 'id_sk_gov' ),
                                'render_callback' => 'render_callback_tab_section_close',
                                'category'        => 'gov-blocks-tabs',
                                'icon'            => '<svg viewBox="0 -20 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m465 81.433594v-21.433594c0-33.085938-26.914062-60-60-60h-345c-33.085938 0-60 26.914062-60 60v352c0 33.085938 26.914062 60 60 60h392c33.085938 0 60-26.914062 60-60v-272c0-28.617188-20.148438-52.609375-47-58.566406zm-40-21.433594v20h-90v-20c0-7.011719-1.21875-13.738281-3.441406-20h73.441406c11.027344 0 20 8.972656 20 20zm-150-20c11.027344 0 20 8.972656 20 20v20h-91v-20c0-7.011719-1.21875-13.738281-3.441406-20zm197 372c0 11.027344-8.972656 20-20 20h-392c-11.027344 0-20-8.972656-20-20v-352c0-11.027344 8.972656-20 20-20h84c11.027344 0 20 8.972656 20 20v60h288c11.027344 0 20 8.972656 20 20zm0 0"/></svg>',
                                'mode'            => 'preview',
                                'align'           => 'full',
                                'keywords'        => [ 'zoznam tabov' ],
                            ] );

        //tab-open block
        acf_register_block( [
                                'name'            => 'section-tab-close',
                                'title'           => __( 'Tab - Ukončenie', 'id_sk_gov' ),
                                'description'     => __( 'Tab element ukončenie', 'id_sk_gov' ),
                                'render_callback' => 'render_callback_tab_close',
                                'category'        => 'gov-blocks-tabs',
                                'icon'            => '<svg viewBox="0 -20 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m465 81.433594v-21.433594c0-33.085938-26.914062-60-60-60h-345c-33.085938 0-60 26.914062-60 60v352c0 33.085938 26.914062 60 60 60h392c33.085938 0 60-26.914062 60-60v-272c0-28.617188-20.148438-52.609375-47-58.566406zm-40-21.433594v20h-90v-20c0-7.011719-1.21875-13.738281-3.441406-20h73.441406c11.027344 0 20 8.972656 20 20zm-150-20c11.027344 0 20 8.972656 20 20v20h-91v-20c0-7.011719-1.21875-13.738281-3.441406-20zm197 372c0 11.027344-8.972656 20-20 20h-392c-11.027344 0-20-8.972656-20-20v-352c0-11.027344 8.972656-20 20-20h84c11.027344 0 20 8.972656 20 20v60h288c11.027344 0 20 8.972656 20 20zm0 0"/></svg>',
                                'mode'            => 'preview',
                                'align'           => 'full',
                                'keywords'        => [ 'zoznam tabov' ],
                            ] );

    }

    add_action( 'acf/init', 'id_sk_gov_register_block_tab' );

    // templates
    // tab open
    function render_callback_tab_open ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-tab/template/tmp-block', 'open' );
    }

    // section open
    function render_callback_tab_section_open ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-tab/template/tmp-block-section', 'open' );
    }

    // section close
    function render_callback_tab_section_close ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-tab/template/tmp-block-section', 'close' );
    }

    // tab close
    function render_callback_tab_close ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-tab/template/tmp-block', 'close' );
    }

    // init assets
    function block_init_assets_tab () {
        wp_enqueue_style( 'block_init_tab', get_theme_file_uri( '/blocks/block-tab/template/style.css' ) );
    }
    add_action( 'enqueue_block_editor_assets', 'block_init_assets_tab' );