<?php get_header(); ?>
<!-- This banner is displayed here instead of dynamic because it is an archive page and can't easily be customized through the wordpress backend -->
<div class="banner-container">
	<div class="banner testimonials-banner" style="background: #fff url('/wp-content/uploads/2018/05/testimonials-header-img.jpg') no-repeat"><div class="container_inner">
		<div class="yoast-bc-wrap">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
		</div>
	
			<div class="banner-content"><div class="two_columns_50_50">
				<div class="column1"><div class="column_inner">
					<h1>Testimonials</h1>
					<p><strong><i class="wp-svg-custom-footer-phone-icon footer-phone-icon"></i> </strong><a href="tel:213-863-4276" title="Call Custis Law PC Today">(213) 863-4276</a></p>
					<p><strong><i class="wp-svg-custom-footer-email-icon footer-email-icon"></i> </strong><a href="mailto:info@custislawpc.com" title="email custis law">info@custislawpc.com</a></p>
				</div></div>
				<div class="column2"><div class="column_inner">
					<p class="big-text">"...Without fail, Custis Law kept me informed with the status of my case and maintained their trustworthiness all the way to the end..."</p>
					<p class="quoter">CUSTIS LAW, P.C. Client</p>
				</div></div>
				<div class="clearfix"></div>
			</div></div>
	</div></div>
</div>
<div class="page-bg">
	<div class="container_inner">
			<ul class="testimonials">
				<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
					<li class="client-quote">
						<div class="quote-wrapper">
							<i class="wp-svg-custom-testimonials-wp-svg-custom-01 testimonials-wp-svg-custom-01"></i>
							<p class="big-text"><?php the_field('testimonial_callout'); ?></p>
							<p><?php the_field('testimonial_body'); ?></p>
							<p class="quoter"><?php the_field('quoter'); ?></p>
						</div>
					</li>
				<?php endwhile; ?>
				<?php else: //If no posts are present ?>
					<div class="entry">                        
							<p><?php _e('No case results were found.', 'qode'); ?></p>    
					</div>
				<?php endif; ?>
			</ul>

			<?php if($qode_options_passage['pagination'] != "0") : ?>
				<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
			<?php endif; ?>
	</div>
</div>
<?php get_template_part('block', 'contact');?>	
<?php get_footer(); ?>