<?php

//Permet d'enregister des menus pour que le client les modifies, et les classes CSS
register_nav_menus( array(
	'menu-home' => 'Menu Accueil'
) );

//Permet d'enregister le style.css + bootstrap pour ceux qui l'utiliseront
function wpdocs_theme_name_scripts() {

	wp_enqueue_style('reset', '/css/reset.css');

	wp_enqueue_style('font', 'https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap');

	wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css');

	wp_enqueue_style('slick-theme.css', get_template_directory_uri() . '/css/slick-theme.css');

	wp_enqueue_style('main-style', get_stylesheet_uri());

	wp_enqueue_style('responsive', get_template_directory_uri() . '/style-responsive.css');

	wp_enqueue_script('main-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js');

	wp_enqueue_script('TweenMax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js');

	wp_enqueue_script('slickjs', get_template_directory_uri().'/js/slick.js');

	wp_enqueue_script('anim-js', get_template_directory_uri().'/js/anim.js');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts');

?>
