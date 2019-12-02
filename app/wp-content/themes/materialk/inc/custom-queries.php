<?php
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
add_action('pre_get_posts','hamDev_sort_query');
?>