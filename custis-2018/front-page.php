<?php get_header(); ?>
	<!-- Lets build a custom front-page -->

<div class="front-page">
	
<div class="banner" id="fp-banner">
    <?php $vidbg = random_int(1,3); ?>
    <?php if ($vidbg == '1') { ?>
	<div class="banner-wrapper wrapper1">
        <video loop muted autoplay poster="/wp-content/uploads/2018/07/Custis-Welder.jpg" class="fullscreen-bg__video">
            <source src="https://s3-us-west-1.amazonaws.com/custisvideo/Custis-Welder.webm" type="video/webm">
            <source src="https://s3-us-west-1.amazonaws.com/custisvideo/Custis-Welder.mp4" type="video/mp4">
            <source src="https://s3-us-west-1.amazonaws.com/custisvideo/Custis-Welder.ogg" type="video/ogg">
        </video>
    </div>
    <?php } elseif ($vidbg == '2') { ?>
	<div class="banner-wrapper wrapper2">
        <video loop muted autoplay poster="/wp-content/uploads/2018/07/Custis-CallCenter.jpg" class="fullscreen-bg__video">
            <source src="https://s3-us-west-1.amazonaws.com/custisvideo/Custis-CallCenter.mp4" type="video/mp4">    	
            <source src="https://s3-us-west-1.amazonaws.com/custisvideo/Custis-Call-Center.webm" type="video/webm">    	
            <source src="https://s3-us-west-1.amazonaws.com/custisvideo/Custis-Call-Center.ogv" type="video/ogg">	
        </video>   
    </div>
    <?php } elseif ($vidbg == '3') { ?>
	<div class="banner-wrapper wrapper3">
        <video loop muted autoplay poster="/wp-content/uploads/2018/07/Custis-Executive.jpg" class="fullscreen-bg__video">
            <source src="https://s3-us-west-1.amazonaws.com/custisvideo/Custis-Executive.mp4" type="video/mp4">    	
            <source src="https://s3-us-west-1.amazonaws.com/custisvideo/Custis-Executive.webm" type="video/webm">    	
            <source src="https://s3-us-west-1.amazonaws.com/custisvideo/Custis-Executive.ogv" type="video/ogg">	
        </video>     
    </div>
    <?php } ?>
    <?php unset($vidbg); ?>
	<div class="container_inner">
		<h1><?php the_field('banner_header'); ?></h1>
			<div id="banner-content">
				<?php the_field('banner_content'); ?>
			</div>
			<div id="banner-selector">
				<?php if( have_rows('banner_search_bar') ): ?>
					<div class="accordion_holder accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset">
						<div class="accordion_item">
						    <h5 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom"><span class="control-pm"></span>How Can I Help?</h5>
							<div class="accordion_content ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
								<ul class="get-help">
								<?php while( have_rows('banner_search_bar') ): the_row(); 
									// vars
									$topic = get_sub_field('topic');
									$link = get_sub_field('link');
									?>
									<li class="help-item">
										<a class="help-item-link" href="<?php echo $link; ?>" title="<?php echo $topic; ?>" ><?php echo $topic; ?></a>
									</li>
								<?php endwhile; ?>
								</ul>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		<div class="clearfix"></div>
	</div>
	<div class="arrow bounce"><i class="wp-svg-custom-page-down-wp-svg-custom-01 page-down-wp-svg-custom-01"></i></div>
