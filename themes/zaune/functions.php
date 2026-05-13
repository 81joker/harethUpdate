<?php

require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer-products.php';
require get_template_directory() . '/inc/customizer-breadcrumb.php';
require get_template_directory() . '/inc/customizer-socials.php';
require get_template_directory() . '/inc/customizer-latestnews.php';


function zaune_load_scripts(){

    // TODO: you should to put file fonts not link url Nehad
wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap', array(), null );

// Library for image gallery
    wp_enqueue_style(
        'baguettebox-style',
        'https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css',
        array(),
        '1.11.1'
    );
    wp_enqueue_script(
        'baguettebox-script',
        'https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js',
        array(),
        '1.11.1',
        true
    );
    wp_enqueue_script('gallery-jquery', get_theme_file_uri('/js/gallery.js'), array('jquery', 'baguettebox'), '1.0', true);
    wp_enqueue_style('zaune-gallery', get_theme_file_uri('/css/gallery.css'));



    // Library for banner slider
    wp_enqueue_style('zaune-banner-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css");
    wp_enqueue_style('zaune-swiper-bundl', "https://unpkg.com/swiper@7/swiper-bundle.min.css");
    wp_enqueue_style('zaune-fonts-icons', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css');


    wp_enqueue_style('zaune-bootstrap', get_theme_file_uri('/vendor/bootstrap/css/bootstrap.min.css'));
    wp_enqueue_style('zaune-style', get_theme_file_uri('/css/main.css'));
    wp_enqueue_style('zaune-footer', get_theme_file_uri('/css/footer.css'));

    // owl carousel on brand slider
    wp_enqueue_style('zaune-owl', get_theme_file_uri('/css/properties/owl.css'));


// TODO: Note: These files have not been used
// wp_enqueue_script("breucke-tiny-slider-js", get_stylesheet_directory_uri() . "/js/tiny-slider.js", ["jquery"], null, true);
// wp_enqueue_script("breucke-tiny-slider-js", get_stylesheet_directory_uri() . "/js/custom.js", ["jquery"], null, true);
// wp_enqueue_script("furni-bootstrap-js", get_stylesheet_directory_uri() . "/js/bootstrap.bundle.min.js", ["jquery"], null, true);
//  wp_enqueue_script( 'bootstrap-jquery',get_theme_file_uri('/vendor/jquery/jquery.min.js'), array('jquery'), '1.0', true );
//  wp_enqueue_script('bootstrap-min-js', get_theme_file_uri('/vendor/bootstrap/js/bootstrap.min.js'), array('jquery'), '1.0', true);
    //  wp_enqueue_script('bootstrap-jquery-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '1.0', true);

    //  wp_enqueue_script('breucke-counter', get_theme_file_uri('/js/properties/counter.js'), array('jquery'), '1.0', true);

    //  wp_enqueue_script( 'counter.JS', get_template_directory_uri() . '/js/properties/counter.js', array(), '1.0', true );
    // wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/js/dropdown.js', array(), '1.0', true );



// lightbox gallery in footer
wp_enqueue_style( 'zaune-lightbox.min.css',get_template_directory_uri().'/lib/lightbox/css/lightbox.min.css' );
wp_enqueue_script('zaune-lightbox.min', get_theme_file_uri('/js/lightbox.min.js'), array('jquery'), '1.0', true);


// Filter products in home page
  wp_enqueue_script('breucke-isotope', get_theme_file_uri('/js/properties/isotope.min.js'), array('jquery'), '1.0', true);
  wp_enqueue_script('breucke-owl-carousel', get_theme_file_uri('/js/properties/owl-carousel.js'), array('jquery'), '1.0', true);



wp_enqueue_script('zaune-custom', get_theme_file_uri('/js/properties/custom.js'), array('jquery'), '1.0', true);


}
add_action( 'wp_enqueue_scripts', 'zaune_load_scripts' );

function zaune_config(){
    register_nav_menus(
        array(
            'zaune_main_menu' => 'Main Menu',
            'zaune_footer_menu_first' => 'Footer Menu First',
            'zaune_footer_menu_second' => 'Footer Menu Second'
        )
    );

    $args = array(
        'height'    => 225,
        'width'     => 1920
    );
    add_theme_support('widgets');

    add_theme_support( 'custom-header', $args );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'width' => 200,
        'height'    => 110,
        'flex-height'   => true,
        'flex-width'    => true
    ) );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ));
    add_theme_support( 'title-tag' );
    add_theme_support( 'zaune-block-styles' );
}
add_action( 'after_setup_theme', 'zaune_config', 0 );
function zaune_custom_favicon() {
    $dir = get_stylesheet_directory_uri();
    echo '
        <link rel="icon" type="image/x-icon" href="' . esc_url($dir . '/favicon/favicon.ico') . '">
        <link rel="icon" type="image/png" sizes="32x32" href="' . esc_url($dir . '/favicon/favicon-32x32.png') . '">
        <link rel="apple-touch-icon" href="' . esc_url($dir . '/favicon/apple-touch-icon.png') . '">
        <meta name="theme-color" content="#ff0000">
    ';
}
add_action('wp_head', 'zaune_custom_favicon');

