<?php
/*
 Template Name: Home Page
*/
?>
<?php get_header('front'); ?>
<!--FRONT-PAGE-->
			<div id="content" class="home_page">
				<div id="inner-content" class="wrap cf">
					<?php $query = new WP_Query( 'pagename=home-page' ); ?>
					
						<main id="main"  class="m-all t-3of3 d-6of6 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							<!--ROW 1-->
							<div class="m-all t-3of3 d-6of6 row-1 cf">
							<?php query_posts('category_name=Section One&posts_per_page=1'); ?>

							<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>

							<?php
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'section-one' );
							$url = $thumb['0'];
							?>
							
							
								<a href="<?php the_permalink(); ?>">
									<div class="m-all t-2of3 d-2of3 col-1_1 background-image" style="background-image: url(<?=$url?>);">
									<h2 class="headline"><?php the_title(); ?></h2>
								
								</div>
								</a>
								<?php endwhile; ?>
							<?php endif; ?>
							<?php wp_reset_query(); ?>
								<div class="m-all t-1of3 d-1of3 col-1_3 next_seminar">
								<?php
									// Set up and call our Eventbrite query.
									$events = new Eventbrite_Query( apply_filters( 'eventbrite_query_args', array(
										// 'display_private' => false, // boolean
										// 'nopaging' => false,        // boolean
										 'limit' => 1,            // integer
										// 'organizer_id' => null,     // integer
										// 'p' => true,                // integer
										// 'post__not_in' => null,     // array of integers
										// 'venue_id' => null,         // integer
										// 'category_id' => null,      // integer
										// 'subcategory_id' => null,   // integer
										// 'format_id' => null,        // integer
									) ) );

									if ( $events->have_posts() ) :
										while ( $events->have_posts() ) : $events->the_post(); ?>
									<h2 class="headline">next seminar</h2>
									
									<div class="event_date"><?php eventbrite_event_date(); ?></div>
									<?php  sprintf(  esc_url( get_permalink() )  ); ?>
									<?php $url = get_permalink();
									$newUrl = str_replace('/home-page/', '/workshops-for-artists/', $url); ?>
									<a href="<?php echo $newUrl; ?>" class="event_title"><?php the_title(); ?></a>
									<div class="event_content"><?php the_content(); ?></div>
									<?php endwhile; endif; ?>
									<a href="<?php echo $newUrl; ?>" class="h2 event_tickets">buy tickets</a>
									<a href="/workshops-for-artists" class="event_calendar">view calendar</a>
								</div>
							</div>
							<!--END ROW 1-->
							<!--ROW 2-->
								<div class="m-all t-3of3 d-7of7 row-2 cf">
									<?php query_posts('category_name=Section Three&posts_per_page=1'); ?>

									<?php if (have_posts()) : ?>
									<?php while (have_posts()) : the_post(); ?>

									<?php
									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'section-three' );
									$url = $thumb['0'];
									?>
									<a href="<?php the_permalink(); ?>">
										<div class="m-all t-1of3 d-1of3 col-2_1 background-image" style="background-image: url('<?=$url?>');">
											<div class="content">
											<h2 class="headline"><?php the_title(); ?></h2>
											</div>
										</div>
									</a>
												<?php endwhile; ?>
											<?php endif; ?>
											<?php wp_reset_query(); ?>
										
										<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<a href="<?php the_field('row-2_2-link'); ?>">
										<div class="m-all t-1of3 d-1of3 col-2_2">
									
												<h2><?php the_field('row-2_2'); ?></h2>

										</div>
									</a>
										<?php endwhile; endif ?>
										<?php query_posts('category_name=Section Five&posts_per_page=1'); ?>

										<?php if (have_posts()) : ?>
										<?php while (have_posts()) : the_post(); ?>

										<?php
										$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'section-three' );
										$url = $thumb['0'];
										?>
										<a href="<?php the_permalink(); ?>">
										<div class="m-all t-1of3 d-1of3 col-2_3 background-image" style="background-image: url('<?=$url?>');">
											<h2 class="headline"><?php the_title(); ?></h2>
										</div>
										</a>
										<?php endwhile; endif; 
										wp_reset_query(); ?>
								</div>
							<!--END ROW 2-->
							<!--ROW 3-->
							<div class="m-all t-3of3 d-6of6 cf">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<a href="<?php the_field('row-3_1-link'); ?>" class="m-all t-2of3 d-2of3 col-3_1" style="text-decoration: none ">
								
									<img src="wp-content/themes/abc/library/images/periscope-logo.png"><h2><?php the_field('row-3_1'); ?></h2>
										
									</a>
								
								
								<div class="m-all t-1of3 d-1of3 col-3_3">
										<a href="<?php the_field('row-3_2-link'); ?>" style="text-decoration:none;">
										
										<h2><?php the_field('row-3_2'); ?></h2>
											
										</a>
									
								</div>
								<?php endwhile; endif ?>
							</div>
							<!--END ROW 3-->
							<!--ROW 4-->
							<div class="m-all t-3of3 d-6of6 cf">
								<div class="m-all t-1of3 d-1of3 col-4_1">
									<h2>get our updates!</h2>
									<?php $query = new WP_Query( 'pagename=home-page' ); ?>
										<?php
											// The Loop
											if ( $query->have_posts() ) {
												while ( $query->have_posts() ) {
													$query->the_post();
													?>
										<a href="<?php the_field('row-4_1-link'); ?>" target="_blank"><?php the_field('row-4_1'); ?></a>
									<div class="social-icons">
										<a href="<?php the_field('email_us'); ?>" class="starter-mail"></a>
										<a href="http://www.facebook.com/<?php the_field('facebook'); ?>" class="starter-facebook" target="_blank"></a>
										<a href="http://www.twitter.com/<?php the_field('twitter'); ?>" class="starter-twitter" target="_blank"></a>
										<a href="http://www.instagram.com/<?php the_field('instagram'); ?>" class="starter-instagram" target="_blank"></a>
										<a href="http://www.youtube.com/user/<?php the_field('youtube'); ?>" class="starter-youtube" target="_blank"></a>
									</div>
									<?php
									
										
										}
									}
									/* Restore original Post Data */
									wp_reset_postdata();
									?>
								</div>
								<?php query_posts('category_name=Section Nine&posts_per_page=1'); ?>

								<?php if (have_posts()) : ?>
								<?php while (have_posts()) : the_post(); ?>

								<?php
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'section-one' );
								$url = $thumb['0'];
								?>
								<a href="/blog">
								<div class="m-all t-2of3 d-2of3 col-4_2 background-image" style="background-image: url('<?=$url?>');">
								<div class="content">
								<p>new on the blog</p>
								<h2 class="headline"><?php the_title(); ?></h2>
								</div>
								</div>
								</a>
								<?php endwhile; endif; 
								wp_reset_query(); ?>
							</div>
							<!--END ROW 4-->
							
						</main>
							

				</div>

			</div>

<?php get_footer('front'); ?>