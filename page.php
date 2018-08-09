<?php
/**
 * The template for displaying pages when no other specific template is available.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hacked
 */

get_header(); ?>

	<main id="main" class="site-content" role="main">

		<div class="sidebar-right">

			<div class="content-area">

				<header class="entry-header">
							
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					
					<?php
					/*
					 * If a regular post or page, and not the front page, show the featured image.
					 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
					*/
					if ( ( is_single() || is_page() ) && has_post_thumbnail( get_queried_object_id() ) ) :
						echo '<figure class="featured-image">';
						echo get_the_post_thumbnail( get_queried_object_id(), 'hacked-index' );
						echo '</figure><!-- .featured-image -->';
					endif;
					?>
			
				</header><!-- .entry-header -->

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	</main><!-- #main -->
	
<?php 

get_footer();
