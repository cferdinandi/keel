<?php

/**
 * content.php
 * Template for post content.
 */

// Get post options
$options = keel_get_post_options();
$dev_options = keel_developer_options();

?>

<article <?php if ( is_single() ) { echo 'class="container"'; } ?>>

	<header>
		<?php
			/**
			 * Headers
			 * Unlinked h1 for invidual blog posts. Linked h1 for collections of posts.
			 */
		?>

		<h1 class="no-margin-bottom">
			<?php if ( is_single() ) : ?>
				<?php the_title(); ?>
			<?php else : ?>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php endif; ?>
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
		the_content( '<p>' . __( 'Read More...', 'keel' ) . '</p>' );
	?>


	<?php if ( is_single() ) : ?>

		<?php
			// Add call-to-action after individual blog posts
			if ( $dev_options['post_cta'] && array_key_exists( 'blog_posts_message', $options ) && !empty( $options['blog_posts_message'] ) ) :
		?>
			<div class="padding-top padding-bottom">
				<?php echo stripslashes( $options['blog_posts_message'] ); ?>
			</div>
		<?php endif; ?>

		<?php
			// Add comments template to blog posts
			if ( empty( $dev_options['disable_comments'] ) || $options['disable_comments'] !== 'on' ) {
				comments_template();
			}
		?>
	<?php endif; ?>

	<?php
		// If this is not the last post on the page, insert a divider
		if ( !keel_is_last_post($wp_query) ) :
	?>
	    <hr>
	<?php endif; ?>

</article>