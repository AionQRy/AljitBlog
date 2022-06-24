<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fluffy
 */
$author_image = get_field('author_image_blog');
?>

<article id="card-post_<?php the_ID(); ?>" class="card-post_blog">
              <div class="b-post">
                <div class="b-thumbnail">
                  <a href="<?php echo get_the_permalink(); ?>">
                    <?php if(has_post_thumbnail()) { the_post_thumbnail();} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
                  </a>
                </div>
                <div class="b-info">
                  <div class="b-cat">
                    <?php
                    $terms = get_the_terms( get_the_ID(), 'category' );
                    if ( !empty( $terms ) ){
                        $term = array_shift( $terms );
                    }
                            $term_link = get_term_link( $term->term_id );
                            $name = $term->name;
                            echo '<span class="cat_feed"><a href="'. $term_link .'">' . $name .'</a></span>';

                      ?>
                  </div>
                  <div class="b-info_title">
                    <h3 class="vc-title">
                      <a href="<?php echo get_permalink();?>"><?php the_title(); ?></a>
                    </h3>
                  </div>
                  <div class="b-info_detail">
                        <div class="info_1">
                          <div class="p-author">
                            <?php
                            $author_id = get_post_field('post_author', get_the_ID());
                            $display_name = get_the_author_meta( 'display_name' , $author_id );
                            ?>
                            <p><?php echo esc_html_e( 'เรื่อง' , 'alljitblog' ); ?><a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>"><span><?php echo $display_name; ?></span></a></p>
                          </div>
                        </div>
                        <div class="info_3">
                          <div class="b-date">
                              <span><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                              <?php echo get_the_date('d-m-Y'); ?></span>
                          </div>
                        </div>
                        <?php if( $author_image ): ?>
                        <div class="info_2">
                            <div class="p-author_image">
                                  <p><?php echo esc_html_e( 'ภาพ' , 'alljitblog' ); ?><a href="<?php echo esc_attr($author_image->user_url); ?>"><span><?php echo $author_image['user_firstname']; ?></span><span><?php echo $author_image['user_lastname']; ?></span></a></p>
                            </div>
                        </div>
                        <?php endif; ?>
                  </div>
                </div>
              </div>
            </article>
