<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lee-theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php	get_template_part( 'template-parts/header', 'archive' ); ?>
                   
		<?php if ( have_posts() ) : ?>
			
			<header class="page-header">
				
			</header><!-- .page-header -->

			<article class="painting container">

				<div class="entry-content row">
					<?php
						/* Start the Loop */
					while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', 'card' );
					endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>

			</article>

	</main><!-- #main -->

<?php

get_footer();
