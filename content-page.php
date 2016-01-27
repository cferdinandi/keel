<?php

/**
 * content-page.php
 * Template for page content.
 */

?>

<article>

	<?php
		// Get hero
		keel_get_hero();
	?>

	<?php
		// Get container size
		$page_width = get_post_meta( $post->ID, 'keel_page_width', true );
		$container = 'container';

		// If set to something other than the default, adjust
		if ( $page_width === 'wide' ) { $container .= ' container-large'; }
		if ( $page_width === 'full' ) { $container = ''; }
	?>

	<div class="<?php echo $container; ?>">

		<?php if ( !keel_has_hero() ) : ?>
			<h1><?php the_title(); ?></h1>
		<?php endif; ?>

		<?php
			// The page or post content
			the_content( '<p>' . __( 'Read More...', 'keel' ) . '</p>' );
		?>

		<?php
			// Add link to edit pages
			edit_post_link( __( 'Edit', 'keel' ), '<p>', '</p>' );
		?>
	</div>

</article>