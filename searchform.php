<?php

/**
 * searchform.php
 * Template for search form.
 */

?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url('/') ); ?>" >
	<label for="search"><?php _e( 'Search this site:', 'keel' ) ?></label>
	<input type="text" id="search" name="s" placeholder="<?php _e( 'Search this site...', 'keel' ) ?>" value="<?php get_search_query(); ?>">
	<button type="submit" id="searchsubmit"><?php _e( 'Search', 'keel' ) ?></button>
</form>