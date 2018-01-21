			<div class="footer_blocks wrap cf">
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
					<a href="<?php the_field('email_signup'); ?>" class="starter-mail"></a>
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
			
				<?php query_posts('category_name=Section Three&posts_per_page=1'); ?>

				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>

				<?php
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'section-three' );
				$url = $thumb['0'];
				?>
				<a href="<?php the_permalink(); ?>">
					<div class="m-all t-1of3 d-1of3 footer-col-2_1 background-image" style="background-image: url('<?=$url?>');">
						<div class="content">
						<h2 class="headline"><?php the_title(); ?></h2>
						</div>
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
				<?php the_title( sprintf( '<div class="event_title">', esc_url( get_permalink() ) ), '</div>' ); ?>
				<div class="event_content"><?php the_content(); ?></div>
				<?php endwhile; endif; ?>
				<a href="/our-events" class="h2 event_tickets">buy tickets</a>
				<a href="/workshops-for-artists/" class="event_calendar">view calendar</a>
			</div>
				
			</div>
			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="cf">

					<nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>
					<div class="wrap">
					<?php $query = new WP_Query( 'pagename=home-page' ); ?>
										<?php
											// The Loop
											if ( $query->have_posts() ) {
												while ( $query->have_posts() ) {
													$query->the_post();
													?>
					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>   |  <?php the_field('footer_info'); ?></p>
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
				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->