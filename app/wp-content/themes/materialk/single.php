<?php get_header();?>
    <?php
        while(have_posts()) {
            the_post();
            jumbotronBackgroundImage();?>
        </section>
        </div>  
        <div class="container">
            <div class="row">
                <div class="col s12 m8 l8">
                    <div class="v-align-wrapper">
                    <p class="flow-text"><a href="<?php echo site_url('/blog');?>">
                        <i class="fas fa-home" aria-hidden="true"></i> 
                        Blog Home</a> 
                        <span class="deep-orange-text"><?php the_title(); ?></span>
                    </p>
                    </div>
                </div>
                <div class="col s12 m4 l4">
                <ul class="collection">
                    <li class="collection-item">Author: <?php the_author_posts_link(); ?></li>
                    <li class="collection-item deep-orange-text">Posted On: <?php the_time('n M Y');?></li>
                    <li class="collection-item">Category: <?php echo get_the_category_list(", ")?></li>
                </ul>
                </div>
            </div>
            <hr>
            <div>
                <?php the_content(); ?>
            </div>

        </div>
<?php
};
get_footer();
?>