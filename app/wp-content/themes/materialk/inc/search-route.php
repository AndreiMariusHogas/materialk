<?php 
    //NEW SEARCH ROUTE
    add_action('rest_api_init','customSearchRest');
    
    function customSearchRest() {
        register_rest_route('foodpalace/v1', 'search', array(
            'methods' => WP_REST_SERVER::READABLE,
            'callback' => 'customSearchResults'
        ));
    } 

    function customSearchResults(){
        return 'HERE COMES THE FUCKING ROUTE';
    }
?>
