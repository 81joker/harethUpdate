<?php

function zaune_social_customizer($wp_customize) {
    // Add Social Media Section
    $wp_customize->add_section('social_media', [
        'title' => __('Social Media Links Footer', 'zaune-textdomain'),
        'priority' => 31,
    ]);

    // Social Media Options
    $socials = [
        'facebook' => 'Facebook URL',
        'twitter' => 'Twitter URL',
        'instagram' => 'Instagram URL',
        'pinterest' => 'Pinterest URL',
        'linkedin' => 'LinkedIn URL'
    ];

    foreach ($socials as $network => $label) {
        $wp_customize->add_setting($network . '_url', [
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ]);

        $wp_customize->add_control($network . '_url', [
            'label' => $label,
            'section' => 'social_media',
            'type' => 'url',
        ]);
    }
}
add_action('customize_register', 'zaune_social_customizer');

function zaune_social_customizer_nav($wp_customize) {
    // Add Social Media Navigation Section
    $wp_customize->add_section('social_media_nav', [
        'title' => __('Social Media Links Nav', 'zaune-textdomain'),
        'priority' => 30, 
    ]);

    // Social Media Options for Navigation
    $socials_nav = [
        'nav_facebook' => 'Facebook URL',
        'nav_twitter' => 'Twitter URL',
        'nav_instagram' => 'Instagram URL',
        'nav_pinterest' => 'Pinterest URL',
        'nav_linkedin' => 'LinkedIn URL'
    ];

    foreach ($socials_nav as $network => $label) {
        $wp_customize->add_setting($network . '_url', [
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ]);

        $wp_customize->add_control($network . '_url', [
            'label' => $label,
            'section' => 'social_media_nav', 
            'type' => 'url',
        ]);
    }
}
add_action('customize_register', 'zaune_social_customizer_nav');