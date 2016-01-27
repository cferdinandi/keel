<?php

	/**
	 * Add a shortcode for svg icons
	 */

	function keel_svg_shortcode( $atts ) {

		// Check that feature is activated
		$dev_options = keel_developer_options();
		if ( !$dev_options['svg_shortcode'] ) return '';

		// Get user options
		$svg = shortcode_atts(array(
			'id'  => '',
			'url' => '',
			'class' => '',
		), $atts);

		// Bail if no link or label is set
		if ( empty( $svg['id'] ) && empty( $svg['url'] ) ) return;

		// Get SVG url
		$img = $svg['url'];
		if ( empty( $img ) ) {
			$img = wp_get_attachment_image_src( $svg['id'] );
		}

		// Get SVG content and add classes
		$file = @file_get_contents( $img );
		if ( empty( $file ) ) return;
		if ( !empty( $svg['class'] ) ) {
			$file = str_replace ( '<svg', '<svg class="' . $svg['class'] . '"', $file );
		}

		// Return SVG contents
		return $file;

	}
	add_shortcode( 'svg', 'keel_svg_shortcode' );