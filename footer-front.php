
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