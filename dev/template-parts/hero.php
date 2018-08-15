<?php 
/**
 * Hero
 * 
**/

$hero_heading = get_field('hero_heading');
$hero_subheading = get_field('hero_subheading');
$hero_button = get_field('hero_button');
$hero_bg_image = get_field('hero_background_image');
$hero_content_image = get_field('hero_content_image');
$button_label = get_field('hero_button_label') ?: "Get In Touch";
$button_type = get_field('hero_button_type');
// if($button_type == "scroll"):
// 	$action = ""
// endif;

$hero_classes = array();

if ($hero_content_image) {
  array_push($hero_classes, 'has-columns');
}
?>

<div class="hero <?php echo implode(' ',$hero_classes); ?>">

	<?php if ($hero_content_image) { ?>
	<div class="container">
		<div class="content">
			<h1>
				<?php the_field('hero_heading'); ?>
			</h1>
			<p>
				<?php the_field('hero_subheading'); ?>
			</p>
			<div>
				<?php if($button_type == "link"): ?>
					<a 
						href="<?php echo $hero_button['url']; ?>"
						target="<?php echo $hero_button['target']; ?>" class="btn btn-light">
						<?php echo $button_label; ?>
						<i class="fa fa-long-arrow-right"></i>
					</a>
				<?php endif; ?>
				<?php  if($button_type == "scroll") : ?>
						<a href="#"
							v-scroll-to="'<?php echo $hero_button['url']; ?>'"
							class="btn btn-light">
							<?php echo $button_label; ?>
							<i class="fa fa-long-arrow-right"></i>
					</a>
				<?php endif; ?>

				<?php  if($button_type == "modal") : ?>
						<button
							@click="modalShow = !modalShow"
							class="btn btn-light">
							<?php echo $button_label; ?>
							<i class="fa fa-long-arrow-right"></i>
					</button>
				<?php endif; ?>
			</div>
		</div>

		<div class="image">
			<img src="<?php echo $hero_content_image['url']; ?>" alt="<?php echo $hero_content_image['alt']; ?>" title="<?php echo $hero_content_image['title']; ?>">
		</div>
	</div>
	<!-- /content -->
	<?php } else { ?>

	<h1>
		<?php the_field('hero_heading'); ?>
	</h1>
	<br>
	<div>
		<a href="#" v-scroll-to="'#primary'" target="<?php echo $hero_button['target']; ?>" class="btn btn-lg btn-light">
			<?php echo $button_label; ?>
		</a>
	</div>
	<?php } ?>
</div>
<!-- /hero -->
