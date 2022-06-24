<?php
/**
 * Override seed_setup()
 */
/*
function fruit_setup() {
	add_theme_support( 'custom-logo', array(
		'width'       => 200,
		'height'      => 200,
		'flex-width' => true,
		) );
}
add_action( 'after_setup_theme', 'fruit_setup', 11);
*/

/**
 * Enqueue scripts and styles.
 */

 add_filter('the_content', function($content) {
 	return str_replace(array("<iframe", "</iframe>"), array('<div class="iframe-container"><iframe', "</iframe></div>"), $content);
 });

 add_filter('embed_oembed_html', function ($html, $url, $attr, $post_id) {
 	if(strpos($html, 'youtube.com') !== false || strpos($html, 'youtu.be') !== false){
   		return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
 	} else {
 	 return $html;
 	}
 }, 10, 4);


 add_filter('embed_oembed_html', function($code) {
   return str_replace('<iframe', '<iframe class="embed-responsive-item" ', $code);
 });





function yp_scripts() {
	// wp_dequeue_style( 'fluffy-main');

	// wp_enqueue_style( 'yp-theme-css', get_stylesheet_uri() );
	wp_enqueue_script( 'yp-theme-js',
	    get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), true );

}
add_action( 'wp_enqueue_scripts', 'yp_scripts' , 20 );

function main_import_font(){
	//wp_enqueue_style( 'evermore-catamaran-font-style', get_stylesheet_directory_uri() . '/vendor/fonts/catamaran/stylesheet.css', true );
	wp_enqueue_style( 'fira-sans-font-style', get_stylesheet_directory_uri() . '/add-on/font/firasans/stylesheet.css', true );
	wp_enqueue_style( 'sarabun-font-style', get_stylesheet_directory_uri() . '/add-on/font/sarabun/stylesheet.css', true );
    wp_enqueue_style( 'notosansthai-font-style', get_stylesheet_directory_uri() . '/add-on/font/notosansthai/stylesheet.css', true );
	wp_enqueue_style( 'font-line-awesome', get_stylesheet_directory_uri() . '/add-on/icon/line-awesome/css/line-awesome.min.css', array(), '1.1', 'all');
}
add_action( 'wp_enqueue_scripts', 'main_import_font' );

function register_script_all(){
	wp_enqueue_style( 'swiper-css-cdn', 'https://unpkg.com/swiper@8/swiper-bundle.min.css', array(), '1.1', 'all');
	wp_enqueue_script( 'swiper-js-cdn', 'https://unpkg.com/swiper@8/swiper-bundle.min.js', array('jquery'), true );
}
add_action( 'wp_enqueue_scripts', 'register_script_all' );
/*pagination*/
function seed_posts_navigation() {
	printf('<div class="content-pagination">');
	global $paged, $wp_query; $big = 9999999;
	if ( !$max_page ):
			$max_page = $wp_query->max_num_pages;
	endif;
	?>
	<span class="text-number_page"><?php esc_html_e( 'หน้า', 'fluffy' ); ?> <?php echo max( 1, get_query_var('paged') );?> <?php esc_html_e( 'จาก', 'fluffy' ); ?> <?php echo $wp_query->max_num_pages; ?></span>
	<?php
	echo '<div class="box-pagination">';
	echo paginate_links(
		array(
				'base' 		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' 	=> '?paged=%#%',
				'current'	=> max( 1, get_query_var('paged') ),
				'total' 	=> $wp_query->max_num_pages,
				'prev_text'  => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="15 18 9 12 15 6"></polyline></svg>',
				'next_text'  => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="#0074bc" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg>',
		));
	echo '</div>';
	if( $paged != $max_page ):
		if( $max_page > 1 ):
	?>
	<a href="<?php echo esc_url( get_pagenum_link( $wp_query->max_num_pages ) ); ?>" class="last-number_page"><?php esc_html_e( 'หน้าสุดท้าย', 'fluffy' ); ?></a>
	<?php
		endif;
	endif;
	printf('</div>');
}
?>
