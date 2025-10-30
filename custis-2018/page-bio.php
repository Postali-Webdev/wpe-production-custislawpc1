<?php 
/*
Template Name: Attorney Bio
*/ 
?>
<?php get_header(); ?>	
	<?php get_template_part('block', 'banner');?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="page-bg"><div class="container_inner">
			<div class="two_columns_50_50 clearfix">
				<div class="column1"><div class="column_inner">
					<?php the_content(); ?>
				</div></div>
				<div class="column2 sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div></div>
		<?php endwhile;  endif; ?>
		
	<?php get_template_part('block', 'awards');?>

	<?php get_template_part('block', 'contact');?>	
<?php get_footer(); ?>			