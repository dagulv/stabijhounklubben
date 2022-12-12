<?php
/*

* Template Name: Valplista

*/

get_header();
get_template_part('template-parts/content', 'featured_image');

?>

<section>
	<main id="primary" class="site-main container">

		<?php the_content(); ?>

		<div class="dog-list">
			<?php
			$fields = CFS()->get('valplista');
			if ($fields) :
				foreach ($fields as $field) :
			?>
					<div class="dog-item">
						<?php if ($field['titel']) : ?><h3><?php echo esc_html($field['titel']); ?></h3><?php endif; ?>
						<div class="puppy-info">
							<?php if ($field['info']) : ?><p><?php echo wp_kses_post($field['info']); ?></p><?php endif; ?>
							<ul>
								<?php if ($field['kennel_kontakt']) : ?><li><?php echo esc_html($field['kennel_kontakt']); ?></li><?php endif; ?>
									<?php if ($field['adress_kontakt']) : ?><li><?php echo wp_kses_post($field['adress_kontakt']); ?></li><?php endif; ?>
								
								<?php if ($field['telefonnummer_kontakt']) : ?><li><a href="tel:<?php echo esc_html($field['telefonnummer_kontakt']); ?>"><?php echo esc_html($field['telefonnummer_kontakt']); ?></a></li><?php endif; ?>
								
							</ul>
						</div>

						<div class="puppy-content">
							<ul class="puppy-content-inner">
								<li class="puppy-cell puppy-table-title" style="order:0;">
									<h4>Fader</h4>
								</li>
								<?php
								$attachment_id = $field['bild_hane'];
								$img_src = wp_get_attachment_image_url($attachment_id, 'large');
								$img_srcset = wp_get_attachment_image_srcset($attachment_id, 'large');
								$image_alt = get_post_meta($attachment_id, "_wp_attachment_image_alt", TRUE);
								?>
								<?php if ($field['bild_hane']) : ?><li class="puppy-cell" style="order:1;"><img class="dog-main-img" src="<?php echo esc_url($img_src); ?>" srcset="<?php echo esc_attr($img_srcset); ?>" sizes="(max-width: 50em) 87vw, 680px" alt="<?php echo esc_attr($image_alt); ?>" decoding="async" loading="lazy"></li><?php endif; ?>

								<?php if ($field['ovrig_hane']) : ?><li class="puppy-cell" style="order:2;"><?php echo wp_kses_post($field['ovrig_hane']); ?></li><?php endif; ?>
								<?php if ($field['beskrivning_fader']) : ?><li class="puppy-cell puppy-table-bg" style="order:3;"><?php echo wp_kses_post($field['beskrivning_fader']); ?></li><?php endif; ?>
								<?php if ($field['far_hane']) : ?><li class="puppy-cell" style="order:4;"><span class="bold">Far:</span><br><?php echo esc_html($field['far_hane']); ?><?php endif; ?>
										<?php if ($field['mor_hane']) : ?><br><span class="bold">Mor:</span><br><?php echo esc_html($field['mor_hane']); ?></li><?php endif; ?>

								<li class="puppy-cell puppy-table-title" style="order:0;">
									<h4>Moder</h4>
								</li>
								<?php
								$attachment_id = $field['bild_tik'];
								$img_src = wp_get_attachment_image_url($attachment_id, 'large');
								$img_srcset = wp_get_attachment_image_srcset($attachment_id, 'large');
								$image_alt = get_post_meta($attachment_id, "_wp_attachment_image_alt", TRUE);
								?>
								<?php if ($field['bild_tik']) : ?><li class="puppy-cell" style="order:1;"><img class="dog-main-img" src="<?php echo esc_url($img_src); ?>" srcset="<?php echo esc_attr($img_srcset); ?>" sizes="(max-width: 50em) 87vw, 680px" alt="<?php echo esc_attr($image_alt); ?>" decoding="async" loading="lazy"></li><?php endif; ?>

								<?php if ($field['ovrig_tik']) : ?><li class="puppy-cell" style="order:2;"><?php echo wp_kses_post($field['ovrig_tik']); ?></li><?php endif; ?>
								<?php if ($field['beskrivning_moder']) : ?><li class="puppy-cell puppy-table-bg" style="order:3;"><?php echo wp_kses_post($field['beskrivning_moder']); ?></li><?php endif; ?>
								<?php if ($field['far_tik']) : ?><li class="puppy-cell" style="order:4;"><span class="bold">Far:</span><br><?php echo esc_html($field['far_tik']); ?><?php endif; ?>
										<?php if ($field['mor_tik']) : ?><br><span class="bold">Mor:</span><br><?php echo esc_html($field['mor_tik']); ?></li><?php endif; ?>
								
											
							</ul>
							<?php if($field['fler_bilder']) {
								?> <div class="puppy-table-image-wrapper"><?php								
						foreach($field['fler_bilder'] as $bild) {
							$attachment_id = $bild['extrabild'];
							$img_src = wp_get_attachment_image_url( $attachment_id, 'thumbnail' );
							$img_srcset = wp_get_attachment_image_srcset( $attachment_id, 'thumbnail' );
							$image_alt = get_post_meta($attachment_id, "_wp_attachment_image_alt", TRUE);
							?><a class="puppy-table-image" href="<?php echo esc_url(wp_get_attachment_image_url( $attachment_id, 'full' )); ?>"><img src="<?php echo esc_url( $img_src ); ?>"
							srcset="<?php echo esc_attr( $img_srcset ); ?>"
							sizes="(max-width: 50em) 87vw, 300px" alt="<?php echo esc_attr($image_alt); ?>" decoding="async" loading="lazy"></a><?php
						}
						?> </div> <?php
					}
					?>
						</div>

					</div>
					
				<?php endforeach; ?>
			<?php endif; ?>
		</div>


	</main><!-- #main -->
</section>
<?php
get_footer();
