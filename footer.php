<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lee
 */

?>

<footer id="colophon" class="site-footer">
	<div class="site-info">

		<div>
			<?php
			$footer_title = get_theme_mod( 'footer_title', FOOTER_TITLE );
			?>
			<h2><?php echo esc_html( $footer_title ); ?></h2>
		</div>
		<div>
			<h4>Menu</h4>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer_menu',
					)
				);
				?>
			</div>

		<?php	if ( get_theme_mod( 'contact_mail' ) ) { ?>
				<div>
					<h4>Contact</h4>
					<p><?php echo esc_html( get_theme_mod( 'contact_mail' ) ); ?></p>
				</div>
		<?php	} ?>

		<div>
			<h4>Social</h4>
		</div>

	</div><!-- .site-info -->

	<div class="copyright">
		<p><?php echo esc_html( get_theme_mod( 'copyright', '&copy; Lee Tockar ' . esc_html( gmdate( 'Y' ) ), FOOTER_COPYRIGHT ) ); ?></p>
	</div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
