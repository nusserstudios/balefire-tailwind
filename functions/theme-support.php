<?php

/**
 * Theme setup.
 */
function balefire_theme_support() {
    // Basic theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_editor_style('css/editor-style.css');

    // HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Custom logo support
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));

    // Post formats
    add_theme_support('post-formats', array(
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat'
    ));

    // Block Pattern support
    add_theme_support('block-patterns');
    
    // Register block pattern category
    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category(
            'balefire',
            array(
                'label' => __('Balefire', 'balefire'),
                'description' => __('Patterns for Balefire theme', 'balefire'),
            )
        );
    }

    // Set content width
    $GLOBALS['content_width'] = apply_filters('balefire_theme_support', 1200);
}

add_action('after_setup_theme', 'balefire_theme_support');

/**
 * Get asset path.
 *
 * @param string $path Path to asset.
 * @return string
 */
function balefire_asset($path) {
    if (wp_get_environment_type() === 'production') {
        return get_stylesheet_directory_uri() . '/' . $path;
    }
    return add_query_arg('time', time(), get_stylesheet_directory_uri() . '/' . $path);
}