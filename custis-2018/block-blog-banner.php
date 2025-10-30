<?php
/**
 * Banner Block
 *
 * @package custis-2018
 * @author Postali
 */
?>

<div class="banner-container">
	<?php 
    if ( has_post_thumbnail( $post->ID ) ) :
        $imageInfo = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $imageUrl = $imageInfo[0];
    else:
        $imageUrl = get_template_directory() . '/img/banner_default.jpg';
    endif;
  ?>
  	<div class="banner"><div class="container_inner">
		<div class="yoast-bc-wrap">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
		</div>
			<div class="banner-content">
				<h1>Legal Blog</h1>
				<div class="two_columns_50_50">
					<div class="column1"><div class="column_inner">
						<!-- <p>Blog text ipsum blog. Blog text ipsum blog. Blog text ipsum blog. Blog text ipsum blog. Blog text ipsum blog.</p> -->
						&nbsp;
					</div></div>
					<div class="column2"><div class="column_inner">
						<p class="phone"><strong><i class="wp-svg-custom-footer-phone-icon footer-phone-icon"></i> </strong> <a href="tel:213-863-4276" title="Call Custis Law PC Today">(213) 863-4276</a></p>
						<p class="email"><strong><i class="wp-svg-custom-footer-email-icon footer-email-icon"></i> </strong> <a href="mailto:info@custislawpc.com" title="email custis law">info@custislawpc.com</a></p>
					</div></div>
				</div>
			</div>
	</div></div>
</div>