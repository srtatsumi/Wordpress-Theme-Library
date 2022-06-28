<?php
/**
 * Fitness functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fitness
 * @since Fitness 1.0
 */

require_once get_template_directory() . '/inc/plugin.php';
require_once get_template_directory() . '/inc/demo-import.php';

if ( ! function_exists( 'fitness_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Fitness 1.0
	 *
	 * @return void
	 */
	function fitness_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style(array(  //Adds the custom style path
			'css/bootstrap.min.css',
			'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap',
			'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css',
			'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css',
			'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css',
			'css/slick.min.css',
			'style.css',
			'/css/responsive.css'
		));

	}

endif;

add_action( 'after_setup_theme', 'fitness_support' );

if ( ! function_exists( 'fitness_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Fitness 1.0
	 *
	 * @return void
	 */
	
	function fitness_styles() {

		// Register theme stylesheet.
		wp_register_style(
			'fitness-style',
			get_template_directory_uri() . '/style.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);

		// Enqueue theme stylesheet.
		// wp_enqueue_style( 'fitness-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'fitness_styles' );

/**
 * Registers block patterns and categories.
 *
 * @since Fitness 1.0
 *
 * @return void
 */
function fitness_register_block_pattern_categories() {
	$block_pattern_categories = array(
		'images'   => array( 'label' => __( 'Images', 'fitness' ) ),
		'featured' => array( 'label' => __( 'Featured', 'fitness' ) ),
		'footer'   => array( 'label' => __( 'Footers', 'fitness' ) ),
		'header'   => array( 'label' => __( 'Headers', 'fitness' ) ),
		'query'    => array( 'label' => __( 'Query', 'fitness' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since fitness 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'fitness_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

}
add_action( 'init', 'fitness_register_block_pattern_categories', 9 );



function theme_style(){
	wp_enqueue_style('bootstrap', get_theme_file_uri('css/bootstrap.min.css'));
	wp_enqueue_style('google-fonts-os', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
	wp_enqueue_style('google-fonts-bn', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
	wp_enqueue_style('font-awesome','//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');
	wp_enqueue_style('slick-theme','//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
	wp_enqueue_style('slick-min-style','//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
	wp_enqueue_style('slick-min', get_theme_file_uri('css/slick.min.css'));
	
	wp_enqueue_style('theme_style', get_theme_file_uri('style.css'));
	wp_enqueue_style('theme_style_responsive', get_theme_file_uri('/css/responsive.css'));
}
add_action('wp_enqueue_scripts', 'theme_style');


function theme_scripts(){
	$version=wp_get_theme()->get('Version');

	wp_register_script('bootstrap',get_theme_file_uri('/js/bootstrap.bundle.min.js'),array(),$version,true);
	wp_enqueue_script('bootstrap');

	wp_register_script('fitnessjquery',get_theme_file_uri('/js/jquery.min.js'),array(),$version,true);
	wp_enqueue_script('jquery');

	wp_register_script('slick','//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js',array('fitnessjquery'),'1.8.1',true);
	wp_enqueue_script('slick');

	wp_register_script('custom',get_theme_file_uri('/js/master.js'),array('fitnessjquery'),$version,true);
	wp_enqueue_script('custom');

	wp_register_script('custom-slick',get_theme_file_uri('/js/slick-custom.js'),array('fitnessjquery'),$version,true);
	wp_enqueue_script('custom-slick');

}