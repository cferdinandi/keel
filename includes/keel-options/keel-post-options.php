<?php

/**
 * Post Options
 * Custom post settings in the admin dashboard.
 *
 * Created by Michael Fields.
 * https://gist.github.com/mfields/4678999
 *
 * Forked by Chris Ferdinandi
 * http://gomakethings.com
 *
 * Free to use under the MIT License.
 * http://gomakethings.com/mit/
 */


	/**
	 * Theme Options Fields
	 * Each option field requires its own uniquely named function. Select options and radio buttons also require an additional uniquely named function with an array of option choices.
	 */

	function keel_settings_field_blog_posts_disable_comments() {
		$options = keel_get_post_options();
		?>
		<label for="disable_comments">
			<input type="checkbox" name="keel_post_options[disable_comments]" id="disable_comments" <?php checked( 'on', $options['disable_comments'] ); ?> />
			<?php _e( 'Disable comments on all blog posts.', 'keel' ); ?>
		</label>
		<?php
	}

	// Renders the blog posts message textarea setting field.
	function keel_settings_field_blog_posts_message() {
		$options = keel_get_post_options();
		?>
		<?php
			wp_editor(
				stripslashes( $options['blog_posts_message'] ),
				'blog_posts_message',
				array(
					'autop' => false,
					'textarea_name' => 'keel_post_options[blog_posts_message]',
					'textarea_rows' => 8
				)
			);
		?>
		<label class="description" for="blog_posts_message"><?php _e( 'Message to be displayed at the end of each blog post.', 'keel' ); ?></label>
		<?php
	}



	/**
	 * Theme Option Defaults & Sanitization
	 * Each option field requires a default value under keel_get_post_options(), and an if statement under keel_post_options_validate();
	 */

	// Get the current options from the database.
	// If none are specified, use these defaults.
	function keel_get_post_options() {
		$saved = (array) get_option( 'keel_post_options' );
		$defaults = array(
			'blog_posts_message' => '',
			'disable_comments' => 'off',
		);

		$defaults = apply_filters( 'keel_default_theme_options', $defaults );

		$options = wp_parse_args( $saved, $defaults );
		$options = array_intersect_key( $options, $defaults );

		return $options;
	}

	// Sanitize and validate updated theme options
	function keel_post_options_validate( $input ) {
		$output = array();

		if ( isset( $input['disable_comments'] ) )
					$output['disable_comments'] = 'on';

		if ( isset( $input['blog_posts_message'] ) && ! empty( $input['blog_posts_message'] ) )
			$output['blog_posts_message'] = wp_filter_post_kses( $input['blog_posts_message'] );

		return apply_filters( 'keel_post_options_validate', $output, $input );
	}



	/**
	 * Theme Options Menu
	 * Each option field requires its own add_settings_field function.
	 */

	// Create theme options menu
	// The content that's rendered on the menu page.
	function keel_post_options_render_page() {
		?>
		<div class="wrap">
			<h2><?php _e( 'Post Options', 'keel' ); ?></h2>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'keel_post_options' );
					do_settings_sections( 'keel_post_options' );
					submit_button();
				?>
			</form>
		</div>
		<?php
	}

	// Register the post options page and its fields
	function keel_post_options_init() {

		// Developer options
		$dev_options = keel_developer_options();

		// Register a setting and its sanitization callback
		// register_setting( $option_group, $option_name, $sanitize_callback );
		// $option_group - A settings group name.
		// $option_name - The name of an option to sanitize and save.
		// $sanitize_callback - A callback function that sanitizes the option's value.
		register_setting( 'keel_post_options', 'keel_post_options', 'keel_post_options_validate' );


		// Register our settings field group
		// add_settings_section( $id, $title, $callback, $page );
		// $id - Unique identifier for the settings section
		// $title - Section title
		// $callback - // Section callback (we don't want anything)
		// $page - // Menu slug, used to uniquely identify the page. See keel_post_options_add_page().
		add_settings_section( 'general', '',  '__return_false', 'keel_post_options' );

		// Register our individual settings fields
		// add_settings_field( $id, $title, $callback, $page, $section );
		// $id - Unique identifier for the field.
		// $title - Setting field title.
		// $callback - Function that creates the field (from the Theme Option Fields section).
		// $page - The menu page on which to display this field.
		// $section - The section of the settings page in which to show the field.
		if ( $dev_options['disable_comments'] ) {
			add_settings_field( 'disable_comments', __( 'Comments', 'keel' ), 'keel_settings_field_blog_posts_disable_comments', 'keel_post_options', 'general' );
		}
		if ( $dev_options['post_cta'] ) {
			add_settings_field( 'blog_posts_message', __( 'Blog Posts Message', 'keel' ), 'keel_settings_field_blog_posts_message', 'keel_post_options', 'general' );
		}
	}
	add_action( 'admin_init', 'keel_post_options_init' );

	// Add the post options page to the admin menu
	// Use add_theme_page() to add under Appearance tab (default).
	// Use add_menu_page() to add as it's own tab.
	// Use add_submenu_page() to add to another tab.
	function keel_post_options_add_page() {

		// add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function );
		// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function );
		// add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
		// $page_title - Name of page
		// $menu_title - Label in menu
		// $capability - Capability required
		// $menu_slug - Used to uniquely identify the page
		// $function - Function that renders the options page
		// $theme_page = add_theme_page( __( 'Post Options', 'keel' ), __( 'Post Options', 'keel' ), 'edit_theme_options', 'keel_post_options', 'keel_post_options_render_page' );

		// Developer options
		$dev_options = keel_developer_options();

		// $theme_page = add_menu_page( __( 'Theme Options', 'keel' ), __( 'Theme Options', 'keel' ), 'edit_theme_options', 'keel_post_options', 'keel_post_options_render_page' );
		if ( $dev_options['disable_comments'] || $dev_options['post_cta'] ) {
			$theme_page = add_submenu_page( 'edit.php', __( 'Post Options', 'keel' ), __( 'Post Options', 'keel' ), 'edit_theme_options', 'keel_post_options', 'keel_post_options_render_page' );
		}
	}
	add_action( 'admin_menu', 'keel_post_options_add_page' );



	// Restrict access to the post options page to admins
	function keel_option_page_capability( $capability ) {
		return 'edit_theme_options';
	}
	add_filter( 'option_page_capability_keel_options', 'keel_option_page_capability' );