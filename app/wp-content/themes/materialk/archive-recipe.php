<?php get_header();
jumbotronBackgroundImage(array(
    'title' => 'ALL RECIPES',
    'subtitle' => 'Check out our recipes. There\'s something for every taste'
))?>

<div class="container">
    <ul class="collapsible orange lighten-5">
    <?php
        while(have_posts()) {
            the_post();?>
        <li>
            <div class="collapsible-header orange lighten-5"><h5 class="deep-orange-text"><?php the_title();?></h5>
            </div>
                <div class="collapsible-body">
                <p><?php if (has_excerpt()) {
                  echo get_the_excerpt();  
                }else{
                  echo wp_trim_words(get_the_content(),30);
                }
                ?>
                </span>
                </p>
                <a href="<?php the_permalink();?>">Read Full Recipe <span><i class="fas fa-book-open"></i></span></a>
                </div>
        </li>
            
    <?php
        };
            echo paginate_links();
    ?>
    </ul>
</div>
    

<?php get_footer();?>