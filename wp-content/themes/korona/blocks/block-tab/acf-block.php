<?php

    if (!defined('ABSPATH')) {
        exit;
    }

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
                                      'key' => 'group_5e90723101a89',
                                      'title' => 'Tab - obsah open',
                                      'fields' => array(
                                          array(
                                              'key' => 'field_5e90724d22145',
                                              'label' => 'Jednoznačná identifikácia obsahu',
                                              'name' => 'tab_content_identifier',
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
                                      ),
                                      'location' => array(
                                          array(
                                              array(
                                                  'param' => 'block',
                                                  'operator' => '==',
                                                  'value' => 'acf/section-tab-section-open',
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
                                      'key' => 'group_5e9065621c864',
                                      'title' => 'Tab-open',
                                      'fields' => array(
                                          array(
                                              'key' => 'field_5e9065776ccfe',
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
                                              'message' => '<ol><li>Vytvorte presne toľko položiek, koľko bude obsahových sekcií.</li>
<li>V zozname zadajte pole <strong>Názov</strong> -> ten sa bude zobrazovať ako názov záložky (tabu).</li>
<li>V poli <strong>Identifikácia pre obsah</strong> -> zadajte identifikátor pre sekciu s obsahom. Tento identifikátor smie obsahovať malé písmena abecedy a pomlčky.</li>
<li>Pri vypĺňaní jednotlivých sekcií budete mať v zobrazení Náhľadu tohto bloku, pomôcku označenú, ako ID: <code>vas-identifikátor</code>. Pre kopírovanie kliknite na neho myškou 1x a identifikátor sa označí, potom ho už iba skopírujte a použite v sekcii s obsahom pre jednoznačnú identifikáciu obsahu.</li></ol>',
                                              'new_lines' => 'wpautop',
                                              'esc_html' => 0,
                                          ),
                                          array(
                                              'key' => 'field_5e9065956ccff',
                                              'label' => 'Zoznam pre ušká tabov',
                                              'name' => 'tabs_list',
                                              'type' => 'repeater',
                                              'instructions' => '',
                                              'required' => 0,
                                              'conditional_logic' => 0,
                                              'wrapper' => array(
                                                  'width' => '',
                                                  'class' => '',
                                                  'id' => '',
                                              ),
                                              'collapsed' => 'field_5e9065f96cd00',
                                              'min' => 0,
                                              'max' => 0,
                                              'layout' => 'block',
                                              'button_label' => '',
                                              'sub_fields' => array(
                                                  array(
                                                      'key' => 'field_5e9065f96cd00',
                                                      'label' => 'Názov',
                                                      'name' => 'list_name',
                                                      'type' => 'text',
                                                      'instructions' => '',
                                                      'required' => 0,
                                                      'conditional_logic' => 0,
                                                      'wrapper' => array(
                                                          'width' => '60',
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
                                                      'key' => 'field_5e9066076cd01',
                                                      'label' => 'Identifikácia pre obsah',
                                                      'name' => 'list_id',
                                                      'type' => 'text',
                                                      'instructions' => '',
                                                      'required' => 0,
                                                      'conditional_logic' => 0,
                                                      'wrapper' => array(
                                                          'width' => '40',
                                                          'class' => '',
                                                          'id' => '',
                                                      ),
                                                      'default_value' => '',
                                                      'placeholder' => '',
                                                      'prepend' => '',
                                                      'append' => '',
                                                      'maxlength' => '',
                                                  ),
                                              ),
                                          ),
                                      ),
                                      'location' => array(
                                          array(
                                              array(
                                                  'param' => 'block',
                                                  'operator' => '==',
                                                  'value' => 'acf/section-tab-open',
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