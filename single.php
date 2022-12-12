<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package staby
 */

get_header();
?>
	<main id="primary" class="site-main container blog-sidebar">
		<?php
		while ( have_posts() ) :
			the_post();?>
			<section class="blog-wrapper">
			<?php
			get_template_part( 'template-parts/content', get_post_type() );
			get_sidebar('posts');?>
			</section>
			<div class="border"></div>
			<?php
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle"></span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle"></span> <span class="nav-title">%title</span>',
				)
			);
			?>
			<div class="border"></div>
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		
		?>

	</main><!-- #main -->

<?php

get_footer();
