<?php /*Template Name: Sitemap*/ ?>
<?php get_header(); ?>
<?php get_template_part('block', 'banner');?>
    <div class="page-bg site-map">
	    <div class="container_inner">
			<?php if (have_posts()) : 
					while (have_posts()) : the_post(); ?>
					<div class="column_inner">
						
							<!-- SITEMAP -->
                            <div class="two_columns_50_50 clearfix">
								<div class="column1">
									<div class="column_inner">
			                            <h2>Pages</h2> 
			                                <ul><?php wp_list_pages(
											     array(
											       'exclude' => '692',
											       'title_li' => '',
											     )
											   ); ?></ul> 
			                        </div>
			                    </div>
								<div class="column2">
									<div class="column_inner">        
				                        <h2>Blog Posts</h2> 
				                            <ul>
				                            	<?php wp_get_archives('type=postbypost'); ?>
				                            </ul>
			                        </div>
			                    </div>
			                </div>
				
					</div>
			<?php endwhile; ?>
			<?php endif; ?>
									
        </div>
	</div>
<?php get_template_part('block', 'contact');?> 
<?php get_footer(); ?>			