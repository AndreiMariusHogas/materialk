<?php 
    //Subscriber Homepage Redirect
    add_action('admin_init','hamdevHomepageRedirect');

    function hamdevHomepageRedirect(){
        $currentUser = wp_get_current_user();
        if(count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber'){
            wp_redirect(site_url('/'));
            exit;
        }
    }
    //Remove Wordpress Dashboard from Subscribers
    add_action('wp_loaded','noAdminBarDisplaySub');

    function noAdminBarDisplaySub(){
        $currentUser = wp_get_current_user();
        if(count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber'){
            show_admin_bar(false);
        }
    }
?>