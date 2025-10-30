<?php 
/*
Template Name: 10 Reasons
*/ 
?>
<?php get_header(); ?>	
	<?php get_template_part('block', 'banner');?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="page-bg"><div class="container_inner">
			<h2>Top 10 Reasons Employees Hire Custis Law, P.C. </h2>
			<p class="big-text">With no shortage of employment lawyers in California, how do you make an informed decision about your legal representation? Here are the top 10 reasons why employees trust attorney Keith Custis and the legal team at Custis Law, P.C.:</p>
		</div></div>
		<div class="fp-block" id="fp-do-for-you-items">
		<?php if( have_rows('ten_reasons') ) : $counter = 1; ?>
			<div class="container_inner">
				<?php while( have_rows('ten_reasons') ): the_row(); 
					// vars
					$title = get_sub_field('ten_reasons_title');
					$content = get_sub_field('ten_reasons_content');
				?>
			<div class="two_columns_25_75 clearfix fp-do-for-you-item">
				<div class="column1"><div class="column_inner">
					<p class="<?php echo $counter; ?> number"><?php echo $counter; ?></p>
				</div>
				</div>
				<div class="column2">
					<div class="column_inner">
					    <h3><?php echo $title; ?></h3>
						<p><?php echo $content; ?></p>
					</div>
				</div>
			</div>
				<?php $counter++; endwhile; ?>
			<div class="clearfix"></div>
			</div>
		<?php endif; ?>
	</div>
		<?php endwhile;  endif; ?>
	<?php get_template_part('block', 'contact');?>	
<?php get_footer(); ?>			