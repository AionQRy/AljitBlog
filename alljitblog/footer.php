<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fluffy
 */
$facebook = get_field('facebook', 'option');
$twitter = get_field('twitter', 'option');
$instagram = get_field('instagram', 'option');
$youtube = get_field('youtube', 'option');
?>

	<footer id="main-footer" class="footer main-footer">
		<div class="v-container">
            <div class="grid-footer">
                <div class="object-grid_1">
                <div class="logo-footer">
                    <a href="<?php echo get_home_url();?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-white.png" alt="">
                    </a>
						</div>
                        <!-- <div class="title-footer">
                            <p><?php echo esc_html__( 'Alljit เรา คือ พื้นที่ปลอดภัยสำหรับคุณ เราพร้อมรับฟังโดยไม่ตัดสิน', 'alljitblog' ); ?></p>
                        </div> -->
                </div>
                <div class="object-grid_2">
                    <div class="box-social">
                        <ul class="list-social">
                            <li class="list_social"><a href="<?php echo get_home_url(); ?>"><?php echo esc_html__( 'Home', 'alljitblog' ); ?></a></li>
                            <?php if($facebook): ?>
                                <li class="list_social"><a href="<?php echo $facebook; ?>"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a></li>
                            <?php endif; ?>
                            <?php if($twitter): ?>
                            <li class="list_social"><a href="<?php echo $twitter; ?>"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></a></li>
                            <?php endif; ?>
                            <?php if($instagram): ?>
                            <li class="list_social"><a href="<?php echo $instagram; ?>"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg></a></li>
                            <?php endif; ?>
                            <?php if($youtube): ?>
                                <li class="list_social"><a href="<?php echo $youtube; ?>"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg></a></li>
                            <?php endif; ?>    
                        </ul>
                    </div>
                    <!-- <div class="box-partner">
                        <div class="main-partner">
                            <div class="object-1">
                                <div class="box-img_partner">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/scb-logo.svg" alt="">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/scb-logo.svg" alt="">
                                </div>
                            </div>
                            <div class="object-2">
                                <div class="address-partner">
                                    <h4><?php echo esc_html__( 'ทดสอบ ทดสอบ', 'alljitblog' ); ?></h4>
                                    <p><?php echo esc_html__( 'ธนาคารไทยพาณิชย์ จำกัด (มหาชน)', 'alljitblog' ); ?></p>
                                    <p><?php echo esc_html__( 'เลขที่ 19 เเขวงจตุจักร เขตจตุจักร กรุงเทพฯ 10900' , 'alljitblog'); ?></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>    
	    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
