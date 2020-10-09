<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Rémi Hay--Rimbault">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" />
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <h1>T'as vu</h1>

        <section>
            <aside>
                <?php get_sidebar(); ?>
            </aside>
        </section>
        <?php get_header();?>
        <section id="container">
        <aside>
            <?php get_sidebar();?>
        </aside>

        <!-- The Loop -->
        <?php if(have_posts()):
            while(have_posts()):
                the_post()?>

        <article>
                <h2><?php the_title()?></h2>
                <div><?php the_content()?></div>
        </article>
            <?php endwhile; else:?>
            <p>Pas d'articles</p>
            <?php endif?>
        </section>
        <nav id="menuprincipal">
            <?php wp_page_menu('show_home=1'); ?>
        </nav>
    </header>
