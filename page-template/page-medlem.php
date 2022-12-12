<?php
/*

* Template Name: Medlem

*/
// If user is not logged in return
if ( !is_user_logged_in() ) {
    wp_redirect(home_url());
    exit;
 }
get_header();
get_template_part('template-parts/content', 'featured_image');

?>
	<main id="primary" class="site-main container">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'staby' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<!-- <?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'staby' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer>.entry-footer
	<?php endif; ?> -->
	<?php

$staby_child_pages = get_pages(array(
    'child_of'     => $post->ID,
    'sort_column' => 'post_date',
    'sort_order' => 'desc'

));

$user = wp_get_current_user();
$allowed_roles = array( 'administrator', 'styrelsen' );
if ( array_intersect( $allowed_roles, $user->roles ) ) {
	$pages = wpdocs_get_pages_by_template_filename( 'page-template/page-styrelsemedlem.php' );
	foreach($pages as $page){
		array_unshift($staby_child_pages, $page);
	}
 }

?>
<section id="children">
    <div class="children-wrapper">
    <?php
        foreach ($staby_child_pages as $child_page): 
        // $svg = CFS()->get('child_svg', $child_page->ID); ?>
            <div class="children-item">
                <!-- <div class="icon-wrapper">
                    <div aria-hidden="true" class="icon"></div>
                </div>   -->
                <div class="children-item-text">
                    <h3><?php echo esc_html($child_page->post_title); ?></h3>
                    <p><?php echo esc_html(wp_trim_excerpt(get_the_excerpt($child_page), $child_page)); ?></p>
                    <a class="card-button" href="<?php echo esc_url(get_page_link( $child_page->ID )); ?>">Läs mer</a>
                </div>
                
            </div>
    <?php 
        endforeach; ?>
    </div>
</section>

</article><!-- #post-<?php the_ID(); ?> -->

    


	</main><!-- #main -->
<?php
get_footer();
