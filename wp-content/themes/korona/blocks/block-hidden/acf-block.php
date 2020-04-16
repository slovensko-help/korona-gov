<?php
    if (!defined('ABSPATH')) {
        exit;
    }

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
                                      'key' => 'group_5e8f33ee65f57',
                                      'title' => 'Skrytý text',
                                      'fields' => array(
                                          array(
                                              'key' => 'field_5e8f33f7a124a',
                                              'label' => 'Sumár - text zobrazený',
                                              'name' => 'hidden_text_title',
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
                                              'key' => 'field_5e97f41bbec4f',
                                              'label' => 'Nadpis pre čítačky',
                                              'name' => 'hidden_aria_label',
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
                                              'key' => 'field_5e8f3411a124b',
                                              'label' => 'Obsah',
                                              'name' => 'hidden_obsah',
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
                                              'media_upload' => 0,
                                              'delay' => 0,
                                          ),
                                      ),
                                      'location' => array(
                                          array(
                                              array(
                                                  'param' => 'block',
                                                  'operator' => '==',
                                                  'value' => 'acf/section-hidden',
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

