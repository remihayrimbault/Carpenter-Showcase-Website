<?php

//Permet d'enregister des menus pour que le client les modifies, et les classes CSS
register_nav_menus( array(
	'menu-home' => 'Menu Accueil',
	'menu-reseaux' => 'Menu Réseaux Sociaux'
) );

//Permet d'enregister le style.css + bootstrap pour ceux qui l'utiliseront
function wpdocs_theme_name_scripts() {

	wp_enqueue_style('slick', get_template_directory_uri() . '/slick/slick.css');

	wp_enqueue_style('slick-theme.css', get_template_directory_uri() . '/slick/slick-theme.css');

	wp_enqueue_style('main-style', get_stylesheet_uri());

	wp_enqueue_script('main-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js');

	wp_enqueue_script('slickjs', get_template_directory_uri().'/slick/slick.js');

	wp_enqueue_script('anim-js', get_template_directory_uri().'/anim.js');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts');
/*
add_filter( 'wpcf7_validate_configuration', '__return_false' );
*/
?>
