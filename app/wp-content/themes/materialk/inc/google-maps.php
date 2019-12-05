<?php 
//Google Maps API 
function hamDevApiKey($api){
    $api['key'] = 'Your API key';
    return $api;
};

add_filter('acf/fields/google_map/api','hamDevApiKey');
?>
