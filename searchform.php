<!-- <form class="search" method="get">
    <input type="text" name="s" class="search-input" id="search" value="<?php the_search_query(); ?>" />
    <button type="submit" alt="Search" class="btn-search"><i class="icon-search"></i></button>
</form> -->
<?php
$staby_unique_id = wp_unique_id( 'search-form-' );

$staby_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>
<div class="search-form-wrapper">
    <button aria-label="Open Search" class="search-submit open-search"><i class="search-icon"></i><i class="search-close toggle-opacity"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#fff" fill-rule="evenodd" d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z"/></svg></i></button>
    <form role="search" <?php echo esc_attr($staby_aria_label); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form toggle-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="search" id="<?php echo esc_attr( $staby_unique_id ); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s"  pattern=".*\S.*" required>
        <button aria-label="Search Site" type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'staby' ); ?>"><i class="search-icon"></i></button>
    </form>
</div>