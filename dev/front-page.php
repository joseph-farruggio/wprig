<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package biz_rocket
 */

get_header(); ?>

	<?php 
	/**
	 * Include the component stylesheet for the content.
	 * This call runs only once on index and archive pages.
	 * At some point, override functionality should be built in similar to the template part below.
	 */
	wp_print_styles(array( 'wprig-front-page' )); // Note: If this was already done it will be skipped.
    ?>

	<?php get_template_part('template-parts/hero'); ?>

	<main id="primary" class="site-main padding-sm">
		<h2 class="heading text-center mb-20" >what we do.</h2>
		<p class="text-center mt-0">We help businesses grow by implementing cutting edge web technologies.</p>
		<br>
		<ul class="services">
			<?php 
        $args = array( 
          'post_type' => 'page',
          'meta_key'        => 'featured_service',
          'meta_value'    => true, 
          'orderby'=>'menu_order',
          'posts_per_page' => 9 );
        $serviceLoop = new WP_Query($args);
        $i = 0;
        while ( $serviceLoop->have_posts() ) : $serviceLoop->the_post(); $service_icon = get_field('service_icon'); $i++;?>
			<li style="background-color:<?php echo get_field('service_color'); ?>">
				<a href="<?php the_permalink(); ?>">
					<h3>
						<?php the_title(); ?>
					</h3>
					<?php the_excerpt(); ?>
					<div class="btn btn-light btn-border learn-more">Learn More →</div>
					<img src="<?php echo $service_icon['url']; ?>" alt="">
				</a>
			</li>
			<?php 
            wp_reset_postdata();
        endwhile;
        ?>
			<?php 
        if($i == 2 || $i == 5 || $i == 8) { ?>
			<li class="cta" @click="modalShow = !modalShow; form.subject= 'Help me boost my business' ">
				<div>
					<h3>Want to Boost Your Business?</h3>
					<p>Let us design a customized marketing program for you.</p>
					<div class="btn btn-light btn-border" :aria-expanded="modalShow ? 'true' : 'false'">Get In Touch →</div>
				</div>
			</li>
			<?php } ?>
		</ul>
	</main>
	<!-- #primary -->

	<?php
get_footer();
