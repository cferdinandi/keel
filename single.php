<?php

/**
 * single.php
 * Template for individual blog posts.
 */

get_header(); ?>


<?php if (have_posts()) : ?>

	<?php
		// Start the loop
		while (have_posts()) : the_post();
	?>
		<?php
			// Insert the post content
			get_template_part( 'content', 'Post Content' );
		?>
	<?php endwhile; ?>

<?php else : ?>
	<?php
		// If no content, include the "No post found" template
		get_template_part( 'no-posts', 'No Posts Template' );
	?>
<?php endif; ?>


<?php get_footer(); ?>