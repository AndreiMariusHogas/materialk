<?php get_header();
jumbotronBackgroundImage(array(
    'title' => get_the_archive_title(),
    'subtitle' => get_the_archive_description()
))?>

<div class="container">
    <?php
        while(have_posts()) {
            the_post();?>
        <div class="card grey darken-4">
            <div class="card-content">
            <h5>
                <a class="deep-orange-text" href="<?php the_permalink(); ?>"><?php the_title();?></a>
            </h5>
                <p class="small">
                    <a class="center" href="<?php the_permalink(); ?>">
                        <span>
                            <?php 
                                $eventDate = new DateTime(get_field('event_date'));
                                echo $eventDate-> format('M');
                            ?></span>
                        <span>
                            <?php echo $eventDate->format('d');?>
                        </span>  
                        <span>
                            <?php echo $eventDate->format('Y');?>
                        </span>  
                    </a>
                </p>
            </div>
            <div class="card-action">
            <p class="white-text">
                    <?php echo wp_trim_words(get_the_excerpt(), 10);?>
                    <a class="deep-orange-text" href="<?php the_permalink(); ?>" > Learn more</a>
            </p>
            </div>
        </div>
        <hr>
            
    <?php
        };
            echo paginate_links();
    ?>
</div>
    

<?php get_footer();?>