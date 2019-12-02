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

?>