<?php

include('inc/custom-shortcodes.php');
include 'inc/frontend.php';
include 'inc/block-editor-adjustments.php';

    //add_action('get_header', 'korona_filter_head');
    //
    //function korona_filter_head() {
    //    remove_action('wp_head', '_admin_bar_bump_cb');
    //}

    /**
     * Register and Enqueue Styles.
     */
    function korona_register_styles () {

        $theme_version = wp_get_theme()->get( 'Version' );

        wp_enqueue_style( 'korona-style', get_stylesheet_uri(), array (), $theme_version );
        //	wp_style_add_data( 'twentytwenty-style', 'rtl', 'replace' );
        //
        //	// Add output of Customizer settings as inline style.
        //	wp_add_inline_style( 'twentytwenty-style', twentytwenty_get_customizer_css( 'front-end' ) );
        //
        //	// Add print CSS.
        //	wp_enqueue_style( 'twentytwenty-print-style', get_template_directory_uri() . '/print.css', null, $theme_version, 'print' );
        wp_enqueue_style( 'korona-leaflet', '/wp-content/themes/korona/assets/css/leaflet.css', null, $theme_version );
        wp_enqueue_style( 'govuk-finder', '/wp-content/themes/korona/assets/css/govuk-finder.css', null, $theme_version );
        wp_enqueue_style( 'search-form', '/wp-content/themes/korona/assets/css/search-form.css', null, $theme_version );
        wp_enqueue_style( 'feedbackbar', '/wp-content/themes/korona/assets/css/feedbackbar.css', null, $theme_version );

        // Load webfonts
        wp_enqueue_style( 'id-sk-fonts', get_stylesheet_directory_uri().'/assets/fonts/fonts.css', null, $theme_version );
    }

    add_action( 'wp_enqueue_scripts', 'korona_register_styles' );

    /**
     * Register and Enqueue Scripts.
     */
    function korona_register_scripts () {

        $theme_version = wp_get_theme()->get( 'Version' );

        wp_enqueue_script( 'korona-js', '/wp-content/themes/korona/assets/js/index.js', array (), $theme_version, TRUE );
        wp_enqueue_script( 'korona-js-autocomplete', '/wp-content/themes/korona/assets/js/autocomplete.js', array (), $theme_version, TRUE );
        wp_enqueue_script( 'korona-js-upsvr-emails', '/wp-content/themes/korona/assets/js/upsvr-emails.js', array (), $theme_version, TRUE );
        wp_enqueue_script( 'korona-js-lang-picker', '/wp-content/themes/korona/assets/js/lang-picker.js', array (), $theme_version, TRUE );
        wp_enqueue_script( 'korona-js-esri', '/wp-content/themes/korona/assets/js/slovakia_esri_epsg_4326.js', array (), $theme_version, TRUE );
        wp_enqueue_script( 'korona-js-d3', '/wp-content/themes/korona/assets/js/d3.js', array (), $theme_version, TRUE );
        wp_enqueue_script( 'korona-js-leaflet', '/wp-content/themes/korona/assets/js/leaflet.js', array (), $theme_version, TRUE );
        wp_enqueue_script( 'korona-js-boundarycanvas', '/wp-content/themes/korona/assets/js/boundarycanvas.js', array (), $theme_version, TRUE );
        wp_enqueue_script( 'korona-js-driveinmap', '/wp-content/themes/korona/assets/js/driveinmap.js', array (), $theme_version, TRUE );
    }

    add_action( 'wp_enqueue_scripts', 'korona_register_scripts' );

    add_theme_support( 'title-tag' );
    // Add backend styles for Gutenberg.
    add_action('enqueue_block_editor_assets', 'gutenberg_editor_assets');

    function gutenberg_editor_assets() {
        // Load the theme styles within Gutenberg.
        wp_enqueue_style('my-gutenberg-editor-styles', '/wp-content/themes/korona/assets/css/gutenberg-editor-styles.css', FALSE);
    }
    /**
     * get values of meta boxes
     *
     * @param $value
     * @return bool|mixed|string
     */

    function gov_back_button_get_meta ( $value ) {
        global $post;

        $field = get_post_meta( $post->ID, $value, TRUE );
        if ( !empty( $field ) ) {
            return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
        } else {
            return FALSE;
        }
    }

    /**
     * add metaboxes
     */

    function gov_back_button_add_meta_box () {
        add_meta_box(
            'gov_back_button',
            __( 'Tlačidlo späť', 'gov_back_button' ),
            'gov_back_button_html',
            'page',
            'normal',
            'high'
        );
    }

    add_action( 'add_meta_boxes', 'gov_back_button_add_meta_box' );

    /**
     * display metaboxes
     *
     * @param $post
     */
    function gov_back_button_html ( $post ) {
        wp_nonce_field( '_gov_back_button_nonce', 'gov_back_button_nonce' ); ?>

        <p>
            <label for="gov_back_button_text"><?php _e( 'Text pre tlačidlo späť', 'gov_back_button' ); ?></label>
            <input type="text" name="gov_back_button_text" id="gov_back_button_text"
                   value="<?php echo gov_back_button_get_meta( 'gov_back_button_text' ); ?>">
        </p>
        <p>
        <label for="gov_back_button_url"><?php _e( 'URL pre tlačidlo späť (ak ostane prázdne, späť sa nezobrazí)', 'gov_back_button' ); ?></label>
        <input type="text" name="gov_back_button_url" id="gov_back_button_url"
               value="<?php echo gov_back_button_get_meta( 'gov_back_button_url' ); ?>">
        </p><?php
    }

    /**
     * save metaboxes
     *
     * @param $post_id
     */
    function gov_back_button_save ( $post_id ) {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return;
        if ( !isset( $_POST['gov_back_button_nonce'] ) || !wp_verify_nonce( $_POST['gov_back_button_nonce'], '_gov_back_button_nonce' ) )
            return;
        if ( !current_user_can( 'edit_post', $post_id ) )
            return;

        if ( isset( $_POST['gov_back_button_text'] ) )
            update_post_meta( $post_id, 'gov_back_button_text', esc_attr( $_POST['gov_back_button_text'] ) );
        if ( isset( $_POST['gov_back_button_url'] ) )
            update_post_meta( $post_id, 'gov_back_button_url', esc_attr( $_POST['gov_back_button_url'] ) );
    }

    add_action( 'save_post', 'gov_back_button_save' );

    /**
     * Block, ACF functions
     */
    require get_template_directory() . '/inc/register-blocks.php';
    require get_template_directory() . '/inc/acf-settings.php';

    function wpb_custom_new_menu() {
        register_nav_menus(
            array(
                'primary_menu' => __( 'Primary menu' ),
                'footer-menu' => __( 'Footer menu' )
            )
        );
    }
    add_action( 'init', 'wpb_custom_new_menu' );

    function add_classes_on_li($classes, $item, $args) {
        $classes[] = 'idsk-header__navigation-item';
        return $classes;
    }
    add_filter('nav_menu_css_class','add_classes_on_li',1,3);

    function add_menuclass($ulclass) {
        return preg_replace('/<a /', '<a class="idsk-header__link"', $ulclass);
    }
    add_filter('wp_nav_menu','add_menuclass');

    remove_filter('widget_text_content', 'wpautop');

    if ( function_exists('register_sidebar') ) {
        register_sidebar(array(
                'name' => 'Footer widget first',
                'id' => 'sidebar-1',
                'before_widget' => '<span class="idsk-footer__licence-description">',
                'after_widget' => '</span>',
                'before_title' => '',
                'after_title' => '',
            )
        );
        register_sidebar(array(
                'name' => 'Footer widget second',
                'id' => 'sidebar-2',
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '',
                'after_title' => '',
            )
        );
    }
