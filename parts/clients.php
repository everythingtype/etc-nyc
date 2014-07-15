<?php 

$taxonomy = "etc_project_clients";

$taxargs = array(
	'orderby'       => 'slug', 
	'order'         => 'ASC'
);

$categories = get_terms( $taxonomy, $taxargs ); ?>

<ul>
	<?php foreach ($categories as $category) : 
		$termlink = get_term_link( $category->slug, $taxonomy ); 
	
		?>
		<li><a href="<?php echo $termlink; ?>"><?php echo $category->name; ?></a></li>
	<?php endforeach; ?>
</ul>

<?php wp_reset_query(); ?>