<?php get_header();
jumbotronBackgroundImage(array(
    'title' => 'Welcome to our blog',
    'subtitle' => 'Keep up with our latest news'
));
?>

<div class="container">
    <?php
        while(have_posts()) {
            the_post();?>
            <div class="row">
                <div class="col s12 m12">
                    <div class="card blue-grey darken-4">
                        <div class="card-content white-text">
                            <h2 class="card-title blog-headline"><a class="blog-headline deep-orange-text" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p> Posted by <?php the_author_posts_link(); ?> on <?php the_time('n M Y');?> <?php echo get_the_category_list(", ")?> </p>
                            <p> <?php the_excerpt(); ?></p>
                        </div>
                        <div class="card-action">
                        <a class="btn deep-orange lighten-2" href="<?php the_permalink();?>">Continue reading</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        };
            echo paginate_links();
    ?>
</div>
    

<?php get_footer();?>