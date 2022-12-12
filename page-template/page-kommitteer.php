<?php
/*

* Template Name: Kommitteer

*/

get_header();
get_template_part('template-parts/content', 'featured_image');

?>
<section style="background-color: #F0F4F8;">
	<main id="primary" class="site-main container">

    <?php the_content(); ?>

    <?php if (CFS()->get('kommitte')): ?>
        <?php $fields = CFS()->get('kommitte'); ?>
            <div class="board-wrapper">
                <?php foreach ($fields as $field): ?>
                    <div class="card-item color-bar">
                        <h2><?php echo esc_html($field['kommittetyp']); ?></h2>
                        <div class="card-object-flex">
                            <?php foreach ($field['person'] as $object): ?>
                                <div class="card-object">
                                    <div class="card-main">
                                        <h3><?php echo esc_html($object['namn']); ?></h3>
                                        <h3><?php echo esc_html($object['position']); ?></h3>
                                    </div>
                                    <?php if ($object['telefonnummer'] != null || $object['emailadress'] != null || $object['adress'] != null || $object['postnummer'] != null): ?>
                                    <div class="card-details">
                                        <ul>
                                            <li><?php echo esc_html($object['telefonnummer']); ?></li>
                                            <li><?php echo esc_html($object['emailadress']); ?></li>
                                        </ul>
                                        <ul>
                                            <li><?php echo esc_html($object['adress']); ?></li>
                                            <li><?php echo esc_html($object['postnummer']); ?></li>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php if ($object != end($field['person'])): ?>
                                    <div class="v-line"></div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
    <?php endif; ?>

	</main><!-- #main -->
    </section>
<?php
get_footer();
