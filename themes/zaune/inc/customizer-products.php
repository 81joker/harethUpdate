<?php


// Register Custom Post Type
function create_products_post_type() {
    register_post_type('products', array(
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite' => array('slug' => 'products'),
        'has_archive' => true,
        'public' => true,
        // 'hierarchical' => true,
        'labels' => array(
            'name' => 'Products',
            'add_new_item' => 'Add New Product',
            'edit_item' => 'Edit Product',
            'all_items' => 'All Products',
            'singular_name' => 'Product'
        ),
        'menu_icon' => 'dashicons-cart'
    ));
}
add_action('init', 'create_products_post_type');

// Register Custom Taxonomy
function create_products_category_taxonomy() {
    register_taxonomy(
        'product_category',  
        'products',          
        array(
            'label' => 'Categories', 
            'rewrite' => array('slug' => 'product-category'), 
            'hierarchical' => true, 
            'show_in_rest' => true, 
            'labels' => array(
                'name' => 'Product Categories',
                'singular_name' => 'Product Category',
                'menu_name' => 'Categories',
                'all_items' => 'All Categories',
                'edit_item' => 'Edit Category',
                'view_item' => 'View Category',
                'update_item' => 'Update Category',
                'add_new_item' => 'Add New Category',
                'new_item_name' => 'New Category Name',
                'search_items' => 'Search Categories',
                'popular_items' => 'Popular Categories',
                'separate_items_with_commas' => 'Separate categories with commas',
                'add_or_remove_items' => 'Add or remove categories',
                'choose_from_most_used' => 'Choose from the most used categories',
                'not_found' => 'No categories found'
            )
        )
    );
}
add_action('init', 'create_products_category_taxonomy');