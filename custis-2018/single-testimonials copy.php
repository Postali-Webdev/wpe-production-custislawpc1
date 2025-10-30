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
				<p><strong>ph:</strong><span class="ibp">(310) 341-9085</span></p>
				<p><strong>em:</strong><a href="mailto:advice@custis-law.com">advice@custis-law.com</a></p>
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