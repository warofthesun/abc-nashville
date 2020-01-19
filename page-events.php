<?php
/*
 Template Name: Events
 */
?>

<?php get_header(); ?>
<!--PAGE-EVENTS-->
			<div id="content">

				<div id="inner-content" class="wrap cf">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<header class="article-header">
								

									<h1 class="page-title"><?php the_title(); ?></h1>
									

								</header>

								<section class="entry-content cf" itemprop="articleBody">
									<?php the_content(); ?>
								</section>
				
						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
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
									);
									$the_query = new WP_Query( $args );
									?>
									<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
									
									<h1 class="the-title"><?php the_title() ;?></h1>
									<div class="main-summary"><?php the_excerpt() ?></div>
									
									<?php endwhile; else: ?> <p>Sorry, we have no upcoming events at this time. Check back soon!</p> <?php endif; ?>
									<?php wp_reset_query(); ?>
								
							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>
						
						<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
