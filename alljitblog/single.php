<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fluffy
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="feature-single_image">
            <div class="v-container">
                <?php the_post_thumbnail( 'full', get_the_ID() ); ?>
            </div>
        </div>
		<header class="entry-header">
            <div class="v-container">
                <div class="grid-info">
                    <div class="object-1">
                        <div class="post-category_info">
                            <?php
                            $term_obj_list = get_the_terms( get_the_ID(), 'category' );
                            if ( ! empty( $term_obj_list ) && ! is_wp_error( $term_obj_list ) ) {
                                foreach ($term_obj_list as $term ) {
                                    $term_url = get_term_link( $term->term_id );
                                    $term_name = $term->name;
                                    ?>
                                        <a href="<?php echo $term_url; ?>" id="cat-<?php echo $term->slug; ?>" class="cat-list_info cat-<?php echo $term->slug; ?>"><?php echo $term_name; ?></a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="object-2">
                        <div class="post-date_info">
                            <?php
                             $date_info = get_the_date( 'j F Y' );
                            ?>
                            <span class="date-info_text"><?php echo $date_info; ?></span>
                        </div>
                    </div>
                </div>
                <div class="grid-title_post">
                <?php the_title( '<h2 class="post-title">', '</h2>' ); ?>
                </div>
                <div class="date-author_info">
                <?php
                            $author_id = get_post_field('post_author', get_the_ID());
                            $first_name = get_the_author_meta( 'first_name' , $author_id );
                            $last_name = get_the_author_meta( 'last_name' , $author_id );
                            $description = get_the_author_meta( 'description' , $author_id );
                            ?>
                            <p><?php echo esc_html_e( 'เรื่อง' , 'alljitblog' ); ?><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span><?php echo $first_name; ?></span><span><?php echo $last_name; ?></span></a></p>
                </div>
            </div>
		</header><!-- .entry-header -->
        <div class="blog-single_content" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/bg-archive.webp);">     
            <div class="content-box_read one">

		<?php
		while ( have_posts() ) :
		the_post();
		?>
        <div class="box-social_share left">
        <div class="entry-content right">
            <div class="the-content_box right-child">
            <?php if(function_exists('seed_social')) {seed_social();} ?>
            </div>
		</div><!-- .entry-content -->
        <div class="<?php if ( !is_elementor() ) { echo 'v-container'; 	} else { echo "no-container"; }?>">
				<?php
				the_content();
				?>
			</div>

        </div>

	<?php
		endwhile; // End of the loop.
		?>
            </div>
            <?php
                $post_categories = get_the_terms( get_the_ID(), 'post_tag' );
                if ( ! empty( $post_categories ) && ! is_wp_error( $post_categories ) ) {
            ?>
            <div class="box-list_single">
                <div class="v-container">
                    <div class="tag-box">
                        <p><?php echo esc_html_e( 'Tags:' , 'alljitblog' ); ?></p>
                        <ul class="cat-list_single">
                        <?php
                            foreach ($post_categories as $tag ) {
                                $term_url = get_term_link( $tag->term_id );
                                $term_name = $tag->name;
                        ?>
                                <li>
                                    <a href="<?php echo $term_url; ?>" id="tag-<?php echo $tag->slug; ?>" class="tag-list_info tag-<?php echo $tag->slug; ?>"><?php echo $term_name; ?></a>
                                </li>
                        <?php
                            }
                        ?>
                        </ul>
                    </div>
                </div>
			</div>
            <?php
                }
            ?>
            <div class="author-box_write">
                <div class="v-container">
                    <div class="grid-author_box">
                        <div class="object-1">
                            <div class="author_a">
                                <div class="title_text">
                                    <p><?php echo esc_html_e( 'Author:' , 'alljitblog' ); ?></p>
                                </div>
                                <div class="object-detail">
                                    <div class="avatar">
                                        <?php echo get_avatar( $author_id , 110 ); ?>
                                    </div>
                                    <div class="detail_author">
                                        <div class="title_detail_author">
                                            <h4>
                                                <a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>">
                                                <span><?php echo $first_name; ?></span><span><?php echo $last_name; ?></span></a>
                                            </h4>
                                        </div>
                                        <?php if($description): ?>
                                        <div class="detail-text_box">
                                            <p><?php echo $description;?></p>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="object-2">
                        <?php
                        $user_image = get_field("author_image_blog");
                        if( $user_image ):
                        ?>
                            <div class="author_b">
                                <div class="title_text">
                                    <p><?php echo esc_html_e( 'Photographer:' , 'alljitblog' ); ?></p>
                                </div>
                                <div class="object-detail">
                                    <div class="avatar">
                                        <?php echo $user_image['user_avatar']; ?>
                                    </div>
                                    <div class="detail_author">
                                        <div class="title_detail_author">
                                            <h4>
                                                <a href="<?php echo esc_url( get_author_posts_url( $user_image['ID'] ) ); ?>">
                                                    <span><?php echo $user_image['user_firstname']; ?></span><span><?php echo $user_image['user_lastname']; ?></span>
                                                </a>
                                            </h4>
                                        </div>
                                        <?php if($user_image['user_description']): ?>
                                        <div class="detail-text_box">
                                            <p><?php echo $user_image['user_description'];?></p>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
	</div>
        <div class="recent-post">
            <div class="v-container">
                <div class="main-recent-post">
                    <div class="title_recent">
                        <h3><?php echo esc_html__( 'Related Posts' , 'alljitblog'); ?></h3>
                    </div>
                    <div class="post-recent_box">
                    <?php
                            $terms = get_the_terms( get_the_ID(), 'category' );
                            if ( !empty( $terms ) ){
                                $term = array_shift( $terms );
                            }
                            $args_relate = array(
                            'posts_per_page'    => 6,
                            'post_type'         => 'post',
                            'order'             => 'DESC',
                            'orderby'           => 'rand',
                            'post__not_in' => array( get_the_ID() ),
                            'tax_query'         => array(
                                array(
                                'taxonomy'  => 'category',
                                'field'     => 'slug',
                                'terms'     => array( $term->slug )
                                )
                            )
                            );
                            query_posts( $args_relate );
                            // The Loop
                            while ( have_posts() ) : the_post();
                            get_template_part(  'template-parts/content-card', 'recent' );
                            endwhile;
                            // Reset Query
                            wp_reset_query();
                    ?>
                    </div>
                </div>

            </div>
        </div>
        <script>
            jQuery(document).ready(function($) {
              var single_toggle = $(".box-social_share .seed-social");

                $(window).scroll(function() {
                    var scroll = $(window).scrollTop();
                    if (scroll >= 900) {
                        single_toggle.addClass("scrolled");
                    } else {
                        single_toggle.removeClass("scrolled");
                    }
                });

                $(window).scroll(reOrder)
                $(window).resize(reOrder)

                function reOrder() {
                    var mq = window.matchMedia("(min-width: 992px)");
                    if (mq.matches) {
                    $('.right-child').addClass('customm');
                    var scroll = $(window).scrollTop(),
                        topContent = $('.one').position().top + 850,
                        sectionHeight = $('.left').height(),
                        rightHeight = $('.right-child').height(),
                        bottomContent = topContent + sectionHeight - rightHeight - 45;

                    if (scroll > topContent && scroll < bottomContent) {
                        $('.customm').removeClass('posAbs').addClass('posFix');
                    } else if (scroll > bottomContent) {
                        $('.customm').removeClass('posFix').addClass('posAbs');
                    } else if (scroll < topContent) {
                        $('.customm').removeClass('posFix');
                    }
                    } else {
                    $('.right-child').removeClass('customm posAbs posFix');
                    }
                }
            });
        </script>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
