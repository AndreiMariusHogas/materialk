<?php
//Enable Wordpress Features
function hamDev_features(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('banner-background', 3000, 500,true);
}
add_action('after_setup_theme','hamDev_features');
?>