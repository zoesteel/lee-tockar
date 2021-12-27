<?php
/**
 * Class created to generate the HTML structure of a CARD
 *
 * A card is a flexible and extensible content container.
 * It includes options for headers and footers, a wide variety of content and powerful display options.
 *
 * @package WordPress
 * @subpackage xneelo
 * @since 1.0
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-4' ); ?>>
	<a href="<?php echo esc_url( get_permalink() ); ?>">
		<figure><?php the_post_thumbnail(); ?></figure>
		<div class="card-header">
			<?php
				printf(
					'<h4 class="card-title"><a href="%s" title="%s">%s</a></h4>',
					esc_url( get_permalink() ),
					the_title_attribute(
						array(
							'before' => __( 'Link to: ', 'lee-theme' ),
							'echo'   => false,
						)
					),
					wp_kses_post( get_the_title() )
				);
				?>
		</div>
	</a>

</div>
