<?php get_header(); ?>
<?php get_template_part('block', 'category-banner');?>
		<div class="container page-bg">
		<div class="container_inner clearfix">
			<div class="container_inner2 clearfix">
				<?php if(($sidebar == "default")||($sidebar == "")) : ?>
				<?php switch ($qode_options_passage['blog_style']) {
					case 1: ?>
							<div class="blog_holder">
								<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
									<article>
										<div class="post_text_holder">
											<div class="post_text_inner">
												<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
												<?php the_excerpt(); ?>
												<span class="info">
													<span class="left"><a href="<?php the_permalink(); ?>" class="read_more">Read More</a></span>
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
					 <?php	break;
					case 2: ?>
						<div class="blog_holder2">
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								<article <?php post_class(); ?>>
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="post_image">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<?php the_post_thumbnail('blog-type-2'); ?>
											</a>
										</div>
									<?php } ?>
									<div class="post_text_holder">
										<div class="post_text_inner">
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
											<span class="create">
												<span class="date"><?php the_time('d.m.Y'); ?></span>
												<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
											</span>
											<?php the_excerpt(); ?>
											<span class="info">
												<?php if($blog_hide_comments != "yes"){ ?>
													<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
												<?php } ?>	
												<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
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
					<?php	break;
					case 3: ?>
						<div class="blog_holder_list">
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								<article class="mix">
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="post_image">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<?php the_post_thumbnail('blog-type-3'); ?>
											</a>
										</div>
									<?php } ?>
									<div class="post_text_holder">
										<div class="post_text_inner">
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
											<span class="create">
												<span class="date"><?php the_time('d.m.Y'); ?></span>
												<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
											</span>
											<?php the_excerpt(); ?>
											<span class="info">
												<?php if($blog_hide_comments != "yes"){ ?>
													<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
												<?php } ?>	
												<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
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
						<?php	break;
					case 4: ?>
						<div class="blog_holder2">
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								<article <?php post_class(); ?>>
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="post_image">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<?php the_post_thumbnail('blog-type-2'); ?>
											</a>
										</div>
									<?php } ?>
									<div class="post_text_holder">
										<div class="post_text_inner">
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
											<span class="create">
												<span class="date"><?php the_time('d.m.Y'); ?></span>
												<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
											</span>
											<?php the_content(); ?>
											<span class="info">
												<?php if($blog_hide_comments != "yes"){ ?>
													<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
												<?php } ?>	
												<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
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
				<?php break;
				} ?>
			<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
				<div class="<?php if($sidebar == "1"):?>two_columns_66_33<?php elseif($sidebar == "2") : ?>two_columns_75_25<?php endif; ?> background_color_sidebar grid2 clearfix">
					<div class="column1">
						<div class="column_inner">
							<?php switch ($qode_options_passage['blog_style']) {
							case 1: ?>
								<div class="blog_holder">
									<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
										<article <?php if ( !has_post_thumbnail() ) { echo "class='no_image'"; } ?>>
											<?php if ( has_post_thumbnail() ) { ?>
												<div class="post_image">
													<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<?php the_post_thumbnail('blog-type-1'); ?>
													</a>
												</div>
											<?php } ?>
											<div class="post_text_holder">
												<div class="post_text_inner">
													<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
													<span class="create">
														<span class="date"><?php the_time('d.m.Y'); ?></span>
														<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
													</span>
													<?php the_excerpt(); ?>
													<span class="info">
														 <?php if($blog_hide_comments != "yes"){ ?>
															 <span class="left">
																	<a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a>
															 </span>
														<?php } ?>
														<span class="right"><a href="<?php the_permalink(); ?>" class="read_more"></a></span>
													</span>
												</div>
											</div>	
										</article>
									<?php endwhile; ?>
									<?php else: //If no posts are present ?>
										<div class="entry">                        
												<p><?php _e('No posts were found.', 'qode'); ?></p>    
										</div>
									<?php endif; ?>
									<?php if($qode_options_passage['pagination'] != "0") : ?>
										<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
									<?php endif; ?>
								</div>
							<?php	break;
							case 2: ?>
									<div class="blog_holder2">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<article <?php post_class(); ?>>
												<?php if ( has_post_thumbnail() ) { ?>
													<div class="post_image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<?php the_post_thumbnail('blog-type-2'); ?>
														</a>
													</div>
												<?php } ?>
												<div class="post_text_holder">
													<div class="post_text_inner">
														<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
														<span class="create">
															<span class="date"><?php the_time('d.m.Y'); ?></span>
															<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
														</span>
														<?php the_excerpt(); ?>
														<span class="info">
															<?php if($blog_hide_comments != "yes"){ ?>
																<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
															<?php } ?>	
															<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
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
								<?php	break;
							case 3: ?>
									<div class="blog_holder_list">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<article class="mix">
												<?php if ( has_post_thumbnail() ) { ?>
													<div class="post_image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<?php the_post_thumbnail('blog-type-3'); ?>
														</a>
													</div>
												<?php } ?>
												<div class="post_text_holder">
													<div class="post_text_inner">
														<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
														<span class="create">
															<span class="date"><?php the_time('d.m.Y'); ?></span>
															<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
														</span>
														<?php the_excerpt(); ?>
														<span class="info">
															<?php if($blog_hide_comments != "yes"){ ?>
																<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
															<?php } ?>	
															<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
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
								<?php	break;
							case 4: ?>
								<div class="blog_holder2">
									<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
										<article <?php post_class(); ?>>
											<?php if ( has_post_thumbnail() ) { ?>
												<div class="post_image">
													<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<?php the_post_thumbnail('blog-type-2'); ?>
													</a>
												</div>
											<?php } ?>
											<div class="post_text_holder">
												<div class="post_text_inner">
													<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
													<span class="create">
														<span class="date"><?php the_time('d.m.Y'); ?></span>
														<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
													</span>
													<?php the_content(); ?>
													<span class="info">
														<?php if($blog_hide_comments != "yes"){ ?>
															<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
														<?php } ?>	
														<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
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
							<?php	break;
						}
						
						?>		
						</div>
					</div>
					<div class="column2">
					<?php get_sidebar(); ?>	
					</div>
				</div>
		<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
				<div class="<?php if($sidebar == "3"):?>two_columns_33_66<?php elseif($sidebar == "4") : ?>two_columns_25_75<?php endif; ?> background_color_sidebar grid2 clearfix">
					<div class="column1">
					<?php get_sidebar(); ?>	
					</div>
					<div class="column2">
						<div class="column_inner">
								<?php switch ($qode_options_passage['blog_style']) {
								case 1: ?>
									<div class="blog_holder">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<article <?php if ( !has_post_thumbnail() ) { echo "class='no_image'"; } ?>>
												<?php if ( has_post_thumbnail() ) { ?>
													<div class="post_image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<?php the_post_thumbnail('blog-type-1'); ?>
														</a>
													</div>
												<?php } ?>
												<div class="post_text_holder">
													<div class="post_text_inner">
														<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
														<span class="create">
															<span class="date"><?php the_time('d.m.Y'); ?></span>
															<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
														</span>
														<?php the_excerpt(); ?>
														<span class="info">
															 <?php if($blog_hide_comments != "yes"){ ?>
																 <span class="left">
																		<a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a>
																 </span>
															<?php } ?>
															<span class="right"><a href="<?php the_permalink(); ?>" class="read_more"></a></span>
														</span>
													</div>
												</div>	
											</article>
										<?php endwhile; ?>
										<?php else: //If no posts are present ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
										<?php if($qode_options_passage['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
										<?php endif; ?>
									</div>
								 <?php	break;
								case 2: ?>
									<div class="blog_holder2">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<article <?php post_class(); ?>>
												<?php if ( has_post_thumbnail() ) { ?>
													<div class="post_image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<?php the_post_thumbnail('blog-type-2'); ?>
														</a>
													</div>
												<?php } ?>
												<div class="post_text_holder">
													<div class="post_text_inner">
														<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
														<span class="create">
															<span class="date"><?php the_time('d.m.Y'); ?></span>
															<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
														</span>
														<?php the_excerpt(); ?>
														<span class="info">
															<?php if($blog_hide_comments != "yes"){ ?>
																<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
															<?php } ?>	
															<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
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
								<?php	break;
								case 3: ?>
									<div class="blog_holder_list">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<article class="mix">
												<?php if ( has_post_thumbnail() ) { ?>
													<div class="post_image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<?php the_post_thumbnail('blog-type-3'); ?>
														</a>
													</div>
												<?php } ?>
												<div class="post_text_holder">
													<div class="post_text_inner">
														<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
														<span class="create">
															<span class="date"><?php the_time('d.m.Y'); ?></span>
															<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
														</span>
														<?php the_excerpt(); ?>
														<span class="info">
															<?php if($blog_hide_comments != "yes"){ ?>
																<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
															<?php } ?>	
															<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
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
								<?php	break;
								case 4: ?>
									<div class="blog_holder2">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<article <?php post_class(); ?>>
												<?php if ( has_post_thumbnail() ) { ?>
													<div class="post_image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<?php the_post_thumbnail('blog-type-2'); ?>
														</a>
													</div>
												<?php } ?>
												<div class="post_text_holder">
													<div class="post_text_inner">
														<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
														<span class="create">
															<span class="date"><?php the_time('d.m.Y'); ?></span>
															<?php _e('in','qode'); ?> <span class="category"><?php the_category(', '); ?></span>
														</span>
														<?php the_content(); ?>
														<span class="info">
															<?php if($blog_hide_comments != "yes"){ ?>
																<span class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comment','qode') ); ?></a></span>
															<?php } ?>	
															<span class="right"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read_more"></a></span>
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
								<?php	break;
								
								
						}
						
						?>		
						</div>
					</div>
				</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>