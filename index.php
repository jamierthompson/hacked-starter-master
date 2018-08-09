<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php or front-page.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hacked
 */

get_header(); ?>

	<main id="main" class="site-content" role="main">
		
		<div class="archive-view">
			
			<div class="content-area">

				<?php
				if ( have_posts() ) :

					echo hacked_get_the_archive_navigation( 'next' );

					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					echo hacked_get_the_archive_navigation( 'previous' );

				else :

					get_template_part( 'template-parts/content', 'none' );
				
				 endif; ?>

			</div>

		</div>
		
	</main><!-- #main -->

<?php

get_footer();

