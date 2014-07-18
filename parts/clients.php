<?php 

$taxonomy = "etc_project_clients";

$taxargs = array(
	'orderby'       => 'slug', 
	'order'         => 'ASC'
);

$categories = get_terms( $taxonomy, $taxargs ); ?>

<ul>
	<?php foreach ($categories as $category) : ?>
		<li><a href="<?php echo get_term_link( $category->slug, $taxonomy ); ?>"><?php echo $category->name; ?></a></li>
	<?php endforeach; ?>
</ul>

<?php wp_reset_query(); ?>