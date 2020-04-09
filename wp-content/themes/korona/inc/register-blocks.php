<?php

    /**
     * new category of blocks
     *
     * @param $categories
     * @param $post
     * @return array
     */
    function gov_page_block_category( $categories, $post ) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'gov-blocks',
                    'title' => __( 'GOV ID-SK bloky', 'gov' ),
                ),
            )
        );
    }
    add_filter( 'block_categories', 'gov_page_block_category', 10, 2);

    /**
     * Register ACF blocks
     */
    //require get_template_directory() . '/blocks/block-example/block.php'; //example