add_action( 'widgets_init', 'zaune_sidebars' );
function zaune_sidebars(){
    register_sidebar(
        array(
            'name'  => 'Blog Sidebar',
            'id'    => 'sidebar-blog',
            'description'   => 'This is the Blog Sidebar. You can add your widgets here.',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name'  => 'Service 1',
            'id'    => 'services-1',
            'description'   => 'First Service Area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name'  => 'Service 2',
            'id'    => 'services-2',
            'description'   => 'Second Service Area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name'  => 'Service 3',
            'id'    => 'services-3',
            'description'   => 'Third Service Area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name'  => 'Service 4',
            'id'    => 'services-4',
            'description'   => 'Fourth Service Area',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        )
    );
}

/**
 * Enqueue WP Bootstrap Navwalker library (responsive menu).
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';


if ( ! function_exists( 'wp_body_open' ) ){
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
function remove_core_gallery_for_products($content) {
    if (is_singular('products')) { 
        // Remove classic [gallery] shortcode
        $content = preg_replace('/\[gallery.*?\]/', '', $content);

        // Remove Gutenberg wp-block-gallery figures
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $xpath = new DOMXPath($dom);
        foreach ($xpath->query('//figure[contains(@class, "wp-block-gallery")]') as $node) {
            $node->parentNode->removeChild($node);
        }

        return $dom->saveHTML();
    }

    return $content; // Return unmodified content for other post types
}
add_filter('the_content', 'remove_core_gallery_for_products');

class My_Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        // Custom HTML structure for the menu item
        $output .= '<a href="' . esc_url($item->url) . '">';
        $output .= '<i class="fas fa-angle-right me-2"></i> ' . esc_html($item->title);
        $output .= '</a>';
    }
    function start_li(&$output, $item, $depth = 0, $args = array()) {
        if ($depth === 0) {
            $output .= '<ul class="nav-item bg-danger">';
        }
    }
    function end_el(&$output, $item, $depth = 0, $args = array()) {
        if ($depth === 0) {
            $output .= '</ul>';
        }
    }

}



if (has_nav_menu('zaune_footer_menu_first')) {
    wp_nav_menu(array(
        'theme_location' => 'zaune_footer_menu_first',
        'container' => false, // No container element
        'items_wrap' => '%3$s', // No <ul> wrapper
        'walker' => new My_Custom_Walker_Nav_Menu(),
    ));
}
function zaune_register_block_styles(){
    wp_register_style( 'zaune-block-style', get_template_directory_uri() . '/block-style.css' );
    register_block_style(
        'core/quote',
        array(
            'name'  => 'red-quote',
            'label' => 'Red Quote',
            'is_default'    => true,
            //'inline_style'  => '.wp-block-quote.is-style-red-quote { border-left: 7px solid #ff0000; background: #f9f3f3; padding: 10px 20px; }',
            'style_handle' => 'zaune-block-style'
        )
    );

        // Register Emerald Quote style
    register_block_style(
        'core/quote',
        array(
            'name'  => 'emerald-quote',
            'label' => 'Emerald Quote',
            'style_handle' => 'zaune-block-style'
        )
    );
    // Register Yellow Quote style
    register_block_style(
        'core/quote',
        array(
            'name'  => 'yellow-quote',
            'label' => 'Yellow Quote',
            'style_handle' => 'zaune-block-style'
        )
    );
}
add_action( 'init', 'zaune_register_block_styles' );
