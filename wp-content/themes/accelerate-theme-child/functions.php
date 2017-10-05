<?php
/**
 * Accelerate Marketing Child functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 2.0
 */

 function create_custom_post_types() {
    register_post_type( 'case_studies',
        array(
            'labels' => array(
                'name' => __( 'Case Studies' ),
                'singular_name' => __( 'Case Study' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'case-studies' ),
        )
    );
   register_post_type( 'client_services',
       array(
           'labels' => array(
               'name' => __( 'Client Services' ),
               'singular_name' => __( 'Client Service' )
           ),
           'public' => true,
           'has_archive' => true,
           'rewrite' => array( 'slug' => 'client-services' ),
       )
   );
}

add_action( 'init', 'create_custom_post_types' );

function accelerate_theme_child_widget_init() {

	register_sidebar( array(
	    'name' =>__( 'Homepage sidebar', 'accelerate-theme-child'),
	    'id' => 'sidebar-2',
	    'description' => __( 'Appears on the static front page template', 'accelerate-theme-child' ),
	    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	    'after_widget' => '</aside>',
	    'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'accelerate_theme_child_widget_init' );

// Enqueue scripts and styles
function accelerate_child_scripts() {
    wp_enqueue_style( 'accelerate-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'accelerate-style' ));

    wp_enqueue_style( 'accelerate-child-google-fonts', 'https://fonts.googleapis.com/css?family=Pacifico' );
}

add_action( 'wp_enqueue_scripts', 'accelerate_child_scripts' );

// // Enqueue scripts and styles
// function accelerate_child_scripts() {
//     wp_enqueue_style( 'accelerate-style', get_stylesheet_uri() );
//     wp_enqueue_style( 'accelerate-child-google-fonts', 'https://fonts.googleapis.com/css?family=Pacifico');
// }
// add_action( 'wp_enqueue_scripts', 'accelerate_child_scripts' );
