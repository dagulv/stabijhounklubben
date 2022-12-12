<aside id="secondary sidebar" class="widget-area">
	<h3>Senaste inlägg!</h3>
	<div class="post-wrapper">
		<?php 
		$the_query = new WP_Query( 'posts_per_page=4' );
		while($the_query -> have_posts()) : $the_query -> the_post(); ?>
		<div class="post-item">
            <?php the_post_thumbnail('thumbnail'); ?>
            <div class="post-info">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <div class="post-cred">
                    <p class="post-name"><?php the_author(); ?></p>
                    <p class="post-date"><?php the_date(); ?></p>
                </div>
            </div>
        </div>
		<?php
    //     <div class="post-item">
    //     <img src="/images/main_logo.png" alt="">
    //     <div class="post-info">
    //         <a href="#">Senaste blog!</a>
    //         <div class="post-cred">
    //             <p class="post-name">Dag Ulvsbäck</p>
    //             <p class="post-date">2 oktober 2021</p>
    //         </div>
    //     </div>
    // </div>
		endwhile;
        wp_reset_postdata();
		?>
	</div>
    <?php if ( is_active_sidebar('sidebar-1') ) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php endif; ?>
</aside><!-- #secondary -->