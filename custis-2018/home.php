<?php get_header(); ?>
<?php get_template_part('block', 'blog-banner');?>
<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

if(get_post_meta($id, "qode_show-sidebar", true) == ''){
		$sidebar = $qode_options_passage['category_blog_sidebar'];
}
else{
	$sidebar = get_post_meta($id, "qode_show-sidebar", true);
}
$title = "";
$subtitle = ""; 

if(get_post_meta($id, "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta($id, "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_passage['responsive_title_image'];
}

if(get_post_meta($id, "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta($id, "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_passage['fixed_title_image'];
}

if(get_post_meta($id, "qode_title-image", true) != ""){
 $title_image = get_post_meta($id, "qode_title-image", true);
}else{
	$title_image = $qode_options_passage['title_image'];
}

$blog_hide_comments = "";
if (isset($qode_options_passage['blog_hide_comments'])) 
	$blog_hide_comments = $qode_options_passage['blog_hide_comments'];

if(get_post_meta($id, "qode_title-height", true) != ""){
 $title_height = get_post_meta($id, "qode_title-height", true);
}else{
	$title_height = $qode_options_passage['title_height'];
}

$title_in_grid = false;
if(isset($qode_options_passage['title_in_grid'])){
if ($qode_options_passage['title_in_grid'] == "yes") $title_in_grid = true;
}

if(get_post_meta($id, "qode_content-animation", true) != ""){
 $content_animation = get_post_meta($id, "qode_content-animation", true);
}else{
	if(isset($qode_options_passage['content_animation'])){
		$content_animation = $qode_options_passage['content_animation'];
	}else{
		$content_animation = 'yes';
	}
}


?>
	
	<!-- <?php
		if (is_home()){
			$title = get_option('blogname');
		}else{
			$title = get_the_title($id);
		}
		if(get_post_meta($id, "qode_page-subtitle", true)) { $subtitle = '/ '.get_post_meta($id, "qode_page-subtitle", true); }
	?>
	<?php if(!get_post_meta($id, "qode_show-page-title", true)) { ?>
	<div class="title animate <?php if($content_animation == 'no'){ echo 'no_entering_animation '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" <?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'style="background-image:url('.$title_image.'); height:'.$title_height.'px;"'; }?>>
			<?php if($responsive_title_image == 'yes' && $title_image != ""){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>
			<?php if(!get_post_meta($id, "qode_show-page-title-text", true)) { ?>
				<?php if($title_in_grid){ ?>
					<div class="container">
						<div class="container_inner clearfix">
					<?php } ?>
				<h1><?php echo $title; ?></h1>
				<?php if($title_in_grid){ ?>
					</div>
				</div>
				<?php } ?>
			<?php } ?>
	</div>
	<?php } ?> -->

	<div class="container top_move page-bg <?php if($content_animation == 'no'){ echo 'no_entering_animation'; }  ?>">
		<div class="container_inner clearfix">
				<div class="blog_holder">
					<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
						<article <?php if ( !has_post_thumbnail() ) { echo "class='no_image'"; } ?>>
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="post_image">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
										<div class="blog-image" style="background-image:url(<?php echo $image[0]; ?>)"></div>
									</a>
								</div>
							<?php } ?>
							<div class="post_text_holder">
								<div class="post_text_inner">
									<span class="date"><?php the_time('d, F Y'); ?></span>
									<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
									<span class="category"><?php the_category(', '); ?></span>
									<?php the_excerpt(); ?>
									<span class="info">

										<span class="left"><a href="<?php the_permalink(); ?>" title="read more about this post" class="read_more">Read More</a></span>
									</span>
								</div>
							</div>	
						</article>
					<?php endwhile; ?>
					<?php if($qode_options_passage['pagination'] != "0") : ?>
						<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
					<?php endif; ?>
					<?php else: //If no posts are present ?>
						<div class="entry">                        
								<p><?php _e('No posts were found.', 'qode'); ?></p>    
						</div>
					<?php endif; ?>
				</div>
		</div>
	</div>
	<?php get_template_part('block', 'contact');?>	
<?php get_footer(); ?>