<?php
//Jumbotron BackgroundImage Function
function jumbotronBackgroundImage($args = NULL ){;
    if(!$args['title']){
        $args['title'] = get_the_title();
    }
    if(!$args['subtitle']){
        $args['subtitle'] = get_field('page_banner_subtitle');
    }
    if(!$args['image']){
        if(get_field('page_banner_background_image')){
            $args['image'] = get_field('page_banner_background_image')['sizes']['banner-background'];
        }else{
            $args['image'] = get_theme_file_uri('/images/ocean.jpg');
        }
    }
    ?>
    <section style="background-image: url(<?php echo $args['image'];?>);">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="container white-text" >
                    <h1 class="center"><?php echo $args['title'];?></h1>
                    <p class="center"><?php echo $args['subtitle'];?></p>
                </div>
            </div>
        </div>
    </section>
<?php
};
//Scripts and styles
function hamDev_files(){
    wp_enqueue_script('google-maps-scripts', '//maps.googleapis.com/maps/api/js?key=AIzaSyAyOQgBZdTx5nEbEmw0uErcGVSYabwNvsM' , NULL, '1.0',true);
    wp_enqueue_style('hamdev-materialize', get_template_directory_uri() . '/css/materialize.min.css');
    wp_enqueue_script('hamdev-jquery-js', get_template_directory_uri(). '/js/jquery-3.4.1.min.js');
    wp_enqueue_script('hamdev-materialize-js', get_template_directory_uri(). '/js/materialize.min.js');
    wp_enqueue_script('hamdev-main-scripts', get_theme_file_uri('/js/scripts.js') , NULL, microtime(),true);
    wp_enqueue_script('hamdev-main-scripts-google-maps', get_theme_file_uri('/js/scripts-gm.js') , NULL, microtime(),true);
    wp_enqueue_script('hamdev-main-scripts-search', get_theme_file_uri('/js/scripts-search.js') , NULL, microtime(),true);
    wp_enqueue_style('google-fonts','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_script('font-awesome','https://kit.fontawesome.com/af56c7136d.js');
    wp_enqueue_style('hamdev-index-dev-style', get_stylesheet_uri());
    wp_localize_script('hamdev-main-scripts-search', 'materialkData',array(
        'root_url' => get_site_url()
    ));
}   
add_action('wp_enqueue_scripts','hamDev_files');

//Enable Wordpress Features
function hamDev_features(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('banner-background', 3000, 500,true);
}
add_action('after_setup_theme','hamDev_features');

//Main Query Sorts
function hamDev_sort_query($query){
    if(!is_admin() AND is_post_type_archive('location') AND $query->is_main_query()){
        $query -> set('posts_per_page',-1);
    };
    if(!is_admin() AND is_post_type_archive('recipe') AND $query->is_main_query()){
        $query -> set('orderby','title');
        $query -> set('order','ASC');
        $query -> set('posts_per_page',-1);
    };
    if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){
        $today = date('Ymd');
        $query-> set('meta_key', 'event_date');
        $query-> set('orderby','meta_value_num');
        $query-> set('order','ASC');
        $query-> set('meta_query', array(
            array(
              'key' => 'event_date',
              'value' => $today,
              'compare' => '>=',
              'type' => 'DATETIME'
            )
          ));
    };
}
//Google Maps API 
function hamDevApiKey($api){
    $api['key'] = 'AIzaSyAyOQgBZdTx5nEbEmw0uErcGVSYabwNvsM';
    return $api;
}


add_action('pre_get_posts','hamDev_sort_query');
add_filter('acf/fields/google_map/api','hamDevApiKey');
?>