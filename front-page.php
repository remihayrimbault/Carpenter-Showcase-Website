          <?php get_header(); ?>
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
                    <div id="bouton_contact_pres">
                      <a><p>Me contacter</p></a>
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
            </div>
              <div id="me_contacter">
                <h1>Me contacter</h1>
                <div id="formulaire">
                  <p id="intro_form">Exprimez vos envies et je vous rappelle.</p>
                  <?php $contact='[contact-form-7 id="101" title="Contact"]';
                    echo do_shortcode($contact);?>
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
              <?php get_footer(); ?>
