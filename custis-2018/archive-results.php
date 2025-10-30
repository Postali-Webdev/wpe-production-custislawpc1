<?php 

$wp_query = new WP_Query(array(
    'posts_per_page'    => -1,
    'post_type'         => 'results', 
    'order'             => 'DESC',
    'meta_key'          => 'result_amount',
    'orderby'           => 'meta_value_num',
    'post_status'       => 'publish',
    'post__not_in'      => array( $featured_ID )
));
?>

<?php get_header(); ?>
<!-- This banner is displayed here instead of dynamic because it is an archive page and can't easily be customized through the wordpress backend -->
<div class="banner-container">
	<div class="banner testimonials-banner" style="background: #fff url('/wp-content/uploads/2018/07/results-header-img.jpg') no-repeat"><div class="container_inner">
		<div class="yoast-bc-wrap">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
		</div>
	
			<div class="banner-content"><div class="two_columns_50_50">
				<div class="column1"><div class="column_inner">
					<h1>Case Results</h1>
					<p><strong><i class="wp-svg-custom-footer-phone-icon footer-phone-icon"></i> </strong><a href="tel:213-863-4276" title="Call Custis Law PC Today">(213) 863-4276</a></p>
					<p><strong><i class="wp-svg-custom-footer-email-icon footer-email-icon"></i> </strong><a href="mailto:info@custislawpc.com" title="email custis law">info@custislawpc.com</a></p>
				</div></div>
				<div class="column2"><div class="column_inner">
					&nbsp;
				</div></div>
				<div class="clearfix"></div>
			</div></div>
	</div></div>
</div>

<div class="page-bg">
	<div class="container_inner">
			<div class="results-container">
				<?php if($wp_query->have_posts()) : while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<div class="case-result">
						<div class="result-wrapper">
							<i class="wp-svg-custom-gavel-wp-svg-custom-01 gavel-wp-svg-custom-01"></i>
                            <?php $value = get_field('result_amount'); ?>
                            <span class="amount"><?php echo "$".number_format($value); ?></span>
                            <p class="category">
                            <?php $terms = get_the_terms( $post->ID , 'result_topic' );
                                foreach ( $terms as $term ) {
                                    echo $term->name .'<span class="comma">, </span>';
                                }
                            ?>
                            </p>
							<?php the_content(); ?>
						</div>
                    </div>
                    <?php wp_reset_postdata(); ?>
				<?php endwhile; ?>
				<?php endif; ?>
			</ul>

			<?php if($qode_options_passage['pagination'] != "0") : ?>
				<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
			<?php endif; ?>
	</div>
</div>
<?php get_template_part('block', 'contact');?>	
<?php get_footer(); ?>