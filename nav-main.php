<?php

/**
 * nav-main.php
 * Template for site navigation.
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */

?>

<nav class="nav-wrap-navbar nav-collapse <?php if ( !keel_has_hero() ) { echo 'margin-bottom'; } ?>  no-js-drop">
	<div class="container container-large">
		<a class="logo-navbar" href="<?php echo site_url(); ?>/">
			<?php
				$logo = get_theme_mod( 'keel_logo' );
				if ( empty( $logo ) ) :
			?>
				<?php bloginfo( 'name' ); ?>
			<?php else : ?>
				<?php if ( substr( $logo, -4 ) === '.svg' ) : ?>
					<?php echo file_get_contents( $logo ); ?>
					<span class="icon-fallback-text"><?php bloginfo( 'name' ); ?></span>
				<?php else : ?>
					<img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>">
				<?php endif; ?>
			<?php endif; ?>
		</a>
		<?php if ( has_nav_menu( 'primary' ) || wp_get_nav_menu_object( 'Primary' ) ) : ?>
			<a class="nav-toggle-navbar" data-nav-toggle="#nav-menu" href="#">Menu</a>
			<div class="nav-menu-navbar" id="nav-menu">
				<?php
					wp_nav_menu(
						array(
							'menu'           => 'Primary',
							'theme_location' => 'primary',
							'container'      => false,
							'menu_class'     => 'nav-navbar',
						)
					);
				?>
			</div>
		<?php endif; ?>
	</div>
</nav>