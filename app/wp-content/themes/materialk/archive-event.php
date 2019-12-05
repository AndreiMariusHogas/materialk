<?php get_header();
jumbotronBackgroundImage(array(
    'title' => 'ALL EVENTS',
    'subtitle' => 'Upcoming Events from Food Palace'
))?>

<div class="container">
    <?php
        while(have_posts()) {
            the_post();?>
        <div class="card deep-orange lighten-5">
            <div class="card-content">
            <h5>
                <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
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
            <p>
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
    <p>Looking for a recap of past events? <a href="<?php echo site_url('/past-event');?>">Check out our past events archive</a></p>
</div>
    

<?php get_footer();?>