<?php
include 'inc/frontend.php';


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
    }

    add_action( 'wp_enqueue_scripts', 'korona_register_scripts' );

    add_theme_support( 'title-tag' );

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
     * Block functions
     */
    require get_template_directory() . '/inc/register-blocks.php';
