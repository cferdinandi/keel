<?php

/**
 * functions.php
 * For modifying and expanding core WordPress functionality.
 */


	/**
	 * Load theme scripts in the footer
	 */
	function keel_load_theme_js() {
		wp_register_script('keel-theme-js', get_template_directory_uri() . '/dist/js/main.js', false, null, true);
		wp_enqueue_script('keel-theme-js');
	}
	add_action('wp_enqueue_scripts', 'keel_load_theme_js');



	/**
	 * Include script inits in the footer
	 */
	function keel_initialize_theme_js() {
		echo
			'<script>' .
				// Scripts initializations here
			'</script>';
	}
	add_action('wp_footer', 'keel_initialize_theme_js', 30);



	/**
	 * Add a shortcode for the search form
	 * @return string Markup for search form
	 */
	function keel_wpsearch() {
		$form = get_search_form();
		return $form;
	}
	add_shortcode( 'searchform', 'keel_wpsearch' );



	// Replace default password-protected post messaging with custom language
	/**
	 * Replace the default password-protected post messaging with custom language
	 * @return string Custom language
	 */
	function keel_post_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$form =
			'<form class="text-center" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post"><p>' . __( 'This is a password protected post.', 'keel' ) . '</p><label class="screen-reader" for="' . $label . '">' . __( 'Password', 'keel' ) . '</label><input id="' . $label . '" name="post_password" type="password"><input type="submit" name="Submit" value="' . __( 'Submit', 'keel' ) . '"></form>';
		return $form;
	}
	add_filter( 'the_password_form', 'keel_post_password_form' );



	/**
	 * Customize the `wp_title` method
	 * @param  string $title The page title
	 * @param  string $sep   The separator between title and description
	 * @return string        The new page title
	 */
	function keel_pretty_wp_title( $title, $sep ) {

		global $paged, $page;

		if ( is_feed() )
			return $title;

		// Add the site name
		$title .= get_bloginfo( 'name' );

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'keel' ), max( $paged, $page ) );

		return $title;
	}
	add_filter( 'wp_title', 'keel_pretty_wp_title', 10, 2 );



	/**
	 * Sets max allowed content width
	 * Deliberately large to prevent pixelation from content stretching
	 * @link http://codex.wordpress.org/Content_Width
	 */
	if ( !isset( $content_width ) ) {
		$content_width = 1240;
	}



	/**
	 * Registers navigation menus for use with wp_nav_menu function
	 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	function keel_register_menus() {
		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu' ),
				'footer-menu' => __( 'Footer Menu' )
			)
		);
	}
	add_action( 'init', 'keel_register_menus' );



	/**
	 * Adds support for featured post images
	 * @link http://codex.wordpress.org/Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );



	/**
	 * Custom comment callback for wp_list_comments used in comments.php
	 * @param  object $comment The comment
	 * @param  object $args Comment settings
	 * @param  integer $depth How deep to nest comments
	 * @return string Comment markup
	 * @link http://codex.wordpress.org/Function_Reference/wp_list_comments
	 */
	function keel_comment_layout($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' === $args['style'] ) {
			$tag = 'div';
		} else {
			$tag = 'li';
		}
	?>

		<<?php echo $tag ?> <?php if ( $depth > 1 ) { echo 'class="comment-nested"'; } ?> id="comment-<?php comment_ID() ?>">

			<article>

				<?php if ($comment->comment_approved == '0') : // If the comment is held for moderation ?>
					<p><em><?php _e( 'Your comment is being held for moderation.', 'keel' ) ?></em></p>
				<?php endif; ?>

				<header class="space-bottom-small group">
					<figure>
						<?php if ( $args['avatar_size'] !== 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					</figure>
					<h3 class="no-space">
						<?php comment_author_link() ?>
					</h3>
					<aside>
						<time datetime="<?php comment_date( 'Y-m-d' ); ?>" pubdate><?php comment_date('F jS, Y') ?></time>
						<?php edit_comment_link('Edit', ' / ', ''); ?>
					</aside>
				</header>

				<?php comment_text(); ?>
				<?php
					/**
					 * Add inline reply link.
					 * Only displays if nested comments are enabled.
					 */
					comment_reply_link( array_merge(
						$args,
						array(
							'add_below' => 'comment',
							'depth' => $depth,
							'max_depth' => $args['max_depth'],
							'before' => '<p>',
							'after' => '</p>'
						)
					) );
				?>

			</article>

	<?php
	}



	/**
	 * Custom implementation of comment_form
	 * @return string Markup for comment form
	 */
	function keel_comment_form() {

		$commenter = wp_get_current_commenter();

		$must_log_in =
			'<p>' .
				sprintf(
					__( 'You must be <a href="%s">logged in</a> to post a comment.' ),
					wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
				) .
			'</p>';

		$logged_in_as =
			'<p>' .
				sprintf(
					__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s">Log out.</a>' ),
					admin_url( 'profile.php' ),
					$user_identity,
					wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
				) .
			'</p>';

		$notes_before = '';
		$notes_after = '';

		$field_author =
			'<div>' .
				'<label for="author">' . __( 'Name' ) . '</label>' .
				'<input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" required>' .
			'</div>';

		$field_email =
			'<div>' .
				'<label for="email">' . __( 'Email' ) . '</label>' .
				'<input type="email" name="email" id="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required>' .
			'</div>';

		$field_url =
			'<div>' .
				'<label for="url">' . __( 'Website (optional)' ) . '</label>' .
				'<input type="url" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '">' .
			'</div>';

		$field_comment =
			'<div>' .
				'<textarea name="comment" id="comment" required></textarea>' .
			'</div>';

		$args = array(
			'title_reply' => __( 'Leave a Comment' ),
			'title_reply_to' => __( 'Reply to %s' ),
			'cancel_reply_link' => __( '[Cancel]' ),
			'label_submit' => __( 'Submit Comment' ),
			'comment_field' => $field_comment,
			'must_log_in' => $must_log_in,
			'logged_in_as' => $logged_in_as,
			'comment_notes_before' => $notes_before,
			'comment_notes_after' => $notes_after,
			'fields' => apply_filters(
				'comment_form_default_fields',
				array(
					'author' => $field_author,
					'email' => $field_email,
					'url' => $field_url
				)
			),
		);

		return comment_form( $args );

	}



	/**
	 * Add script for threaded comments if enabled
	 */
	if ( is_single() && comments_open() && get_option('thread_comments') ) {
		wp_enqueue_script( 'comment-reply' );
	}



	/**
	 * Deregister JetPack's devicepx.js script
	 */
	function dequeue_devicepx() {
	    wp_dequeue_script( 'devicepx' );
	}
	add_action( 'wp_enqueue_scripts', 'dequeue_devicepx', 20 );



	/**
	 * Get number of comments (without trackbacks or pings)
	 * @return integer Number of comments
	 */
	function keel_just_comments_count() {
		return count( get_comments( array( 'type' => 'comment', 'post_id' => $post->ID ) ) );
	}



	/**
	 * Get number of trackbacks
	 * @return integer Number of trackbacks
	 */
	function keel_trackbacks_count() {
		return count( get_comments( array( 'type' => 'trackback', 'post_id' => $post->ID ) ) );
	}



	/**
	 * Get number of pings
	 * @return integer Number of pings
	 */
	function keel_pings_count() {
		return count( get_comments( array( 'type' => 'pingback', 'post_id' => $post->ID ) ) );
	}



	/**
	 * Check if more than one page of content exists
	 * @return boolean True if content is paginated
	 */
	function keel_is_paginated() {
		global $wp_query;

		if ( $wp_query->max_num_pages > 1 ) {
			return true;
		} else {
			return false;
		}
	}



	/**
	 * Check if post is the last in a set
	 * @param  object  $wp_query WPQuery object
	 * @return boolean           True if is last post
	 */
	function keel_is_last_post($wp_query) {
		$post_current = $wp_query->current_post + 1;
		$post_count = $wp_query->post_count;
		if ( $post_current == $post_count ) {
			return true;
		} else {
			return false;
		}
	}



	/**
	 * Print a pre formatted array to the browser - useful for debugging
	 * @param array $array Array to print
	 * @author 	Keir Whitaker
	 * @link https://github.com/viewportindustries/starkers/
	 */
	function keel_print_a( $a ) {
		print( '<pre>' );
		print_r( $a );
		print( '</pre>' );
	}



	/**
	 * Pass in a path and get back the page ID
	 * @param  string $path The URL of the page
	 * @return integer Page or post ID
	 * @author Keir Whitaker
	 * @link https://github.com/viewportindustries/starkers/
	 */
	function keel_get_page_id_from_path( $path ) {
		$page = get_page_by_path( $path );
		if( $page ) {
			return $page->ID;
		} else {
			return null;
		};
	}