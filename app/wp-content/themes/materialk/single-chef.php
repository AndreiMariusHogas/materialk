<?php get_header();?>
    <?php
        while(have_posts()) {
            the_post();
            jumbotronBackgroundImage();
            ?>

        </div>  
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div>
                    <h2 id="eventName" class="flow-text deep-orange-text"><?php the_title(); ?>
                    </h2>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="row">
                    <div class="col s12 m8 l8">
                     <?php 
                     the_content(); ?>
                    </div>
                    <div class="col s12 m4 l4">
                    <img class="responsive-img" src="<?php the_post_thumbnail_url();?>">
                    <p id="chefID" class="center" data-chef="<?php the_ID();?>">
                    <?php 
                        $likeCount = new WP_Query(array(
                            'post_type' => 'like',
                            'meta_query' => array(
                                array(
                                    'key' => 'liked_chef',
                                    'compare' => '=',
                                    'value' => get_the_ID()
                                )
                            )
                        ));
                        if (is_user_logged_in()){
                            $existQuery = new WP_Query(array(
                                'author' => get_current_user_id(),
                                'post_type' => 'like',
                                'meta_query' => array(
                                    array(
                                        'key' => 'liked_chef',
                                        'compare' => '=',
                                        'value' => get_the_ID()
                                    )
                                )
                            ));
                            if($existQuery->found_posts) { ;?>
                                <i class="fas fa-heart deep-orange-text likeFeature" aria-hidden="true"></i>
                    <?php            
                            }else{;?>
                                <i class="far fa-heart deep-orange-text likeFeature" aria-hidden="true"></i>
                    <?php
                            }
                        }else{ ;?>
                            <i class="far fa-heart deep-orange-text likeFeature" aria-hidden="true"></i>
                    <?php 
                        }; 
                    ?>
                    <span class="flow-text deep-orange-text"><?php echo $likeCount->found_posts;?></span>
                    </p>
                    <?php 
                        $presentedRecipes = get_field('presented_recipes');
                        if($presentedRecipes){
                            echo '<h6 class="center cyan-text">Main Dishes:</h6>';
                            echo '<div class="collection">';
                            foreach($presentedRecipes as $recipe){;?>
                                <a class="collection-item deep-orange-text" href="<?php echo get_the_permalink($recipe) ;?>"><?php echo get_the_title($recipe) ;?></a>
                        <?php
                             };
                             echo '</div>';
                        }else{
                            echo 'No Recipe Specialization';
                        };
                        wp_reset_postdata();
                    ?>
                    </div>
                </div>
            </div>

        </div>
<?php
};
get_footer();
?>