<?php if (CFS()->get('lista')): ?>
<div class="dog-list">
		    <?php
			$fields = CFS()->get('lista');
			$props = CFS()->get_field_info();
			foreach ($fields as $field): ?>
				<div class="dog-item">
					<h3><?php echo esc_html($field['namn']); ?></h3>
					<div class="dog-item-content">
						<img src="<?php echo esc_url($field['bild']); ?>" alt=""> 
						<ul>
								<li><span><?php echo $props['born']['label']; ?></span><?php echo $field['born']; ?></li>
								<li><span><?php echo $props['titlar']['label']; ?></span><?php echo $field['titlar']; ?></li>
								<li>HD A, ED (0) = utan anmärkning, CD fri</li>
								<li>CACIB och CK ggr flera i Sverige och Finland. MH-och BPH- testad med utmärkta resultat. Godkänt anlagsprov viltspår, 1:a pris öppen klass viltspår. Inventerad.</li>
							</ul>
							<ul class="ul-desc">
								<li><span><?php echo $props['kommentar']['label'] ?></span><?php echo $field['kommentar']; ?></li>
								<li><span><?php echo $props['antal_sverige']['label']?></span><?php echo $field['antal_sverige']?></li>
								<li><span><?php echo $props['antal_utomlands']['label']?></span><?php echo $field['antal_utomlands']?></li>
							</ul>
					</div>
					
				</div>
			<?php endforeach; ?>
            </div>
        <?php endif; ?>
