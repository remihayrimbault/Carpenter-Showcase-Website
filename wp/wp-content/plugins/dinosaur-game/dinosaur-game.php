<?php
/**
 * Plugin Name: Dinosaur Game
 * Plugin URI: https://chrisdavidmiles.com/dinosaur-game
 * Description: Add the dinosaur game from Google Chrome to your site using the [dinosaur-game] shortcode.
 * Version: 1.0.5
 * Author: Chris David Miles
 * Author URI: https://chrisdavidmiles.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) )  die; 


/**
 * A few plugin definitions.
 */

defined( 'DINOGAME_VERSION' ) or define( 'DINOGAME_VERSION', '1.0.5' );
defined( 'DINOGAME_URL' ) or define( 'DINOGAME_URL', plugin_dir_url( __FILE__ ) );


/**
 * Register CSS and JS used by the game.
 */

add_action( 'wp_enqueue_scripts', 'dinogame_js_css' );
function dinogame_js_css() {
    wp_register_script( 'dinosaur-game-logic', plugins_url( 'game-logic.min.js', __FILE__), array('jquery'), DINOGAME_VERSION, true );
    wp_register_style( 'dinosaur-game-style', plugins_url( 'game-style.min.css', __FILE__), '', DINOGAME_VERSION );
}


/**
 * Define and register [dinosaur-game] shortcode.
 */

add_shortcode( 'dinosaur-game', 'dinogame_register_shortcode' );
function dinogame_register_shortcode (){
    static $dinogame_run = false;
    if ( $dinogame_run ) {
        return '<p>The dinosaur game can only be used once per page.</p>';
    } 
    $dinogame_run = true;
    wp_enqueue_script( 'dinosaur-game-logic' );
    wp_enqueue_style( 'dinosaur-game-style' );
    include_once( plugin_dir_path( __FILE__ ) . 'game-audio.php');
    $dinogame_img_classes   = 'a3-notlazy disable-lazyload no-lazy no-lazyload skip-lazy';
    $dinogame_img_attrib    = 'data-lazy-src data-crazy-lazy="exclude" data-no-lazy data-no-lazy="1"';
    $dinogame_html          = '
    <div id="dino-outer" class="dino-outer">
        <div class="dino-inner">
            <div class="dino-icon dino-initial-icon" alt=""></div>
            <div id="dino-game">
                <img id="dinogame-sprites-1x" style="display:none;" class="' . $dinogame_img_classes . '" src="' . DINOGAME_URL . 'game-sprites-1x.png" ' . $dinogame_img_attrib . '>
                <img id="dinogame-sprites-2x" style="display:none;" class="' . $dinogame_img_classes . '" src="' . DINOGAME_URL . 'game-sprites-2x.png" ' . $dinogame_img_attrib . '>';
                $dinogame_html .= $dinogame_audio . '
            </div>
        </div>
    </div>';
    return $dinogame_html;
}


/**
 * Skip Jetpack Photon CDN for game sprite png files.
 */

add_filter( 'jetpack_photon_skip_image', 'dinogame_skip_photon', 10, 3 );
function dinogame_skip_photon( $val, $src, $tag ) {
    if ( strpos($src, DINOGAME_URL) !== false ) {
        return true;
    }
    return $val;
}

