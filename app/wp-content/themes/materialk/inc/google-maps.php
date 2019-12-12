<?php 
//Google Maps API 
function hamDevApiKey($api){
    $api['key'] = 'Your Api Key';
    return $api;
};

add_filter('acf/fields/google_map/api','hamDevApiKey');
?>
