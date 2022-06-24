<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fluffy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'fluffy' ); ?></a>

	<header id="main-header" class="header main-header">
		<div class="top-header">
			<div class="v-container">
				<div class="main-top_header">
					<div class="top-object top-object_1">
					</div>
					<div class="top-object top-object_2">
						<div class="logo-top_header">
							<?php the_custom_logo(); ?>
						</div>
					</div>
					<div class="top-object top-object_3">
					</div>
				</div>
			</div>
		</div>
		<div class="feed-header">
			<div class="v-container">
				<div class="box-slider_feed">
						<!-- Swiper -->
						<div class="swiper feed-slider">
							<div class="swiper-wrapper">	
							<?php 
								// the query
								$args = array(
									'post_type' => 'post',
									'posts_per_page' => 5,
									'orderby' => 'date',
									'order' => 'DESC'
								);
								$the_query = new WP_Query( $args ); ?>
								
								<?php if ( $the_query->have_posts() ) : ?>
								
									<!-- pagination here -->
								
									<!-- the loop -->
									<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
									<div class="swiper-slide">
										<article id="new-feed_<?php echo get_the_ID(); ?>"  class="card-new_feed">
											<div class="thumbnail-feed">
												<a href="<?php echo get_permalink(get_the_ID()); ?>">
												<?php if(has_post_thumbnail()) { the_post_thumbnail('large', get_the_ID());} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
												</a>
												
											</div>
											<div class="title-feed">
												<h4><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php echo get_the_title();?></a></h4>
											</div>
										</article>
										
									</div>
									<?php endwhile; ?>
									<!-- end of the loop -->
								
									<!-- pagination here -->
								
									<?php wp_reset_postdata(); ?>
								
								<?php else : ?>
									<article id="new-feed_<?php echo get_the_ID(); ?>"  class="card-new_feed">
											<div class="thumbnail-feed">
												<img src="" alt="">
											</div>
											<div class="title-feed">
												<h4><?php echo esc_html__( 'ยังไม่มีข้อมูล', 'alljitblog' ); ?></h4>
											</div>
										</article>
								<?php endif; ?>					
							</div>
							<div class="swiper-button-next"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg></div>
							<div class="swiper-button-prev"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="15 18 9 12 15 6"></polyline></svg></div>
							<div class="swiper-pagination"></div>
						</div>
				</div>
			</div>
		</div>
		<div class="head-menu mm_1">
			<div class="v-container">
				<div class="head-box">
					<div class="site-branding">
							<?php the_custom_logo(); ?>
					</div><!-- .site-branding -->
				<nav id="site-navigation" class="main-navigation">

					<div id="toggle-main-menu" class="_mobile hamburger hamburger--slider">
				<div class="hamburger-box">
				<div class="hamburger-inner"></div>
				</div>
			</div>

				<div class="desktop_menu _desktop">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</div>

				<div class="overlay_menu_m"></div>
					<div id="mobile_menu_wrap">


						<div id="close-mobile-menu" class="hamburger hamburger--slider is-active">
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</div>

						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'mobile',
								'menu_id'        => 'mobile-menu',
							)
						);
						?>
					</div>
				</nav><!-- #site-navigation -->
				<div class="toggle-search">
					<div class="toggle-icon">
						<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
					</div>
				</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<div class="popup_search">
		<div class="box-search">
			<form action="<?php echo get_home_url();?>" method="GET" class="search-panel">
				<div class="main-object">
					<div class="object-1">
						<input type="text" name="s" id="input-search">
					</div>
					<div class="object-2">
						<button type="submit" class="btn-search_f"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
					</div>
				</div>
				<div class="sub-object">
				<?php 
                            $args = array (
                                'taxonomy' => 'category', //empty string(''), false, 0 don't work, and return empty array
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'hide_empty' => false, //can be 1, '1' too
                                'parent' => 0,
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
                                    <li class="list-cat_popup">
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
				</div>
			</form>
			<div class="cancel-btn_search">
				<div class="icon_cancel">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
				</div>
			</div>
		</div>
	</div>
