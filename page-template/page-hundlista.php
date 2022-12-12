<?php
/*

* Template Name: Hundlista

*/

get_header();
get_template_part('template-parts/content', 'featured_image');

?>

<section>
	<main id="primary" class="site-main container">

	<?php the_content();

	$staby_child_dog_pages = get_pages(array(
		'child_of'     => $post->ID,
		'sort_column' => 'post_date',
		'sort_order' => 'desc'
	));
	?>
<table class="table-dog-list">
<colgroup span="4"></colgroup>
<thead>
	<tr>
		<th class="cell-img"></th>
		<th class="cell-data">Namn</th>
		<th class="cell-data">Född</th>
		<th class="cell-data">Titlar</th>
	</tr>
</thead>
	<?php
	foreach ($staby_child_dog_pages as $dog):
		$field_data = CFS()->get( false, $dog->ID, array( 'format' => 'raw' ) );
		$link = get_page_link($dog->ID);
	?>
	
		<tr class="table-dog-item">
			<td class="cell-img"><a href="<?php echo esc_url($link) ?>"><?php echo wp_get_attachment_image($field_data['bild'], $size = 'thumbnail', "", array( "class" => "table-dog-list-thumbnail" ) ); ?></a></td>
			<td><a href="<?php echo esc_url($link) ?>"><?php echo esc_html($field_data['namn']); ?></a></td>
			<td><a href="<?php echo esc_url($link) ?>"><?php echo esc_html($field_data['born']); ?></a></td>
			<td><a href="<?php echo esc_url($link) ?>"><?php echo esc_html($field_data['titlar']); ?></a></td>
			
		</tr>
	<?php endforeach; ?>
</table>


	</main><!-- #main -->
    </section>
<?php
get_footer();
