			<div class="footer_blocks wrap cf">
			<div class="m-all t-1of3 d-1of3 col-4_1">

				<h2>get our updates!</h2>
				<?php $query = new WP_Query( 'pagename=home-page' ); ?>
				<?php if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>
				<a href="<?php the_field('row-4_1-link'); ?>" target="_blank"><?php the_field('row-4_1'); ?></a>
				<?php } } wp_reset_postdata(); ?>
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
			</div>

				<?php query_posts('category_name=Section Three&posts_per_page=1'); ?>

				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>

				<?php
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'section-three' );
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
					<div class="m-all t-1of3 d-1of3 footer-col-2_1 background-image" style="background-image: url('<?=$url?>');">
					<?php else : ?>
					<div class="m-all t-2of3 d-2of3 footer-col-2_1 background-image" style="background-image: url('<?=$url?>');">
					<?php endif; ?>
						<div class="content">
						<h2 class="headline"><?php the_title(); ?></h2>
						</div>
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
					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>   |  <?php the_field('footer_info', 'option'); ?></p>
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
					</div>
				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
