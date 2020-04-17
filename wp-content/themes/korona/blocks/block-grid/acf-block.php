<?php

    if (!defined('ABSPATH')) {
        exit;
    }

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
                                      'key' => 'group_5e982ff530b6d',
                                      'title' => 'Grid - col',
                                      'fields' => array(
                                          array(
                                              'key' => 'field_5e9847892abb6',
                                              'label' => 'Inštrukcia',
                                              'name' => '',
                                              'type' => 'message',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'message' => '<ul>
<li>Každá možnosť pre Col (kolónku) je označená veľkosťou, ktorú bude zaberať z riadku.</li>
<li>Na jeden riadok sa umiestní práve toľko Col (kolóniek), koľko bude ich súčet 1, ďalšie sa umiestnia do nového riadku</li>
<li>V jednom riadku teda môžte takto vytvoriť rozloženie <code> 1/3 </code> + <code> 2/3 </code>, alebo <code> 1/2 </code> + <code> 1/2 </code>, alebo iné kombinácie, ktorých súčet je práve 1</li>
</ul>
<small>Nezabudnite Col (kolónky) elementy obaliť Row (riadok) elementom (jeden Row element môže obsahovať viac Col elementov). Taktiež nezabudnite Col elementy ukončiť.</small>',
                                              'new_lines' => 'wpautop',
                                              'esc_html' => 0,
                                          ),
                                          array(
                                              'key' => 'field_5e98300ff0118',
                                              'label' => 'Vyberte šírku bloku',
                                              'name' => 'grid_col_width',
                                              'type' => 'select',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '33',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'choices' => array(
                                                  'full' => '1',
                                                  'one-half' => '1/2',
                                                  'one-third' => '1/3',
                                                  'two-thirds' => '2/3',
                                                  'one-quarter' => '1/4',
                                              ),
                                              'default_value' => array(
                                                  0 => 'full',
                                              ),
                                              'allow_null' => 0,
                                              'multiple' => 0,
                                              'ui' => 1,
                                              'ajax' => 0,
                                              'return_format' => 'array',
                                              'placeholder' => '',
                                          ),
                                          array(
                                              'key' => 'field_5e98cdb63b707',
                                              'label' => 'Farba pozadia',
                                              'name' => 'col_background',
                                              'type' => 'select',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '33',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'choices' => array(
                                                  'no' => 'Bez pozadia',
                                                  'app-pane-blue' => 'Modrá + biele písmo',
                                                  'app-pane-lgray' => 'Svetlo šedá',
                                                  'app-pane-gray' => 'Šedá',
                                              ),
                                              'default_value' => array(
                                                  0 => 'no',
                                              ),
                                              'allow_null' => 0,
                                              'multiple' => 0,
                                              'ui' => 0,
                                              'return_format' => 'value',
                                              'ajax' => 0,
                                              'placeholder' => '',
                                          ),
                                          array(
                                              'key' => 'field_5e98cdd159c1e',
                                              'label' => 'Odsadenie',
                                              'name' => 'col_padding',
                                              'type' => 'select',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '33',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'choices' => array(
                                                  'no' => 'Bez odsadenia',
                                                  'govuk-!-padding-0' => '0px',
                                                  'govuk-!-padding-1' => '5px',
                                                  'govuk-!-padding-2' => '10px',
                                                  'govuk-!-padding-3' => '15px',
                                                  'govuk-!-padding-4' => '20px',
                                                  'govuk-!-padding-5' => '25px',
                                                  'govuk-!-padding-6' => '30px',
                                                  'govuk-!-padding-7' => '40px',
                                                  'govuk-!-padding-top-8' => '50px',
                                                  'govuk-!-padding-top-9' => '60px',
                                              ),
                                              'default_value' => array(
                                                  0 => 'no',
                                              ),
                                              'allow_null' => 0,
                                              'multiple' => 0,
                                              'ui' => 0,
                                              'return_format' => 'value',
                                              'ajax' => 0,
                                              'placeholder' => '',
                                          ),
                                      ),
                                      'location' => array(
                                          array(
                                              array(
                                                  'param' => 'block',
                                                  'operator' => '==',
                                                  'value' => 'acf/section-col-open',
                                              ),
                                          ),
                                      ),
                                      'menu_order' => 0,
                                      'position' => 'normal',
                                      'style' => 'default',
                                      'label_placement' => 'top',
                                      'instruction_placement' => 'label',
                                      'hide_on_screen' => '',
                                      'active' => true,
                                      'description' => '',
                                  ));

        acf_add_local_field_group(array(
                                      'key' => 'group_5e9936dac30e7',
                                      'title' => 'Grid - row',
                                      'fields' => array(
                                          array(
                                              'key' => 'field_5e99373c83016',
                                              'label' => 'Farba pozadia',
                                              'name' => 'row_background',
                                              'type' => 'select',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '33',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'choices' => array(
                                                  'no' => 'Bez pozadia',
                                                  'app-pane-blue' => 'Modrá + biele písmo',
                                                  'app-pane-lgray' => 'Svetlo šedá',
                                                  'app-pane-gray' => 'Šedá',
                                              ),
                                              'default_value' => array(
                                                  0 => 'no',
                                              ),
                                              'allow_null' => 0,
                                              'multiple' => 0,
                                              'ui' => 0,
                                              'return_format' => 'value',
                                              'ajax' => 0,
                                              'placeholder' => '',
                                          ),
                                          array(
                                              'key' => 'field_5e99370f82776',
                                              'label' => 'Vnútorné odsadenie - hore',
                                              'name' => 'row_padding_top',
                                              'type' => 'select',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '33',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'choices' => array(
                                                  'govuk-!-padding-top-0' => '0px',
                                                  'govuk-!-padding-top-1' => '5px',
                                                  'govuk-!-padding-top-2' => '10px',
                                                  'govuk-!-padding-top-3' => '15px',
                                                  'govuk-!-padding-top-4' => '20px',
                                                  'govuk-!-padding-top-5' => '25px',
                                                  'govuk-!-padding-top-6' => '30px',
                                                  'govuk-!-padding-top-7' => '40px',
                                                  'govuk-!-padding-top-8' => '50px',
                                                  'govuk-!-padding-top-9' => '60px',
                                              ),
                                              'default_value' => array(
                                                  0 => 'govuk-!-padding-top-0',
                                              ),
                                              'allow_null' => 0,
                                              'multiple' => 0,
                                              'ui' => 0,
                                              'return_format' => 'value',
                                              'ajax' => 0,
                                              'placeholder' => '',
                                          ),
                                          array(
                                              'key' => 'field_5e99371382777',
                                              'label' => 'Vnútorné odsadenie - dole',
                                              'name' => 'row_padding_bottom',
                                              'type' => 'select',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '33',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'choices' => array(
                                                  'govuk-!-padding-bottom-0' => '0px',
                                                  'govuk-!-padding-bottom-1' => '5px',
                                                  'govuk-!-padding-bottom-2' => '10px',
                                                  'govuk-!-padding-bottom-3' => '15px',
                                                  'govuk-!-padding-bottom-4' => '20px',
                                                  'govuk-!-padding-bottom-5' => '25px',
                                                  'govuk-!-padding-bottom-6' => '30px',
                                                  'govuk-!-padding-bottom-7' => '40px',
                                                  'govuk-!-padding-bottom-8' => '50px',
                                                  'govuk-!-padding-bottom-9' => '60px',
                                              ),
                                              'default_value' => array(
                                                  0 => 'govuk-!-padding-bottom-0',
                                              ),
                                              'allow_null' => 0,
                                              'multiple' => 0,
                                              'ui' => 0,
                                              'return_format' => 'value',
                                              'ajax' => 0,
                                              'placeholder' => '',
                                          ),
                                      ),
                                      'location' => array(
                                          array(
                                              array(
                                                  'param' => 'block',
                                                  'operator' => '==',
                                                  'value' => 'acf/section-row-open',
                                              ),
                                          ),
                                      ),
                                      'menu_order' => 0,
                                      'position' => 'normal',
                                      'style' => 'default',
                                      'label_placement' => 'top',
                                      'instruction_placement' => 'label',
                                      'hide_on_screen' => '',
                                      'active' => true,
                                      'description' => '',
                                  ));

    endif;
