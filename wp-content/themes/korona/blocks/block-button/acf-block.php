<?php

    if (!defined('ABSPATH')) {
        exit;
    }

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
                                      'key' => 'group_5e8f4c269626e',
                                      'title' => 'Link/Button',
                                      'fields' => array(
                                          array(
                                              'key' => 'field_5e8f4c2e1d2cb',
                                              'label' => 'Textový link/Tlačítko',
                                              'name' => 'button_type',
                                              'type' => 'true_false',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '50',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'message' => '',
                                              'default_value' => 0,
                                              'ui' => 1,
                                              'ui_on_text' => 'Tlačítko',
                                              'ui_off_text' => 'Textový Link',
                                          ),
                                          array(
                                              'key' => 'field_5e8f4c611d2cc',
                                              'label' => 'Link',
                                              'name' => 'button_link',
                                              'type' => 'link',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '50',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'return_format' => 'array',
                                          ),
                                          array(
                                              'key' => 'field_5e8f4c8a1d2cd',
                                              'label' => 'Farba tlačítka',
                                              'name' => 'button_color',
                                              'type' => 'select',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => array(
                                                  array(
                                                      array(
                                                          'field' => 'field_5e8f4c2e1d2cb',
                                                          'operator' => '==',
                                                          'value' => '1',
                                                      ),
                                                  ),
                                              ),
                                              'wrapper' => array(
                                                  'width' => '50',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'choices' => array(
                                                  'green' => '<div style="background: #00502a; padding-left: 10px;"><span style="color: #fff">Zelená</span></div>',
                                                  'gray' => '<div style="background: #c8cacb; padding-left: 10px;"><span style="color: #000">Šedá</span></div>',
                                              ),
                                              'default_value' => array(
                                              ),
                                              'allow_null' => 0,
                                              'multiple' => 0,
                                              'ui' => 1,
                                              'ajax' => 0,
                                              'return_format' => 'value',
                                              'placeholder' => '',
                                          ),
                                          array(
                                              'key' => 'field_5e8f4daa1d2ce',
                                              'label' => 'Šípka v tlačítku',
                                              'name' => 'button_arrow',
                                              'type' => 'true_false',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => array(
                                                  array(
                                                      array(
                                                          'field' => 'field_5e8f4c2e1d2cb',
                                                          'operator' => '==',
                                                          'value' => '1',
                                                      ),
                                                  ),
                                              ),
                                              'wrapper' => array(
                                                  'width' => '50',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'message' => '',
                                              'default_value' => 0,
                                              'ui' => 1,
                                              'ui_on_text' => 'Zobraziť',
                                              'ui_off_text' => 'Nezobrazovať',
                                          ),
                                      ),
                                      'location' => array(
                                          array(
                                              array(
                                                  'param' => 'block',
                                                  'operator' => '==',
                                                  'value' => 'acf/section-button',
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
