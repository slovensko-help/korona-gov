<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $class = '';
    $block_id  = $block['id'];
    if( isset( $block['className'] ) && !empty( $block['className'] ) ) {
        $class = ' ' . $block['className'];
    }

    if( have_rows( 'news' ) ) {

        while( have_rows( 'news' ) ) : the_row();
            $date = get_sub_field( 'date' );
            $owner = get_sub_field( 'owner' );
            $title = get_sub_field( 'title' );
            $link = get_sub_field( 'link' );
            ?>
            <div class="news-list<?php echo $class; ?>">
                <p class="govuk-body-s govuk-!-margin-bottom-0"><?php echo esc_html( $date ); ?> | <?php echo esc_html( $owner ); ?></p>
                <h3 class="govuk-heading-m govuk-!-margin-bottom-9"><a class="govuk-link" href="<?php echo esc_url( $link ); ?>" target="_blank"><?php echo esc_html( $title ); ?></a></h3>
            </div>
            <?php
        endwhile;
    ?>

<?php } else { ?>
    <h2>Začnite pridaním noviniek</h2>
<?php } ?>
