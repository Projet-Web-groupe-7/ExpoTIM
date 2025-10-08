<?php
function theme_5w5_customize_register($wp_customize) {
    // Section hero
    $wp_customize->add_section('hero_section', array(
        'title' => __('Section hero', 'theme_5w5'),
        'priority' => 30,
    ));

    // Description du site dans la section hero
    $wp_customize->add_setting('hero_desc', array(
        'default' => __('Bienvenue sur le site de l\'exposition des travaux des étudiants du programme TIM', 'theme_5w5'),
        'sanitize_callback' => 'sanitize_textarea_field'
    ));
    $wp_customize->add_control('hero_desc', array(
        'label' => __('Description', 'theme_5w5'),
        'section' => 'hero_section',
        'type' => 'textarea'
    ));
}
add_action('customize_register', 'theme_5w5_customize_register');