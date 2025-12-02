<?php

function review_category()
{
    $labels = [
        'name'              => _x('Categories', 'taxonomy general name'),
        'singular_name'     => _x('Category', 'taxonomy singular name'),
        'search_items'      => __('Search Categories'),
        'all_items'         => __('All Categories'),
        'parent_item'       => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item'         => __('Edit Category'),
        'update_item'       => __('Update Category'),
        'add_new_item'      => __('Add New Category'),
        'new_item_name'     => __('New Category Name'),
        'menu_name'         => __('Categories'),
    ];

    register_taxonomy('review_category', ['review'], [
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => false,
        'query_var'         => false,
        'show_in_rest'      => true,
        'public'            => false,
    ]);
}

add_action('init', 'review_category', 0);