</div>
	
	<div class="fp-block" id="fp-block-one">
		<div class="container_inner">
			<div class="two_columns_50_50 clearfix">
				<div class="column1"><div class="column_inner">
					<?php the_field('section_one_left'); ?>
				</div></div>
				<div class="column2"><div class="column_inner">
					<?php the_field('section_one_right'); ?>
				</div></div>
			</div>
		</div>
	</div>

	<div class="fp-block" id="fp-cta">
		<div class="two_columns_50_50 clearfix">
			<div class="column1">
				<div class="column_inner">
					&nbsp;
				</div>
			</div>
			<div class="column2"><div class="column_inner">
				<h2>Why Hire Custis Law, P.C.?</h2>
				<ul>
					<li class="cta" id="cta1">
						<?php the_field('cta_one'); ?>
					</li>
					<li class="cta" id="cta2">
						<?php the_field('cta_two'); ?>
					</li>
					<li class="cta" id="cta3">
						<?php the_field('cta_three'); ?>
					</li>
					<li class="cta" id="cta4">
						<?php the_field('cta_four'); ?>
					</li>
				</ul>
			</div></div>
		</div>
	</div>

    <div class="fp-block" id="results">
        <div class="container_inner">
            <?php 
                $results_query = new WP_Query(array(
                    'posts_per_page'    => 6,
                    'post_type'         => 'results', 
                    'order'             => 'DESC',
                    'meta_key'          => 'result_amount',
                    'orderby'           => 'meta_value_num',
                    'post_status'       => 'publish',
                    'post__not_in'      => array( $featured_ID )
                ));
            ?>

            <div class="results-container">
                <h2>Case Results</h2>
				<?php if($results_query->have_posts()) : while ($results_query->have_posts() ) : $results_query->the_post(); ?>
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
                <a href="/case-results/" title="See all case results" class="btn" id="result-btn">See All Case Results</a>
            </div>

        </div>
    </div>

	<?php get_template_part('block', 'awards');?>


	<div class="fp-block" id="fp-practice-areas">
		<?php if( have_rows('practice_tiles') ) : $counter = 1; ?>
		<div id="practice-areas-tiles" class="page-bg">
			<div class="container_inner">
				<h2><?php the_field('practice_areas_heading'); ?></h2>
				<?php while( have_rows('practice_tiles') ): the_row(); 
					// vars
					$title = get_sub_field('practice_tiles_title');
					$content = get_sub_field('practice_tiles_content');
				?>
					<div class="PA-tile <?php echo "slide" . $counter; ?>">
					    <div class="PA-title"><?php echo $title; ?></div>
						<div class="PA-content"><?php echo $content; ?></div>
					</div>
				<?php $counter++; endwhile; ?>
			<div class="clearfix"></div>
			</div>
		</div>
		<?php endif; ?>
	</div>

	<div class="fp-block" id="fp-do-for-you">
		<div class="container_inner">
			<h2>What Can Custis Law, P.C. Do for You?</h2>
		</div>
		<div class="arrow bounce"><i class="wp-svg-custom-page-down-wp-svg-custom-01 page-down-wp-svg-custom-01"></i></div>
		<div class="clearfix"></div>
	</div>
	
	<div class="fp-block" id="fp-do-for-you-items">
		<?php if (have_rows('fp_do_for_you')): ?>
			<div class="container_inner">
				<?php $i = 1; ?>
				<?php while (have_rows('fp_do_for_you')): the_row(); 
					$title = get_sub_field('fp_do_for_you_title');
					$content = get_sub_field('fp_do_for_you_content');
				?>
					<div class="accordions">
						<div class="row">
							<div class="col">
								<div class="tabs">
									<div class="tab">
										<input type="checkbox" id="chck<?php echo $i; ?>" class="checkbox">
										<label class="tab-label" for="chck<?php echo $i; ?>">
											<div class="faq-title"><h3><?php echo $title; ?></h3></div>
										</label>
										<div class="tab-content">
											<div class="faq-content"><p><?php echo $content; ?></p></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $i++; ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
	

<!-- remedies section -->


