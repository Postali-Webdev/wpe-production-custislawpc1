<?php
/**
 * Awards Block
 *
 * @package custis-2018
 * @author Postali
 */
?>

<div id="awards-container" class="page-bg">
	<div class="container_inner">
		<?php if( have_rows('awards', 'options') ): ?>
			<ul class="award-slider">
				<?php while( have_rows('awards', 'options') ): the_row(); 
					// vars
					$image 	= get_sub_field('award_image');
					$title 	= get_sub_field('award_title');
					$link	= get_sub_field('award_link');
					?>
					<li>
						<?php if ( !empty($link) ) { ?>
							<a href="<?php echo $link; ?>" target="_blank" title="<?php echo $title ?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" /></a>
						<?php } else { ?>
							<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />
						<?php } ?>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
	<div class="clearfix"></div>
</div>