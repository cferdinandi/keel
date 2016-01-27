<?php

/**
 * page.php
 * Template for pages (not posts).
 */

get_header(); ?>


<?php if (have_posts()) : ?>

	<?php
		// Start the loop
		while (have_posts()) : the_post();
	?>
		<?php
			// Insert the post content
			get_template_part( 'content', get_post_type() );
		?>
	<?php endwhile; ?>

<?php endif; ?>


<?php get_footer(); ?>