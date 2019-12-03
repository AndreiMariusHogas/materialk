<?php 
    //NEW SEARCH ROUTE
    add_action('rest_api_init','customSearchRest');
    
    function customSearchRest() {
        register_rest_route('foodpalace/v1', 'search', array(
            'methods' => WP_REST_SERVER::READABLE,
            'callback' => 'customSearchResults'
        ));
    } 

    function customSearchResults($searchkeyword){
        $allposts = new WP_Query(array(
            'post_type' => array('post','page','chef','recipe','location','event'),
            's' => sanitize_text_field($searchkeyword['keyword']),
            'posts_per_page' => -1
        ));
        $allpostsResults = array(
            'mainInfo' => array(),
            'chefs' => array(),
            'recipes' => array(),
            'events' => array(),
            'locations' => array()
        );

        while($allposts->have_posts()){
            $allposts->the_post();
            if(get_post_type() == 'post' OR get_post_type() == 'page'){
                array_push($allpostsResults['mainInfo'],array(
                    'name' => get_the_title(),
                    'url' => get_the_permalink(),
                    'postType' => get_post_type(),
                    'authorName' => get_the_author()
                ));
            }
            if(get_post_type() == 'chef'){
                array_push($allpostsResults['chefs'],array(
                    'name' => get_the_title(),
                    'url' => get_the_permalink()
                ));
            }
            if(get_post_type() == 'recipe'){
                array_push($allpostsResults['recipes'],array(
                    'name' => get_the_title(),
                    'url' => get_the_permalink()
                ));
            }            if(get_post_type() == 'event'){
                array_push($allpostsResults['events'],array(
                    'name' => get_the_title(),
                    'url' => get_the_permalink()
                ));
            }            if(get_post_type() == 'location'){
                array_push($allpostsResults['locations'],array(
                    'name' => get_the_title(),
                    'url' => get_the_permalink()
                ));
            }
           
        }
        return $allpostsResults;
    }
?>
