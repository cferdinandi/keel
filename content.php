<?php

/**
 * content.php
 * Template for post content.
 */

// Get post options
$options = keel_get_post_options();

?>

<?php
	/**
	 * Individual Posts
	 */
	if ( is_single() ) :
?>

	<article class="container">

		<header>
			<h1 class="no-margin-bottom">
				<?php the_title(); ?>
			</h1>

			<aside class="text-muted">
				<p>
					<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'F j, Y' ) ?></time> by <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php the_author(); ?> </a>
					<?php edit_post_link( __( 'Edit', 'keel' ), ' / ', '' ); ?>
				</p>
			</aside>
		</header>

		<?php
			// The page or post content
			the_content();
		?>

		<?php
			// Add call-to-action after individual blog posts
			if ( array_key_exists( 'blog_posts_message', $options ) && !empty( $options['blog_posts_message'] ) ) :
		?>
			<div class="padding-top padding-bottom">
				<?php echo stripslashes( $options['blog_posts_message'] ); ?>
			</div>
		<?php endif; ?>

		<?php
			// Add comments template to blog posts
			if ( $options['disable_comments'] !== 'on' ) {
				comments_template();
			}
		?>

	</article>

<?php
	/**
	 * All Posts
	 */
	else :
?>

	<article>

		<header>
			<h2 class="h1 no-margin-bottom">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>

			<aside class="text-muted">
				<p>
					<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'F j, Y' ) ?></time> by <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php the_author(); ?> </a>
					<?php edit_post_link( __( 'Edit', 'keel' ), ' / ', '' ); ?>
				</p>
			</aside>
		</header>

		<?php
			// The page or post content
			the_excerpt();
		?>

		<p>
			<a href="<?php the_permalink(); ?>">
				<?php _e( 'Read more...', 'keel' ); ?>
			</a>
		</p>

		<?php
			// If this is not the last post on the page, insert a divider
			if ( !keel_is_last_post($wp_query) ) :
		?>
		    <hr>
		<?php endif; ?>

	</article>

<?php endif; ?>