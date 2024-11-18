<?php
// This file handles the admin area and functions - You can use this file to make changes to the dashboard.

// Disable default dashboard widgets
function disable_default_dashboard_widgets() {
	// Remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' ); // Comments Widget
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );  // Incoming Links Widget
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );         // Plugins Widget
	remove_meta_box( 'dashboard_activity', 'dashboard', 'core' );         // Activity Widget

	// Remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );   // Recent Drafts Widget
	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );

	// Removing plugin dashboard boxes
	remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );         // Yoast's SEO Plugin Widget
}

/*
For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/

// Dashboard Widget
function balefire_dashboard_widget() {
	echo '
	<div style="text-align:center;">
		<a href="https://www.balefireagency.com/contact/" title="Contact Balefire Marketing + Advertising" target="_blank">
			<img src="/wp-content/themes/balefire/assets/img/balefire-logo.png" alt="Balefire Marketing + Advertising" style="width:70%;height:auto;margin:10px auto;">
		</a>
	</div>
	<p>
		<a href="https://www.balefireagency.com/contact/" title="Contact Balefire Marketing + Advertising" target="_blank">Contact Balefire Marketing + Advertising</a> for support with your website. Our services include: search engine optimization (SEO), email marketing, Google and Bing advertising, custom web development, logo design and branding, graphic design, brochure/catalog design, marketing and advertising.
	</p>
	<p><strong><a href="https://www.balefireagency.com/contact/" title="Contact Balefire Marketing + Advertising" target="_blank">Contact Balefire Marketing + Advertising</a></strong></p>
	';
}

// Calling all custom dashboard widgets
function balefire_custom_dashboard_widgets() {
	// wp_add_dashboard_widget('balefire_dashboard_widget', __('Website Support', 'balefire'), 'balefire_dashboard_widget');
	add_meta_box( 'id', 'Website Support', 'balefire_dashboard_widget', 'dashboard', 'side', 'high' );
	/*
	Be sure to drop any other created Dashboard Widgets
	in this function and they will all load.
	*/
}
// removing the dashboard widgets
add_action( 'admin_menu', 'disable_default_dashboard_widgets' );
// adding any custom widgets
add_action( 'wp_dashboard_setup', 'balefire_custom_dashboard_widgets' );

// Custom Backend Footer
function balefire_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="https://www.balefireagency.com" target="_blank">Balefire Marketing + Advertising</a></span>.', 'balefire' );
}

// adding it to the admin area
add_filter( 'admin_footer_text', 'balefire_custom_admin_footer' );


/*
Automatically set the image Title, Alt-Text, Caption & Description upon upload
https://brutalbusiness.com/automatically-set-the-wordpress-image-title-alt-text-other-meta/
--------------------------------------------------------------------------------------*/
add_action( 'add_attachment', 'bf_set_image_meta_upon_image_upload' );
function bf_set_image_meta_upon_image_upload( $post_ID ) {

	// Check if uploaded file is an image, else do nothing

	if ( wp_attachment_is_image( $post_ID ) ) {

		$my_image_title = get_post( $post_ID )->post_title;

		// Sanitize the title:  remove hyphens, underscores & extra spaces:
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ', $my_image_title );

		// Sanitize the title:  capitalize first letter of every word (other letters lower case):
		$my_image_title = ucwords( strtolower( $my_image_title ) );

		// Create an array with the image meta (Title, Caption, Description) to be updated
		// Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
		$my_image_meta = array(
			'ID'           => $post_ID,            // Specify the image (ID) to be updated
			'post_title'   => $my_image_title,     // Set image Title to sanitized title
			'post_excerpt' => $my_image_title,     // Set image Caption (Excerpt) to sanitized title
			'post_content' => $my_image_title,     // Set image Description (Content) to sanitized title
		);

		// Set the image Alt-Text
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );

		// Set the image meta (e.g. Title, Excerpt, Content)
		wp_update_post( $my_image_meta );

	}
}

function show_template() {
	if ( current_user_can( 'administrator' ) ) {
		global $template;
		echo '<div class="template-name" style="position: fixed; bottom: 0; left: 0; background: rgba(0,0,0,0.8); color: #fff; padding: 5px 10px; font-size: 12px; font-family: monospace;">Template: ' . basename( $template ) . '</div>';
	}
}
add_action( 'wp_footer', 'show_template' );
