<?php 
/*
Template Name: Category Template
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
		<div class="banner" style="background:url('/wp-content/uploads/2018/05/practice-area-employment-law-h1-background-img.jpg') no-repeat, url('<?php echo $imageUrl; ?>') no-repeat;"><div class="container_inner">
	  	<div class="category-banner-left">
	  		<div class="category-banner-left-container">
		  		<div class="yoast-bc-wrap">
					<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
				</div>
				<h1><?php the_title(); ?></h1>
				<p><strong><i class="wp-svg-custom-footer-phone-icon footer-phone-icon"></i> </strong><a href="tel:213-863-4276" title="Call Custis Law PC Today">(213) 863-4276</a></p>
				<p><strong><i class="wp-svg-custom-footer-email-icon footer-email-icon"></i> </strong><a href="mailto:info@custislawpc.com" title="email custis law">info@custislawpc.com</a></p>
			</div>
			<div class="arrow bounce"><i class="wp-svg-custom-page-down-wp-svg-custom-01 page-down-wp-svg-custom-01"></i></div>
		</div>
	  	
	  	<div class="category-banner-right">
			<div class="category-banner-right-container">
				<p class="big-text"><?php the_field('client_quote'); ?></p>
				<p class="quoter">Custis Law, P.C. Client</p>
			</div>
		</div>
		</div></div>
		<div class="clearfix"></div>
	</div>
	<?php get_template_part('block', 'reasons');?>
	<div id="category-top" class="category-block">
		<div class="container_inner">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<!-- <div class="main-page-content"> --><div class="two_columns_66_33">
				<div class="column1"><div class="column_inner">
				<?php the_field('category_main_content'); ?>
			</div></div>
		<?php endwhile;  endif; ?>
			<div class="column2 sidebar"><div class="column_inner">
				<h4>Frequently Asked Questions</h4>
	            <?php if( have_rows('drop_down') ): ?>
					<div class="accordion_holder accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset">

						<?php while( have_rows('drop_down') ): the_row(); 

							// vars
							$title = get_sub_field('drop_down_title');
							$content = get_sub_field('drop_down_content');

						?>
						<div class="accordion_item">
					        <h5 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom"><span class="control-pm"></span><?php echo $title; ?></h5>
							<div class="accordion_content ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom"><?php echo $content; ?></div>
						</div>

						<?php endwhile; ?>

					</div>
				<?php endif; ?>
				<!-- <?php if( get_field('types_of_law_title') ): ?>
					<h4><?php the_field('types_of_law_title'); ?></h4>
					<div><?php the_field('types_of_law_content'); ?></div>
				<?php endif; ?> -->
			</div></div>
			<div class="clearfix"></div>
		<?php get_template_part('block', 'awards');?>
		</div>
		</div>	
	</div>

		<div id="category-contact" class="category-block">
			<div class="container_inner">
				<p class="category_block_title big-text"><?php the_field('category_block_content'); ?></p>
				<div class="left">
					<p class="blue">By Phone/Email</p>
					<p><strong><i class="wp-svg-custom-footer-phone-icon footer-phone-icon"></i> </strong><a href="tel:213-863-4276" title="Call Custis Law PC Today">(213) 863-4276</a></p>
					<p><strong><i class="wp-svg-custom-footer-email-icon footer-email-icon"></i> </strong><a href="mailto:info@custislawpc.com" title="email custis law">info@custislawpc.com</a></p>
				</div><div class="right">
					<p class="blue">Or Online</p>
					<a href="/contact-us/" class="btn" title="Send Keith a Message with the Contact Form">Send Keith a Message</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="arrow bounce"><i class="wp-svg-custom-page-down-wp-svg-custom-01 page-down-wp-svg-custom-01"></i></div>
		</div>
		<div id="category-bottom" class="category-block">
			<div class="container_inner">
				<?php the_field('category_bottom_content'); ?>
			</div>
		</div>
		
	<?php get_template_part('block', 'contact');?>	
<?php get_footer(); ?>			