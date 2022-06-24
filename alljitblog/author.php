<?php
    $object_author_id = get_queried_object_id();
     $author_id = get_post_field('post_author', get_the_ID());
     $first_name = get_the_author_meta( 'first_name' , $object_author_id );
     $last_name = get_the_author_meta( 'last_name' , $object_author_id );
     $description = get_the_author_meta( 'description' , $object_author_id );

     get_header();
?>
    <div class="page-author author-<?php echo $object_author_id; ?>">
        <div class="v-container">
            <div class="author-box">
                <div class="profile-box">
                    <div class="avatar-box">
                        <?php echo get_avatar( $object_author_id , 300 ); ?>
                    </div>
                    <div class="title-box">
                        <h2>
                            <a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>">
                            <span><?php echo $first_name; ?></span><span><?php echo $last_name; ?></span></a>
                        </h2>
                    </div>
                    <div class="detail-box">
                    <?php if($description): ?>
                            <div class="detail-text_box">
                                <p><?php echo $description;?></p>
                            </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>

          <div class="recent-post recent-post_author">
                <div class="main-recent-post">
                    <div class="title_recent">
                        <h3><?php echo esc_html__( 'Related Posts' , 'alljitblog'); ?></h3>
                    </div>
                    <?php if ( have_posts() ) : ?>   
                    <div class="archive_post_box taxonomy-post_category">
                    <?php
                    while ( have_posts() ) :
                        the_post();

                        /*
                        * Include the Post-Type-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                        */
                        // get_template_part( 'template-parts/content', get_post_type() );
                            get_template_part( 'template-parts/content','card');

                    endwhile;
                    ?>
                    </div>  
                    <?php		
                    wp_reset_postdata(); 
                    seed_posts_navigation();
                ?>
                    <?php else: ?>
                        
                    <?php endif; ?>  
                </div>
        </div>
        </div>
    </div>
<?php
get_footer();
