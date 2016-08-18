<?php

/**
 * nav-accessibility.php
 * Template for accessibility improvements to the navigation.
 */

?>

<div class="container container-large">

    <!-- Skip link for better a11y -->
    <a class="screen-reader screen-reader-focusable" href="#main"><?php _e( 'Skip to main content', 'keel' ); ?></a>

    <!-- a11y feedback -->
    <a class="screen-reader screen-reader-focusable" href="mailto:<?php echo antispambot( get_option( 'admin_email' ) ); ?>?subject=Accessibility%20Feedback"><?php _e( 'Accessibility Feedback', 'keel' ); ?></a>

</div>