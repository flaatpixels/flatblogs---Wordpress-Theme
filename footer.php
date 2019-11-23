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
			<section class="site-footer__about">
				<h3 class="_header">
					<?php echo get_theme_mod('footer_about_title_setting', 'Add a title'); ?>
				</h3>
				<p class="_about">
					<?php echo get_theme_mod('footer_about_desc_setting', 'Add a description'); ?>
				</p>
				<div class="_social">
					
				</div>
			</section>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- <?php wp_footer(); ?> -->

</body>
</html>
