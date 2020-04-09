<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    include_once 'acf-block.php';

    function gov_register_block_hidden () {
        if ( !function_exists( 'acf_register_block' ) ) {
            return;
        }

        //example block
        acf_register_block( [
                                'name'            => 'section-hidden',
                                'title'           => __( 'Skrytý text', 'gov' ),
                                'description'     => __( 'Skrytý text (zobrazenie na požiadanie)', 'gov' ),
                                'render_callback' => 'render_callback_hidden',
                                'category'        => 'gov-blocks',
                                'icon'            => '<svg viewBox="0 0 512 512.00002" xmlns="http://www.w3.org/2000/svg"><path d="m511.984375 94.496094v-94.496094h-94.496094v30.5h-322.992187v-30.5h-94.496094v94.496094h30.5v197.984375h-30.5v94.5h94.496094v-32.988281h146.496094v100.582031l-25.773438-25.773438-21.214844 21.210938 61.988282 61.988281 61.988281-61.988281-21.210938-21.210938-25.777343 25.773438v-100.582031h146.496093v32.988281h94.496094v-94.5h-30.496094v-197.984375zm-481.984375-29.996094v-34.5h34.5v34.5zm34.5 292.480469h-34.5v-34.5h34.5zm352.988281-32.988281h-146.496093v-91.367188l25.777343 25.773438 21.210938-21.210938-61.988281-61.988281-61.988282 61.988281 21.214844 21.210938 25.773438-25.773438v91.367188h-146.496094v-31.511719h-33.996094v-197.984375h33.996094v-33.996094h322.992187v33.996094h34v197.984375h-34zm64.5-1.511719v34.5h-34.5v-34.5zm-34.5-257.980469v-34.5h34.5v34.5zm0 0"/></svg>',
                                'mode'            => 'preview',
                                'align'           => 'full',
                                'keywords'        => [ 'Skrytý text' ],
                            ] );

    }

    add_action( 'acf/init', 'gov_register_block_hidden' );

    function render_callback_hidden ( $block ) {
        set_query_var( 'block', $block );
        get_template_part( '/blocks/block-hidden/template/tmp', 'block' );
    }

    function block_init_assets_hidden () {
        wp_enqueue_style( 'block_init_hidden', get_theme_file_uri( '/blocks/block-hidden/template/style.css' ) );
    }

    add_action( 'enqueue_block_editor_assets', 'block_init_assets_hidden' );