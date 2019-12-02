<?php get_header();?>
    <?php
        while(have_posts()) {
            the_post();
            jumbotronBackgroundImage();
            ?>
        </section>
        </div>  
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div>
                    <p id="recipeName" class="flow-text"><a href="<?php echo get_post_type_archive_link('location');?>">
                        <i class="fas fa-home" aria-hidden="true"></i> 
                        All Locations</a> 
                        <span class="red-text"><?php the_title(); ?></span>
                    </p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
            <div class="col s12 m8 l8">
            <?php the_content(); ?>
            </div>
            <div class="col s12 m4 l4">
            <div class="card acf-map">
            <?php      
                    the_post();
                    $mapLocation = get_field('map_location');
                    ?>
                    <div class="marker" data-lat="<?php echo $mapLocation['lat'];?>" data-lng="<?php echo $mapLocation['lng'];?>">
                    <h6><?php the_title();?></h6>
                    <P><?php echo $mapLocation['address'];?></P>
                    </div>
            <?php
                wp_reset_postdata();
            ?>
            </div>
            </div>    
            </div>
            <hr>
        </div>
<?php
};
get_footer();
?>