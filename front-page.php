<!-- Permet d'afficher la homepage, car front-page.php est pris avant index.php, c'est comme une page perso -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La Cabane</title>
      <link href="<?php bloginfo('template_directory');?>/reset.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory');?>/style.css" rel="stylesheet">
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
</head>

<body>
            <header>
                <nav id="nav-header">
                  <div id="nav-gauche">
                    <img id="logo-nav" src="<?php if( get_field('logo_frank') ): ?><?php the_field('logo_frank'); ?><?php endif; ?>" alt="Logo"/>
                    <p id="nom-nav"><?php echo get_bloginfo('name'); ?></p>
                  </div>
                  <div id="nav-droite">
                    <?php wp_nav_menu(array('theme_location' => 'menu-reseaux')); ?>
                  </div>
                    <!-- Permet de récuperer un widget menu, déclarer dans functions.php -->
                </nav>
            </header>
            <div id="dessous-nav">
              <div id="premierepage_vert"><p>Contactez-moi</p></div>
                <div id="premierepage_orange"><p>Vous avez un projet ou une envie ? Vous souhaitez construire une <span class="bold">cabane en bois</span>, un <span class="bold">abri de jardin</span>, une <span class="bold">terrasse</span> ou autres ? En tant qu’<span class="bold">artisan charpentier</span> expérimenté, je suis là pour enjoliver votre jardin et votre chez-vous.</p></div>
                <p id="texte_header"><?php echo get_bloginfo('description');?></p>
                <div id="video_header"><video src="<?php if( get_field('video_fond') ): ?><?php the_field('video_fond'); ?><?php endif; ?>" autoplay loop muted></video></div><!--<div id="jai_un_background" style=" background-image: url("<?php if( get_field('image_fond') ): ?><?php the_field('image_fond'); ?><?php endif; ?>") ; ">-->
            </div>
            <div id="reals">
              <h1 class="titres">Mes réalisations</h1>
            </div>

            <footer>

            </footer>

        <script src="https://kit.fontawesome.com/f1531d5e66.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <?php wp_footer(); ?>
</body>

</html>
