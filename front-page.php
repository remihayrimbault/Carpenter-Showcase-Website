<!-- Permet d'afficher la homepage, car front-page.php est pris avant index.php, c'est comme une page perso -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La Cabane</title>
    <link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body class="indexPage">
    <div class="maskIndex">
        <div class="line"></div>
        <div class="d-flex h-100 p-3 flex-column">

            <header class="mb-auto d-flex justify-content-between">
                <img class="pl-5 pt-5" src="<?php bloginfo('template_directory') ?>/images/monogramme.png'" alt="Monogramme" />
                <nav class="pr-5 pt-5 nav nav-masthead">
                    <?php wp_nav_menu(array('theme_location' => 'menu-reseaux')); ?>
                    <!-- Permet de récuperer un widget menu, déclarer dans functions.php -->
                </nav>
            </header>

            <main class="text-center">
                <h1><?php echo get_bloginfo('name'); ?></h1>
                <p class="lead"><?php echo get_bloginfo('description'); ?></p>
            </main>

            <footer class="mt-auto">
                <nav class="nav justify-content-center pb-5">
                    <?php wp_nav_menu(array('theme_location' => 'menu-principal')); ?>
                </nav>
            </footer>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"></script>
        <?php wp_footer(); ?>
</body>

</html>