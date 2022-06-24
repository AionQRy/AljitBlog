<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package alljitblog
 */
get_header();

$cat_x = $_GET['_sft_category'];
$tag_x = $_GET['_sft_post_tag'];
$category_x = get_term_by('slug', $cat_x , 'category');
$tag_post = get_term_by('slug', $tag_x, 'post_tag');
?>
<div class="search-btn_box">
    <span><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
</div>
	<main id="primary" class="main-list main-archive-post" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/ab-2.png);"> 
        <div class="main-archive_post">
            <div class="v-container">
                    <header class="title-header">
                        <div class="grid-object">
                            <div class="object-1">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ab-1.png" alt="">
                            </div>
                            <div class="object-2">
                                <div class="box-detail_text">
                                    <div class="title-head_text">
                                        <h4 class="heading">
                                    <?php			
                                        echo esc_html__( 'ไม่พบหน้าที่คุณค้นหา กรุณาค้นหาใหม่อีกครั้ง', 'alljitblog' );                          
                                    ?>
                                        </h4>
                                        <?php if($cat_x):?>
                                        <h4><?php echo esc_html__( 'หมวดหมู่:', 'alljitblog' ) . ' ' . $category_x->name; ?></h4>
                                        <?php endif; ?>
                                        <?php if($tag_x):?>
                                        <h4><?php echo esc_html__( 'แท็ก:', 'alljitblog' ) . ' ' . $tag_post->name; ?></h4>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="search-box">
                                    <div class="cancel-btn_box">
                                        <span><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></span>
                                    </div>
                                    <?php the_custom_logo(); ?>
                                    <?php echo do_shortcode( '[searchandfilter id="3980"]' ); ?>
                                </div>
                            </div>                       
                        </div>
                        
                    </header><!-- .page-header --> 
                                  
                    <?php if ( have_posts() ) : ?>   
                    <div class="archive_post_box taxonomy-post_category">
                    <?php
                        $args_relate = array(
                            'posts_per_page'    => 6,
                            'post_type'         => 'post',
                            's'                 => $_GET['s'],
                            'order'             => 'DESC',
                            'orderby'           => 'date',
                            'search_filter_id'  => 3980
                            );
                            query_posts( $args_relate );
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