<?php

/**
 * archive.php
 * Template for posts by category, tag, author, date, etc.
 */

get_header(); ?>


<?php if (have_posts()) : ?>

	<header>
		<h1>
			<?php if (is_category()) : // If this is a category archive ?>
				<?php _e( 'Category:', 'keel' ) ?> <?php single_cat_title(); ?>...
			<?php elseif( is_tag() ) : // If this is a tag archive ?>
				<?php _e( 'Tag:', 'keel' ) ?> <?php single_tag_title(); ?>...
			<?php elseif (is_day()) : // If this is a daily archive ?>
				<?php _e( 'Day:', 'keel' ) ?> <?php the_time('F jS, Y'); ?>...
			<?php elseif (is_month()) : // If this is a monthly archive ?>
				<?php _e( 'Month:', 'keel' ) ?> <?php the_time('F, Y'); ?>...
			<?php elseif (is_year()) : // If this is a yearly archive ?>
				<?php _e( 'Year:', 'keel' ) ?> <?php the_time('Y'); ?>...
			<?php elseif (is_author()) : // If this is an author archive ?>
				<?php _e( 'Author Archive', 'keel' ) ?>
			<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : // If this is a paged archive ?>
				<?php _e( 'Blog Archive', 'keel' ) ?>
			<?php endif; ?>
		</h1>
	</header>


	<?php
		// Start the loop
		while (have_posts()) : the_post();
	?>
		<?php
			// Insert the post content
			get_template_part( 'content', 'Post Content' );
		?>
	<?php endwhile; ?>


	<?php
		// Previous/next page navigation
		get_template_part( 'nav-page', 'Page Navigation' );
	?>


<?php else : ?>
	<?php
		// If no content, include the "No post found" template
		get_template_part( 'no-posts', 'No Posts Template' );
	?>
<?php endif; ?>


<?php get_footer(); ?>