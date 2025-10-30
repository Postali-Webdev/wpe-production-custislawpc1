<?php get_header(); ?>
<!-- This banner is displayed here instead of dynamic because it is an archive page and can't be customized through the wordpress backend -->
<div class="banner-container">
	<div class="banner testimonials-banner">

		<div class="yoast-bc-wrap">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
		</div>
		
	<div class="container_inner">
			<div class="banner-content" >
				<h1>Testimonials</h1>
				<p><strong><i class="wp-svg-custom-footer-phone-icon footer-phone-icon"></i> </strong><a href="tel:213-863-4276" title="Call Custis Law PC Today">(213) 863-4276</a></p>
				<p><strong><i class="wp-svg-custom-footer-email-icon footer-email-icon"></i> </strong><a href="mailto:info@custislawpc.com" title="email custis law">info@custislawpc.com</a></p>
			</div>
		</div>

	</div>
</div>

<div class="page-bg" id="single-testimonial">
	<div class="container_inner">
		<h1><?php the_title(); ?></h1>
		<?php if (have_posts()) : ?>
	    <?php while (have_posts()) : the_post(); ?>
	                <?php the_title(); ?>
	        	<?php the_content(); ?>                    
	    	<?php endwhile; ?>
		<?php endif; ?>  
	</div>
</div>
<?php get_template_part('block', 'contact');?>	
<?php get_footer(); ?>