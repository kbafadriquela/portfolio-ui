<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PortfolioUI
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<ul class="socials">
				<li>
					<a href="<?php echo esc_attr(the_field('facebook', 2)); ?>"><img src="<?php echo get_template_directory_uri();?>/assets/fb.png"/></a>
				</li>
				<li>
					<a href="<?php echo esc_attr(the_field('instagram', 2)); ?>"><img src="<?php echo get_template_directory_uri();?>/assets/insta.png"/></a>
				</li>
				<li>
					<a href="<?php echo esc_attr(the_field('twitter', 2)); ?>"><img src="<?php echo get_template_directory_uri();?>/assets/twt.png"/></a>
				</li>
				<li>
					<a href="<?php echo esc_attr(the_field('linkedin', 2)); ?>"><img src="<?php echo get_template_directory_uri();?>/assets/linkedin.png"/></a>
				</li>
			</ul>
			<span class="copyright">Copyright &copy; <?php echo date("Y");?> All rights reserved </span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
