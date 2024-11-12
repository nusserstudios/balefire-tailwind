<?php
// Calling your own login css so you can style it
function balefire_login_css() {
	wp_enqueue_style( 'balefire_login_css', get_template_directory_uri() . '/assets/scss/login.css', false );
}
//add_action( 'login_enqueue_scripts', 'balefire_login_css', 10 );

// changing the logo link from wordpress.org to your site
function balefire_login_url() {  return home_url(); }
//add_filter('login_headerurl', 'balefire_login_url');

// changing the alt text on the logo to show your site name
function balefire_login_title() { return get_option('blogname'); }
//add_filter('login_headertitle', 'balefire_login_title');