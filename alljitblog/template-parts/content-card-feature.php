<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fluffy
 */

?>

<article id="post-feature_<?php the_ID(); ?>" class="card-content_feature">

                <div class="b-thumbnail">
                  <a href="<?php echo get_the_permalink(); ?>">
                    <?php if(has_post_thumbnail()) { the_post_thumbnail();} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
                  </a>
                </div>
                <div class="box-feature_title">
                    <h3><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></h3>
                </div>
</article>