// Register Custom Post Type
function korona_post_type() {

    $labels = array(
        'name'                  => _x( 'Aktuality inštitúcií', 'Post Type General Name', 'gov' ),
        'singular_name'         => _x( 'Aktuality inštitúcií', 'Post Type Singular Name', 'gov' ),
        'menu_name'             => __( 'Aktuality inštitúcií', 'gov' ),
        'name_admin_bar'        => __( 'Aktuality inštitúcií', 'gov' ),
        'all_items'             => __( 'Zobraziť všetky', 'gov' ),
        'add_new_item'          => __( 'Pridať nový', 'gov' ),
        'add_new'               => __( 'Pridať nový', 'gov' ),
        'new_item'              => __( 'Pridať nový', 'gov' ),
        'edit_item'             => __( 'Editovať', 'gov' ),
        'update_item'           => __( 'Aktualizovať', 'gov' ),
        'view_item'             => __( 'Zobraziť', 'gov' ),
        'view_items'            => __( 'Zobraziť', 'gov' ),
        'search_items'          => __( 'Hľadať', 'gov' ),
        'not_found'             => __( 'Nenájdený', 'gov' ),
        'not_found_in_trash'    => __( 'Nenájdený v koši', 'gov' ),
        'featured_image'        => __( 'Obrázok', 'gov' ),
        'set_featured_image'    => __( 'Vložiť obrázok', 'gov' ),
        'remove_featured_image' => __( 'Vymazať obrázok', 'gov' ),
        'use_featured_image'    => __( 'Použiť obrázok', 'gov' ),
    );
    $args = array(
        'label'                 => __( 'Aktuality inštitúcií', 'gov' ),
        'description'           => __( 'Aktuality inštitúcií', 'gov' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', 'post-formats' ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-format-aside',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => false,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'aktuality_institucii', $args );

    }
    add_action( 'init', 'korona_post_type', 0 );

// Register Custom Taxonomy
function korona_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Kategórie aktualít', 'Taxonomy General Name', 'gov' ),
        'singular_name'              => _x( 'Kategórie', 'Taxonomy Singular Name', 'gov' ),
        'menu_name'                  => __( 'Kategórie aktualít', 'gov' ),
        'all_items'                  => __( 'Zobraziť všetky', 'gov' ),
        'new_item_name'              => __( 'Názov', 'gov' ),
        'add_new_item'               => __( 'Pridať nový', 'gov' ),
        'edit_item'                  => __( 'Upraviť', 'gov' ),
        'update_item'                => __( 'Aktualizovať', 'gov' ),
        'view_item'                  => __( 'Zobraziť', 'gov' ),
        'add_or_remove_items'        => __( 'Pridať alebo zmazať', 'gov' ),
        'search_items'               => __( 'Vyhľadať', 'gov' ),
        'not_found'                  => __( 'Nenájdený', 'gov' ),
        'no_terms'                   => __( 'Nenájdený', 'gov' ),
        'items_list'                 => __( 'Zoznam', 'gov' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => false,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
    );
    register_taxonomy( 'kategorie_aktuality_institucii', array( 'aktuality_institucii' ), $args );

    }
    add_action( 'init', 'korona_taxonomy', 0 );
