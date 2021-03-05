<footer>
<div id="barre_de_fin">
	<div id="wrap-footer">
		<div id="footer_gauche">
			<img id="logo-footer" src="<?php the_field('logo_frank'); ?>" alt="Logo de Franck Donsimoni"/>
			<div id="texte_pres_footer">
				<p id="nom_footer"><?php echo get_bloginfo('name'); ?></p>
				<p id="desc_footer">Artisan Charpentier <br> Bassin Chambérien<p>
			</div>
		</div>
		<div id="footer_milieu">
			<div id="footer_milieu_haut">
				<img class="footer_illu" src="<?php bloginfo('template_directory') ?>/images/phone.png'" alt="illustration d'un téléphone">
				<p id="tel_footer"><?php the_field('telephone'); ?></p>
			</div>
			<div class="footer_milieu_bas">
				<img class="footer_illu" src="<?php bloginfo('template_directory') ?>/images/maps.png'" alt="illustration d'icone position">
				<p id="maps_footer" ><?php the_field('adresse'); ?></p>
			</div>
		</div>
		<div id="footer_droite">
			<div id="menu_footer">
				<?php wp_nav_menu(array('theme_location' => 'menu-home')); ?>
			</div>
		</div>
	</div>
	<div id="barre_final">
		<div id="barre_footer"></div>
		<p><a href="
<?php echo(get_permalink(get_page_by_path('credits')));?>" target="_blank">Crédits</a> - <a href="
<?php echo(get_permalink(get_page_by_path('mentions-legales')));?>" target="_blank">Mentions légales</a></p>
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

// Toggle Icone hamburger
			 $('.barres').click(function(){
					 $(this).toggleClass('active');
			 });

 var $hamburger = $('.barres');

 var hamburgerMotion = new TimelineMax()
 .to(".menu_responsive", 1.2, {left: '0%',ease: Expo.easeInOut,})
 .staggerFrom(".menu_responsive > ul > li", 0.5, {x: -100, opacity: 0}, 0.1)
 .reverse()

 $hamburger.on('click', function(e) {
		 hamburgerMotion.reversed(!hamburgerMotion.reversed());
 });

 $('.menu_responsive a').on('click', function(){
	 hamburgerMotion.reversed(!hamburgerMotion.reversed());
	 $('.barres').toggleClass('active');
 });
</script>
<script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "HomeAndConstructionBusiness",
    "image": [
      "<?php echo get_template_directory_uri(). '/images/thumbnail1.jpg'; ?>",
      "<?php echo get_template_directory_uri(). '/images/thumbnail2.jpg'; ?>",
      "<?php echo get_template_directory_uri(). '/images/thumbnail3.jpg'; ?>"
     ],
    "@id": "<?php echo site_url(); ?>",
    "name": "Franck Donsimoni: Artisan Charpentier",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "5 Rue de Stalingrad",
      "addressLocality": "Chambéry",
      "addressRegion": "Savoie",
      "postalCode": "73000",
      "addressCountry": "FR"
    },
      "author": {
        "@type": "Person",
        "name": "Franck Donsimoni"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": 40.761293,
      "longitude": 5.921313
    },
    "url": "<?php echo site_url(); ?>",
    "telephone": "0609089442"
  }
  </script>
<?php wp_footer(); ?>
</body>

</html>
