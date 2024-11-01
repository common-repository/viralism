<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action('admin_menu','viralism_option_menu');
function viralism_option_menu(){
	$icon_url = VIO_PLUGIN_URL.'/images/favicon.png';
  if(current_user_can('manage_options')){
    add_menu_page('Viralism',__('Viralism'),'administrator','viralism','wp_viralism_settings',$icon_url);
  } 
}
function wp_viralism_settings(){
	require_once 'dashboard/settings.php';
}

//Hooks For loading Stylesheets
add_action('admin_print_styles','viralism_stylesheet_include');
function viralism_stylesheet_include(){
	wp_register_style('jquery-google-font-css', 'http://fonts.googleapis.com/css?family=Kristi|Crafty+Girls|Yesteryear|Finger+Paint|Press+Start+2P|Spirax|Bonbon|Over+the+Rainbow');
	wp_enqueue_style('jquery-google-font-css');
	wp_register_style('prefix-style-source-css', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro');
	wp_enqueue_style('prefix-style-source-css' );
  wp_register_style('prefix-style-roboto-css', 'http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' );
  wp_enqueue_style('prefix-style-roboto-css' );  
  wp_register_style('prefix-style-poppins-css', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' );
  wp_enqueue_style('prefix-style-poppins-css' );  
  wp_register_style('font-awesome-css', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
  wp_enqueue_style('font-awesome-css' );    
	wp_register_style('dataTables-css', '//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css' );
  wp_enqueue_style('dataTables-css' );
  wp_register_style('fancybox-css', '//cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css' );
	wp_enqueue_style('fancybox-css' );	
  wp_register_style('prefix-style-bootstrap-min-css', VIO_PLUGIN_URL.'/css/bootstrap-3.3.7.min.css' );
  wp_enqueue_style('prefix-style-bootstrap-min-css' );
  wp_register_style('prefix-style-sweetalert-css', VIO_PLUGIN_URL.'/css/sweetalert.css' );
  wp_enqueue_style('prefix-style-sweetalert-css' );
  wp_register_style('prefix-style-templatemo-css', VIO_PLUGIN_URL.'/css/templatemo-style.css' );
  wp_enqueue_style('prefix-style-templatemo-css' );
	wp_register_style('prefix-style-custom-style-css', VIO_PLUGIN_URL.'/css/custom-style.css' );
  wp_enqueue_style('prefix-style-custom-style-css' );  
}
//Hooks For loading Scripts
add_action( 'admin_head', 'viralism_admin_scripts_method' );
function viralism_admin_scripts_method() {
  wp_enqueue_script(
    'bootstrap-3.3.7.min.js',
    VIO_PLUGIN_URL.'/js/bootstrap-3.3.7.min.js'
  );
  wp_enqueue_script(
    'dataTables',
    VIO_PLUGIN_URL.'/js/jquery.dataTables.min.js'
  );
  wp_enqueue_script(
    'fancybox',
    VIO_PLUGIN_URL.'/js/jquery.fancybox.min.js'
  );        
}
function dateFormat($date){
  return date('Y-m-d H:i',strtotime($date));
}
function get_iframe_src( $input ) {
  preg_match_all("/<iframe[^>]*src=[\"|']([^'\"]+)[\"|'][^>]*>/i", $input, $output );
  $return = array();
  if( isset( $output[1][0] ) ) {
    $return = $output[1][0];
  }
  return $return;
}