<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package staby
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
			$attachment_id = get_post_thumbnail_id();
			$img_src = wp_get_attachment_image_url( $attachment_id, 'large' );
			$image_alt = get_post_meta($attachment_id, "_wp_attachment_image_alt", TRUE);
			$img_srcset = wp_get_attachment_image_srcset( $attachment_id, 'large' );
			if($attachment_id):
			?>
			<img src="<?php echo esc_url( $img_src ); ?>"
				 srcset="<?php echo esc_attr( $img_srcset ); ?>"
				 sizes="(max-width: 50em) 87vw, 680px" alt="<?php echo esc_attr($image_alt);?>" decoding="async">
				 <?php endif; ?>
        <div class="author-container">
            <?php echo wp_kses_post(get_avatar(get_the_author_meta('ID'))); ?>
            <div class="author-info">
                <p class="author-name"><?php the_author(); ?></p>
                <p><?php echo esc_html(get_the_date()); ?></p>
            </div>
        </div>
        <?php
		
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title blog-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>




    </header><!-- .entry-header -->


    <!-- <div class="author-container">
            <div class="author-img">
                <img src="/images/main_logo.png" alt="">
            </div>
            <div class="author-info">
                <p class="author-name">Dag Ulvsbäck</p>
                <p class="author-date">2 oktober 2021</p>
            </div>
        </div> -->
    <div class="entry-content">

        <?php
		if(is_home()):
			the_excerpt();
		else:
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Fortsätt läs<span class="screen-reader-text"> "%s"</span>', 'staby' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'staby' ),
					'after'  => '</div>',
				)
			);
		endif;
		?>

    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
<?php if (is_home()) {
			?>
<hr style="margin: 5rem 0;"> <?php
		} ?>
		