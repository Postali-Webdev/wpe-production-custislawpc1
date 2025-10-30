<?php 
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }
?>
<?php get_header(); ?>
	<?php get_template_part('block', 'banner');?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="page-bg">
				<div class="container_inner">
					<div class="main-page-content">
						<?php the_content(); ?>
					</div>
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>	
			</div>
		<?php endwhile;  endif; ?>
	<?php get_template_part('block', 'contact');?>	
<?php get_footer(); ?>			