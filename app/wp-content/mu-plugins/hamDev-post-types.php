<?php
function hamDev_post_types(){
    //Events Registration
    register_post_type('event',array(
        'rewrite' => array('slug' => 'events'),
        'has_archive' => true,
        'supports'=> array('title','thumbnail','editor','page-attributes','excerpt','custom-fields'),
        'public' => true,  
        'labels' => array(
            'name' => 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-calendar'
    ));   
    //Recipe Registration
    register_post_type('recipe',array(
        'rewrite' => array('slug' => 'recipes'),
        'has_archive' => true, 
        'supports' => array('title', 'thumbnail','editor','page-attributes','excerpt','custom-fields'),
        'public' => true,
        'labels' => array(
            'name' => 'Recipes',
            'add_new_item' => 'Add New Recipe',
            'edit_item' => 'Edit Recipe',
            'all_items' => 'All Recipes',
            'singular_name' => 'Recipe'
        ),
        'menu_icon' => 'dashicons-book-alt'
    ));
    //Chef Registration
    register_post_type('chef',array(
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail','editor','page-attributes','excerpt','custom-fields'),
        'public' => true,
        'labels' => array(
            'name' => 'Chefs',
            'add_new_item' => 'Add New Chef',
            'edit_item' => 'Edit Chef',
            'all_items' => 'All Chefs',
            'singular_name' => 'Chef'
        ),
        'menu_icon' => 'dashicons-businessman'
    ));
    //Location Registration
    register_post_type('location',array(
        'rewrite' => array('slug' => 'locations'),
        'has_archive' => true,
        'supports'=> array('title','thumbnail','editor','page-attributes','excerpt','custom-fields'),
        'public' => true,  
        'labels' => array(
            'name' => 'Locations',
            'add_new_item' => 'Add New Location',
            'edit_item' => 'Edit Location',
            'all_items' => 'All Locations',
            'singular_name' => 'Location'
        ),
        'menu_icon' => 'dashicons-location-alt'
    ));   
}

add_action('init','hamDev_post_types')


?>