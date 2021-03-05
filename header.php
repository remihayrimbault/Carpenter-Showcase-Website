<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Franck Donsimoni: Artisan Charpentier - Chambéry</title>
  <meta name="author" content="La Cabane">
  <meta name="keywords" content="artisan, charpentier, chambéry">
  <meta name="description" content="Artisan charpentier à Chambéry et dans le bassin
  chambérien. Pour réaliser vos projets, cabane en bois, abri de jardin, etc.
  Appelez-moi pour un devis gratuit.">
  <meta name="thumbnail" content="/images/thumbnail.jpg" />
    <meta property="og:image" content="/images/thumbnail.jpg" />
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
                    <h1 id="nom-nav"><?php echo get_bloginfo('name'); ?></h1>
                  </div>
                  <div id="nav-droite">
                    <?php wp_nav_menu(array('theme_location' => 'menu-home')); ?>
                  </div>
                    <!-- Permet de récuperer un widget menu, déclarer dans functions.php -->
                </nav>
            </header>
