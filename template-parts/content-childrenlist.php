<?php

$staby_child_pages = get_pages(array(
    'child_of'     => $post->ID,
    'sort_column' => 'post_date',
    'sort_order' => 'desc'

));
?>
<section id="children">
    <div class="children-wrapper">
    <?php
        foreach ($staby_child_pages as $child_page): 
            if($child_page->post_parent == $post->ID):
        // $svg = CFS()->get('child_svg', $child_page->ID); ?>
            <div class="children-item">
                <!-- <div class="icon-wrapper">
                    <div aria-hidden="true" class="icon"><?php echo $svg ?></div>
                </div>   -->
                <div class="children-item-text">
                    <h3><?php echo esc_html($child_page->post_title); ?></h3>
                    <p><?php echo esc_html(wp_trim_excerpt(get_the_excerpt($child_page), $child_page)); ?></p>
                    <a class="card-button" href="<?php echo esc_url(get_page_link( $child_page->ID )); ?>">Läs mer</a>
                </div>
                
            </div>
    <?php 
            endif;
        endforeach; ?>
    </div>
</section>
