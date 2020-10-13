<?php 
/*
Plugin Name: EMCI Verset du jour
Plugin URI: https://github.com/arnoldkouya/emci-verset-du-jour
Description: EMCI Verset du jour est un plugin qui permet d\'avoir le verset du jour disponible sur le site www.emci.com
Version: 1.0.0
Author: Arnold KOUYA
Author URI: https://arnoldkouya.com
Text Domain: evdj
*/

// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if

// Let's Initialize Everything
if ( file_exists( plugin_dir_path( __FILE__ ) . 'core-init.php' ) ) {
require_once( plugin_dir_path( __FILE__ ) . 'core-init.php' );

    function wpdocs_add_dashboard_widgets() {
        wp_add_dashboard_widget('dashboard_widget', 'EMCI Verset du jour', 'dashboard_widget_function');
    }
    add_action('wp_dashboard_setup', 'wpdocs_add_dashboard_widgets');

    /**
     * Output the contents of the dashboard widget
     */
    function dashboard_widget_function( $post, $callback_args ) {
        print '<div class="verse">'.get_the_verse().'</div>';
        print '<div class="img-card">'.get_the_picture().'</div>';
        print '<div class="author">Réalisé par <a href="https.//arnoldkouya.com">Arnold KOUYA</a> </div>';
    }
}
