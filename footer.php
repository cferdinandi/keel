<?php

/**
 * footer.php
 * Template for footer content.
 */

?>

				</div><!-- /.container -->
			</main><!-- /#main -->
		</div><!-- /[data-sticky-wrap] -->

		<hr>

		<footer data-sticky-footer>

			<div class="container text-center" >

				<?php
					// Secondary nav
					get_template_part( 'nav', 'secondary' );
				?>

				<?php
					// Search form
					get_search_form();
				?>

				<p>Copyright <?php echo date( 'Y' ); ?> <?php echo bloginfo( 'name' ); ?></p>

			</div>

		</footer>


		<?php wp_footer(); ?>

	</body>
</html>