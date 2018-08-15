<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wprig
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url(__(site_url(), 'wprig')); ?>">
				<?php
             the_custom_logo();
    ?>
			</a>
			<ul class="footer-contact">
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

			<ul class="footer-social">
				<?php social_links_list(); ?>
			</ul>
		</div>
		<!-- .site-info -->
	</footer>
	<!-- #colophon -->

	<?php get_template_part('template-parts/modal-form'); ?>

</div>
	<!-- #page -->
	<div class="fb-customerchat" page_id="668414046701549" minimized="true" theme_color="#661298" logged_in_greeting="How can Biz Rocket help boost your business?"
	    logged_out_greeting="How can Biz Rocket help boost your business?">
	</div>
	<script>
		window.fbAsyncInit = function () {
			FB.init({
				appId: '897122713819806',
				autoLogAppEvents: true,
				xfbml: true,
				version: 'v2.11'
			});
		};
		(function (d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {
				return;
			}
			js = d.createElement(s);
			js.id = id;
			js.src = "https://connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

	</script>



	<?php wp_footer(); ?>

			<!-- Start of Woopra Code -->
			<!-- <script>
				(function () {
					var t, i, e, n = window,
						o = document,
						a = arguments,
						s = "script",
						r = ["config", "track", "identify", "visit", "push", "call", "trackForm", "trackClick"],
						c = function () {
							var t, i = this;
							for (i._e = [], t = 0; r.length > t; t++)(function (t) {
								i[t] = function () {
									return i._e.push([t].concat(Array.prototype.slice.call(arguments, 0))), i
								}
							})(r[t])
						};
					for (n._w = n._w || {}, t = 0; a.length > t; t++) n._w[a[t]] = n[a[t]] = n[a[t]] || new c;
					i = o.createElement(s), i.async = 1, i.src = "//static.woopra.com/js/w.js", e = o.getElementsByTagName(s)[0], e.parentNode
						.insertBefore(i, e)
				})("woopra");

				woopra.config({
					domain: 'bizrocket.net'
				});
				woopra.track();

		</script> -->
		<!-- End of Woopra Code -->

		<!-- Hotjar Tracking Code for www.bizrocket.net -->
		<!-- <script>
			(function (h, o, t, j, a, r) {
				h.hj = h.hj || function () {
					(h.hj.q = h.hj.q || []).push(arguments)
				};
				h._hjSettings = {
					hjid: 972061,
					hjsv: 6
				};
				a = o.getElementsByTagName('head')[0];
				r = o.createElement('script');
				r.async = 1;
				r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
				a.appendChild(r);
			})(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');

		</script> -->
		<!-- End of Hotjar Code -->
	</body>

	</html>
