<!-- Permet d'afficher la homepage, car front-page.php est pris avant index.php, c'est comme une page perso -->
if(isset($_POST['mailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
	{
		$header="MIME-Version: 1.0\r\n";
		$header.='From:"remihr.fr"<contact@remihr.fr>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';

		$message='
		<html>
			<body>
				<div align="center">
					<br />
					<u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
					<u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
					<br />
					'.nl2br($_POST['message']).'
					<br />
				</div>
			</body>
		</html>
		';

		mail("contact@remihr.fr", "CONTACT - remihr.fr", $message, $header);
		$msg="Votre message a bien été envoyé !";
	}
	else
	{
		$msg="<p style='color:white;margin-left:25%'>Tous les champs doivent être complétés.<p>";
	}
}

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La Cabane</title>
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
              <div id="premierepage_vert"><a href="#bouton_tem"><p>Contactez-moi</p></a></div>
                <div id="premierepage_orange"><p><?php the_field('texte_header'); ?></p></div>
                <p id="texte_header"><?php echo get_bloginfo('description');?></p>
                <div id="video_header"><video src="<?php if( get_field('video_fond') ): ?><?php the_field('video_fond'); ?><?php endif; ?>" autoplay loop muted></video></div><!--<div id="jai_un_background" style=" background-image: url("<?php if( get_field('image_fond') ): ?><?php the_field('image_fond'); ?><?php endif; ?>") ; ">-->
            </div>
            <div id="wrap">
              <div id="realisations">
                <h1>Vos projets</h1>
                <div id="vosprojets">
                  <div id="vosprojets_gauche">
                    <div class="parent">
                      <div class="div1" onclick="active_carte(charpente);">
                        <div class="vosprojets_carte" id="charpente">
                          <img class="vosprojets_image" src="<?php bloginfo('template_directory') ?>/images/charpente.png'" alt="illustration">
                          <p>Charpente</p>
                        </div>
                      </div>
                      <div class="div2" onclick="active_carte(cabane);">
                        <div class="vosprojets_carte" id="cabane">
                          <img class="vosprojets_image" src="<?php bloginfo('template_directory') ?>/images/cabane.png'" alt="illustration">
                          <p>Cabane</p>
                        </div>
                      </div>
                      <div class="div3" onclick="active_carte(extension);">
                        <div class="vosprojets_carte" id="extension">
                          <img class="vosprojets_image" src="<?php bloginfo('template_directory') ?>/images/extension.png'" alt="illustration">
                          <p>Extension</p>
                        </div>
                      </div>
                      <div class="div4" onclick="active_carte(mezzanine);">
                        <div class="vosprojets_carte" id="mezzanine">
                          <img class="vosprojets_image" src="<?php bloginfo('template_directory') ?>/images/mezzanine.png'" alt="illustration">
                          <p>Mezzanine</p>
                        </div>
                      </div>
                      <div class="div5" onclick="active_carte(pergola);">
                        <div class="vosprojets_carte active" id="pergola">
                          <img class="vosprojets_image" src="<?php bloginfo('template_directory') ?>/images/pergola.png'" alt="illustration">
                          <p>Pergola</p>
                        </div>
                      </div>
                      <div class="div6" onclick="active_carte(sauna);">
                        <div class="vosprojets_carte" id="sauna">
                          <img class="vosprojets_image" src="<?php bloginfo('template_directory') ?>/images/sauna.png'" alt="illustration">
                          <p>Sauna extérieur</p>
                        </div>
                      </div>
                      <div class="div7" onclick="active_carte(abris);">
                        <div class="vosprojets_carte" id="abris">
                          <img class="vosprojets_image" src="<?php bloginfo('template_directory') ?>/images/abris.png'" alt="illustration">
                          <p>Abris de jardin</p>
                        </div>
                      </div>
                      <div class="div8" onclick="active_carte(terrasse);">
                        <div class="vosprojets_carte" id="terrasse">
                          <img class="vosprojets_image" src="<?php bloginfo('template_directory') ?>/images/terrasse.png'" alt="illustration">
                          <p>Terrasse</p>
                        </div>
                      </div>
                      <div class="div9" onclick="active_carte(plus);">
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
                      <?php
                        $pergola = get_field('photos_de_pergola');
                        foreach($pergola as $pergolas):  ?>
                          <div class="carte_carousel"><div class="image_slider"><img class="image_carousel" src="<?php echo($pergolas['image_pergola']);?>" alt="photo pergola"></div></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="carousel_mezzanine">
                      <?php
                        $mezzanine = get_field('photos_de_mezzanine');
                        foreach($mezzanine as $mezzanines):  ?>
                          <div class="carte_carousel"><div class="image_slider"><img class="image_carousel" src="<?php echo($mezzanines['image_mezzanine']);?>" alt="photo mezzanine"></div></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="carousel_charpente">
                      <?php
                        $charpente = get_field('photos_de_charpente');
                        foreach($charpente as $charpentes):  ?>
                          <div class="carte_carousel"><div class="image_slider"><img class="image_carousel" src="<?php echo($charpentes['image_charpente']);?>" alt="photo charpente"></div></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="carousel_extension">
                      <?php
                        $extension = get_field('photos_de_extension');
                        foreach($extension as $extensions):  ?>
                          <div class="carte_carousel"><div class="image_slider"><img class="image_carousel" src="<?php echo($extensions['image_extension']);?>" alt="photo extension"></div></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="carousel_cabane">
                      <?php
                        $cabane = get_field('photos_de_cabane');
                        foreach($cabane as $cabanes):  ?>
                          <div class="carte_carousel"><div class="image_slider"><img class="image_carousel" src="<?php echo($cabanes['image_cabane']);?>" alt="photo cabane"></div></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="carousel_sauna">
                      <?php
                        $sauna = get_field('photos_de_sauna');
                        foreach($sauna as $saunas):  ?>
                          <div class="carte_carousel"><div class="image_slider"><img class="image_carousel" src="<?php echo($saunas['image_sauna']);?>" alt="photo sauna"></div></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="carousel_abris">
                      <?php
                        $abris = get_field('photos_de_abris');
                        foreach($abris as $abriss):  ?>
                          <div class="carte_carousel"><div class="image_slider"><img class="image_carousel" src="<?php echo($abriss['image_abris']);?>" alt="photo abris"></div></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="carousel_terrasse">
                      <?php
                        $terrasse = get_field('photos_de_terrasse');
                        foreach($terrasse as $terrasses):  ?>
                          <div class="carte_carousel"><div class="image_slider"><img class="image_carousel" src="<?php echo($terrasses['image_terrasse']);?>" alt="photo terrasse"></div></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="carousel_plus">
                      <?php
                        $plus = get_field('photos_de_plus');
                        foreach($plus as $pluss):  ?>
                          <div class="carte_carousel"><div class="image_slider"><img class="image_carousel" src="<?php echo($pluss['image_plus']);?>" alt="photo plus"></div></div>
                        <?php endforeach; ?>
                    </div>
                  </div>
                </div>
                <div id="presentation">
                  <div id="presentation-gauche">
                    <div class="parent2">
                      <div class="div1_2 div_galerie"><img class="image_galerie" src="<?php the_field('photo_galerie1'); ?>" alt="Photo galerie"></div>
                      <div class="div2_2 div_galerie"><img class="image_galerie" src="<?php the_field('photo_galerie2'); ?>" alt="Photo galerie"></div>
                      <div class="div3_2 div_galerie"><img class="image_galerie" src="<?php the_field('photo_galerie3'); ?>" alt="Photo galerie"></div>
                      <div class="div4_2 div_galerie"><img class="image_galerie" src="<?php the_field('photo_galerie4'); ?>" alt="Photo galerie"></div>
                      <div class="div5_2 div_galerie"><img class="image_galerie" src="<?php the_field('photo_galerie5'); ?>" alt="Photo galerie"></div>
                      <div class="div6_2 div_galerie"><img class="image_galerie" src="<?php the_field('photo_galerie6'); ?>" alt="Photo galerie"></div>
                    </div>
                  </div>
                  <div id="presentation-droite">
                    <div id="texte_pres">
                      <p><?php the_field('texte_projet'); ?></p>
                      <div id="video_pres"><video src="<?php bloginfo('template_directory') ?>/video_pres.mp4" controls preload="true"></video></div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="quisuisje">
                <h1>Qui suis-je ?</h1>
                <div id="franck">
                  <div id="texte_frank">
                    <p><?php the_field('texte_pres'); ?></p>
                  </div>
                  <div id="photo_frank">
                    <img id="photo_fr" src="<?php the_field('photo_frank'); ?>" alt="Photo de moi">
                  </div>
                </div>
                <div id="ma_plusvalue">
                  <h2>Ma plus-value</h2>
                  <div id="cartes_plusvalue">
                    <?php
                      $plus_value = get_field('plus_value');
                      foreach($plus_value as $plus_values):  ?>
                        <div class="carte_plusvalue">
                          <h3 class="h_plusvalue"><?php echo($plus_values['titre']);?></h3>
                          <img class="image_plusvalue" src="<?php echo($plus_values['image']);?>" alt="illustration">
                          <p class="p_plusvalue"><?php echo($plus_values['description']);?></p>
                        </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
            <div id="temoignages">
              <h2>Ils m'ont fait confiance</h2>
              <div class="carousel_temoignage">
              <?php
                $temoignage = get_field('temoignage');
                foreach($temoignage as $temoignages):  ?>
                  <div class="carte_temoignage">
                    <p class="temoignage_texte"><?php echo($temoignages['texte_tem']);?></p>
                    <p class="temoignage_auteur"><?php echo($temoignages['auteur_tem']);?></p>
                  </div>
                <?php endforeach; ?>
              </div>
              <div id="bouton_tem">
                <a href=""><p>En voir plus</p></a>
              </div>
            </div>
            <footer>
              <div id="me_contacter">
                <h1>Me contacter</h1>
                <div id="formulaire">
                  <p id="intro_form">Exprimez vos envies et je vous rappelle.</p>
                  <form method="POST" action="">
              			<input id="nom" type="text" name="nom" placeholder="Nom et prénom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" />
              			<input id="phone" type="phone" name="phone" placeholder="Numéro de téléphone" value="<?php if(isset($_POST['phone'])) { echo $_POST['phone']; } ?>" />
              			<textarea id="texte_form" name="message" placeholder="Votre demande" ><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea>
                    <p id="texte_mention">En envoyant ce message, vous consentez à la collecte et au traitement des données renseignées ci-dessus pour l’usage exclusif. <a style="color:black;text-decoration:underlined;">En savoir plus.</a></p>
              			<input id="bouton_form" type="submit" value="Envoyer !" name="mailform"/>
              		</form>
                </div>
                <div id="appel">
                  <div id="partie_verte">
                    <p id="num_bouton"><?php the_field('telephone'); ?></p>
                  </div>
                  <div id="partie_jaune">
                    <p>Appelez-moi pour discuter de votre projet !</p>
                  </div>
                </div>
              </div>
              <a href="#" id="retour">Retour en haut</a>
              <div id="barre_de_fin">
                <div id="wrap-footer">
                  <div id="footer_gauche">
                    <img id="logo-footer" src="<?php the_field('logo_frank'); ?>" alt="Logo"/>
                    <div id="texte_pres_footer">
                      <p id="nom_footer"><?php echo get_bloginfo('name'); ?></p>
                      <p id="desc_footer">Artisan Charpentier <br> Bassin Chambérien<p>
                    </div>
                  </div>
                  <div id="footer_milieu">
                    <div class="illu_footer">
                      <img class="footer_illu" src="<?php bloginfo('template_directory') ?>/images/phone.png'" alt="illustration">
                      <img class="footer_illu" src="<?php bloginfo('template_directory') ?>/images/maps.png'" alt="illustration">
                    </div>
                    <div class="contacts_footer">
                      <p id="tel_footer"><?php the_field('telephone'); ?></p>
                      <p id="maps_footer" ><?php the_field('adresse'); ?></p>
                    </div>
                  </div>
                  <div id="footer_droite">
                    <div id="menu_footer">
                      <?php wp_nav_menu(array('theme_location' => 'menu-reseaux')); ?>
                    </div>
                  </div>
                </div>
                <div id="barre_final">
                  <div id="barre_footer"></div>
                  <p><a href="#">Mentions légales</a> - Réalisé par l’agence <a href="#">La Cabane</a></p>
                </div>
              </div>

            </footer>

            <script type="text/javascript">
            $('.carousel_temoignage').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              dots:false,
              arrows:false,
              autoplay: true,
              autoplaySpeed: 5000,
            });

              $('.carousel_pergola').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: 2000,
              });

              $('.carousel_mezzanine').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: 2000,
              });

              $('.carousel_terrasse').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: 2000,
              });

              $('.carousel_plus').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: 2000,
              });

              $('.carousel_abris').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: 2000,
              });

              $('.carousel_sauna').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: 2000,
              });

              $('.carousel_cabane').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: 2000,
              });

              $('.carousel_extension').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: 2000,
              });

              $('.carousel_charpente').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: 2000,
              });
            </script>

            <script src="<?php bloginfo('template_directory'); ?>'/anim.js')"></script>
        <?php wp_footer(); ?>
</body>

</html>
