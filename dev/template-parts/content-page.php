<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wprig
 */

$featuredIMG = get_the_post_thumbnail_url();
?>

	<div class="featured-image-wrapper">
		<div 
			class="featured-image-banner" 
			style="background: linear-gradient( rgba(252, 102, 33, 0.6), rgba(102, 18, 152, 0.8)), url('<?php echo $featuredIMG; ?>') left top no-repeat; background-size: cover;">
		</div>
		<div class="container">
			<h1>
				<?php the_title(); ?>
			</h1>
			<?php the_excerpt(); ?> <br>
			<div class="text-center">
				<button @click="modalShow = !modalShow; form.subject = '<?php echo 'Interested in ' . get_the_title(); ?>'"  class="btn btn-light wrapper modal-launch">
					Get Started <span class="hide-on-mobile">with <?php echo get_the_title(); ?></span>
				</button>
			</div>
		</div>
	</div>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php //wprig_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wprig' ),
				'after'  => '</div>',
			)
		);
		?>
		</div>
		<!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				wprig_edit_post_link();
			?>
		</footer>
		<!-- .entry-footer -->
		<?php endif; ?>
	</article>
	<!-- #post-<?php the_ID(); ?> -->

	<?php
if ( is_singular() ) :
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
endif;
?>
