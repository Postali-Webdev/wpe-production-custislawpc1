<?php 
/*
Template Name: Contact Template
*/ 
?>
<?php get_header(); ?>	

	<div class="banner-container">
		<?php 
	    if ( has_post_thumbnail( $post->ID ) ) :
	        $imageInfo = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	        $imageUrl = $imageInfo[0];
	    else:
	        $imageUrl = get_template_directory() . '/img/banner_default.jpg';
	    endif;
	  ?>
	  	<div class="banner" style="background:url('<?php echo $imageUrl; ?>') no-repeat;">

			<div class="container_inner">
				<div class="yoast-bc-wrap">
					<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
				</div>
				<div class="banner-content" id="banner-content-contact">
					<h1>Contact Custis Law, P.C.</h1>
					<div class="contact-banner-info">
						<?php the_field('contact_banner_info'); ?>
					</div>
					<p><?php the_field('contact_banner_content'); ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="page-bg" id="contact-content">
		<div class="container_inner">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<?php the_content(); ?>
			
			<?php endwhile;  endif; ?>
		</div>
	</div>


<?php get_footer(); ?>			