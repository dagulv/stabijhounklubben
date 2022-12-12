<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package staby
 */

?>

<footer id="colophon" class="site-footer background-wrapper">
    <div class="footer-wrapper">
        
    <div class="site-info footer-content background-content container">
        <a class="footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img
                src="<?php echo wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0]?>" alt="Logo"></a>
        <?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'footer-sidebar' ); ?>
        <?php endif; ?>
    </div><!-- .site-info -->
    
    </div>
    <div class="full-hr"></div>
    <div class="footer-wrapper">
        <span class="footer-info-title"><?php bloginfo('name'); ?></span>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>