<?php
// Making jQuery to load from Google Library
function replace_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', false, '1.11.3');
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-migrate');
    }
}
//add_action('init', 'replace_jquery');

/**
 * Enqueue theme assets.
 */
function balefire_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'balefire', balefire_asset( '/src/css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'balefire', balefire_asset( '/src/js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'balefire_enqueue_scripts' );

/**
 * Register Block Patterns for Balefire Theme
 */
function balefire_register_block_patterns() {
    // Register pattern category if you want to group your patterns
    if ( function_exists( 'register_block_pattern_category' ) ) {
        register_block_pattern_category(
            'balefire',
            array( 'label' => __( 'Balefire', 'balefire' ) )
        );
    }
}
add_action( 'init', 'balefire_register_block_patterns' );

add_action('init', function() {
    error_log('Theme directory: ' . get_template_directory());
    error_log('Patterns directory: ' . get_template_directory() . '/patterns');
    error_log('Pattern file exists: ' . (file_exists(get_template_directory() . '/patterns/hero.php') ? 'yes' : 'no'));
});
