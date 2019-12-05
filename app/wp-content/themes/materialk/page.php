<?php get_header();?>
    <?php
        while(have_posts()) {
            the_post();
            jumbotronBackgroundImage();?>

        </div>  
        <div class="container">
            <div class="row">
                <div class="col s12 m8 l8">
                <?php 
                $parentPage = wp_get_post_parent_id(get_the_ID());
                if($parentPage){?>
                    <div>
                    <p class="flow-text"><a href="<?php echo get_permalink($parentPage);?>">
                        <i class="fas fa-home" aria-hidden="true"></i> 
                        Back to <?php echo get_the_title($parentPage); ?></a> 
                    </p>
                    </div>
                <?php    
                };
                ?> 
                <h3 class="deep-orange-text"><?php the_title(); ?></h3>
                </div>
                <div class="col s12 m4 l4">
                <?php 
                    $childArr = get_pages(array(
                        'child_of' => get_the_ID()
                    ));
                    if($parentPage || $childArr){ ?> 
                    <div>
                        <h5 id="collectionParent"><a  href="<?php echo get_permalink($parentPage);?>"><?php echo get_the_title($parentPage); ?> </a></h5>
                        <ul>
                            <?php 
                            if($parentPage ){
                                $findChildren = $parentPage;
                            }else{
                                $findChildren = get_the_ID();
                            }
                            wp_list_pages(array(
                                'title_li' => NULL,
                                'child_of' => $findChildren,
                                'sort_column' => 'menu_order'
                            ));
                            ?>
                        </ul>
                    </div>
                <?php }; ?>
                </div>
            </div>
            <hr>
            <div class="generic-content">
                <?php the_content(); ?>
            </div>

        </div>
    <section>
        <div class="container">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
        </div>
    </section>

  <section>

   <div class="container">

     <hr>

    <div class="row">

      <div class="col s12 m4 l4">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
      </div>

      <div class="col s12 m4 l4">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
      </div>

      <div class="col s12 m4 l4">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
      </div>
    </div>

    </section>

<?php 
        };
get_footer();?>