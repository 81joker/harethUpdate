<?php


function custom_breadcrumb() {
    echo '<section id="breadcrumb" class="pt-3 pb-1 ms-3">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-12">';
    echo '<nav style="--bs-breadcrumb-divider: \'>\';" aria-label="breadcrumb">';
    echo '<ol class="breadcrumb">';
    // Home link
    echo '<li class="breadcrumb-item"><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    if (is_page()) {
        // Get the current page
        $current_page = get_post();
        // If the page has a parent, display the hierarchy
        if ($current_page->post_parent) {
            $ancestors = array_reverse(get_post_ancestors($current_page->ID));
            foreach ($ancestors as $ancestor) {
                echo '<li class="breadcrumb-item"><a href="' . esc_url(get_permalink($ancestor)) . '" >' . get_the_title($ancestor) . '</a></li>';
            }
        }
        // Current page
        echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title($current_page) . '</li>';

    } elseif (is_singular('products')) {  
        $terms = get_the_terms(get_the_ID(), 'product_category');
        if ($terms && !is_wp_error($terms)) {
            // Find the deepest category
            $deepest_category = null;
            $max_depth = -1;

            foreach ($terms as $term) {
                $depth = get_category_depth($term);
                if ($depth > $max_depth) {
                    $max_depth = $depth;
                    $deepest_category = $term;
                }
            }
            // Get the full category hierarchy
            if ($deepest_category) {
                $hierarchy = get_category_hierarchy($deepest_category);
                foreach ($hierarchy as $category) {
                    echo '<li class="breadcrumb-item"><a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a></li>';
                }
            }
        }
        // Current product name
        echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';

    } elseif (is_tax('product_category')) {
        // Handle product category archives
        $current_term = get_queried_object();

        if (!is_wp_error($current_term)) {
            $hierarchy = get_category_hierarchy($current_term);
            foreach ($hierarchy as $category) {
                echo '<li class="breadcrumb-item"><a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a></li>';
            }
            echo '<li class="breadcrumb-item active" aria-current="page">' . single_term_title('', false) . '</li>';
        }
    }
    echo '</ol>';
    echo '</nav>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</section>';
}

/**
 * Get the full category hierarchy from parent to child.
 */
function get_category_hierarchy($category) {
    $hierarchy = [];

    while ($category && !is_wp_error($category)) {
        array_unshift($hierarchy, $category); // Add at the beginning
        if ($category->parent == 0) {
            break; // Stop when reaching the top-level category (father)
        }
        $category = get_term($category->parent, 'product_category');

        // Prevent infinite loops if a circular reference exists
        if (is_wp_error($category) || !$category) {
            break;
        }
    }

    return $hierarchy;
}
/**
 * Get the depth of a category in the hierarchy.
 */
function get_category_depth($category) {
    $depth = 0;

    while ($category && !is_wp_error($category) && $category->parent != 0) {
        $category = get_term($category->parent, 'product_category');

        // Prevent errors
        if (is_wp_error($category) || !$category) {
            break;
        }

        $depth++;
    }

    return $depth;
}
