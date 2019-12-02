<?php get_header();
jumbotronBackgroundImage(array(
    'title' => 'Our Shop Locations',
    'subtitle' => 'A list of our physical locations'
))?>

<div class="container">
    <div class="row">
        <div class="col s12 m8 l8">
        <div class="card acf-map">
            <?php
                while(have_posts()) {
                    the_post();
                    $mapLocation = get_field('map_location');
                    ?>
                    <div class="marker" data-lat="<?php echo $mapLocation['lat'];?>" data-lng="<?php echo $mapLocation['lng'];?>">
                    <h6><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                    <P><?php echo $mapLocation['address'];?></P>
                    </div>
            <?php
                };
                    wp_reset_postdata();
            ?>
        </div>
        </div>
        <div class="col s12 m4 l4">
        <h6>All locations:</h6>
        <div class="collection">
        <?php
                while(have_posts()) {
                    the_post();
                    ?>
                    <a href="<?php the_permalink();?>" class="collection-item"><?php the_title();?></a>
            <?php
                };
                    wp_reset_postdata();
            ?>
        </div>
        </div>
    </div>
</div>
    

<?php get_footer();?>