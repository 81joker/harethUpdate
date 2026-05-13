<?php

function zaune_customizer($wp_customize)
{
    // 1 Copyright Section
    $wp_customize->add_section(
        'sec_copyright',
        array(
            'title' => 'Copyright Settings',
            'description' => 'Copyright Settings'
        )
    );

    $wp_customize->add_setting(
        'set_copyright',
        array(
            'type' => 'theme_mod',
            'default' => 'Copyright X - All Rights Reserved',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_copyright',
        array(
            'label' => 'Copyright Information',
            'description' => 'Please, type your copyright here',
            'section' => 'sec_copyright',
            'type' => 'text'
        )
    );

    /********** 2. ST Hero Section **************/
    $wp_customize->add_section('slides', array(
        'title'          => 'Slides Hero',
        'priority'       => 25,
    ));

    for ($i = 1; $i <= 3; $i++) {
        // Title
        $wp_customize->add_setting(
            "slide_title_$i",
            array(
                'type' => 'theme_mod',
                'default' => __('Please, add some title', 'zaune'),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            "slide_title_$i",
            array(
                'label' => __('Title ' . '' . $i, 'zaune'),
                'description' => __('Please, type your here title here', 'zaune'),
                'section' => 'slides',
                'type' => 'text'
            )
        );

        // Subtitle
        $wp_customize->add_setting(
            "slide_subtitle_$i",
            array(
                'type' => 'theme_mod',
                'default' => __('Please, add some subtitle', 'zaune'),
                'sanitize_callback' => 'sanitize_textarea_field'
            )
        );

        $wp_customize->add_control(
            "slide_subtitle_$i",
            array(
                'label' => __('Subtitle ' . '' . $i, 'zaune'),
                'description' => __('Please, type your subtitle here', 'zaune'),
                'section' => 'slides',
                'type' => 'text'
            )
        );

      // To add Video St
      $wp_customize->add_setting("slide_video_$i", array(
        'default' => '',
        'sanitize_callback' => 'esc_url', // Sanitize URL input
    ));
    
    // Add Video Control
    $wp_customize->add_control("slide_video_$i", array(
        'label'   => 'Slide Video URL ' . $i,
        'section' => 'slides',
        'settings' => "slide_video_$i",
        'type'    => 'url', // Specify type as URL
    ));
    // To add Video En

        $wp_customize->add_setting("slide_image_$i", array(
            'default'        => '',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "slide_image_$i", array(
            'label'   => 'First Slide',
            'section' => 'slides',
            'settings'   => "slide_image_$i",
        )));

  
    }
    /********** 2. En Hero Section **************/
    // 3. Blog
    $wp_customize->add_section(
        'sec_blog',
        array(
            'title' => 'Blog Section'
        )
    );

    // Posts per page
    $wp_customize->add_setting(
        'set_per_page',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'set_per_page',
        array(
            'label' => 'Posts per page',
            'description' => 'How many items to display in the post list?',
            'section' => 'sec_blog',
            'type' => 'number'
        )
    );

    // Post categories to include
    $wp_customize->add_setting(
        'set_category_include',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_category_include',
        array(
            'label' => 'Post categories to include',
            'description' => 'Comma separated values or single category ID',
            'section' => 'sec_blog',
            'type' => 'text'
        )
    );

    // Post categories to exclude
    $wp_customize->add_setting(
        'set_category_exclude',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_category_exclude',
        array(
            'label' => 'Post categories to exclude',
            'description' => 'Comma separated values or single category ID',
            'section' => 'sec_blog',
            'type' => 'text'
        )
    );


    // Start Gallery Footer 
       // Add section for the footer gallery
       $wp_customize->add_section( 'footer_gallery_section', array(
        'title' => __( 'Footer Gallery', 'zaune' ),
        'priority' => 130,
    ));
    
    // Add settings and controls for 6 images
    for ( $i = 1; $i <= 12; $i++ ) {
        $wp_customize->add_setting( "footer_gallery_image_$i", array(
            'default' => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "footer_gallery_image_$i", array(
            'label' => __( "Footer Gallery Image $i", 'zaune' ),
            'section' => 'footer_gallery_section',
            'settings' => "footer_gallery_image_$i",
        )));
    }
    // End Gallery Footer 
}
add_action('customize_register', 'zaune_customizer');
