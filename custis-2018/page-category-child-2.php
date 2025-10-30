<?php 
/*
Template Name: Category Template Child 2
*/ 
?>
<?php get_header(); ?>	
<?php get_template_part('block', 'banner');?>
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
				<h4><?php the_field('types_of_law_title'); ?></h4>
				<div><?php the_field('types_of_law_content'); ?></div>
			</div></div>
			<div class="clearfix"></div>
		</div>
		</div>	
</div>

<?php if( have_rows('what_you_can_do') ) : $counter = 1; ?>
	<div id="child-2-can-do" class="category-block">
		<div class="container_inner">
			<h2><?php the_field('what_you_can_do_header'); ?></h2>
			<p><?php the_field('what_you_can_do_intro'); ?></p>
			<div class="what-item-container">
			<?php while( have_rows('what_you_can_do') ): the_row(); 
				// vars
				$title = get_sub_field('what_you_can_do_title');
				$content = get_sub_field('what_you_can_do_content');
			?>
				<div class="what-item">
					<p class="what-item-number <?php echo $counter; ?>"><?php echo $counter; ?></p>
				    <h3 class=""><?php echo $title; ?></h3>
					<p class=""><?php echo $content; ?></p>
				</div>
			<?php $counter++; endwhile; ?>
			</div>
		<div class="clearfix"></div>
		</div>
	</div>
<?php endif; ?>	
<?php if( get_field('category_bottom_content') ): ?>
		<div id="category-bottom" class="category-block">
			<div class="container_inner">
				<?php the_field('category_bottom_content'); ?>
			</div>
		</div>
<?php endif; ?>	
	<?php get_template_part('block', 'contact');?>	
<?php get_footer(); ?>			