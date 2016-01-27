<?php

/**
 * searchform.php
 * Template for search form.
 */

?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url('/') ); ?>" >
	<label class="screen-reader" for="search"><?php _e( 'Search this site:', 'keel' ) ?></label>
	<input type="text" class="input-inline input-search no-margin-bottom" id="search" name="s" placeholder="<?php _e( 'Search this site...', 'keel' ) ?>" value="<?php the_search_query(); ?>">
	<button type="submit" class="btn-search" id="searchsubmit">
		<svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 32 32"><path d="M31.008 27.23l-7.58-6.446c-.784-.705-1.622-1.03-2.3-.998C22.92 17.69 24 14.97 24 12 24 5.37 18.627 0 12 0S0 5.37 0 12c0 6.626 5.374 12 12 12 2.973 0 5.692-1.082 7.788-2.87-.03.676.293 1.514.998 2.298l6.447 7.58c1.105 1.226 2.908 1.33 4.008.23s.997-2.903-.23-4.007zM12 20c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8z"/></svg>
		<span class="icon-fallback-text"><?php _e( 'Search', 'keel' ) ?></span>
	</button>
</form>