<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hacked
 */

?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-right">
			<?php if( has_nav_menu( 'social' ) ) { ?>
				<nav class="social-menu">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>' . hacked_get_svg( array( 'icon' => 'chain' ) ),
						) );
					?>
				</nav><!-- .social-menu -->
			<?php } ?>
			<div class="site-info">
				&copy; <?php echo date ("Y");?> - Company Name Here - All Rights Reserved.
			</div>
		</div>

		<div class="footer-left">
			<div class="footer-contact">
				<p class="phone-number"><a href="tel:+1-xxx-xxx-xxxx">xxx-xxx-xxxx</a></p>
				<p>Address</p>
				<p>City, State, Zip</p>
			</div>
		</div>
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>





		