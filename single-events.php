<?php
/*
 * CUSTOM POST TYPE TEMPLATE
*/
?>
<!--SINGLE-EVENTS-->
<?php get_header(); ?>
	<div id="content">
		<div id="inner-content" class="wrap cf">
			<div class="m-all t-2of3 d-6of7">
				<header class="article-header">
					<h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
				</header>
			</div>
			<div class="m-all t-1of3 d-2of7 cf">
			<strong>Date and Time:</strong>
				<?php 
					$date_string = get_field('event_date');
					$date = DateTime::createFromFormat('Ymd', $date_string); 
				?>
				<p><?php echo $date->format('D, F d, Y'); ?><br><?php the_field('event_time'); ?></p>
			
			<strong>Location</strong>
			<p><?php the_field('event_location'); ?><br></p>
			<p><a href="<?php the_field('event_link'); ?>" target="_blank" class="primary-btn">Get Tickets</a></p>
			</div>
			<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

					<section class="entry-content cf">
						<?php the_content(); ?>
					</section> <!-- end article section -->

					<footer class="article-footer">
						<p class="tags"><?php echo get_the_term_list( get_the_ID(), 'custom_tag', '<span class="tags-title">' . __( 'Custom Tags:', 'bonestheme' ) . '</span> ', ', ' ) ?></p>

					</footer>

				</article>

				<?php endwhile; ?>

				<?php else : ?>

						<article id="post-not-found" class="hentry cf">
							<header class="article-header">
								<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
							</section>
							<footer class="article-footer">
								<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
							</footer>
						</article>

				<?php endif; ?>

			</main>
		</div>
	</div>
<?php get_footer(); ?>
