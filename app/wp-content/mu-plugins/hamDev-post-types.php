<?php
function hamDev_post_types(){
    //Events Registration
    register_post_type('event',array(
        'capability_type' => 'event',
        'map_meta_cap' => true,
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
        'capability_type' => 'recipe',
        'map_meta_cap' => true,
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
        'capability_type' => 'chef',
        'map_meta_cap' => true,
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
        'capability_type' => 'location',
        'map_meta_cap' => true,
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

    //Like Registration
    register_post_type('like',array(
        'supports' => array('title'),
        'public' => false,
        'show_ui' => true,
        'labels' => array(
            'name' => 'Likes',
            'add_new_item' => 'Add New Like',
            'edit_item' => 'Edit Like',
            'all_items' => 'All Likes',
            'singular_name' => 'Like'
        ),
        'menu_icon' => 'dashicons-heart'
    ));
}

add_action('init','hamDev_post_types')


?>