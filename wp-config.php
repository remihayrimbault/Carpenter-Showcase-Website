<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wp' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ' &%V/$-6vvkp?>+?mT?BJbD>2@/2VAF1d^=]hE3HWq(FPi@Rgef;ES)<e5O%$MMn' );
define( 'SECURE_AUTH_KEY',  ',_2+m[8(x1|e{&CoM%n;@#3w!=zQ80mwhAC5AMnPbIQH7bx3[eWOwz.`dimP4T8l' );
define( 'LOGGED_IN_KEY',    'gluu|A@a8*IYlkgQq^)1PSq.PEX k<Cj<LsIf=LWHtj7wu9je6*)20(`8jJ2]{XU' );
define( 'NONCE_KEY',        'JX-fNO@?>y.|!nWHY^(x()!Sj:!xYF4,$iM::y(>^7X%SR6d} !P} s-tpx.jzhq' );
define( 'AUTH_SALT',        '78(.<tOr4WrJUq!wQ9Yuu86<|YF|D::FI*{r./$L30I 8#[n<(L;6;/VPzS|{j{-' );
define( 'SECURE_AUTH_SALT', '3*|w+ l)!AkiBf1K(Y9wn1u179KhE-[v?3(!7<LF}2tIHrcK4i`0T3odkrj@+Y>6' );
define( 'LOGGED_IN_SALT',   'Ca64s:z2- 2!P)/VhLDfqvRx)vANqHk>u8!d#fP=%cD+Q]u y_tnt2%9/L^3=Ooq' );
define( 'NONCE_SALT',       '=w/h2@`?+TGaiDK&qD[J$rysi?ri<F;q-q>U.%85>kjV#+jQ;$KvI{ZA}()/rB8=' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
