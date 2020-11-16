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
            <div id="wrap">
              <div id="realisations">
                <h1>Vos projets</h1>
                <div id="vosprojets">
                  <div id="vosprojets_gauche">
                    <div class="parent">
                      <div class="div1" onclick="charpente();">
                        <div class="vosprojets_carte" id="charpente">
                          <img class="vosprojets_image" src="<?php bloginfo('template_directory') ?>/images/charpente.png'" alt="illustration">
                          <p>Charpente</p>
                        </div>
                      </div>
                      <div class="div2" onclick="cabane();">
                        <div class="vosprojets_carte" id="cabane">
                          <img class="vosprojets_image" src="<?php bloginfo('template_directory') ?>/images/cabane.png'" alt="illustration">
                          <p>Cabane</p>
                        </div>
                      </div>
                      <div class="div3" onclick="extension();">
                        <div class="vosprojets_carte" id="extension">
                          <img class="vosprojets_image" src="<?php bloginfo('template_directory') ?>/images/extension.png'" alt="illustration">
                          <p>Extension</p>
                        </div>
                      </div>
                      <div class="div4" onclick="mezzanine();">
                        <div class="vosprojets_carte" id="mezzanine">
                          <img class="vosprojets_image" src="<?php bloginfo('template_directory') ?>/images/mezzanine.png'" alt="illustration">
                          <p>Mezzanine</p>
                        </div>
                      </div>
                      <div class="div5" onclick="pergola();">
                        <div class="vosprojets_carte active" id="pergola">
                          <img class="vosprojets_image" src="<?php bloginfo('template_directory') ?>/images/pergola.png'" alt="illustration">
                          <p>Pergola</p>
                        </div>
                      </div>
                      <div class="div6" onclick="plus();">
                        <div class="vosprojets_carte" class="vosprojets_carte" id="plus">
                          <img class="vosprojets_image" src="<?php bloginfo('template_directory') ?>/images/plus.png'" alt="illustration">
                          <p>Plus</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="vosprojets_divbarre"><div id="vosprojets_barre"></div></div>
                  <div id="vosprojets_droite">
                    <div class="carousel_pergola">
                      <div><image class="image_carousel" src="<?php if( get_field('image_pergola1') ): ?><?php the_field('image_pergola1'); ?><?php endif; ?>" alt="photo pergola"></div>
                      <div><image class="image_carousel" src="<?php if( get_field('image_pergola2') ): ?><?php the_field('image_pergola2'); ?><?php endif; ?>" alt="photo pergola"></div>
                      <div><image class="image_carousel" src="<?php if( get_field('image_pergola3') ): ?><?php the_field('image_pergola3'); ?><?php endif; ?>" alt="photo pergola"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <footer>

            </footer>

        <script src="https://kit.fontawesome.com/f1531d5e66.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>

          function charpente() {
              $('#pergola').css('opacity', '30%');
              $('#extension').css('opacity', '30%');
              $('#cabane').css('opacity', '30%');
              $('#mezzanine').css('opacity', '30%');
              $('#plus').css('opacity', '30%');
              $('#charpente').css('opacity', '100%');
          };

          function cabane() {
              $('#pergola').css('opacity', '30%');
              $('#extension').css('opacity', '30%');
              $('#charpente').css('opacity', '30%');
              $('#mezzanine').css('opacity', '30%');
              $('#plus').css('opacity', '30%');
              $('#cabane').css('opacity', '100%');
          };

          function pergola() {
              $('#cabane').css('opacity', '30%');
              $('#extension').css('opacity', '30%');
              $('#charpente').css('opacity', '30%');
              $('#mezzanine').css('opacity', '30%');
              $('#plus').css('opacity', '30%');
              $('#pergola').css('opacity', '100%');
          };

          function plus() {
              $('#cabane').css('opacity', '30%');
              $('#extension').css('opacity', '30%');
              $('#charpente').css('opacity', '30%');
              $('#mezzanine').css('opacity', '30%');
              $('#pergola').css('opacity', '30%');
              $('#plus').css('opacity', '100%');
          };

          function mezzanine() {
              $('#cabane').css('opacity', '30%');
              $('#extension').css('opacity', '30%');
              $('#charpente').css('opacity', '30%');
              $('#plus').css('opacity', '30%');
              $('#pergola').css('opacity', '30%');
              $('#mezzanine').css('opacity', '100%');
          };

          function extension() {
              $('#cabane').css('opacity', '30%');
              $('#mezzanine').css('opacity', '30%');
              $('#charpente').css('opacity', '30%');
              $('#plus').css('opacity', '30%');
              $('#pergola').css('opacity', '30%');
              $('#extension').css('opacity', '100%');
          };
        </script>
        <?php wp_footer(); ?>
</body>

</html>
