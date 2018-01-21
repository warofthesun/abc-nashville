<?php get_header(); ?>
<!--INDEX-->
			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								

								<section class="entry-content cf">
								<?php global $post; ?>
								<?php
								$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
								?>
								<a href="<?php the_permalink() ?>" style="background: url(<?php echo $src[0]; ?> ); background-size: cover; height: 300px;background-position-y:20%;display: flex; color: #ffffff;text-decoration: none;">
									<h2 style="align-items: flex-end; text-transform: uppercase;display: flex; font-size: 42px;text-shadow: 1px 1px 1px #323944;padding-left: 20px"><?php the_title(); ?></h2>
								</a>


										<header class="article-header" style="padding-top: 10px;">

											
											<p class="byline entry-meta vcard" style="margin-bottom: 0;">
                                                                <?php printf( __( 'Posted', 'bonestheme' ).' %1$s %2$s',
               								/* the time the post was published */
               								'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
               								/* the author of the post */
               								'<span class="by">'.__( 'by', 'bonestheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
            							); ?>
											</p>

										</header>

									<?php the_excerpt(); ?>
								</section>

								<footer class="article-footer cf">
									


                 	<?php printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer>

							</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


						</main>

					<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
