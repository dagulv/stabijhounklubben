<?php
/*

* Template Name: Galleriet

*/

get_header();
get_template_part('template-parts/content', 'featured_image');

?>

<section>
	<main id="primary" class="site-main gallery-container">

	<?php the_content(); ?>

    


	</main><!-- #main -->
    </section>
<?php
get_footer();
