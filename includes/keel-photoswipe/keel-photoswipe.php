<?php

/**
 * Adds PhotoSwipe to WordPress
 * @link https://github.com/dimsemenov/PhotoSwipe
 */

	// Get settings
	require_once( dirname( __FILE__ ) . '/keel-photoswipe-options.php' );

	/**
	 * Override default [gallery] shortcode
	 * @link http://robido.com/wordpress/wordpress-gallery-filter-to-modify-the-html-output-of-the-default-gallery-shortcode-and-style/address>]>
	 * @param  String $output Default [gallery] output
	 * @param  Array  $attr   Settings and options
	 * @return String         New markup
	 */
	function keel_photoswipe_gallery( $output, $attr ) {

		// Check that feature is activated
		$dev_options = keel_developer_options();
		if ( !$dev_options['gallery'] ) return;

		// Initialize
		global $post;

		// Only run if PhotoSwipe galleries are activated
		$options = keel_photoswipe_get_theme_options();
		if ( $options['activate'] === 'off' ) return;

		// Gallery instance counter
		static $instance = 0;
		$instance++;

		// Validate the author's orderby attribute
		if ( isset( $attr['orderby'] ) ) {
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( ! $attr['orderby'] ) unset( $attr['orderby'] );
		}

		// Get attributes from shortcode
		extract( shortcode_atts( array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post->ID,
			'include'    => '',
			'exclude'    => ''
		), $attr ) );

		// Initialize
		$id = intval( $id );
		$attachments = array();
		if ( $order == 'RAND' ) $orderby = 'none';

		if ( ! empty( $include ) ) {

			// Include attribute is present
			$include = preg_replace( '/[^0-9,]+/', '', $include );
			$_attachments = get_posts(array(
				'include' => $include,
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'order' => $order,
				'orderby' => $orderby
			));

			// Setup attachments array
			foreach ( $_attachments as $key => $val ) {
				$attachments[ $val->ID ] = $_attachments[ $key ];
			}

		} else if ( ! empty( $exclude ) ) {

			// Exclude attribute is present
			$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );

			// Setup attachments array
			$attachments = get_children(array(
				'post_parent' => $id,
				'exclude' => $exclude,
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'order' => $order,
				'orderby' => $orderby
			));

		} else {

			// Setup attachments array
			$attachments = get_children(array(
				'post_parent' => $id,
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'order' => $order,
				'orderby' => $orderby
			));

		}

		if ( empty( $attachments ) ) return '';

		// Filter gallery differently for feeds
		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment ) $output .= wp_get_attachment_link( $att_id, 'medium', true ) . "\n";
			return $output;
		}

		// Set grid width based on number of images
		$count = count( $attachments );
		if ( $count === 1 ) {
			$grid = 'full';
		} elseif ( $count === 2 ) {
			$grid = 'half';
		} else {
			$grid = 'dynamic';
		}

		// Generate gallery
		$gallery = '<div data-photoswipe data-pswp-uid="' . $instance . '" class="row" data-masonry>';
		foreach ( $attachments as $id => $attachment ) {

			// Image data
			$img_full = wp_get_attachment_image_src( $id, 'full' );
			$img_medium = wp_get_attachment_image_src( $id, 'medium' );
			$img = wp_get_attachment_image( $id, 'medium', 0, array('class' => 'img-photo') );
			$caption = $attachment->post_excerpt;
			$figure = empty( $caption ) ? '' : '<figure hidden>' . $caption . '</figure>';

			$gallery .=
				'<a data-size="' . $img_full[1] . 'x' . $img_full[2] . '" data-med="' . $img_medium[0] . '" data-med-size="' . $img_medium[1] . 'x' . $img_medium[2] . '" href="' . $img_full[0] . '" class="grid-' . $grid . '" data-masonry-content>' .
					$img .
					$figure .
				'</a>';

		}
		$gallery .= '</div>';


		$ps_framework =
			'<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">' .
				'<div class="pswp__bg"></div>' .
				'<div class="pswp__scroll-wrap">' .
					'<div class="pswp__container">' .
						'<div class="pswp__item"></div>' .
						'<div class="pswp__item"></div>' .
						'<div class="pswp__item"></div>' .
					'</div>' .
					'<div class="pswp__ui pswp__ui--hidden">' .
						'<div class="pswp__top-bar">' .
							'<div class="pswp__counter"></div>' .
							'<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>' .
							'<button class="pswp__button pswp__button--share" title="Share"></button>' .
							'<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>' .
							'<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>' .
							'<div class="pswp__preloader">' .
								'<div class="pswp__preloader__icn">' .
								'<div class="pswp__preloader__cut">' .
									'<div class="pswp__preloader__donut"></div>' .
								'</div>' .
								'</div>' .
							'</div>' .
						'</div>' .
						'<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">' .
							'<div class="pswp__share-tooltip"></div>' .
						'</div>' .
						'<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>' .
						'<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>' .
						'<div class="pswp__caption">' .
							'<div class="pswp__caption__center"></div>' .
						'</div>' .
					'</div>' .
				'</div>' .
			'</div>';

		return $gallery . $ps_framework;

	}
	add_filter( 'post_gallery', 'keel_photoswipe_gallery', 10, 2 );