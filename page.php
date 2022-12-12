<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package staby
 */

get_header();

get_template_part('template-parts/content', 'featured_image');
?>

	<main id="primary" class="site-main container">

		<?php
		while ( have_posts() ) :
			the_post();
			
		//var_dump(get_post_gallery(6718));

			if(is_page(1086)):
				get_template_part( 'template-parts/content', 'page' );
			else:
				get_template_part( 'template-parts/content', 'page' );
			endif;

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
