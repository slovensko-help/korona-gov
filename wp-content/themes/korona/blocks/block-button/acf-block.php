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
                                              'key' => 'field_5e903ab6f73cf',
                                              'label' => 'Typ odkazu',
                                              'name' => 'button_typ_odkazu',
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
                                              'ui_on_text' => 'Externý',
                                              'ui_off_text' => 'Interný',
                                          ),
                                          array(
                                              'key' => 'field_5e903d7d6134e',
                                              'label' => 'Text pre link/tlačidlo',
                                              'name' => 'button_text_url',
                                              'type' => 'text',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'default_value' => '',
                                              'placeholder' => '',
                                              'prepend' => '',
                                              'append' => '',
                                              'maxlength' => '',
                                          ),
                                          array(
                                              'key' => 'field_5e8f4c611d2cc',
                                              'label' => 'Link interný',
                                              'name' => 'button_link',
                                              'type' => 'post_object',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => array(
                                                  array(
                                                      array(
                                                          'field' => 'field_5e903ab6f73cf',
                                                          'operator' => '!=',
                                                          'value' => '1',
                                                      ),
                                                  ),
                                              ),
                                              'wrapper' => array(
                                                  'width' => '70',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'post_type' => array(
                                                  0 => 'post',
                                                  1 => 'page',
                                              ),
                                              'taxonomy' => '',
                                              'allow_null' => 0,
                                              'multiple' => 0,
                                              'return_format' => 'id',
                                              'ui' => 1,
                                          ),
                                          array(
                                              'key' => 'field_5e9039d9f73cd',
                                              'label' => 'Link externý',
                                              'name' => 'button_link_ext',
                                              'type' => 'url',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => array(
                                                  array(
                                                      array(
                                                          'field' => 'field_5e903ab6f73cf',
                                                          'operator' => '==',
                                                          'value' => '1',
                                                      ),
                                                  ),
                                              ),
                                              'wrapper' => array(
                                                  'width' => '70',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'default_value' => '',
                                              'placeholder' => '',
                                          ),
                                          array(
                                              'key' => 'field_5e903ebf0da12',
                                              'label' => 'Otvoriť v novom okne',
                                              'name' => 'button_target_ext',
                                              'type' => 'checkbox',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => array(
                                                  array(
                                                      array(
                                                          'field' => 'field_5e903ab6f73cf',
                                                          'operator' => '==',
                                                          'value' => '1',
                                                      ),
                                                  ),
                                              ),
                                              'wrapper' => array(
                                                  'width' => '30',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'choices' => array(
                                                  '_blank' => 'V novom okne',
                                              ),
                                              'allow_custom' => 0,
                                              'default_value' => array(
                                                  0 => '_blank',
                                              ),
                                              'layout' => 'vertical',
                                              'toggle' => 0,
                                              'return_format' => 'value',
                                              'save_custom' => 0,
                                          ),
                                          array(
                                              'key' => 'field_5e9043d9d7638',
                                              'label' => 'Otvoriť v novom okne',
                                              'name' => 'button_target_int',
                                              'type' => 'checkbox',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => array(
                                                  array(
                                                      array(
                                                          'field' => 'field_5e903ab6f73cf',
                                                          'operator' => '!=',
                                                          'value' => '1',
                                                      ),
                                                  ),
                                              ),
                                              'wrapper' => array(
                                                  'width' => '30',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'choices' => array(
                                                  '_blank' => 'V novom okne',
                                              ),
                                              'allow_custom' => 0,
                                              'default_value' => array(
                                              ),
                                              'layout' => 'vertical',
                                              'toggle' => 0,
                                              'return_format' => 'value',
                                              'save_custom' => 0,
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
