<?php
/**
 * Slideout Contact Form
 *
 * @package wprig
**/

$slideout_form = get_field('slide_out_form', 'option');
$button_label = get_field('hero_button_label') ?: "Get In Touch";
?>

	<div 
		class="modal micromodal-slide" 
		id="modal-contact" 
		aria-hidden="true"
		:class="{ modalOpen: modalShow }">
		<div class="modal__overlay" tabindex="-1" @click.self="modalShow = !modalShow">
			<div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-contact-title">
				<header class="modal__header">
					<h2 class="modal__title" id="modal-contact-title">
						<?php echo $button_label; ?>
					</h2>
					<button class="btn btn-transparent modal__close" aria-label="Close modal" @click="modalShow = !modalShow"></button>
				</header>
				<main class="modal__content" id="modal-contact-content">
					<?php 
						get_template_part('template-parts/contact-form');
					?>
				</main>
			</div>
		</div>
	</div>
