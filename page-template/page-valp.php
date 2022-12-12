<?php
/*

* Template Name: Valp

*/

get_header();
get_template_part('template-parts/content', 'featured_image');

?>

<section>
	<main id="primary" class="site-main container">

	

<div class="dog-list">
	<?php
	$fields = CFS()->get();
	$props = CFS()->get_field_info();
	if($fields):
	?>
		<div class="dog-item">
			<?php if($fields['namn']):?><h3><?php echo esc_html($fields['namn']); ?></h3><?php endif; ?>
			<?php the_content(); ?>
			<div class="dog-item-content">
			<?php
				$attachment_id = $fields['bild'];
				$img_src = wp_get_attachment_image_url( $attachment_id, 'large' );
				$img_srcset = wp_get_attachment_image_srcset( $attachment_id, 'large' );
				$image_alt = get_post_meta($attachment_id, "_wp_attachment_image_alt", TRUE);
			?>
			<?php if($fields['bild']):?><img class="dog-main-img" src="<?php echo esc_url( $img_src ); ?>"
				 srcset="<?php echo esc_attr( $img_srcset ); ?>"
				 sizes="(max-width: 50em) 87vw, 680px" alt="<?php echo esc_attr($image_alt); ?>" decoding="async" loading="lazy"><?php endif; ?>
				 <?php if($fields['datum']):?><i><?php echo esc_html($fields['datum']); ?></i><?php endif; ?>
					<?php if($fields['info']):?><i><?php echo esc_html($fields['info']); ?></i><?php endif; ?>
				<div>
					<h3>Hane</h3>
					<ul>
					<?php if($fields['kennel_hane']):?><li><span><?php echo esc_html($props['kennel_hane']['label']);?></span><?php echo esc_html($fields['kennel_hane']);?></li><?php endif; ?>
					<?php if($fields['ovrig_hane']):?><li><span><?php echo esc_html($props['ovrig_hane']['label']);?></span><?php echo esc_html($fields['ovrig_hane']);?></li><?php endif; ?>
					<?php if($fields['far_hane']):?><li><span><?php echo esc_html($props['far_hane']['label']);?></span><?php echo esc_html($fields['far_hane']);?></li><?php endif; ?>
					<?php if($fields['mor_hane']):?><li><span><?php echo esc_html($props['mor_hane']['label']);?></span><?php echo esc_html($fields['mor_hane']);?></li><?php endif; ?>
	
					</ul>
				</div>
				<div>
					<h3>Tik</h3>
					<ul>
					<?php if($fields['kennel_tik']):?><li><span><?php echo esc_html($props['kennel_tik']['label']);?></span><?php echo esc_html($fields['kennel_tik']);?></li><?php endif; ?>
					<?php if($fields['ovrig_tik']):?><li><span><?php echo esc_html($props['ovrig_tik']['label']);?></span><?php echo esc_html($fields['ovrig_tik']);?></li><?php endif; ?>
					<?php if($fields['far_tik']):?><li><span><?php echo esc_html($props['far_tik']['label']);?></span><?php echo esc_html($fields['far_tik']);?></li><?php endif; ?>
					<?php if($fields['mor_tik']):?><li><span><?php echo esc_html($props['mor_tik']['label']);?></span><?php echo esc_html($fields['mor_tik']);?></li><?php endif; ?>
	
					</ul>
				</div>
				<?php if($fields['kontakt']): ?>
					<li><span><?php echo esc_html($props['kontakt']['label']); ?></span>
						<ul>
					<?php foreach ($fields['kontakt'] as $contactInfos): ?>
						<?php foreach ($contactInfos as $contactInfo): ?>
							<li><?php echo esc_html($contactInfo); ?></li>
						<?php endforeach; ?>
						<?php endforeach; ?>
						</ul>
					</li>
					<?php endif; ?>
					<?php if($fields['uppfodare']):?><li><span><?php echo esc_html($props['uppfodare']['label']);?></span><?php echo esc_html($fields['uppfodare']);?></li><?php endif; ?>
					</ul>
					<ul>
					<?php if($fields['stamtavla']):?><li><span><?php echo esc_html($props['stamtavla']['label']);?></span><?php endif; ?>
					<?php
				$attachment_id = $fields['stamtavla'];
				$img_src = wp_get_attachment_image_url( $attachment_id, 'medium' );
				$img_srcset = wp_get_attachment_image_srcset( $attachment_id, 'medium' );
				$image_alt = get_post_meta($attachment_id, "_wp_attachment_image_alt", TRUE);
			?><?php if($fields['stamtavla']): ?><img src="<?php echo esc_url( $img_src ); ?>"
			srcset="<?php echo esc_attr( $img_srcset ); ?>"
			sizes="(max-width: 50em) 87vw, 300px" alt="<?php echo esc_attr($image_alt); ?>" decoding="async" loading="lazy"><?php endif; ?>
				</li>
				</ul>
			</div>
			
		</div>
		<?php endif; ?>
</div>


	</main><!-- #main -->
    </section>
<?php
get_footer();
