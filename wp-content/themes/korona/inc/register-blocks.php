<?php

    /**
     * Allowed Gutenberg blocks
     *
     * @param $allowed_blocks
     * @return array
     */
    function allowed_block_types( $allowed_blocks ) {

        return array(
            'core/html',
            'core/paragraph',
            'core/spacer',
            'core/separator',
            'core/shortcode',
            'core/freeform',
            'acf/section-accordion-open',
            'acf/section-accordion-open-body',
            'acf/section-accordion-close',
            'acf/section-accordion-close-body',
            'acf/section-tab-open',
            'acf/section-tab-section-open',
            'acf/section-tab-section-close',
            'acf/section-tab-close',
            'acf/section-announce',
            'acf/section-button',
            'acf/section-heading',
            'acf/section-hidden',
            'acf/section-lists',
            'acf/section-inset',
            'acf/section-row-open',
            'acf/section-row-close',
            'acf/section-col-open',
            'acf/section-col-close',
            'acf/section-container-open',
            'acf/section-container-close',
            'acf/section-news',
        );

    }

    add_filter( 'allowed_block_types', 'allowed_block_types' );

    /**
     * new category of blocks
     *
     * @param $categories
     * @param $post
     * @return array
     */
    function gov_page_block_category ( $categories, $post ) {
        return array_reverse(array_merge(
             array (
                 array (
                     'slug'  => 'gov-blocks-container',
                     'title' => __( 'GOV ID-SK kontajner', 'gov' ),
                 ),
             ),
            $categories,
            array (
                array (
                    'slug'  => 'gov-blocks-grid',
                    'title' => __( 'GOV ID-SK rozloženie stránky', 'gov' ),
                ),
            ),
            array (
                array (
                    'slug'  => 'gov-blocks-tabs',
                    'title' => __( 'GOV ID-SK tab element', 'gov' ),
                ),
            ),
            array(
                array(
                    'slug' => 'gov-blocks-accordion',
                    'title' => __( 'GOV ID-SK accordion', 'gov' ),
                ),
            ),
            array (
                array (
                    'slug'  => 'gov-blocks',
                    'title' => __( 'GOV ID-SK bloky', 'gov' ),
                ),
            )
        ));
    }

    add_filter( 'block_categories', 'gov_page_block_category', 10, 2 );

    /**
     * Register ACF blocks
     */

    //require get_template_directory() . '/blocks/block-example/block.php';
    //require get_template_directory() . '/blocks/block-images/block.php';
    require get_template_directory() . '/blocks/block-accordion/block.php';
    require get_template_directory() . '/blocks/block-heading/block.php';
    require get_template_directory() . '/blocks/block-announce/block.php';
    require get_template_directory() . '/blocks/block-inset/block.php';
    require get_template_directory() . '/blocks/block-hidden/block.php';
    require get_template_directory() . '/blocks/block-button/block.php';
    require get_template_directory() . '/blocks/block-lists/block.php';
    require get_template_directory() . '/blocks/block-tab/block.php';
    require get_template_directory() . '/blocks/block-grid/block.php';
    require get_template_directory() . '/blocks/block-container/block.php';
    require get_template_directory() . '/blocks/block-news/block.php';


    /**
     * Light editor toolbar
     *
     * @param $toolbars
     * @return mixed
     */
    function my_toolbars( $toolbars )
    {
        $toolbars['ID-GOV Toolbar' ] = array();
        $toolbars['ID-GOV Toolbar' ][1] = array( 'bold' , 'italic' , 'underline', 'link' );

        return $toolbars;
    }
    add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
