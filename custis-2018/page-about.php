<?php 
/*
Template Name: About
*/ 
?>
<?php get_header(); ?>	
	<?php get_template_part('block', 'banner');?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="about-top" class="page-bg"><div class="container_inner">
			<div class="two_columns_50_50 clearfix">
				<div class="column1"><div class="column_inner">
					<?php the_field('about_top_content'); ?>
				</div></div>
				<div class="column2">
					<img src="/wp-content/uploads/2018/08/about-the-firm-keith-custis-headshot-img.jpg" alt="a photo of keith custis" class="keith-photo"/>
					<div class="keith-caption">
						<p>Attorney Keith Custis is a compassionate and dedicated litigator who founded Custis Law, P.C. to help individuals facing difficult work issues.</p>
						<a href="/about/keith-custis/" title="read Keith's bio" class="btn">Read Keith's Bio</a>
					</div>
				</div>
			</div>
		</div></div>
		<?php endwhile;  endif; ?>
			<?php get_template_part('block', 'awards');?>
		<div class="client-quote page-bg"><div class="container_inner">
			<h3>What Our Clients are Saying</h3>
			<div class="quote-wrapper">
				<i class="wp-svg-custom-testimonials-wp-svg-custom-01 testimonials-wp-svg-custom-01"></i>
				<p class="big-text"><?php the_field('client_quote'); ?></p>
				<p class="quoter">Custis Law, P.C. Client</p>
				<a href="/testimonials/" title="client testimonials" class="btn">More Testimonials</a>
			</div>
		</div></div>
		<div id="about-represent" class="page-bg"><div class="container_inner">
			<div class="two_columns_50_50 clearfix">
				<div class="column1"><div class="column_inner">
					<h2><?php the_field('who_we_represent_title'); ?></h2>
					<?php the_field('who_we_represent_blurb'); ?>
				</div></div>
				<div class="column2"><div class="column_inner">
					<?php the_field('who_we_represent_content'); ?>
				</div></div>
			</div>
		</div></div>
		<div id="about-what-do" class="page-bg"><div class="container_inner">
				<h2><?php the_field('what_we_can_do_for_you_title'); ?></h2>
				<?php the_field('what_we_can_do_for_you_blurb'); ?>
			<div class="two_columns_50_50 clearfix">
				<div class="column1"><div class="column_inner">
					<?php the_field('what_we_can_do_for_you_split_left'); ?>
				</div></div>
				<div class="column2"><div class="column_inner">
					<?php the_field('what_we_can_do_for_you_split_right'); ?>
				</div></div>
			</div>
		</div></div>
	<?php get_template_part('block', 'contact');?>	
<?php get_footer(); ?>			