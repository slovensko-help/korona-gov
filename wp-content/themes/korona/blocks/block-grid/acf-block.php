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
                                                  'width' => '',
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

    endif;
