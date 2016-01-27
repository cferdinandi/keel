<?php

	/**
	 * Add a hero option to pages
	 */


	// Create a metabox
	function keel_page_hero_box() {

		// Check that feature is activated
		$dev_options = keel_developer_options();
		if ( !$dev_options['hero'] ) return;

		add_meta_box( 'keel_page_hero_textarea', 'Page Hero', 'keel_page_hero_textarea', 'page', 'normal', 'default' );

	}
	add_action( 'add_meta_boxes', 'keel_page_hero_box' );



	// Add textarea to the metabox
	function keel_page_hero_textarea() {

		global $post;

		// Get hero content
		$hero = get_post_meta( $post->ID, 'keel_page_hero', true );

		?>

			<p>Use this section to display a banner above the primary page content.</p>

			<h3>Text and Calls-to-Action</h3>

			<fieldset>
				<?php wp_editor(
					( array_key_exists( 'content', (array) $hero ) ? stripslashes( $hero['content'] ) : '' ),
					'keel_page_hero_content',
					array(
						'wpautop' => false,
						'textarea_name' => 'keel_page_hero_content',
						'textarea_rows' => 8,
					)
				); ?>
				<label class="description" for="hero_content"><?php _e( 'Add text and calls to action.', 'keel' ); ?></label>
			</fieldset>

			<h3>Image or Video</h3>

			<fieldset>
				<label for="keel_page_hero_image_upload"><?php printf( __( '[Optional] Select an image or video using the Media Uploader. Alternatively, paste the URL for a video hosted on YouTube, Vimeo, Viddler, Instagram, TED, %sand more%s. Example: %s', 'keel' ), '<a target="_blank" href="http://www.oembed.com/#section7.1">', '</a>', '<code>http://youtube.com/watch/?v=12345abc</code>' ); ?></label>
				<input type="text" class="large-text" name="keel_page_hero_image" id="keel_page_hero_image" value="<?php echo ( array_key_exists( 'image', (array) $hero ) ? stripslashes( esc_attr( $hero['image'] ) ) : '' ); ?>"><br>
				<button type="button" class="button" id="keel_page_hero_image_upload_btn" data-keel-page-hero="#keel_page_hero_image"><?php _e( 'Select an Image or Video', 'keel' )?></button>
			</fieldset>

			<h3>Background Images</h3>

			<p>To add a background image to your hero banner, set a <em>Featured Image</em>.</p>

			<fieldset>
				<input type="checkbox" id="keel_page_hero_overlay" name="keel_page_hero_overlay" value="on" <?php checked( 'on',  ( array_key_exists( 'overlay', (array) $hero ) ? $hero['overlay'] : '' ) ); ?>>
				<label for="keel_page_hero_overlay"><?php _e( 'Add a semi-transparent overlay to the background image to make the text easier to read', 'keel' ); ?></label>
			</fieldset>

			<h3>Minimum Height</h3>

			<fieldset>
				<label for="keel_page_hero_image_upload"><?php printf( __( '[Optional] Make sure the hero never gets too small by providing a minimum height. Example: %s', 'keel' ), '<code>300px</code>' ); ?></label>
				<input type="text" class="large-text" name="keel_page_hero_min_height" id="keel_page_hero_min_height" value="<?php echo ( array_key_exists( 'min_height', (array) $hero ) ? stripslashes( esc_attr( $hero['min_height'] ) ) : '' ); ?>">
			</fieldset>

		<?php

		// Security field
		wp_nonce_field( 'keel-page-hero-nonce', 'keel-page-hero-process' );

	}



	// Save textarea data
	function keel_save_page_hero_textarea( $post_id, $post ) {

		// Verify data came from edit screen
		if ( !isset( $_POST['keel-page-hero-process'] ) || !wp_verify_nonce( $_POST['keel-page-hero-process'], 'keel-page-hero-nonce' ) ) {
			return $post->ID;
		}

		// Verify user has permission to edit post
		if ( !current_user_can( 'edit_post', $post->ID )) {
			return $post->ID;
		}

		// Get hero data
		$hero = array();

		if ( isset( $_POST['keel_page_hero_content'] ) ) {
			$hero['content'] = wp_filter_post_kses( $_POST['keel_page_hero_content'] );
		}

		if ( isset( $_POST['keel_page_hero_image'] ) ) {
			$hero['image'] = wp_filter_post_kses( $_POST['keel_page_hero_image'] );
		}

		if ( isset( $_POST['keel_page_hero_color'] ) ) {
			$hero['color'] = wp_filter_nohtml_kses( $_POST['keel_page_hero_color'] );
		}

		if ( isset( $_POST['keel_page_hero_overlay'] ) ) {
			$hero['overlay'] = wp_filter_nohtml_kses( $_POST['keel_page_hero_overlay'] );
		}

		if ( isset( $_POST['keel_page_hero_min_height'] ) ) {
			$hero['min_height'] = wp_filter_nohtml_kses( $_POST['keel_page_hero_min_height'] );
		}

		// Update hero settings
		update_post_meta( $post->ID, 'keel_page_hero', $hero );

	}
	add_action('save_post', 'keel_save_page_hero_textarea', 1, 2);



	// Save the data with revisions
	function keel_save_revisions_page_hero_textarea( $post_id ) {

		// Check if it's a revision
		$parent_id = wp_is_post_revision( $post_id );

		// If is revision
		if ( $parent_id ) {

			// Get the data
			$parent = get_post( $parent_id );
			$hero = get_post_meta( $parent->ID, 'keel_page_hero', true );

			// If data exists, add to revision
			if ( !empty( $hero ) && is_array( $hero ) ) {
				if ( array_key_exists( 'content', $hero ) ) {
					add_metadata( 'post', $post_id, 'keel_page_hero_content', $hero['content'] );
				}

				if ( array_key_exists( 'image', $hero ) ) {
					add_metadata( 'post', $post_id, 'keel_page_hero_image', $hero['image'] );
				}

				if ( array_key_exists( 'color', $hero ) ) {
					add_metadata( 'post', $post_id, 'keel_page_hero_color', $hero['color'] );
				}

				if ( array_key_exists( 'overlay', $hero ) ) {
					add_metadata( 'post', $post_id, 'keel_page_hero_overlay', $hero['overlay'] );
				}

				if ( array_key_exists( 'min_height', $hero ) ) {
					add_metadata( 'post', $post_id, 'keel_page_hero_min_height', $hero['min_height'] );
				}
			}

		}

	}
	add_action( 'save_post', 'keel_save_revisions_page_hero_textarea' );



	// Restore the data with revisions
	function keel_restore_revisions_page_hero_textarea( $post_id, $revision_id ) {

		// Variables
		$post = get_post( $post_id );
		$revision = get_post( $revision_id );
		$hero = get_post_meta( $post_id, 'keel_page_hero', true );
		$hero_content = get_metadata( 'post', $revision->ID, 'keel_page_hero_content', true );
		$hero_image = get_metadata( 'post', $revision->ID, 'keel_page_hero_image', true );
		$hero_color = get_metadata( 'post', $revision->ID, 'keel_page_hero_color', true );
		$hero_overlay = get_metadata( 'post', $revision->ID, 'keel_page_hero_overlay', true );
		$hero_min_height = get_metadata( 'post', $revision->ID, 'keel_page_hero_min_height', true );

		// Update content
		if ( !empty( $hero_content ) ) {
			$hero['content'] = $hero_content;
		}
		if ( !empty( $hero_image ) ) {
			$hero['image'] = $hero_image;
		}
		if ( !empty( $hero_color ) ) {
			$hero['color'] = $hero_color;
		}
		if ( !empty( $hero_overlay ) ) {
			$hero['overlay'] = $hero_overlay;
		}
		if ( !empty( $hero_overlay ) ) {
			$hero['min_height'] = $hero_min_height;
		}
		update_post_meta( $post_id, 'keel_page_hero', $hero );

	}
	add_action( 'wp_restore_post_revision', 'keel_restore_revisions_page_hero_textarea', 10, 2 );



	// Get the data to display the revisions page
	function keel_get_revisions_field_page_hero_textarea( $fields ) {
		$fields['keel_page_hero_content'] = 'Page Hero Content';
		$fields['keel_page_hero_image'] = 'Page Hero Image or Video';
		$fields['keel_page_hero_color'] = 'Page Hero Background and Text Color';
		$fields['keel_page_hero_overlay'] = 'Page Hero Background Overlay';
		$fields['keel_page_hero_min_height'] = 'Page Hero Minimum Height';
		return $fields;
	}
	add_filter( '_wp_post_revision_fields', 'keel_get_revisions_field_page_hero_textarea' );



	// Display the data on the revisions page
	function keel_display_revisions_field_page_hero_textarea( $value, $field ) {
		global $revision;
		return get_metadata( 'post', $revision->ID, $field, true );
	}
	add_filter( '_wp_post_revision_field_my_meta', 'keel_display_revisions_field_page_hero_textarea', 10, 2 );



	// Load required scripts and styles
	function keel_add_page_hero_scripts( $hook ) {

		// Check that feature is activated
		$dev_options = keel_developer_options();
		if ( !$dev_options['hero'] ) return;

		global $typenow;
		if ( in_array( $typenow, array( 'page', 'post' ) ) ) {
			wp_enqueue_media();

			// Registers and enqueues the required javascript.
			wp_register_script( 'meta-box-image', get_template_directory_uri() . '/includes/keel-page-hero/keel-page-hero.js', array( 'jquery' ) );
			wp_localize_script( 'meta-box-image', 'meta_image',
				array(
					'title' => __( 'Choose or Upload an Image', 'keel' ),
					'button' => __( 'Use this image', 'keel' ),
				)
			);
			wp_enqueue_script( 'meta-box-image' );
		}

	}
	add_action( 'admin_enqueue_scripts', 'keel_add_page_hero_scripts', 10, 1 );



	// Load page render functions
	require_once( dirname( __FILE__) . '/keel-page-hero-render.php' );