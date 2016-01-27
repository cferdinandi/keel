<?php

/**
 * nav-secondary.php
 * Template for secondary site navigation.
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */

?>


<?php if ( has_nav_menu( 'secondary' ) ) : ?>
	<nav class="margin-bottom">
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'secondary',
					'container'      => false,
					'depth'          => -1,
					'menu_class'     => 'list-inline list-inline-responsive no-margin-bottom',
				)
			);
		?>
	</nav>
<?php endif; ?>
