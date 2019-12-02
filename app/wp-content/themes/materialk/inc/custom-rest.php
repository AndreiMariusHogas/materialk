<?php
//Custom JSON Request 
function hamdev_custom_rest(){
    register_rest_field('post','authorName', array(
        'get_callback' => function() {return get_the_author();}
    ));
}
add_action('rest_api_init','hamdev_custom_rest');
?>