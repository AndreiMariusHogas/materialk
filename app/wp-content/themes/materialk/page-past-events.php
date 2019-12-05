<?php get_header();
jumbotronBackgroundImage(array(
    'title' => 'PAST EVENTS',
    'subtitle' => 'Summary of our previous events'
));
?>

<div class="container">
    <?php
        $todayDate = date('Ymd');
        $pastEvents =  new WP_Query(array(
        'paged' => get_query_var('paged',1),
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
                            array(
                              'key' => 'event_date',
                              'value' => $todayDate,
                              'compare' => '<',
                              'type' => 'DATETIME'
                            )
                          )
                        ));
        while($pastEvents -> have_posts()) {
            $pastEvents -> the_post();?>
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
        echo paginate_links(array(
            'total' => $pastEvents -> max_num_pages
        ));
    ?>
</div>
    

<?php get_footer();?>