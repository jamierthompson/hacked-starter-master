<?php
/**
 * The file for displaying the front page (home) page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hacked
 */

get_header(); ?>

	<main id="main" class="site-content" role="main">

		<div class="front-page">

			<!-- Hero Image and Text -->
				<?php if ( get_field( 'hero_image' ) ) { ?>
					<div class="hero-image" style="background-image:url(<?php the_field( 'hero_image' ); ?>)">

				<?php } ?>

				<div class="overlay">			

				<p class="homepage-hero-image-text"><?php the_field( 'hero_image_text' ); ?></p>

				</div>
				</div>
			<!-- End Hero Image and Text -->

			<?php while ( have_posts() ): the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; ?>
		
		</div>
			
	</main><!-- #main -->
	
<?php 

get_footer();




	
