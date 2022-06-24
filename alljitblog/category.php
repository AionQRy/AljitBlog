<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package passiongen
 */
get_header();
$term_id = get_queried_object()->term_id;
$cat_img = get_field('category_image','category_'.$term_id);
?>

	<main id="primary" class="main-list main-archive-post" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/bg-archive.webp);">
        <div class="main-archive_post">
            <div class="v-container">
                    <header class="title-header">
                        <div class="grid-object">
                            <div class="object-1">
															<?php if ($cat_img): ?>
																<img src="<?php echo $cat_img['url']; ?>" alt="<?php echo single_cat_title(); ?>">
																<?php else: ?>
													       <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bg-taxonomy.png" alt="<?php echo single_cat_title(); ?>">
															<?php endif; ?>
                            </div>
                            <div class="object-2">
                                <div class="box-detail_text">
                                    <div class="title-head_text">
                                        <?php
                                            single_cat_title( '<h2 class="heading">', '</h2>' );
                                        ?>
                                    </div>
                                    <?php
                                    $term_description = term_description( get_queried_object_id() ,'category' );
                                    if($term_description):
                                    ?>
                                    <div class="detail_text">
                                        <?php echo $term_description; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </header><!-- .page-header -->
                            <?php
                            $args = array (
                                'taxonomy' => 'category', //empty string(''), false, 0 don't work, and return empty array
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'hide_empty' => false, //can be 1, '1' too
                                'hierarchical' => true, //can be 1, '1' too
                                'child_of' => get_queried_object_id(), //can be 0, '0', '' too
                            );
                            $terms = get_terms('category', $args);
                            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                                ?>
                            <div class="taxonomy-list_box">
                                <ul class="list-cat_ul">
                                <?php
                                foreach($terms as $term){
                                    $term_link = get_term_link( $term->term_id );
                                    ?>
                                    <li class="list-cat">
                                        <a href="<?php echo $term_link; ?>"><?php echo $term->name; ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                                </ul>
                            </div>
                                <?php
                            }
                            ?>

                    <?php
                            $args_relate = array(
                            'posts_per_page'    => 6,
                            'post_type'         => 'post',
                            'order'             => 'DESC',
                            'orderby'           => 'rand',
                            'tax_query'         => array(
                                array(
                                'taxonomy'  => 'category',
                                'field'     => 'term_id',
                                'terms'     => get_queried_object_id()
                                )
                            )
                            );
                            query_posts( $args_relate );?>
                            <?php if ( have_posts() ) : ?>
                            <div class="carousel-taxonomy swiper taxonomy_swiper">
                                <div class="carousel-taxonomy_recent swiper-wrapper">
                            <?php
                            // The Loop
                            while ( have_posts() ) : the_post();
                            ?>
                            <div class="swiper-slide">
                                <?php
                                get_template_part(  'template-parts/content-card', 'feature' );
                                ?>
                            </div>
                            <?php
                            endwhile;
                            // Reset Query
                            wp_reset_query();
                            ?>
                             </div>
                             <div class="taxonomy_recent-button-next"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg></div>
                        <div class="taxonomy_recent-button-prev"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="15 18 9 12 15 6"></polyline></svg></div>
                        <div class="taxonomy_recent-pagination"></div>
                    </div>
                            <?php
                            endif;
                    ?>
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
                        <?php get_template_part( 'template-parts/content','none');?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main><!-- #main -->
<?php
get_footer();
