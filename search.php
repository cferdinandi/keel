<?php

/**
 * search.php
 * Template for search results.
 */

get_header(); ?>


<?php if (have_posts()) : ?>
	<header>
		<h1><?php _e( 'Search results for', 'keel' ); ?> "<?php the_search_query() ?>"</h1>
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


	<!-- Previous/Next page navigation -->
	<?php get_template_part( 'nav-page', 'Page Navigation' ); ?>


<?php
	// If no search results are found
	else :
?>
	<article>
		<header>
			<h1><?php _e( 'No results found for', 'keel' ); ?> "<?php the_search_query() ?>"</h1>
		</header>
		<p><?php _e( 'Sorry, your search didn\'t turn up any results. Maybe try using different keywords?', 'keel' ) ?></p>

		<?php
			// Include search form
			get_search_form();
		?>
	</article>
<?php endif; ?>


<?php get_footer(); ?>