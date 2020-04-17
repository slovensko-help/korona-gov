<?php

    if (!defined('ABSPATH')) {
        exit;
    }

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
                                      'key' => 'group_5e99292467e6f',
                                      'title' => 'News',
                                      'fields' => array(
                                          array(
                                              'key' => 'field_5e99293c8c958',
                                              'label' => 'Novinky',
                                              'name' => 'news',
                                              'type' => 'repeater',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'collapsed' => 'field_5e992a238c95b',
                                              'min' => 0,
                                              'max' => 0,
                                              'layout' => 'block',
                                              'button_label' => 'Pridať novinku',
                                              'sub_fields' => array(
                                                  array(
                                                      'key' => 'field_5e9929748c959',
                                                      'label' => 'Dátum',
                                                      'name' => 'date',
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
                                                      'key' => 'field_5e9929878c95a',
                                                      'label' => 'Kto zverejňuje',
                                                      'name' => 'owner',
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
                                                      'key' => 'field_5e992a238c95b',
                                                      'label' => 'Nadpis',
                                                      'name' => 'title',
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
                                                      'key' => 'field_5e992a2e8c95c',
                                                      'label' => 'Link',
                                                      'name' => 'link',
                                                      'type' => 'url',
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
                                                  ),
                                              ),
                                          ),
                                      ),
                                      'location' => array(
                                          array(
                                              array(
                                                  'param' => 'block',
                                                  'operator' => '==',
                                                  'value' => 'acf/section-news',
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