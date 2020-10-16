<?php

  // ajout du title

  function ajout_titre() {
      add_theme_support("title-tag");
  };

  function ajout_style(){
    wp_enqueue_style('general',get_template_directory_uri().'/style.css');
    wp_enqueue_script('special',get_template_directory_uri().'js/script.js');
  };

  add_action('after_setup_theme', 'ajout_titre');

  add_action('wp_enqueue_scripts','ajout_style');

?>
