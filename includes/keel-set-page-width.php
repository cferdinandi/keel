<?php

	/**
	 * Set page to full-width
	 */

	// Create a metabox
	function keel_set_page_width_box() {

		// Check that feature is activated
		$dev_options = keel_developer_options();
		if ( !$dev_options['page_width'] ) return;

		add_meta_box( 'keel_set_page_width_checkbox', 'Page Width & Header', 'keel_set_page_width_checkbox', 'page', 'side', 'default');

	}
	add_action('add_meta_boxes', 'keel_set_page_width_box');


	// Add checkbox to the metabox
	function keel_set_page_width_checkbox() {

		global $post;

		// Get checkedbox value
		$page_width = get_post_meta( $post->ID, 'keel_page_width', true );
		$page_header = get_post_meta( $post->ID, 'keel_page_header', true );

		?>

			<fieldset id="keel-set-page-width-box">
				<div>
					<p>
						<label>
							<input type="radio" name="keel-set-page-width-checkbox" value="default" <?php checked( $page_width, '' ); ?>>
							Default
						</label>
						<br>
						<label>
							<input type="radio" name="keel-set-page-width-checkbox" value="wide" <?php checked( $page_width, 'wide' ); ?>>
							Wide
						</label>
						<br>
						<label>
							<input type="radio" name="keel-set-page-width-checkbox" value="diy" <?php checked( $page_width, 'diy' ); ?>>
							DIY
						</label>
					</p>
				</div>
			</fieldset>

			<fieldset id="keel-set-page-header-box">
				<div>
					<p>
						<label>
							<input type="checkbox" name="keel-set-page-header-checkbox" value="default" <?php checked( $page_header, 'on' ); ?>>
							Hide Page Header
						</label>
					</p>
				</div>
			</fieldset>

		<?php

		// Security field
		wp_nonce_field( 'keel-set-page-width-nonce', 'keel-set-page-width-process' );

	}

	// Save checkbox data
	function keel_save_page_set_width_checkbox( $post_id, $post ) {

		// Verify data came from edit screen
		if ( !isset( $_POST['keel-set-page-width-process'] ) || !wp_verify_nonce( $_POST['keel-set-page-width-process'], 'keel-set-page-width-nonce' ) ) {
			return $post->ID;
		}

		// Verify user has permission to edit post
		if ( !current_user_can( 'edit_post', $post->ID )) {
			return $post->ID;
		}

		// Update page width data in database
		if ( isset( $_POST['keel-set-page-width-checkbox'] ) ) {
			$width = $_POST['keel-set-page-width-checkbox'];
			if ( $width === 'default' ) { delete_post_meta( $post->ID, 'keel_page_width' ); }
			if ( $width === 'wide' ) { update_post_meta( $post->ID, 'keel_page_width', 'wide' ); }
			if ( $width === 'diy' ) { update_post_meta( $post->ID, 'keel_page_width', 'diy' ); }
		} else {
			delete_post_meta( $post->ID, 'keel_page_width' );
		}

		// Update page header data in database
		if ( isset( $_POST['keel-set-page-header-checkbox'] ) ) {
			update_post_meta( $post->ID, 'keel_page_header', 'on' );
		} else {
			update_post_meta( $post->ID, 'keel_page_header', 'off' );
		}

	}
	add_action('save_post', 'keel_save_page_set_width_checkbox', 1, 2);

	// Save the data with revisions
	function keel_save_revisions_page_set_width_checkbox( $post_id ) {

		// Check if it's a revision
		$parent_id = wp_is_post_revision( $post_id );

		// If is revision
		if ( $parent_id ) {

			// Get the data
			$parent = get_post( $parent_id );
			$width = get_post_meta( $parent->ID, 'keel_page_width', true );
			$header = get_post_meta( $parent->ID, 'keel_page_header', true );

			// If data exists, add to revision
			if ( !empty( $width ) ) {
				add_metadata( 'post', $post_id, 'keel_page_width', $width );
			}
			if ( !empty( $header ) ) {
				add_metadata( 'post', $post_id, 'keel_page_header', $header );
			}

		}

	}
	add_action( 'save_post', 'keel_save_revisions_page_set_width_checkbox' );

	// Restore the data with revisions
	function keel_restore_revisions_page_set_width_checkbox( $post_id, $revision_id ) {

		// Variables
		$post = get_post( $post_id );
		$revision = get_post( $revision_id );
		$width = get_metadata( 'post', $revision->ID, 'keel_page_width', true );
		$header = get_metadata( 'post', $revision->ID, 'keel_page_header', true );


		if ( !empty( $width ) ) {
			update_post_meta( $post_id, 'keel_page_width', $width );
		} else {
			delete_post_meta( $post_id, 'keel_page_width' );
		}

		if ( !empty( $header ) ) {
			update_post_meta( $post_id, 'keel_page_header', $header );
		} else {
			delete_post_meta( $post_id, 'keel_page_header' );
		}

	}
	add_action( 'wp_restore_post_revision', 'keel_restore_revisions_page_set_width_checkbox', 10, 2 );

	// Get the data to display the revisions page
	function keel_get_revisions_field_page_set_width_checkbox( $fields ) {
		$fields['keel_page_width'] = 'Page Width';
		$fields['keel_page_header'] = 'Hide Page Header';
		return $fields;
	}
	add_filter( '_wp_post_revision_fields', 'keel_get_revisions_field_page_set_width_checkbox' );

	// Display the data on the revisions page
	function keel_display_revisions_field_page_set_width_checkbox( $value, $field ) {
		global $revision;
		return get_metadata( 'post', $revision->ID, $field, true );
	}
	add_filter( '_wp_post_revision_field_my_meta', 'keel_display_revisions_field_page_set_width_checkbox', 10, 2 );