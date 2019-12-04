<?php get_header();?>
    <section style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>);">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="container white-text" >
                    <h1 class="center">Welcome to Food Palace</h1>
                    <h5 class="center">The 4 letters your want to hear every day! Food!</h3>
                    <h6 class="center">Why don&rsquo;t you check out the <strong>recipes</strong> you&rsquo;re interested in?</h6>
                    <p class="center"><a href="<?php echo get_post_type_archive_link('recipe');?>" class="btn center light-blue accent-2">View All Recipes</a></p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <!--Events Area-->
            <div class="col s12 m6 l6">
                <h4 class="center light-blue-text">Upcoming Events</h4>
                <hr>
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
                    )
                )
                ));
                while($eventPosts-> have_posts()){
                    $eventPosts -> the_post();?>
                    <div class="card blue-grey darken-4">
                        <div class="card-content white-text">
                        <span class="card-title"><a class="light-blue-text lighten-2" href="<?php the_permalink(); ?>"><?php the_title();?></a></span>
                        <span class="blue-grey-text lighten-3"><?php 
                        $eventDate = new DateTime(get_field('event_date'));
                        echo $eventDate-> format('M');
                        ?></span>
                        <span class="blue-grey-text lighten-3"><?php echo $eventDate->format('d');?></span>
                        <span class="blue-grey-text lighten-3"><?php echo $eventDate->format('Y');?></span>
                        <p class="light-blue-text"><?php if (has_excerpt()) {
                            echo get_the_excerpt();  
                            }else{
                            echo wp_trim_words(get_the_content(),18);
                            }
                            ?></p>
                        </div>
                        <div class="card-action">
                        <a class="light-blue-text" href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    </div>
                <?php
                }; wp_reset_postdata();
                ?>
                <p class="center"><a href="<?php echo get_post_type_archive_link('event');?>" class="btn">View All Events</a></p>
            </div>
            <!--Blog Area-->
            <div class="col s12 m6 l6">
             <h4 class="center light-blue-text">Blog</h4>
             <hr>
             <?php 
                $homepagePosts = new WP_Query(array(
                    'posts_per_page' => 2,
                ));
                while($homepagePosts-> have_posts()){
                    $homepagePosts -> the_post(); ?>
                <div class="card red">
                        <div class="card-content white-text">
                        <span class="card-title"><a class="green-text" href="<?php the_permalink(); ?>"><?php the_title();?></a></span>
                        <span><?php the_time('M'); ?></span>
                        <span><?php the_time('d'); ?></span>
                        <p><?php if (has_excerpt()) {
                            echo get_the_excerpt();  
                            }else{
                            echo wp_trim_words(get_the_content(),18);
                            }
                            ?></p>
                        </div>
                        <div class="card-action">
                        <a href="<?php the_permalink(); ?>">Read More</a>
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
                <div class="carousel-item red white-text" href="#one!">
                <h2>First Panel</h2>
                <p class="white-text">This is your first panel</p>
                <a class="btn waves-effect white grey-text darken-text-2">button</a>
                </div>
                <div class="carousel-item amber white-text" href="#two!">
                <h2>Second Panel</h2>
                <p class="white-text">This is your second panel</p>
                <a class="btn waves-effect white grey-text darken-text-2">button</a>
                </div>
                <div class="carousel-item green white-text" href="#three!">
                <h2>Third Panel</h2>
                <p class="white-text">This is your third panel</p>
                <a class="btn waves-effect white grey-text darken-text-2">button</a>
                </div>
                <div class="carousel-item blue white-text" href="#four!">
                <h2>Fourth Panel</h2>
                <p class="white-text">This is your fourth panel</p>
                <a class="btn waves-effect white grey-text darken-text-2">button</a>
                </div>
                <div class="carousel-item purple white-text" href="#four!">
                <h2>Fourth Panel</h2>
                <p class="white-text">This is your fourth panel</p>
                <a class="btn waves-effect white grey-text darken-text-2">button</a>
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