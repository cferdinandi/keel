<?php

/**
 * comments.php
 * Template for post comments.
 */

?>

<?php
	// If post is password protected, don't display comments
	if ( post_password_required() ) {
		return;
	}
?>

<?php if ( have_comments() ) : // If there are comments ?>

	<h2 id="comments"><?php comments_number( __( 'Comment', 'keel' ), __( '1 Comment', 'keel' ), __( '% Comments', 'keel' ) ); ?></h2>

	<?php
		wp_list_comments( array(
			'style' => 'div',
			'avatar_size' => 120,
			'callback' => 'keel_comment_layout' // Custom comment structure (in `functions.php`)
		) );
	?>

	<?php if ( !comments_open() ) : // if there are no comments ?>
		<p><?php _e( 'Comments are closed.', 'keel' ) ?></p>
	<?php endif; ?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // if paginated comments ?>
		<nav>
			<p>
				<?php previous_comments_link( __( '&larr; Older', 'keel' ) ); ?>
				<?php if ( get_previous_comments_link() && get_next_comments_link() ) { echo ' / '; } ?>
				<?php next_comments_link( __( 'Newer &rarr;', 'keel' ) ); ?>
			</p>
		</nav>
	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : // If comments are allowed ?>
	<?php keel_comment_form(); // Custom comment form (in `functions.php`) ?>
<?php endif; // end if comments are open ?>