<div class="fp-block" id="fp-remedies">
		<div class="container_inner">
			<div class="two_columns_50_50 clearfix">
				<div class="column1"><div class="column_inner">
					<?php the_field('remedies_header_block_right'); ?>
				</div>
				</div>
				<div class="column2">
					<div class="column_inner">
						&nbsp;
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="fp-block" id="remedies-item">
		<?php if( have_rows('remedies_block') ) : $counter = 1; ?>
			<div class="container_inner">
				<?php while( have_rows('remedies_block') ): the_row(); 
					// vars
					$title = get_sub_field('remedies_title');
					$content = get_sub_field('remedies_content');
				?>
			<div class="two_columns_25_75 clearfix remedies-item">
				<div class="column1"><div class="column_inner">
					<p class="<?php echo $counter; ?> number"></p>
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

	<!-- new federal & california laws section -->

	<div class="fp-block" id="fp-block-laws-header">
		<div class="container_inner">
			<h2>State and Federal Employment Laws</h2>
		</div>
		<div class="arrow bounce"><i class="wp-svg-custom-page-down-wp-svg-custom-01 page-down-wp-svg-custom-01"></i></div>
		<div class="clearfix"></div>
	</div>

	<div class="fp-block" id="fp-block-laws">
		<div class="container_inner">
			<div class="two_columns_50_50 clearfix">
				<div class="column1"><div class="column_inner">
					<?php 
					$image = get_field('california_laws_image');
					if( !empty( $image ) ): ?>
						<div class="california-icon"></div>
						<div class="california-image laws-img" style="background-image:url(<?php echo esc_url($image['url']); ?>);" ></div>
					<?php endif; ?>
					<?php if( have_rows('fp_laws_california') ) : ?>
					<?php while( have_rows('fp_laws_california') ): the_row(); 
						// vars
						$title = get_sub_field('fp_laws_california_title');
						$titleLink = get_sub_field('fp_laws_california_title_link');
						$content = get_sub_field('fp_laws_california_content');
					?>
						<p class="title-link">
						<?php if( get_sub_field('fp_laws_california_title_link') ) { ?>
							<a href="<?php echo $titleLink; ?>" title="<?php echo $title; ?>" target="_blank"><?php echo $title; ?></a>
						<?php } else { ?>
							<?php echo $title; ?>
						<?php } ?>
						</p>
						<p><?php echo $content; ?></p>
						<div class="p-spacer"></div>
					<?php endwhile; ?>
					<div class="clearfix"></div>
					<?php endif; ?>
				</div></div>
				<div class="column2"><div class="column_inner">
					<?php 
					$image = get_field('federal_laws_image');
					if( !empty( $image ) ): ?>
						<div class="federal-icon"></div>
						<div class="federal-image laws-img" style="background-image:url(<?php echo esc_url($image['url']); ?>);" ></div>
					<?php endif; ?>
					<?php if( have_rows('fp_laws_federal') ) : ?>
					<?php while( have_rows('fp_laws_federal') ): the_row(); 
					// vars
						$title = get_sub_field('fp_laws_federal_title');
						$titleLink = get_sub_field('fp_laws_federal_title_link');
						$content = get_sub_field('fp_laws_federal_content');
					?>
						<p class="title-link">
						<?php if( get_sub_field('fp_laws_federal_title_link') ) { ?>
							<a href="<?php echo $titleLink; ?>" title="<?php echo $title; ?>" target="_blank"><?php echo $title; ?></a>
						<?php } else { ?>
							<?php echo $title; ?>
						<?php } ?>
						</p>
						<p><?php echo $content; ?></p>
						<div class="p-spacer"></div>
					<?php endwhile; ?>
					<div class="clearfix"></div>
					<?php endif; ?>
				</div></div>
			</div>
		</div>
	</div>

	
	<div class="fp-block" id="fp-about">
		<!-- <img src="/wp-content/uploads/2018/05/homepage-about-img-panel-logo-icon.png" title="custis law p.c. logo" /> -->
		<div class="container_inner">
			<div class="two_columns_50_50 clearfix">
				<div class="column1"><div class="column_inner">
					<?php the_field('fp_about_content_left'); ?>
				</div>
				</div>
				<div class="column2">
					<div class="column_inner">
						<?php the_field('fp_about_content_right'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="fp-block" id="fp-areas">
		<div class="container_inner">
			<div class="areas-top">
			<?php the_field('areas_served_content_top'); ?>
			</div>
		</div>
		<div class="areas-bottom">
			<div class="container_inner">
				<div class="two_columns_50_50 clearfix">
					<div class="column1"><div class="column_inner">
						<?php the_field('areas_served_content_left'); ?>
					</div>
					</div>
					<div class="column2">
						<div class="column_inner">
							<?php the_field('areas_served_content_right'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="fp-block" id="fp-block-contact">
	<?php get_template_part('block', 'contact');?>
</div>

<?php get_footer(); ?>