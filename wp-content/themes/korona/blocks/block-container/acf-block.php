<?php

    if (!defined('ABSPATH')) {
        exit;
    }

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
                                      'key' => 'group_5e98c2a7e5fa9',
                                      'title' => 'Container Open',
                                      'fields' => array(
                                          array(
                                              'key' => 'field_5e98c2b284070',
                                              'label' => 'Farba pozadia - na celú šírku',
                                              'name' => 'container_background',
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
                                              'key' => 'field_5e98c9583e4ea',
                                              'label' => 'Vnútorné odsadenie - hore',
                                              'name' => 'container_padding_top',
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
                                              'key' => 'field_5e98cb3c3e4eb',
                                              'label' => 'Vnútorné odsadenie - dole',
                                              'name' => 'container_padding_bottom',
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
                                                  'value' => 'acf/section-container-open',
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
