
    <!-- ========================= -->
    <!--          Landing          -->
    <!-- ========================= -->
        <section id="hero" class="parallax background-wrapper entry-header tall-header">
            <div class="container hero-content parallax__layer parallax__layer--back">
                <div class="hero-text">
                    <h1><?php bloginfo( 'name' ); ?></h1>
                    <h2><?php bloginfo( 'description' ); ?></h2>
                </div>
            </div>
            <picture class="hero-picture parallax__layer parallax__layer--base"> 
                <source srcset="<?php echo esc_url(get_the_post_thumbnail_url($post->ID, 'header-laptop')); ?>" media="(min-width: 600px)"> 
                <img src="<?php echo esc_url(get_the_post_thumbnail_url($post->ID, 'header-mobile')); ?>" alt="landing image" decoding=“async”> 
            </picture>
        </section>

    <!-- ========================= -->
    <!--           News            -->
    <!-- ========================= -->

        <section id="news">
            <div class="card-wrapper">
                <?php 
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 6, // Number of recent posts thumbnails to display
                    'post_status' => 'publish' // Show only the published posts
                )); ?> 
                    <?php foreach ( $recent_posts as $post_item ) : ?>
                        <div class="card-item">
                            
                            <?php echo get_the_post_thumbnail($post_item['ID'], 'medium', array('class' => 'card-img')); ?>
                            <div class="card-desc">
                                <span style="font-size: 0.75rem;"><?php echo esc_html(wp_date('j F, Y', strtotime($post_item['post_date']))); ?></span>
                                <h3><a class="nolink" href="<?php echo esc_url(get_permalink($post_item['ID'])) ?>"><?php echo apply_filters('the_title', $post_item['post_title']); ?></a></h3>
                                <p><?php echo esc_html(wp_trim_excerpt(get_the_excerpt($post_item['ID']), $post_item['ID'])); ?></p>
                                <a class="card-button" href="<?php echo esc_url(get_permalink($post_item['ID'])); ?>">Läs mer &raquo</a>
                            </div>
                            
                        </div>
                    <?php endforeach; ?>
                <!-- <div class="card-item">
                    <img class="card-img" src="/images/Nyhet1.jpg" alt="">
                    <div class="card-desc">
                        <h3>Lorem ipsum dolor</h3>
                        <p>sit amet, consectetur adipiscing elit. Aenean non nascetur egestas sed quisque vulputate quis mi magna. Egestas cum natoque senectus</p>
                        <a class="card-button" href="#">Läs mer</a>
                    </div>
                </div> -->
                <a class="card-button" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Tidigare inlägg &raquo</a>
            </div>
            
        </section>
    
    <!-- ========================= -->
    <!--           About           -->
    <!-- ========================= -->

        <section id="about">
            <div class="about-wrapper">
                <div class="about-title">
                    <h2 class="primary-title"><?php echo get_the_title(get_page_by_title('Om klubben')->ID); ?></h2>
                </div>
                <?php if (CFS()->get('front_background_image')):
                
                $image = CFS()->get('front_background_image');             
                ?>
                    <div class="about-desc background-wrapper"> 
                        <picture class="background-picture">
                            <source srcset="<?php echo esc_url(wp_get_attachment_image_url($image, $size = 'header-laptop', "", array( ) )); ?>"
                                media="(min-width: 600px)">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url($image, $size = 'header-mobile', "", array( ) ));?>" alt="bakgrundsbild" loading="lazy"
                                decoding=“async”>
                        </picture>  
                        <div class="about-text background-content">
                            <p><?php echo esc_html(get_the_excerpt(get_page_by_title('Om klubben')->ID)); ?></p>
                            <a class="card-button" href="<?php echo esc_url(get_page_link(get_page_by_title('Om klubben')->ID)); ?>">Läs mer &raquo</a>
                        </div>
                </div>
                <?php endif; ?>
            </div>
        </section>

    <!-- ========================= -->
    <!--          Gallery          -->
    <!-- ========================= -->

        <section id="gallery">
                <h2 class="container primary-title"><?php echo esc_html(get_the_title(get_page_by_title('galleriet')->ID)); ?></h2>
                <a class="button" href="<?php echo esc_url(get_page_link(get_page_by_title('galleriet')->ID)); ?>">Till <?php echo esc_html(get_the_title(get_page_by_title('galleriet')->ID)); ?></a>
                    <?php if( get_post_gallery(get_page_by_title('galleriet')->ID,false) ){
                        $gallery = get_post_gallery(get_page_by_title('galleriet')->ID,false);
                        $gallery = explode(',',$gallery['ids']);
                        // $gallery_images = get_post_gallery_images(get_page_by_title('galleriet')->ID);
                        $image_list = '<div class="gallery-wrapper">';
                        for($i = 0; $i < count($gallery); $i++) {
                            $image_url = wp_get_attachment_image_url($gallery[$i], $size="large", array());
                            $image_alt = get_post_meta($gallery[$i], "_wp_attachment_image_alt", TRUE);
                            $image_list .= '<div class="gallery-item"><a href="' . esc_url(wp_get_attachment_image_url($gallery[$i], $size="full", array())) . '"><img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '" loading="lazy" decoding="async"></a>'
                            . '<figcaption>' . wp_get_attachment_caption($gallery[$i]) . '</figcaption>'
                            . '</div>';
                        }
                        $image_list .= '</div>';
                        echo wp_kses_post($image_list);
                    } ?>
                    <!-- <div class="gallery-item">
                        <img src="/images/gallery_img.jpeg" alt="">
                        <h4 class="gallery-desc">Lorem ipsum dolor</h4>
                    </div>
                    <div class="gallery-item">
                        <img src="/images/gallery_img.jpeg" alt="">
                        <h4 class="gallery-desc">Lorem ipsum dolor</h4>
                    </div>
                    <div class="gallery-item">
                        <img src="/images/gallery_img.jpeg" alt="">
                        <h4 class="gallery-desc">Lorem ipsum dolor</h4>
                    </div>
                    <div class="gallery-item">
                        <img src="/images/gallery_img.jpeg" alt="">
                        <h4 class="gallery-desc">Lorem ipsum dolor</h4>
                    </div>
                    <div class="gallery-item">
                        <img src="/images/gallery_img.jpeg" alt="">
                        <h4 class="gallery-desc">Lorem ipsum dolor</h4>
                    </div>
                    <div class="gallery-item">
                        <img src="/images/gallery_img.jpeg" alt="">
                        <h4 class="gallery-desc">Lorem ipsum dolor</h4>
                    </div>
                    <div class="gallery-item">
                        <img src="/images/gallery_img.jpeg" alt="">
                        <h4 class="gallery-desc">Lorem ipsum dolor</h4>
                    </div> -->
        </section>

    <!-- ========================= -->
    <!--         Membership        -->
    <!-- ========================= -->

        <section id="membership">
            <div class="member-wrapper">
                <h2>Bli medlem</h2>
                <a class="button" href="<?php echo esc_url(get_page_link(2144)); ?>">Kontakta oss</a>
            </div>
        </section>

    <!-- ========================= -->
    <!--         Sponsorer         -->
    <!-- ========================= --> 
    <?php if ( is_active_sidebar( 'sponsors' ) ) : ?>
        <section id="sponsors">
            <div class="sponsor-wrapper">
                <h2 class="primary-title">Våra sponsorer</h2>
                <div class="sponsor-list">
                    <?php dynamic_sidebar( 'sponsors' ); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>