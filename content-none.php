<?php

/**
 * no-posts.php
 * Template for when no posts are found.
 */

?>

<article class="<?php if ( is_singular() ) { echo 'container'; } ?>">
	<header>
		<h1><?php _e( 'No posts to display', 'keel' ) ?></h1>
	</header>
</article>