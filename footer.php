<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package flatblogs
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-container">
			<section class="site-footer-section">
				<h3 class="_header">
					<?php echo get_theme_mod('footer_about_title_setting', 'What about you (title) ?'); ?>
				</h3>
				<p class="_about">
					<?php echo get_theme_mod('footer_about_desc_setting', 'Add a description about you'); ?>
				</p>
				<div class="_social">
					<?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
						<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
							<?php dynamic_sidebar( 'footer-widget-1' ); ?>
						</div><!-- #primary-sidebar -->
					<?php endif; ?>
				</div>
			</section>

			<section class="site-footer-section">
				<h3 class="_header">
					<?php echo get_theme_mod('footer_about2_title_setting', 'What about you (title) ?'); ?>
				</h3>
				<p class="_about">
					<?php echo get_theme_mod('footer_about2_desc_setting', 'Add a description about you'); ?>
				</p>
				<div class="_social">
					<?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
						<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
							<?php dynamic_sidebar( 'footer-widget-2' ); ?>
						</div><!-- #primary-sidebar -->
					<?php endif; ?>
				</div>
			</section>

			<section class="site-footer-section">
				<h3 class="_header">
					<?php echo get_theme_mod('footer_about3_title_setting', 'What about you (title) ?'); ?>
				</h3>
				<p class="_about">
					<?php echo get_theme_mod('footer_about3_desc_setting', 'Add a description about you'); ?>
				</p>
				<div class="_social">
					<?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
						<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
							<?php dynamic_sidebar( 'footer-widget-3' ); ?>
						</div><!-- #primary-sidebar -->
					<?php endif; ?>
				</div>
			</section>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
