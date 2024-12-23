<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */			
	
// Customize the WordPress admin
require_once(get_template_directory().'/functions/acf.php');
	
// Customize the WordPress admin
require_once(get_template_directory().'/functions/admin.php');

// WP Head and other cleanup functions  
require_once(get_template_directory().'/functions/cleanup.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php');

// Use this as a template for custom post types
require_once(get_template_directory().'/functions/custom-post-type.php');

// Remove Emoji Support
require_once(get_template_directory().'/functions/disable-emoji.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php');

// Customize the WordPress login menu
require_once(get_template_directory().'/functions/login.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php');

// Related post function - no need to rely on plugins
require_once(get_template_directory().'/functions/related-posts.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php');

// Theme support options
require_once(get_template_directory().'/functions/theme-support.php');

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php');
