<?php
/**
 * The contact page template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wprig
 */

get_header(); ?>

	<?php 
	/**
	 * Include the component stylesheet for the content.
	 * This call runs only once on index and archive pages.
	 * At some point, override functionality should be built in similar to the template part below.
	 */
	wp_print_styles(array( 'wprig-contact-page' )); // Note: If this was already done it will be skipped.
	?>

	<section class="contact" style="background: url(/wp-content/uploads/2018/07/workspace2.jpg) center center no-repeat;">
		<div class="container">
			<div class="panel left-side">
				<h1>Get In Touch</h1>
				<?php 
					get_template_part('template-parts/contact-form');
					//echo do_shortcode('[contact-form-7 id="140" title="Contact form 1"]'); ?>
			</div>
			<div class="panel right-side">
				<h2>Contact Info</h2>
				<ul class="contact">
					<?php if(get_theme_mod('contact_location_city')) : ?>
					<li>
						<i class="fa fa-map-marker"></i>
						<?php echo get_theme_mod('contact_location_city'); ?>
					</li>
					<?php endif; ?>

					<?php if(get_theme_mod('contact_phone')) : ?>
					<li>
						<i class="fa fa-phone"></i>
						<a href="tel:<?php echo get_theme_mod('contact_phone'); ?>" class="white-text">
							<?php echo get_theme_mod('contact_phone'); ?>
						</a>
					</li>
					<?php endif; ?>

					<?php if(get_theme_mod('contact_email')) : ?>
					<li>
						<i class="fa fa-paper-plane"></i>
						<a href="mailto:<?php echo get_theme_mod('contact_email'); ?>" class="white-text">
							<?php echo get_theme_mod('contact_email'); ?>
						</a>
					</li>
					<?php endif; ?>
				</ul>
				<br>
				<ul class="social">
					<?php social_links_list(); ?>
				</ul>
			</div>
		</div>
	</section>

	<?php
get_footer();
