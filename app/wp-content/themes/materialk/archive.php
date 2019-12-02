<?php get_header();
jumbotronBackgroundImage(array(
    'title' => get_the_archive_title(),
    'subtitle' => get_the_archive_description()
))?>

<div class="container">
    <?php
        while(have_posts()) {
            the_post();?>
        <div>
            <h5>
                <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
            </h5>
                <p>
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
                <p>
                    <?php echo wp_trim_words(get_the_excerpt(), 10);?>
                    <a href="<?php the_permalink(); ?>" > Learn more</a>
                </p>
        </div>
        <hr>
            
    <?php
        };
            echo paginate_links();
    ?>
    <p>Looking for a recap of past events? <a href="<?php echo site_url('/past-event');?>">Check out our past events archive</a></p>
</div>
    

<?php get_footer();?>