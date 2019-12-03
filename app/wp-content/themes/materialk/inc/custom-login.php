<?php 
//Custom Login/Signup 
add_filter('login_headerurl', 'foodpalaceHeader');

function foodpalaceHeader(){
    return esc_url(site_url('/'));
}
add_action('login_enqueue_scripts','loginCSS');

function loginCSS(){
    wp_enqueue_style('hamdev-index-dev-style', get_stylesheet_uri());
    wp_enqueue_style('google-fonts','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
}
?>