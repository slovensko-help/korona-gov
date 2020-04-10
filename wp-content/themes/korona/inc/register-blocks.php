<?php

    /**
     * new category of blocks
     *
     * @param $categories
     * @param $post
     * @return array
     */
    function gov_page_block_category ( $categories, $post ) {
        return array_reverse(array_merge(
            $categories,
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

        // return $toolbars - IMPORTANT!
        return $toolbars;
    }
    add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );