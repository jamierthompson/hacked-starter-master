<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Hacked
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses hacked_header_style()
 */
function hacked_custom_header_setup() {

	/**
	 * Filter Hacked custom-header support arguments.
	 *
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-image          Default image of the header.
	 *     @type string $default_text_color     Default color of the header text.
	 *     @type int    $width                  Width in pixels of the custom header image. 
	 *     @type int    $height                 Height in pixels of the custom header image. 
	 *     @type string $wp-head-callback       Callback function used to styles the header image and text
	 *                                          displayed on the blog.
	 *     @type string $flex-height            Flex support for height of header.
	 * }
	 */
	add_theme_support(
		'custom-header', apply_filters(
			'hacked_custom_header_args', array(
				'default-image'    => get_parent_theme_file_uri( '/assets/images/header.jpg' ),
				'width'            => 1000,
				'height'           => 250,
				'flex-height'      => true,
				'flex-width'	   => true,
				'wp-head-callback' => 'hacked_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'hacked_custom_header_setup' );

if ( ! function_exists( 'hacked_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see hacked_custom_header_setup().
	 */
	function hacked_header_style() {
		$header_text_color = get_header_textcolor();

		// If no custom options for text are set, let's bail.
		// get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
