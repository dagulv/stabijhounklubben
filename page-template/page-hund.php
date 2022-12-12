<?php
/*

* Template Name: Hund

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
	if ($fields):
	?>
		<div class="dog-item">
			<?php if ($fields['namn']): ?>
			<h3><?php echo esc_html($fields['namn']); ?></h3>
			<?php endif; ?>
			<?php the_content(); ?>
			<div class="dog-item-content">
			<?php
				$attachment_id = $fields['bild'];
				$img_src = wp_get_attachment_image_url( $attachment_id, 'large' );
				$img_srcset = wp_get_attachment_image_srcset( $attachment_id, 'large' );
				$image_alt = get_post_meta($attachment_id, "_wp_attachment_image_alt", TRUE);
				if ($fields['bild']):
			?>
			<img class="dog-main-img" src="<?php echo esc_url( $img_src ); ?>"
				 srcset="<?php echo esc_attr( $img_srcset ); ?>"
				 sizes="(max-width: 50em) 87vw, 680px" alt="<?php echo esc_attr($image_alt); ?>" decoding="async" loading="lazy">
				 <?php endif; ?>
				<ul>
					<?php if ($fields['born']): ?><li><span><?php echo esc_html($props['born']['label']); ?></span><?php echo esc_html($fields['born']); ?></li><?php endif; ?>
					<?php if ($fields['titlar']): ?><li><span><?php echo esc_html($props['titlar']['label']); ?></span><?php echo esc_html($fields['titlar']); ?></li><?php endif; ?>
					<?php if ($fields['beskrivning']): ?><li><span><?php echo esc_html($props['beskrivning']['label']); ?></span><?php echo esc_html($fields['beskrivning']); ?></li><?php endif; ?>
					<?php if ($fields['sjukdomar']): ?><li><span><?php echo esc_html($props['sjukdomar']['label']); ?></span><?php echo esc_html($fields['sjukdomar']); ?></li><?php endif; ?>
				</ul>
				<ul>
					<?php if ($fields['kommentar']): ?><li><span><?php echo esc_html($props['kommentar']['label']) ?></span><?php echo esc_html($fields['kommentar']); ?></li><?php endif; ?>
					<?php if ($fields['antal_sverige']): ?><li><span><?php echo esc_html($props['antal_sverige']['label'])?></span><?php echo esc_html($fields['antal_sverige'])?></li><?php endif; ?>
					<?php if ($fields['antal_utomlands']): ?><li><span><?php echo esc_html($props['antal_utomlands']['label'])?></span><?php echo esc_html($fields['antal_utomlands'])?></li><?php endif; ?>
				</ul>
				
				<ul>
				<?php if($fields['kontakt']): ?>
					<li><span><?php echo esc_html($props['kontakt']['label']) ?></span>
						<ul>
					<?php foreach ($fields['kontakt'] as $contactInfos): ?>
						<?php foreach ($contactInfos as $contactInfo): ?>
							<li><?php echo esc_html($contactInfo) ?></li>
						<?php endforeach; ?>
						<?php endforeach; ?>
						</ul>
					</li>
					<?php endif; ?>
					<?php if($fields['uppfodare']): ?>
					<li><span><?php echo esc_html($props['uppfodare']['label'])?></span><?php echo esc_html($fields['uppfodare'])?></li>
					<?php endif; ?>
					</ul>
					<ul>
						<?php if($fields['stamtavla']): ?>
					<li><span><?php echo esc_html($props['stamtavla']['label'])?></span>
					<?php
				$attachment_id = $fields['stamtavla'];
				$img_src = wp_get_attachment_image_url( $attachment_id, 'medium' );
				$img_srcset = wp_get_attachment_image_srcset( $attachment_id, 'medium' );
				$image_alt = get_post_meta($attachment_id, "_wp_attachment_image_alt", TRUE);
			?><a href="<?php echo esc_url(wp_get_attachment_image_url( $attachment_id, 'full' )); ?>"><img src="<?php echo esc_url( $img_src ); ?>"
			srcset="<?php echo esc_attr( $img_srcset ); ?>"
			sizes="(max-width: 50em) 87vw, 300px" alt="<?php echo esc_attr($image_alt); ?>" decoding="async" loading="lazy"></a>
				</li>
				<?php endif; ?>
				</ul>
			</div>
			
		</div>
		<?php endif; ?>
</div>


	</main><!-- #main -->
    </section>
<?php
get_footer();
