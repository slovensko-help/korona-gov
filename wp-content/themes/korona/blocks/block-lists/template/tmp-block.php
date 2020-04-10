<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_id = $block['id'];

    $attributes = [
            'br' => [],
            'a' => [
                    'href' => [],
                    'class' => [],
                    'id' => [],
                    'target' => [],
                    'rel' => [array()]
            ],
            'strong' => [],
            'em' => [],
            'span' => [
                    'style' => [ 'text-decoration' ],
            ],
    ];


    if ( have_rows( 'main_list_items' ) ) {

        //main list
        //bullet | number | alpha | none
        $main_list_type = get_field( 'main_list_type' );
        switch ( $main_list_type ) {
            case 'bullet';
                echo '<ul class="govuk-list govuk-list--bullet">';
                $onend = '</ul>';
                break;
            case 'number';
                echo '<ol class="govuk-list govuk-list--number">';
                $onend = '</ol>';
                break;
            case 'alpha';
                echo '<ol class="govuk-list govuk-list--alpha">';
                $onend = '</ol>';
                break;
            default :
                echo '<ul class="govuk-list">';
                $onend = '</ul>';
        }


        while ( have_rows( 'main_list_items' ) ) : the_row();
            echo '<li>';

            echo wp_kses( get_sub_field( 'list_main_text' ), $attributes );

            if ( $sub_type = get_sub_field( 'list_content' ) ) {
                $list_inner = get_sub_field( 'list_inner' );
                if ( !empty( $list_inner['list_items'] ) ) :
                    switch ( $list_inner['list_type'] ) {
                        case 'bullet';
                            echo '<ul class="govuk-list govuk-list--bullet">';
                            $onInnerEnd = '</ul>';
                            break;
                        case 'number';
                            echo '<ol class="govuk-list govuk-list--number">';
                            $onInnerEnd = '</ol>';
                            break;
                        case 'alpha';
                            echo '<ol class="govuk-list govuk-list--alpha">';
                            $onInnerEnd = '</ol>';
                            break;
                        default :
                            echo '<ul class="govuk-list">';
                            $onInnerEnd = '</ul>';
                    }
                    foreach ( $list_inner['list_items'] as $item ) :
                        echo '<li>';
                        echo wp_kses( $item['text'], $attributes );
                        echo '</li>';
                    endforeach;

                    echo $onInnerEnd;
                endif;

            }

            echo '</li>';
        endwhile;

        echo $onend;
        ?>


    <?php } else { ?>
        <h2>Začnite editovať obsah</h2>
    <?php } ?>
