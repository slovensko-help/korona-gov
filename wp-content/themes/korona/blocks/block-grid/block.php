<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    include_once 'acf-block.php';

    function id_sk_gov_register_block_grid () {
        if ( !function_exists( 'acf_register_block' ) ) {
            return;
        }

        //section-row-open
        acf_register_block( [
                                'name'            => 'section-row-open',
                                'title'           => __( '1. Row začiatok', 'id_sk_gov' ),
                                'description'     => __( 'Otvorenie Row bloku', 'id_sk_gov' ),
                                'render_callback' => 'render_callback_row_open',
                                'category'        => 'gov-blocks-grid',
                                'icon'            => '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><circle cx="99" cy="256" r="20"/><circle cx="99" cy="492" r="20"/><circle cx="178" cy="492" r="20"/><circle cx="178" cy="256" r="20"/><circle cx="256" cy="412" r="20"/><circle cx="256" cy="492" r="20"/><circle cx="20" cy="178" r="20"/><circle cx="20" cy="492" r="20"/><circle cx="20" cy="412" r="20"/><path d="M20,40h472c11.046,0,20-8.954,20-20s-8.954-20-20-20H20C8.954,0,0,8.954,0,20S8.954,40,20,40z"/><circle cx="20" cy="256" r="20"/><circle cx="256" cy="334" r="20"/><circle cx="20" cy="334" r="20"/><circle cx="20" cy="100" r="20"/><circle cx="492" cy="256" r="20"/><circle cx="492" cy="334" r="20"/><circle cx="256" cy="256" r="20"/><circle cx="492" cy="100" r="20"/><circle cx="492" cy="178" r="20"/><circle cx="492" cy="492" r="20"/><circle cx="492" cy="412" r="20"/><circle cx="413" cy="256" r="20"/><circle cx="256" cy="178" r="20"/><circle cx="334" cy="492" r="20"/><circle cx="256" cy="100" r="20"/><circle cx="334" cy="256" r="20"/><circle cx="413" cy="492" r="20"/></svg>',
                                'mode'            => 'preview',
                                'align'           => 'full',
                                'keywords'        => [ 'grid', 'row otvorenie' ],
                            ] );

        //section-row-close
        acf_register_block( [
                                'name'            => 'section-row-close',
                                'title'           => __( '4. Row koniec', 'id_sk_gov' ),
                                'description'     => __( 'Ukončenie Row bloku', 'id_sk_gov' ),
                                'render_callback' => 'render_callback_row_close',
                                'category'        => 'gov-blocks-grid',
                                'icon'            => '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><circle cx="256" cy="100" r="20"/><circle cx="256" cy="178" r="20"/><circle cx="256" cy="256" r="20"/><circle cx="178" cy="20" r="20"/><circle cx="256" cy="412" r="20"/><circle cx="256" cy="334" r="20"/><circle cx="413" cy="256" r="20"/><circle cx="178" cy="256" r="20"/><circle cx="413" cy="20" r="20"/><circle cx="492" cy="20" r="20"/><circle cx="334" cy="20" r="20"/><circle cx="256" cy="20" r="20"/><circle cx="334" cy="256" r="20"/><circle cx="492" cy="334" r="20"/><circle cx="492" cy="412" r="20"/><path d="M492,472H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h472c11.046,0,20-8.954,20-20 C512,480.954,503.046,472,492,472z"/><circle cx="492" cy="256" r="20"/><circle cx="492" cy="100" r="20"/><circle cx="20" cy="412" r="20"/><circle cx="99" cy="20" r="20"/><circle cx="492" cy="178" r="20"/><circle cx="20" cy="334" r="20"/><circle cx="20" cy="100" r="20"/><circle cx="99" cy="256" r="20"/><circle cx="20" cy="20" r="20"/><circle cx="20" cy="178" r="20"/><circle cx="20" cy="256" r="20"/></svg>',
                                'mode'            => 'preview',
                                'align'           => 'full',
                                'keywords'        => [ 'grid', 'row ukoncenie' ],
                            ] );

        //section-col-open
        acf_register_block( [
                                'name'            => 'section-col-open',
                                'title'           => __( '2. Col sekcia otvorenie', 'id_sk_gov' ),
                                'description'     => __( 'Otvorenie bloku s Col', 'id_sk_gov' ),
                                'render_callback' => 'render_callback_col_open',
                                'category'        => 'gov-blocks-grid',
                                'icon'            => '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><circle cx="20" cy="20" r="20"/><circle cx="20" cy="178" r="20"/><circle cx="20" cy="100" r="20"/><circle cx="20" cy="492" r="20"/><circle cx="20" cy="412" r="20"/><circle cx="492" cy="20" r="20"/><circle cx="178" cy="20" r="20"/><circle cx="413" cy="20" r="20"/><circle cx="20" cy="334" r="20"/><circle cx="334" cy="20" r="20"/><circle cx="98" cy="20" r="20"/><path d="M492,236H276V20c0-11.046-8.954-20-20-20s-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h216 v216c0,11.046,8.954,20,20,20c11.046,0,20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/><circle cx="492" cy="334" r="20"/><circle cx="492" cy="100" r="20"/><circle cx="98" cy="492" r="20"/><circle cx="492" cy="412" r="20"/><circle cx="492" cy="178" r="20"/><circle cx="178" cy="492" r="20"/><circle cx="334" cy="492" r="20"/><circle cx="413" cy="492" r="20"/><circle cx="492" cy="492" r="20"/></svg>',
                                'mode'            => 'preview',
                                'align'           => 'full',
                                'keywords'        => [ 'grid', 'col otvorenie' ],
                            ] );

        //section-col-close
        acf_register_block( [
                                'name'            => 'section-col-close',
                                'title'           => __( '3. Col sekcia ukončenie', 'id_sk_gov' ),
                                'description'     => __( 'Ukončenie bloku s Col', 'id_sk_gov' ),
                                'render_callback' => 'render_callback_col_close',
                                'category'        => 'gov-blocks-grid',
                                'icon'            => '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><circle cx="20" cy="20" r="20"/><circle cx="20" cy="178" r="20"/><circle cx="20" cy="100" r="20"/><circle cx="20" cy="492" r="20"/><circle cx="20" cy="412" r="20"/><circle cx="492" cy="20" r="20"/><circle cx="178" cy="20" r="20"/><circle cx="413" cy="20" r="20"/><circle cx="20" cy="334" r="20"/><circle cx="334" cy="20" r="20"/><circle cx="98" cy="20" r="20"/><path d="M492,236H276V20c0-11.046-8.954-20-20-20s-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h216 v216c0,11.046,8.954,20,20,20c11.046,0,20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/><circle cx="492" cy="334" r="20"/><circle cx="492" cy="100" r="20"/><circle cx="98" cy="492" r="20"/><circle cx="492" cy="412" r="20"/><circle cx="492" cy="178" r="20"/><circle cx="178" cy="492" r="20"/><circle cx="334" cy="492" r="20"/><circle cx="413" cy="492" r="20"/><circle cx="492" cy="492" r="20"/></svg>',
                                'mode'            => 'preview',
                                'align'           => 'full',
                                'keywords'        => [ 'grid', 'col ukoncenie' ],
                            ] );

    }

    add_action( 'acf/init', 'id_sk_gov_register_block_grid' );

    // row open
    function render_callback_row_open ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-grid/template/tmp-block-row', 'open' );
    }

    // row close
    function render_callback_row_close ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-grid/template/tmp-block-row', 'close' );
    }

    // col close
    function render_callback_col_close ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-grid/template/tmp-block-col', 'close' );
    }

    // col open
    function render_callback_col_open ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-grid/template/tmp-block-col', 'open' );
    }

    function block_init_assets_grid () {
        wp_enqueue_style( 'block_init_grid', get_theme_file_uri( '/blocks/block-grid/template/style.css' ) );
    }

    add_action( 'enqueue_block_editor_assets', 'block_init_assets_grid' );