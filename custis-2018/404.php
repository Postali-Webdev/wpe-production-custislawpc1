<?php 
global $qode_options_passage; 

$title_in_grid = false;
if(isset($qode_options_passage['title_in_grid'])){
if ($qode_options_passage['title_in_grid'] == "yes") $title_in_grid = true;
}

?>	

<?php get_header(); ?>
			<?php get_template_part('block', 'banner');?>
			<div class="container page-bg">
				<div class="container_inner">
					<div class="container_inner2 clearfix">
						<div class="page_not_found">
							<h1 style="color:#36393d; "><?php if($qode_options_passage['404_text'] != ""): echo $qode_options_passage['404_text']; else: ?> <?php _e('Page not found', 'qode'); ?> <?php endif;?></h1>
							<p>WE WERE UNABLE TO LOCATE THAT SPECIFIC PAGE</p>
							<p>Maybe you were looking for one of these?</p>
							<?php echo do_shortcode("[menu name='404']"); ?>
							
							<!-- <p><a href="<?php echo home_url(); ?>/"><?php if($qode_options_passage['404_backlabel'] != ""): echo $qode_options_passage['404_backlabel']; else: ?> <?php _e('Back to homepage', 'qode'); ?> <?php endif;?></a></p> -->
						</div>
					</div>
				</div>
			</div>
			
<?php get_footer(); ?>	