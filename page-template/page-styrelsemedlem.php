<?php
/*

* Template Name: Styrelsemedlem

*/
$user = wp_get_current_user();
$allowed_roles = array( 'administrator', 'styrelsen' );
if ( !array_intersect( $allowed_roles, $user->roles ) ) {
    wp_redirect(home_url());
    exit;
 }
get_header();
get_template_part('template-parts/content', 'featured_image');

?>
	<main id="primary" class="site-main container">

	<?php get_template_part( 'template-parts/content', 'page' ); ?>

    


	</main><!-- #main -->
<?php
get_footer();
