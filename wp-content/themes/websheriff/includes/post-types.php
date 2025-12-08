<?php

function review()
{
    $labels = [
        'name'                  => _x('Reviews', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Review', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Reviews', 'text_domain'),
        'name_admin_bar'        => __('Reviews', 'text_domain'),
        'archives'              => __('Item Archives', 'text_domain'),
        'attributes'            => __('Item Attributes', 'text_domain'),
        'parent_item_colon'     => __('Parent Item:', 'text_domain'),
        'all_items'             => __('All Items', 'text_domain'),
        'add_new_item'          => __('Add New Item', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New Item', 'text_domain'),
        'edit_item'             => __('Edit Item', 'text_domain'),
        'update_item'           => __('Update Item', 'text_domain'),
        'view_item'             => __('View Item', 'text_domain'),
        'view_items'            => __('View Items', 'text_domain'),
        'search_items'          => __('Search Item', 'text_domain'),
        'not_found'             => __('Not found', 'text_domain'),
        'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
        'featured_image'        => __('Featured Image', 'text_domain'),
        'set_featured_image'    => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image'    => __('Use as featured image', 'text_domain'),
        'insert_into_item'      => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list'            => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter items list', 'text_domain'),
    ];
    $args = [
        'label'               => __('Review', 'text_domain'),
        'description'         => __('Review', 'text_domain'),
        'labels'              => $labels,
        'supports'            => ['title', 'revisions'],
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-image-filter',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => false,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => false,
        'capability_type'     => 'page',
        'show_in_rest'        => false,
    ];
    register_post_type('review', $args);

}

add_action('init', 'review', 0);

/**
 * Alphabetize selected CPTs in the admin menu and include default Posts.
 * Also adds a separator after the block.
 */
function ws_alphabetize_cpt_menu() {
    global $menu;

    // CPTs you want in the sorted block
    $cpts = [
        'review',
    ];

    $targets = [];

    // Collect CPT menus + default Posts
    foreach ($menu as $pos => $item) {
        if (empty($item[2])) {
            continue;
        }

        // Default Posts menu lives at 'edit.php'
        if ($item[2] === 'edit.php') {
            $targets[] = $item;
            unset($menu[$pos]);
            continue;
        }

        // Custom post type menus look like 'edit.php?post_type=slug'
        if (str_starts_with($item[2], 'edit.php?post_type=')) {
            $slug = substr($item[2], strlen('edit.php?post_type='));
            if (in_array($slug, $cpts, true)) {
                $targets[] = $item;
                unset($menu[$pos]);
            }
        }
    }

    if (empty($targets)) {
        return;
    }

    // Alphabetize by visible label
    usort($targets, function ($a, $b) {
        $labelA = trim(wp_strip_all_tags($a[0] ?? ''));
        $labelB = trim(wp_strip_all_tags($b[0] ?? ''));
        return strcasecmp($labelA, $labelB);
    });

    // Reinsert starting at 5 (Posts’ usual slot), now with Posts included
    $base = 5;
    foreach ($targets as $i => $item) {
        $menu[$base + $i] = $item;
    }

    // Separator right after the block
    $separator_position = $base + count($targets);
    $menu[$separator_position] = [
        '', 'read', 'separator' . $separator_position, '', 'wp-menu-separator'
    ];

    ksort($menu);
}
add_action('admin_menu', 'ws_alphabetize_cpt_menu', 9999);

