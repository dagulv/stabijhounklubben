<?php
/*

* Template Name: Styrelsen

*/

get_header();
get_template_part('template-parts/content', 'featured_image');

?>

<section style="background-color: #F0F4F8;">
	<main id="primary" class="site-main container">

    <?php the_content(); ?>

    <?php if (CFS()->get('styrelse')): ?>
        <?php $fields = CFS()->get('styrelse'); ?>
            <div class="board-wrapper">
                <?php foreach ($fields as $field): ?>
                    <div class="card-item small-card-width">
                        <div class="card-main">
                            <h3><?php echo esc_html($field['namn']); ?></h3>
                            <h3><?php echo esc_html($field['position']); ?></h3>
                        </div>
                        <div class="card-details">
                            <ul>
                                <li><?php echo esc_html($field['telefonnummer']); ?></li>
                                <li><?php echo esc_html($field['emailadress']); ?></li>
                            </ul>
                            <ul>
                                <li><?php echo esc_html($field['adress']); ?></li>
                                <li><?php echo esc_html($field['postnummer']); ?></li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
    <?php endif; ?>

	</main><!-- #main -->
    </section>
<?php
get_footer();
