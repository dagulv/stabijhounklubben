<?php
// Template Name: Framsidan
get_header();
?>

	<main id="primary" class="site-main">
		<?php

		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
			    get_template_part( 'template-parts/content', 'front' );
				
			endwhile;

		else :

			get_template_part( 'template-parts/content', 'front' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
