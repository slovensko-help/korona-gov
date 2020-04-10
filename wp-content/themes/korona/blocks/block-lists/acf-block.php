<?php
    if (!defined('ABSPATH')) {
        exit;
    }

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
                                      'key' => 'group_5e8f66654aeb4',
                                      'title' => 'Clone Zoznam',
                                      'fields' => array(
                                          array(
                                              'key' => 'field_5e8f677c1561c',
                                              'label' => 'Typ zoznamu',
                                              'name' => 'list_type',
                                              'type' => 'select',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'choices' => array(
                                                  'bullet' => 'Guličky',
                                                  'number' => 'Čísla',
                                                  'alpha' => 'Písmená',
                                                  'none' => 'Bez odrážok',
                                              ),
                                              'default_value' => array(
                                                  0 => 'bullet',
                                              ),
                                              'allow_null' => 0,
                                              'multiple' => 0,
                                              'ui' => 0,
                                              'return_format' => 'value',
                                              'ajax' => 0,
                                              'placeholder' => '',
                                          ),
                                          array(
                                              'key' => 'field_5e8f6674b0c33',
                                              'label' => 'Položky zoznamu',
                                              'name' => 'list_items',
                                              'type' => 'repeater',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'collapsed' => '',
                                              'min' => 0,
                                              'max' => 0,
                                              'layout' => 'block',
                                              'button_label' => '',
                                              'sub_fields' => array(
                                                  array(
                                                      'key' => 'field_5e8f6706b0c34',
                                                      'label' => 'text',
                                                      'name' => 'text',
                                                      'type' => 'wysiwyg',
                                                      'instructions' => '',
                                                      'required' => 0,
                                                      'conditional_logic' => 0,
                                                      'wrapper' => array(
                                                          'width' => '',
                                                          'class' => '',
                                                          'id' => '',
                                                      ),
                                                      'default_value' => '',
                                                      'tabs' => 'all',
                                                      'toolbar' => 'id_gov_toolbar',
                                                      'media_upload' => 1,
                                                      'delay' => 0,
                                                  ),
                                              ),
                                          ),
                                      ),
                                      'location' => array(
                                          array(
                                              array(
                                                  'param' => 'post_type',
                                                  'operator' => '==',
                                                  'value' => 'post',
                                              ),
                                          ),
                                      ),
                                      'menu_order' => 0,
                                      'position' => 'normal',
                                      'style' => 'default',
                                      'label_placement' => 'top',
                                      'instruction_placement' => 'label',
                                      'hide_on_screen' => '',
                                      'active' => false,
                                      'description' => '',
                                  ));

        acf_add_local_field_group(array(
                                      'key' => 'group_5e8f68293a10d',
                                      'title' => 'Zoznam',
                                      'fields' => array(
                                          array(
                                              'key' => 'field_5e8f683a06a28',
                                              'label' => 'Typ zoznamu',
                                              'name' => 'main_list_type',
                                              'type' => 'select',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'choices' => array(
                                                  'bullet' => 'Guličky',
                                                  'number' => 'Čísla',
                                                  'alpha' => 'Písmená',
                                                  'none' => 'Bez odrážok',
                                              ),
                                              'default_value' => array(
                                                  0 => 'bullet',
                                              ),
                                              'allow_null' => 0,
                                              'multiple' => 0,
                                              'ui' => 0,
                                              'return_format' => 'value',
                                              'ajax' => 0,
                                              'placeholder' => '',
                                          ),
                                          array(
                                              'key' => 'field_5e8f688506a29',
                                              'label' => 'Položky zoznamu',
                                              'name' => 'main_list_items',
                                              'type' => 'repeater',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'collapsed' => 'field_5e8f694206a2c',
                                              'min' => 0,
                                              'max' => 0,
                                              'layout' => 'block',
                                              'button_label' => '',
                                              'sub_fields' => array(
                                                  array(
                                                      'key' => 'field_5e8f68ab06a2a',
                                                      'label' => 'Typ obsahu',
                                                      'name' => 'list_content',
                                                      'type' => 'true_false',
                                                      'instructions' => '',
                                                      'required' => 0,
                                                      'conditional_logic' => 0,
                                                      'wrapper' => array(
                                                          'width' => '',
                                                          'class' => '',
                                                          'id' => '',
                                                      ),
                                                      'message' => '',
                                                      'default_value' => 0,
                                                      'ui' => 1,
                                                      'ui_on_text' => 'Vnorený zoznam',
                                                      'ui_off_text' => 'Obsah',
                                                  ),
                                                  array(
                                                      'key' => 'field_5e8f694206a2c',
                                                      'label' => 'Text',
                                                      'name' => 'list_main_text',
                                                      'type' => 'wysiwyg',
                                                      'instructions' => '',
                                                      'required' => 0,
                                                      'conditional_logic' => 0,
                                                      'wrapper' => array(
                                                          'width' => '',
                                                          'class' => '',
                                                          'id' => '',
                                                      ),
                                                      'default_value' => '',
                                                      'tabs' => 'all',
                                                      'toolbar' => 'id_gov_toolbar',
                                                      'media_upload' => 1,
                                                      'delay' => 0,
                                                  ),
                                                  array(
                                                      'key' => 'field_5e8f690006a2b',
                                                      'label' => 'Vnorený zoznam',
                                                      'name' => 'list_inner',
                                                      'type' => 'clone',
                                                      'instructions' => '',
                                                      'required' => 0,
                                                      'conditional_logic' => array(
                                                          array(
                                                              array(
                                                                  'field' => 'field_5e8f68ab06a2a',
                                                                  'operator' => '==',
                                                                  'value' => '1',
                                                              ),
                                                          ),
                                                      ),
                                                      'wrapper' => array(
                                                          'width' => '',
                                                          'class' => '',
                                                          'id' => '',
                                                      ),
                                                      'clone' => array(
                                                          0 => 'group_5e8f66654aeb4',
                                                      ),
                                                      'display' => 'group',
                                                      'layout' => 'block',
                                                      'prefix_label' => 0,
                                                      'prefix_name' => 0,
                                                  ),
                                              ),
                                          ),
                                      ),
                                      'location' => array(
                                          array(
                                              array(
                                                  'param' => 'block',
                                                  'operator' => '==',
                                                  'value' => 'acf/section-lists',
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
