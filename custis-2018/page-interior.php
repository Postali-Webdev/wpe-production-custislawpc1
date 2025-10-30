<?php 
/*
Template Name: P.A. Interior
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

	  	<div class="interior-banner-left">
	  		<div class="interior-banner-left-container">
		  		<div class="yoast-bc-wrap">
					<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
				</div>
				<h1><?php the_title(); ?></h1>
				<?php the_field('sub_title'); ?>
				<p><strong><i class="wp-svg-custom-footer-phone-icon footer-phone-icon"></i> </strong><a href="tel:213-863-4276" title="Call Custis Law PC Today">(213) 863-4276</a></p>
				<p><strong><i class="wp-svg-custom-footer-email-icon footer-email-icon"></i> </strong><a href="mailto:info@custislawpc.com" title="email custis law">info@custislawpc.com</a></p>
			</div>
		</div>
	  	
	  	<div class="interior-banner-right" style="background:url('<?php echo $imageUrl; ?>') no-repeat;">
			<div class="interior-banner-right-container">
				<?php the_field('interior_banner_content'); ?>
			</div>
		</div>

	</div>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="interior-page-links-container">
			<ul class="interior-page-links">
				
			</ul>
		</div>
		<div class="page-bg">
			
				
				<?php the_content(); ?>
			
			
		</div>
		<?php endwhile;  endif; ?>
	<?php get_template_part('block', 'contact');?>	
<?php get_footer(); ?>			