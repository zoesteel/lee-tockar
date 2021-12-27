<?php
/**
 * Template part to print the image as the header of the content
 *
 * @package WordPress
 * @subpackage lee-theme
 * @since 1.0
 */

?>

<section>
	<?php
	if ( get_the_post_thumbnail_url() ) {
		$img_url = get_the_post_thumbnail_url();
		$styles  = 'background-image: url(' . esc_url( $img_url ) . ');';
		?>
		<div class="header-cover" style="<?php echo esc_html( $styles ); ?>">

		<?php
		// if ( is_page() ) {
			?>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
			<?php
		// }
		?>
		</div>

	<?php } else { ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
	<?php } ?>

</section>
