<?php 
/*
*
*	***** EMCI Verset du jour *****
*
*	This file initializes all EVDJ Core components
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
// Define Our Constants
define('EVDJ_CORE_INC',dirname( __FILE__ ).'/assets/inc/');
define('EVDJ_CORE_IMG',plugins_url( 'assets/img/', __FILE__ ));
define('EVDJ_CORE_CSS',plugins_url( 'assets/css/', __FILE__ ));
define('EVDJ_CORE_JS',plugins_url( 'assets/js/', __FILE__ ));
define('URL_EMCI',"https://emcitv.com/bible/verset-du-jour/");

/*
*
*  Register CSS
*
*/
function evdj_register_core_css(){
wp_enqueue_style('evdj-core', EVDJ_CORE_CSS . 'evdj-core.css',null,time(),'all');
};
add_action( 'admin_head', 'evdj_register_core_css' );
/*
*
*  Register JS/Jquery Ready
*
*/
function evdj_register_core_js(){
// Register Core Plugin JS	
wp_enqueue_script('evdj-core', EVDJ_CORE_JS . 'evdj-core.js','jquery',time(),true);
};
add_action( 'wp_enqueue_scripts', 'evdj_register_core_js' );

/**
 * Get the image of picture day.
 *
 * @since     1.0.0
 * @return    string    Get the image of verse day.
 */
function get_the_picture() {
    $content = file_get_contents(URL_EMCI);
    $picture_step_1 = explode( '<div class="photo">' , $content );
    $picture_step_2 = explode("</div>" , $picture_step_1[1] );

    return $picture_step_2[0];
}


/**
 * Get the image of verse day.
 *
 * @since     1.0.0
 * @return    string    Get the image of verse day.
 */
function get_the_verse() {
    $content = file_get_contents(URL_EMCI);
    $verse_step_1 = explode( '<div class="verse-text well">' , $content );
    $verse_step_2 = explode("</div>" , $verse_step_1[1] );

    return $verse_step_2[0];
}

/*
*
*  Includes
*
*/ 
// Load the Functions
if ( file_exists( EVDJ_CORE_INC . 'evdj-core-functions.php' ) ) {
	require_once EVDJ_CORE_INC . 'evdj-core-functions.php';
}     
// Load the ajax Request
if ( file_exists( EVDJ_CORE_INC . 'evdj-ajax-request.php' ) ) {
	require_once EVDJ_CORE_INC . 'evdj-ajax-request.php';
} 
// Load the Shortcodes
if ( file_exists( EVDJ_CORE_INC . 'evdj-shortcodes.php' ) ) {
	require_once EVDJ_CORE_INC . 'evdj-shortcodes.php';
}
