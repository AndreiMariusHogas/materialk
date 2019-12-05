<?php get_header();?>
    <section style="background-image: url(<?php echo get_theme_file_uri('/images/background.jpg'); ?>);">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="container white-text" >
                    <h1 class="center">Welcome to Food Palace <i id="frontpageLogo" class="fas fa-cloud-meatball"></i></h1>
                    <hr>
                    <h5 class="center">The 4 letters your want to hear every day! <span class="deep-orange-text lignten-2">Food!</span> </h3>
                    <h6 class="center">Check out our recipes. Something might catch your eye!</h6>
                    <p class="center"><a href="<?php echo get_post_type_archive_link('recipe');?>" class="btn center deep-orange lighten-2">View All Recipes</a></p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <!--Events Area-->
            <div class="col s12 m6 l6">
                <h4 class="center deep-orange-text">Upcoming Events</h4>
                <hr>
                <?php 
                $today = date('Ymd');
                $eventPosts =  new WP_Query(array(
                'posts_per_page' => 3,
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
                    )
                )
                ));
                while($eventPosts-> have_posts()){
                    $eventPosts -> the_post();?>
                    <div class="card grey darken-4">
                        <div class="card-content white-text">
                        <span class="card-title"><a class="deep-orange-text" href="<?php the_permalink(); ?>"><?php the_title();?></a></span>
                        <span class="blue-grey-text lighten-3"><?php 
                        $eventDate = new DateTime(get_field('event_date'));
                        echo $eventDate-> format('M');
                        ?></span>
                        <span class="blue-grey-text lighten-3"><?php echo $eventDate->format('d');?></span>
                        <span class="blue-grey-text lighten-3"><?php echo $eventDate->format('Y');?></span>
                        <p class="white-text"><?php if (has_excerpt()) {
                            echo get_the_excerpt();  
                            }else{
                            echo wp_trim_words(get_the_content(),18);
                            }
                            ?></p>
                        </div>
                        <div class="card-action">
                        <a class="btn btn-small deep-orange lignten-2" href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    </div>
                <?php
                }; wp_reset_postdata();
                ?>
                <p class="center"><a href="<?php echo get_post_type_archive_link('event');?>" class="btn">View All Events</a></p>
            </div>
            <!--Blog Area-->
            <div class="col s12 m6 l6">
             <h4 class="center cyan-text">Blog</h4>
             <hr>
             <?php 
                $homepagePosts = new WP_Query(array(
                    'posts_per_page' => 3,
                ));
                while($homepagePosts-> have_posts()){
                    $homepagePosts -> the_post(); ?>
                <div class="card  cyan darken-4">
                        <div class="card-content white-text">
                        <span class="card-title"><a class="green-text" href="<?php the_permalink(); ?>"><?php the_title();?></a></span>
                        <span class="blue-grey-text lighten-3"><?php the_time('M'); ?></span>
                        <span class="blue-grey-text lighten-3"><?php the_time('d'); ?></span>
                        <span class="blue-grey-text lighten-3"><?php the_time('Y'); ?></span>
                        <p><?php if (has_excerpt()) {
                            echo get_the_excerpt();  
                            }else{
                            echo wp_trim_words(get_the_content(),18);
                            }
                            ?></p>
                        </div>
                        <div class="card-action">
                        <a class="btn btn-small deep-orange lignten-2" href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    </div>
            <?php   
            }; wp_reset_postdata();
            ?>
            <p class="center"><a href="<?php echo site_url('/blog');?>" class="btn">View All Blog Posts</a></p>
            </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col offset s12 m12 l12">
            <div class="carousel carousel-slider center">
                <div class="carousel-item red white-text">
                <h2>First Panel</h2>
                <p class="white-text">Learn more about our goals & history</p>
                <a href="<?php echo site_url('/about-us');?>" class="btn waves-effect white grey-text darken-text-2">About Us</a>
                </div>
                <div class="carousel-item amber white-text">
                <h2>Recipes</h2>
                <p class="white-text">Test our recipes for 5 star food</p>
                <a href="<?php echo get_post_type_archive_link('recipe');?>" class="btn waves-effect white grey-text darken-text-2">View All</a>
                </div>
                <div class="carousel-item green white-text">
                <h2>Eventsl</h2>
                <p class="white-text">Details about our events</p>
                <a href="<?php echo get_post_type_archive_link('event');?>" class="btn waves-effect white grey-text darken-text-2">View All</a>
                </div>
                <div class="carousel-item blue white-text">
                <h2>Locations</h2>
                <p class="white-text">Map of our locations across the country</p>
                <a  href="<?php echo get_post_type_archive_link('location');?>" class="btn waves-effect white grey-text darken-text-2">button</a>
                </div>
                <div class="carousel-item purple white-text">
                <h2>Blog</h2>
                <p class="white-text">Our latest blogposts</p>
                <a href="<?php echo site_url('/blog');?>" class="btn waves-effect white grey-text darken-text-2">button</a>
                </div>
                
            </div>
            </div>
        </div>
    </div>
    <section>
    </section>
<?php 
    get_footer();
?>