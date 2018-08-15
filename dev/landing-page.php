<?php
/**
 * Template Name: Service Landing Page
 *
 * The template for displaying landing pages
 *
 * @package wprig
 */
$cta_text = get_field('hero_button_label') ?: "Get In Touch";
$hero_image = get_field('hero_image');

get_header(); ?>
    <?php /**
           * Include the component stylesheet for the content.
           * This call runs only once on index and archive pages.
           * At some point, override functionality should be built in similar to the template part below.
           */
    wp_print_styles(array( 'wprig-landing-page' )); // Note: If this was already done it will be skipped.
    ?>
    <div class="hero large has-columns">
        <div class="container">
            <div class="content">
                <h1>
        <?php the_field('hero_heading'); ?>
                </h1>
                <p>
        <?php the_field('hero_body'); ?>
                </p>
                <div>
                    <button @click="modalShow = !modalShow; subject = '<?php echo 'Interested in ' . get_the_title(); ?>'" class="btn btn-light wrapper modal-launch">
        <?php echo $cta_text; ?>
                        <i class="fa fa-long-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div class="image">
                <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>" title="<?php echo esc_attr($hero_image['title']); ?>">
            </div>
        </div>
    </div>

    <div class="offset-content">
        <div class="container">
            <div class="inner">
                <div>
        <?php the_field('icon_1'); ?>
                    <h2>
        <?php the_field('icon_block_heading_1'); ?>
                    </h2>
                    <p>
        <?php the_field('icon_block_body_1'); ?>
                    </p>
                </div>
                <div>
        <?php the_field('icon_2'); ?>
                    <h2>
        <?php the_field('icon_block_heading_2'); ?>
                    </h2>
                    <p>
        <?php the_field('icon_block_body_2'); ?>
                    </p>
                </div>
                <div>
        <?php the_field('icon_3'); ?>
                    <h2>
        <?php the_field('icon_block_heading_3'); ?>
                    </h2>
                    <p>
        <?php the_field('icon_block_body_3'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php if(get_field('quote_heading')) : ?>
    <div class="cta-text">
        <div class="container">
            <h3>
        <?php the_field('quote_heading'); ?>
            </h3>
        <?php the_field('quote_body'); ?>
        </div>
    </div>
    <?php endif; ?>


    <div class="hero">
        <h2>
            <?php the_field('hero_heading_2'); ?>
        </h2>
        <p>
            <?php the_field('hero_body_2'); ?>
        </p>
        <div>
            <button @click="modalShow = !modalShow; subject = '<?php echo 'Interested in ' . get_the_title(); ?>'" class="btn btn-light wrapper modal-launch">
                <?php echo $cta_text; ?>
                <i class="fa fa-long-arrow-right"></i>
            </button>
        </div>
    </div>

<?php
    get_footer();
