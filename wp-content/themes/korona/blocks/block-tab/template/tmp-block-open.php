<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_id  = $block['id'];

    if( have_rows( 'tabs_list' ) ) {

    ?>

<div class="govuk-tabs" data-module="govuk-tabs">
    <?php
        if( !is_admin() ) :
    ?>
        <h2 class="govuk-tabs__title">
            Contents
        </h2>
    <?php
        endif;

        echo '<ul class="govuk-tabs__list">';
        $it = 0;
        while( have_rows( 'tabs_list' ) ) : the_row();
            $list_id = sanitize_title( get_sub_field( 'list_id' ) );
            ?>
            <li class="govuk-tabs__list-item<?php echo $it == 0 ? ' govuk-tabs__list-item--selected' : ''; ?>">
                <a class="govuk-tabs__tab" href="#<?php echo $list_id; ?>">
                    <?php echo get_sub_field( 'list_name' ); ?>
                </a>
                <?php
                    if( is_admin() ) {
                        echo '<br>';
                        echo '(TAB) <span>ID: <code>' . $list_id . '</code></span><br><a href="#' . $list_id . '">obsah</a>';
                    }
                ?>
            </li>
            <?php
        endwhile;
        echo '</ul>';
    ?>

<?php } else { ?>
    <h2>Začnite editovať zoznam tabov</h2>
<?php } ?>
