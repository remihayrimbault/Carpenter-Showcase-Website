<?php

//Permet d'enregister des menus pour que le client les modifies, et les classes CSS
register_nav_menus( array(
	'menu-home' => 'Menu Accueil',
	'menu-reseaux' => 'Menu Réseaux Sociaux'
) );

//Permet d'enregister le style.css + bootstrap pour ceux qui l'utiliseront
function wpdocs_theme_name_scripts() {
	wp_register_style('main-style', get_template_directory_uri().'/style.css', array(), true);
	wp_enqueue_style('main-style');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts');

?>
