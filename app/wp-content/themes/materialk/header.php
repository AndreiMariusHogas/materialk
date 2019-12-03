<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<nav>
    <div class="nav-wrapper">
      <a href="<?php echo site_url('/');?>" class="brand-logo">Food Palace</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li <?php if(is_page('about-us') or wp_get_post_parent_id(0) == 18 ) echo 'class="active"'?>><a href="<?php echo site_url('/about-us');?>">About Us</a></li>
            <li <?php if(get_post_type() == 'recipe' or is_page('recipes')) echo 'class="active"'?>><a href="<?php echo get_post_type_archive_link('recipe');?>">Recipes</a></li>
            <li <?php if(get_post_type() == 'event' or is_page('past-events')) echo 'class="active"'?>><a href="<?php echo get_post_type_archive_link('event');?>">Events</a></li>
            <li <?php if(get_post_type() == 'location' or is_page('locations')) echo 'class="active"'?>><a href="<?php echo get_post_type_archive_link('location');?>">Locations</a></li>
            <li <?php if(get_post_type() == 'post') echo 'class="active"'?>><a href="<?php echo site_url('/blog');?>">Blog</a></li>
            <?php 
              if(is_user_logged_in()){ ;?>
                <li><a href="<?php echo wp_logout_url();?>" class="btn-small cyan">Logout</a></li>
            <?php
              }else{ ;?>
                <li><a href="<?php echo wp_login_url();?>" class="btn-small">Login</a></li>
                <li><a href="<?php echo wp_registration_url();?>" class="btn-small">Sign Up</a></li>
            <?php  
              }
            ;?>
            
            <li>
              <a><i id="searchTrigger" class="fas fa-search" aria-hidden="true"></i></a>
            </li>
      </ul>
    </div>
    
  </nav>
  <ul class="sidenav" id="mobile-demo">
    <div class="row">
        <div class="col s12">
        <li class="center"><a href="<?php echo site_url('/about-us');?>">About Us</a></li>
        </div>
        <div class="col s12">
        <li class="center"><a class="text-big" href="<?php echo get_post_type_archive_link('recipe');?>">Recipes</a></li>
        </div>
        <div class="col s12">
        <li class="center"><a href="<?php echo get_post_type_archive_link('event');?>">Events</a></li>
        </div>
        <div class="col s12">
        <li class="center"><a href="<?php echo get_post_type_archive_link('location');?>">Locations</a></li>
        </div>
        <div class="col s12">
        <li class="center"><a href="<?php echo site_url('/blog');?>">Blog</a></li>
        </div>
        <div class="col s12">
        <li><a class="btn-small">Login</a></li>
        </div>
        <div class="col s12">
        <li><a class="btn-small">Sign Up</a></li>
        </div>   
    </div>
  </ul>