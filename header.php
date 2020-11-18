<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Franck Donsimoni</title>
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
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
                    <img id="logo-nav" src="<?php if( get_field('logo_frank') ): ?><?php the_field('logo_frank'); ?><?php endif; ?>" alt="Logo"/>
                    <p id="nom-nav"><?php echo get_bloginfo('name'); ?></p>
                  </div>
                  <div id="nav-droite">
                    <?php wp_nav_menu(array('theme_location' => 'menu-home')); ?>
                  </div>
                    <!-- Permet de récuperer un widget menu, déclarer dans functions.php -->
                </nav>
            </header>
