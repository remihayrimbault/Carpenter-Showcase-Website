<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="charpentier,savoie,franck,donsimoni" />
    <meta name="description" content="Site de Franck Donsimoni, charpentier en Savoie" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <title>Franck Donsimoni</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <?php wp_head(); ?>
</head>
<body>
            <header>
							<div class="barres">
								<div class="hamburger"></div>
							</div>
							<div class="menu_responsive">
								<?php wp_nav_menu(array('theme_location' => 'menu-home')); ?>
							</div>
                <nav id="nav-header">
                  <div id="nav-gauche">
                    <img id="logo-nav" src="<?php if( get_field('logo_frank') ): ?><?php the_field('logo_frank'); ?><?php endif; ?>" alt="Logo de Franck Donsimoni"/>
                    <p id="nom-nav"><?php echo get_bloginfo('name'); ?></p>
                  </div>
                  <div id="nav-droite">
                    <?php wp_nav_menu(array('theme_location' => 'menu-home')); ?>
                  </div>
                    <!-- Permet de récuperer un widget menu, déclarer dans functions.php -->
                </nav>
            </header>
