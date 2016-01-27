<?php

/**
 * Theme Support
 * Get theme support
 *
 * @link https://gist.github.com/mfields/4678999
 */


	/**
	 * Theme Options Menu
	 * Each option field requires its own add_settings_field function.
	 */

	// Create theme options menu
	// The content that's rendered on the menu page.
	function keel_theme_support_render_page() {
		?>
		<div class="wrap">
			<h2><?php _e( 'Theme Support', 'keel' ); ?></h2>
			<p><?php _e( 'Some information about how to get support.', 'keel' ); ?></p>
		</div>
		<?php
	}

	// Add the theme options page to the admin menu
	// Use add_theme_page() to add under Appearance tab (default).
	// Use add_menu_page() to add as it's own tab.
	// Use add_submenu_page() to add to another tab.
	function keel_theme_support_add_page() {

		// Check that feature is activated
		$dev_options = keel_developer_options();
		if ( !$dev_options['theme_support'] ) return;

		$theme_page = add_submenu_page( 'themes.php', __( 'Theme Support', 'keel' ), __( 'Theme Support', 'keel' ), 'edit_theme_options', 'keel_theme_support', 'keel_theme_support_render_page' );

	}
	add_action( 'admin_menu', 'keel_theme_support_add_page' );



	// Restrict access to the theme options page to admins
	function keel_theme_support_option_page_capability( $capability ) {
		return 'edit_theme_options';
	}
	add_filter( 'option_page_capability_keel_theme_support_options', 'keel_theme_support_option_page_capability' );
