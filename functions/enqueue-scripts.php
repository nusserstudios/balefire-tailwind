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