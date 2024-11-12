<?php
/*
Revise and turn on as needed
*/

// Custom Post type for Banners
function cpt_bmabase_banner() {
    $labels = array(
        'name'                => __( 'Banners' ),
        'singular_name'       => __( 'Banner'),
        'menu_name'           => __( 'Home Banners'),
        'parent_item_colon'   => __( 'Parent Banner Item'),
        'all_items'           => __( 'Banners'),
        'view_item'           => __( 'View Banner'),
        'add_new_item'        => __( 'Add New Banner'),
        'add_new'             => __( 'Add Banner'),
        'edit_item'           => __( 'Edit Banner'),
        'update_item'         => __( 'Update Banner'),
        'search_items'        => __( 'Search Banners'),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );
    $args = array(
        'label'               => __( 'banner'),
        'description'         => __( 'Banner Items'),
        'labels'              => $labels,
        'supports'            => array( 'title','editor','excerpt','author','thumbnail','revisions','custom-fields','page-attributes'),
        'public'              => true,
        'hierarchical'        => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'has_archive'         => true,
        'can_export'          => true,
        'exclude_from_search' => false,
        'show_in_rest'        => true,
        'yarpp_support'       => true,
        //'taxonomies'          => array('post_tag'),
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    register_post_type( 'banner', $args );
}
//add_action( 'init', 'cpt_bmabase_banner', 0 );

// Custom Taxonomy for CPT
/*
register_taxonomy( 'program', 
    array('banner'),
    array('hierarchical' => true,         
        'labels' => array(
            'name' => __( 'Program', 'bftheme' ),
            'singular_name' => __( 'Program', 'bftheme' ),
            'search_items' =>  __( 'Search Programs', 'bftheme' ),
            'all_items' => __( 'All Programs', 'bftheme' ),
            'parent_item' => __( 'Parent Program', 'bftheme' ),
            'parent_item_colon' => __( 'Parent Program:', 'bftheme' ),
            'edit_item' => __( 'Edit Program', 'bftheme' ),
            'update_item' => __( 'Update Program', 'bftheme' ),
            'add_new_item' => __( 'Add New Program', 'bftheme' ),
            'new_item_name' => __( 'New Program', 'bftheme' )
        ),
        'show_admin_column' => true, 
        'show_ui' => true,
        'query_var' => true,
        'show_in_rest'        => true,
        'rewrite' => array( 'slug' => 'program' ),
    )
);
*/