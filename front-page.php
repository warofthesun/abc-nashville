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
								<?php 
									$today = date('Ymd');
									$args = array( 
									'post_type' => 'events',
									'meta_query' => array(
								        array(
								            'key'  => 'event_date',
								            'compare' => '>=',
								            'value'   => $today,
								        ),
									),
									'orderby'   => 'meta_value_num',
									'order'     => 'ASC',
									'posts_per_page' => '1',
									);
									$the_query = new WP_Query( $args );
								?>
									<?php if ( $the_query->have_posts() ) : ?>
									<div class="m-all t-2of3 d-2of3 col-1_1 background-image" style="background-image: url(<?=$url?>);">
									<?php else : ?>
									<div class="m-all t-3of3 d-3of3 col-1_1 background-image" style="background-image: url(<?=$url?>);">
									<?php endif; ?>
									<h2 class="headline"><?php the_title(); ?></h2>

								</div>
								</a>
								<?php endwhile; ?>
							<?php endif; ?>
							<?php wp_reset_query(); ?>
							<?php 
								$today = date('Ymd');
								$args = array( 
								'post_type' => 'events',
								'meta_query' => array(
										array(
											'key'  => 'event_date',
											'compare' => '>=',
											'value'   => $today,
										),
									),
								'orderby'   => 'meta_value_num',
								'order'     => 'ASC',
								'posts_per_page' => '1',
								);
								$the_query = new WP_Query( $args );
							?>
								<?php if ( $the_query->have_posts() ) : ?>
								<div class="m-all t-1of3 d-1of3 col-1_3 next_seminar">
								<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
									<h2 class="headline">next event</h2>
									<?php 
										$date_string = get_field('event_date');
										$date = DateTime::createFromFormat('Ymd', $date_string); 
									?>

									<div class="event_date"><?php echo $date->format('M j'); ?></div>
									
									<a href="<?php the_field('event_link'); ?>" class="event_title"><?php the_title() ;?></a>
									<a href="<?php the_field('event_link'); ?>" class="h2 event_tickets">buy tickets</a>
									<a href="/workshops-for-artists" class="event_calendar">view calendar</a>
									<?php endwhile; ?>
								</div>
								 <?php endif; ?>
								<?php wp_reset_query(); ?>
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

									<img src="<?php echo get_template_directory_uri(); ?>/library/images/periscope-logo.png"><h2><?php the_field('row-3_1'); ?></h2>

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
									<?php if (have_rows('social_icons', 'option')) : ?>
									<div class="social-icons">
									<?php while(have_rows('social_icons', 'option')) : the_row(); ?>
									<?php 
										$link = get_sub_field('social_link');
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php the_sub_field('social_icon'); ?></a>
										<?php endwhile; ?>
									</div>
									<?php endif; ?>
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
