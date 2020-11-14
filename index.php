<?php get_header();?>
<a href="<?php the_permalink();?>"><?php the_title(); ?> </a>
<section>
  <!--The Loop (la boucle)-->
  <?php if( have_posts() ) :
      while ( have_posts() ) :
          the_post(); ?>
  <article>
      <h2><?php the_title(); ?></h2>
      <div><?php the_content(); ?></div>
  </article>
  <?php endwhile;else:?><p> Désolé pas d'article!</p>
    
  <?php endif; ?>
<section>
<?php get_footer();?>
