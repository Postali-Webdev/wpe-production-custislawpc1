<?php

if(get_post_meta(get_the_ID(), "qode_show-sidebar", true) != ""){
	$sidebar = get_post_meta(get_the_ID(), "qode_show-sidebar", true);
}else{
	$sidebar = $qode_options_passage['blog_single_sidebar'];
}

$blog_hide_comments = "";
if (isset($qode_options_passage['blog_hide_comments'])) 
	$blog_hide_comments = $qode_options_passage['blog_hide_comments'];
	
if(get_post_meta(get_the_ID(), "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta(get_the_ID(), "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_passage['responsive_title_image'];
}

if(get_post_meta(get_the_ID(), "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta(get_the_ID(), "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_passage['fixed_title_image'];
}

if(get_post_meta(get_the_ID(), "qode_title-image", true) != ""){
 $title_image = get_post_meta(get_the_ID(), "qode_title-image", true);
}else{
	$title_image = $qode_options_passage['title_image'];
}

if(get_post_meta(get_the_ID(), "qode_title-height", true) != ""){
 $title_height = get_post_meta(get_the_ID(), "qode_title-height", true);
}else{
	$title_height = $qode_options_passage['title_height'];
}

$title_in_grid = false;
if(isset($qode_options_passage['title_in_grid'])){
if ($qode_options_passage['title_in_grid'] == "yes") $title_in_grid = true;
}

if(isset($qode_options_passage['twitter_via']) && !empty($qode_options_passage['twitter_via'])) {
	$twitter_via = " via " . $qode_options_passage['twitter_via'];
} else {
	$twitter_via = 	"";
}

if(get_post_meta(get_the_ID(), "qode_content-animation", true) != ""){
 $content_animation = get_post_meta(get_the_ID(), "qode_content-animation", true);
}else{
	if(isset($qode_options_passage['content_animation'])){
		$content_animation = $qode_options_passage['content_animation'];
	}else{
		$content_animation = 'yes';
	}
}

?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<div class="banner-container">
			<div class="banner blog-single"><div class="container_inner">
				<div class="two_columns_66_33 clearfix">
					<div class="column1"><div class="column_inner">
						<div class="yoast-bc-wrap">
							<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
						</div>
						<span class="date"><?php the_time('j, F Y'); ?> | Written by Keith Custis</span>
							<h1 class="single-blog-title"><?php the_title(); ?></h1>
							<?php if ( has_post_thumbnail() ) { ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
									<div class="blog-image" style="background-image:url(<?php echo $image[0]; ?>)">
									<?php echo do_shortcode('[social_share]'); ?>
							</div>
							<?php } ?>
					</div></div>
					<div class="column2"><div class="column_inner">
						&nbsp;
					</div></div>
				</div>
				</div>
			</div>
		</div>
			<div class="page-bg">
				<div class="container_inner">
					<div class="two_columns_66_33 clearfix">
						<div class="column1"><div class="column_inner">
							<div class="single-post-content">
								<?php the_content(); ?>
							<?php
								if($blog_hide_comments != "yes"){
									comments_template('', true); 
								}else{
									echo "<br/><br/>";
								}
							?> 
							</div>
						</div></div>
						<div class="column2"><div class="column_inner">
							
					<?php 
                   // the query
                   $the_query = new WP_Query( array(
                      'posts_per_page' => 3,
                      'post_status' => 'publish',
                      'order' => 'DESC',
                   )); 
                ?>
                <div class="blog-feed">
					<h3>Recent Blog Posts</h3>
                    <?php if ( $the_query->have_posts() ) : ?>
                      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
								<div class="blog-thumb-image" style="background-image:url(<?php echo $image[0]; ?>)"></div>
                                <span class="date"><?php the_time('j, F Y'); ?></span>
                                <p class="post-title"><?php the_title(); ?></p> 
                            </a>
                      <?php endwhile; ?>
                      <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                      <p><?php __('No News'); ?></p>
                    <?php endif; ?>
                </div>
                <?php get_sidebar(); ?>
						</div></div>
					</div>
				</div>
			</div>					
	<?php endwhile; ?>
<?php endif; ?>	
<?php get_template_part('block', 'contact');?>	
<?php get_footer(); ?>	