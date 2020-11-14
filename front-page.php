<!-- Permet d'afficher la homepage, car front-page.php est pris avant index.php, c'est comme une page perso -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La Cabane</title>
    <link href="<?php bloginfo('template_directory');?>/style.css" rel="stylesheet">
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
</head>

<body>
            <header>
                <nav id="nav-header">
                  <div id="nav-gauche">
                    <img id="logo-nav" src="<?php bloginfo('template_directory')?>/images/logo.png'" alt="Logo"/>
                    <p id="nom-nav"><?php echo get_bloginfo('name'); ?></p>
                    <div id="nav-line"></div>
                    <div id="nav-titre">
                      <p>Charpentier</p>
                      <p>Bassin Chambérien</p>
                    </div>
                  </div>
                  <div id="nav-droite">
                    <?php wp_nav_menu(array('theme_location' => 'menu-reseaux')); ?>
                  </div>
                    <!-- Permet de récuperer un widget menu, déclarer dans functions.php -->
                </nav>
            </header>
            <div id="dessous-nav">
                <p id="texte_header">Charpentier depuis <span style="font-weight:500;color:white;">16 ans</span> sur le <span style="font-weight:500;color:white;">bassin Chambérien</span>, mon objectif est de vous <span style="font-weight:500;color:white;">accompagner</span> afin de <span style="font-weight:500;color:white;">réaliser</span> vos projets <span style="font-weight:500;color:white;">les plus fous</span>
                </p>
            </div>

            <footer>
                <nav>
                    <?php wp_nav_menu(array('theme_location' => 'menu-principal')); ?>
                </nav>
            </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <?php wp_footer(); ?>
</body>

</html>
