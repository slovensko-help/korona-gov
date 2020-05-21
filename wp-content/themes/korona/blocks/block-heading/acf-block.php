<?php
if (!defined('ABSPATH')) {
    exit;
}

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
                                      'key' => 'group_5e8f637c8db8d',
                                      'title' => 'Nadpis',
                                      'fields' => array(
                                          array(
                                              'key' => 'field_5e8f6470c13b8',
                                              'label' => 'Nadpis',
                                              'name' => 'nadpis',
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
                                              'key' => 'field_5ebd28cb40089',
                                              'label' => 'ID nadpisu',
                                              'name' => 'id_nadpisu',
                                              'type' => 'text',
                                              'instructions' => 'Zadávajte iba malé písmená a čísla, bez medzier napr: <code> id-nadpisu-4 </code><br>Pamätajte, že jedno <code> id </code> sa smie na stránke nachádzať IBA 1x krát!',
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
                                              'key' => 'field_5e8f6387c8f9e',
                                              'label' => 'Úroveň nadpisu',
                                              'name' => 'uroven_nadpisu',
                                              'type' => 'select',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '50',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'choices' => array(
                                                  'h1' => 'H1',
                                                  'h2' => 'H2',
                                                  'h3' => 'H3',
                                                  'h4' => 'H4',
                                                  'h5' => 'H5',
                                                  'h6' => 'H6',
                                              ),
                                              'default_value' => array(
                                                  0 => 'h3',
                                              ),
                                              'allow_null' => 0,
                                              'multiple' => 0,
                                              'ui' => 0,
                                              'return_format' => 'value',
                                              'ajax' => 0,
                                              'placeholder' => '',
                                          ),
                                          array(
                                              'key' => 'field_5e8f63abc8f9f',
                                              'label' => 'Veľkosť nadpisu',
                                              'name' => 'velkost_nadpisu',
                                              'type' => 'select',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '50',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'choices' => array(
                                                  'govuk-heading-xl' => '48 px Tučný nadpis (XL)',
                                                  'govuk-heading-l' => '36 px Tučný nadpis (L)',
                                                  'govuk-heading-m' => '24 px Tučný nadpis (M)',
                                                  'govuk-heading-s' => '19 px Tučný nadpis (S)',
                                              ),
                                              'default_value' => array(
                                                  0 => 'govuk-heading-m',
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
                                                  'value' => 'acf/section-heading',
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
