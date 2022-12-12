<?php
if (has_post_thumbnail()):
    ?>
<header id="header" class="entry-header tall-header">
    <?php the_post_thumbnail('post-thumbnail', ['class' => 'header-image']);?>
	<?php single_post_title( '<h1 class="hero-content entry-title">', '</h1>' ); ?>
</header><!-- .entry-header -->
<?php
else:
    ?>
    <header id="minimal-header" class="entry-header">
        <h1><?php single_post_title();?></h1>
    </header>
    <?php
endif;
?>
