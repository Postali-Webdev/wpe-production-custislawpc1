<?php 
/*
Template Name: Practice Areas
*/ 
?>
<?php get_header(); ?>	
	<div class="practice-areas-top">
		<div class="container_inner">
			<div class="yoast-bc-wrap">
				<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
			</div>
			
			<div class="practice-areas-top-container">
				<div class="practice-areas-top-left">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					<?php endwhile;  endif; ?>
				</div>
				<div class="practice-areas-top-right">
					<p><strong>ph:</strong><a href="tel:213-863-4276" title="Call Custis Law PC Today">(213) 863-4276</a></p>
					<p><strong>em:</strong><a href="mailto:info@custislawpc.com" title="email custis law">info@custislawpc.com</a></p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="practice-areas-bottom">
		<?php if( have_rows('practice_areas') ): ?>
			<ul class="practice-areas-squares">
				<?php while( have_rows('practice_areas') ): the_row(); 
					// vars
					$image = get_sub_field('image');
					$title = get_sub_field('title');
					$content = get_sub_field('content');
					?>
					<li style="background-image:url('<?php echo $image; ?>');">
						<h3><?php echo $title; ?></h3>
						<?php echo $content; ?>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
		
	<?php get_template_part('block', 'contact');?>	
<?php get_footer(); ?>			