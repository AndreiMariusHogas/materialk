<?php
    function hamDevLikeRoute(){
        register_rest_route('foodpalace/v1', 'likeFeature',array(
            'methods' => 'POST',
            'callback' => 'addLike'
        ));
        register_rest_route('foodpalace/v1', 'likeFeature',array(
            'methods' => 'DELETE',
            'callback' => 'removeLike'
        ));
    }
    add_action('rest_api_init','hamDevLikeRoute');

    function addLike($data) {
        if(is_user_logged_in()){
            $chef = sanitize_text_field($data['chefID']);
            $existQuery = new WP_Query(array(
                'author' => get_current_user_id(),
                'post_type' => 'like',
                'meta_query' => array(
                    array(
                        'key' => 'liked_chef',
                        'compare' => '=',
                        'value' => $chef
                    )
                )
            ));
            if($existQuery->found_posts == 0 AND get_post_type($chef) == 'chef'){
                return wp_insert_post(array(
                    'post_type' => 'like',
                    'post_status' => 'publish',
                    'post_title' => 'JSTEST',
                    'meta_input' => array(
                        'liked_chef' => $chef
                    )
                ));
            }else{
                die("Invalid ID");
            }

        }else{
            die('You must be logged in to do that');
        };

        
    }
    function removeLike() {
        return 'I REMOVED A LIKE';
    }
?>