<?php 
//Google Maps API 
function hamDevApiKey($api){
    $api['key'] = 'AIzaSyAyOQgBZdTx5nEbEmw0uErcGVSYabwNvsM';
    return $api;
};

add_filter('acf/fields/google_map/api','hamDevApiKey');
?>
