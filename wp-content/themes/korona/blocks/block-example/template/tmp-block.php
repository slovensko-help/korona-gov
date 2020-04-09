<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_id  = $block['id'];

    $block_settings = get_block_settings( $block_id, 'pb-7 pb-lg-11 pt-10' );

    $className = ' section-text';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block['className'];
    }
    if ( !empty( $block['align'] ) ) {
        $className .= ' align-' . $block['align'];
    }

    if( get_field( 'text-content' ) ) {

    ?>

    <section id="<?php echo $block_id ?>" class="<?php echo esc_attr( $block_settings['section_class'] ); ?> section <?php echo esc_attr( $className ) ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <h1 class="text-center weight-ultra green-underline section-title"><?php echo esc_html( $block_settings['title'] ) ?></h1>
                    <p class="text-center">
                        <?php echo esc_html( get_field( 'text-content' ) ); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

<?php } else { ?>
    <h2>Začnite editovať obsah</h2>
<?php } ?>
