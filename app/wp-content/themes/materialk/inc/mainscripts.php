<?php
//Main Scripts/Framework/Styles
function hamDev_files(){
    wp_enqueue_script('google-maps-scripts', '//maps.googleapis.com/maps/api/js?key=AIzaSyAyOQgBZdTx5nEbEmw0uErcGVSYabwNvsM' , NULL, '1.0',true);
    wp_enqueue_style('hamdev-materialize', get_template_directory_uri() . '/css/materialize.min.css');
    wp_enqueue_script('hamdev-jquery-js', get_template_directory_uri(). '/js/jquery-3.4.1.min.js');
    wp_enqueue_script('hamdev-materialize-js', get_template_directory_uri(). '/js/materialize.min.js');
    wp_enqueue_script('hamdev-main-scripts', get_theme_file_uri('/js/scripts.js') , NULL, microtime(),true);
    wp_enqueue_script('hamdev-main-scripts-google-maps', get_theme_file_uri('/js/scripts-gm.js') , NULL, microtime(),true);
    wp_enqueue_script('hamdev-main-scripts-search', get_theme_file_uri('/js/scripts-search.js') , NULL, microtime(),true);
    wp_enqueue_script('hamdev-main-scripts-like', get_theme_file_uri('/js/like.js') , NULL, microtime(),true);
    wp_enqueue_style('google-fonts','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_script('font-awesome','https://kit.fontawesome.com/af56c7136d.js');
    wp_enqueue_style('hamdev-index-dev-style', get_stylesheet_uri());
    wp_localize_script('hamdev-main-scripts-search', 'materialkData',array(
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest')
    ));
}   
add_action('wp_enqueue_scripts','hamDev_files');
?>