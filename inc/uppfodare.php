<div class="kennel-wrapper">
        <?php
            $fields = CFS()->get('uppfodare');
            foreach($fields as $field) {
                ?>
                <a href="<?php echo $field['link']['url']; ?>" class="kennel-item">
                    <?php
                    $attachment_id = $field['bild'];
                    $img_src = wp_get_attachment_image_url( $attachment_id, 'medium' );
                    $img_srcset = wp_get_attachment_image_srcset( $attachment_id, 'medium' );
                    $image_alt = get_post_meta($attachment_id, "_wp_attachment_image_alt", TRUE);
                    ?>
                    <img class="kennel-img" src="<?php echo esc_url( $img_src ); ?>"
                    srcset="<?php echo esc_attr( $img_srcset ); ?>"
                    sizes="(max-width: 400px) minmax(65vw, 200px), 200px" alt="<?php echo esc_attr($image_alt); ?>" decoding="async" loading="lazy">
                    <div class="kennel-name-wrapper">
                        <span class="kennel-name"><?php echo esc_html($field['namn'])?></span>
                    </div>
                </a>
                <?php
            }
        ?>
    </div>