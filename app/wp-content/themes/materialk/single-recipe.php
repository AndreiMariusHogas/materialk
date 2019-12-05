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
                    <p id="recipeName" class="flow-text"><a href="<?php echo get_post_type_archive_link('recipe');?>">
                        <i class="fas fa-home" aria-hidden="true"></i> 
                        All recipes</a>
                        
                        <span class="deep-orange-text"><?php the_title(); ?></span>
                    </p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
            <div class="col s12 m6 l6">
            <?php the_content(); ?>
            </div>
            <div class="col s12 m3 l3">
            <?php 
                        $shopLocations = get_field('related_shops');
                        if($shopLocations){
                            echo '<h6 class="center cyan-text">Available at our locations:</h6>';
                            echo '<div class="collection">';
                            foreach($shopLocations as $shop){;?>
                                
                                
        
                                <a class="collection-item deep-orange-text" href="<?php echo get_the_permalink($shop) ;?>"><?php echo get_the_title($shop) ;?></a>
                                
                    <?php
                             };
                             echo '</div>';
                        }else{
                            echo '<em id="recipeError">No locations serve this recipe at this moment!</em>';
                        }
                    ?>
            </div>
            <div class="col s12 m3 l3">
            <?php 
                    $today = date('Ymd');
                    $eventPosts =  new WP_Query(array(
                    'posts_per_page' => 2,
                    'post_type' => 'event',
                    'meta_key' => 'event_date',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                        'key' => 'event_date',
                        'value' => $today,
                        'compare' => '>=',
                        'type' => 'DATETIME'
                        ),
                        array(
                            'key' => 'presented_recipes',
                            'compare' => 'LIKE',
                            'value' => '"'.get_the_ID().'"'
                        )
                    )
                    ));
                    if($eventPosts -> have_posts()){
                        echo '<h6 class="cyan-text">Upcoming Tasting Events:</h6>';
                        echo '<div class="collection">';
                        while($eventPosts-> have_posts()){
                            $eventPosts -> the_post();?>
                            <a href="<?php the_permalink();?>" class="collection-item deep-orange-text"><?php the_title();?></a>
                    <?php
                    }; 
                    echo '</div>';
                    }
                wp_reset_postdata();
                ?>
            </div>    
            </div>
            <hr>
            <div class="row">
            <?php 
                    $masterChefs =  new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => 'chef',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'presented_recipes',
                            'compare' => 'LIKE',
                            'value' => '"'.get_the_ID().'"'
                        )
                    )
                    ));
                    if($masterChefs -> have_posts()){
                        echo '<h4 class="deep-orange-text" >Recipe Master Chef(s):</h4>';
                        echo '<ul class="collection">';
                        while($masterChefs-> have_posts()){
                            $masterChefs -> the_post();?>
                        <li class="collection-item avatar cyan-text">
                        <img src="<?php the_post_thumbnail_url(''); ?>" class="circle">
                            <p class="flow-text master-chef"><?php the_title();?></p>
                            <a href="<?php the_permalink();?>" class="secondary-content flow-text cyan-text"><i class="fas fa-info-circle cyan-text"></i> More Info</a>
                        </li>
                    <?php
                    }; 
                    echo '</ul>';
                    };
                wp_reset_postdata();

                ?>
            </div>
        </div>
<?php
};
get_footer();
?>