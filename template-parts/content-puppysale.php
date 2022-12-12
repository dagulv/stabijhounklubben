<?php if (CFS()->get('lista')): ?>
<div class="puppy-wrapper">
    
    <div class="dog-list">
                <?php
                $fields = CFS()->get('lista');
                $props = CFS()->get_field_info();
                foreach ($fields as $field): ?>
                <h4><?php echo $field['kennel']; ?></h4>
                    <div class="dog-item">
                        <div class="dog-item-content">
                            <img src="<?php echo $field['bild']; ?>" alt=""> 
                            <ul>
                                <li><?php echo $fields['gender']; ?></li>
                                <li><span><?php echo $props['titlar']['label']; ?></span><?php echo $field['titlar']; ?></li>
                                <li><span><?php echo $props['father']['label']; ?></span><?php echo $field['father']; ?></li>
                                <li><span><?php echo $props['mother']['label']; ?></span><?php echo $field['mother'];?></li>
                            </ul>
                        </div>
                        
                    </div>
                    <p><?php echo $field['cd-info'];?></p>
                    .
                <?php endforeach; ?>
    </div>
    
</div>
        <?php endif; ?>
