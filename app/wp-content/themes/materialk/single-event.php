<?php get_header();?>
    <?php
        while(have_posts()) {
            the_post();
            jumbotronBackgroundImage();?>
        </div>  
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div>
                    <p id="eventName" class="flow-text"><a href="<?php echo get_post_type_archive_link('event');?>">
                        <i class="fas fa-home" aria-hidden="true"></i> 
                        Events Home</a> 
                        <span class="red-text"><?php the_title(); ?></span>
                    </p>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <div class="row">
                    <div class="col s12 m8 l8">
                     <?php the_content(); ?>
                    </div>
                    <div class="col s12 m4 l4">
                    <?php 
                        $presentedRecipes = get_field('presented_recipes');
                        if($presentedRecipes){
                            echo '<h6 class="center red-text">Menu of the event:</h6>';
                            echo '<div class="collection">';
                            foreach($presentedRecipes as $recipe){;?>
                                
                                
        
                                <a class="collection-item" href="<?php echo get_the_permalink($recipe) ;?>"><?php echo get_the_title($recipe) ;?></a>
                                
                    <?php
                             };
                             echo '</div>';
                        }else{
                            echo 'FILL THIS SPACE LATER';
                        }
                    ?>
                    </div>
                </div>
            </div>

        </div>
<?php
};
get_footer();
?>