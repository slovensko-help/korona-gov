<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_id  = $block['id'];

    if( have_rows( 'news' ) ) {

        while( have_rows( 'news' ) ) : the_row();
            $date = get_sub_field( 'date' );
            $owner = get_sub_field( 'owner' );
            $title = get_sub_field( 'title' );
            $link = get_sub_field( 'link' );
            ?>
            <div class="news-list">
                <p class="govuk-body-s govuk-!-margin-bottom-0">13. apríla 2020 | Ministerstvo zdravotníctva SR</p>
                <h3 class="govuk-heading-m"><a href="#">Sociálna poisťovňa úpravou webu pomáah žiadateľom o dávky Web dosiahol takmer 2 mil. návštev.</a></h3>
            </div>
            <?php
        endwhile;
    ?>

<?php } else { ?>
    <h2>Začnite pridaním noviniek</h2>
<?php } ?>
