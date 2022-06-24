<?php
  /* Template Name: Page test*/
  get_header();
?>

<div class="recent-post recent-post_author">
                <div class="main-recent-post">
                    <div class="title_recent">
                        <h3><?php echo esc_html__( 'Related Posts' , 'alljitblog'); ?></h3>
                    </div>
                    <div class="post-recent_box">
                    <?php   
                           $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                           $no = 2;
                        if($paged==1){
                           $offset=0;  
                        }else {
                           $offset= ($paged-1)*$no;
                        }
                        $args_relate = array(                    
                            'post_type'         => 'post',
                            'author' =>  1,
                            'posts_per_page' => $no,
                            'offset' => $offset,
                            'order' => 'DESC',
                            'orderby'    => 'date',
                            'paged' => $paged,
                            );
                            // The Loop
                            $wp_query = new WP_Query( $args_relate );
                            if ( $wp_query->have_posts() ) {
                            while ( $wp_query->have_posts() ) :
                                $wp_query->the_post();
                                // get_template_part(  'template-parts/content-card', 'recent' );
                                echo get_the_ID();
                                endwhile;
                        
                            // pagination
                          
                            $total_post = $wp_query->found_posts;  
                            $total_pages=ceil($total_post/$no);

                            printf('<div class="content-pagination">');
                            global $paged, $wp_query; $big = 9999999;
                            $max_page = $wp_query->max_num_pages;
                            if ( !$max_page ):
                                    $max_page = $total_pages;
                            endif;
                            ?>
                            <span class="text-number_page"><?php esc_html_e( 'หน้า', 'Job989' ); ?> <?php echo max( 1, get_query_var('paged') );?> <?php esc_html_e( 'จาก', 'Job989' ); ?> <?php echo $total_pages; ?></span>
                            <?php
                            echo '<div class="box-pagination">';
                            echo paginate_links(
                                array(
                                        'base' 		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                        'format' 	=> '?paged=%#%',
                                        'current'	=> max( 1, get_query_var('paged') ),
                                        'total' 	=> $total_pages,
                                        'prev_text'  => '<i class="las la-angle-left"></i>',
                                        'next_text'  => '<i class="las la-angle-right"></i>',
                                ));
                            echo '</div>';
                            if( $paged != $max_page ):
                                if( $max_page > 1 ):
                            ?>
                            <a href="<?php echo esc_url( get_pagenum_link( $total_pages ) ); ?>" class="last-number_page"><?php esc_html_e( 'หน้าสุดท้าย', 'Job989' ); ?></a>
                            <?php
                                endif;
                            endif;
                            printf('</div>');
                        } else {
                            // no posts found
                        }
                            // Reset Query
                            wp_reset_query(); 
                    ?>    
                    </div>
                </div>
        </div>
        </div>
    </div>
<?php get_footer(); ?>
