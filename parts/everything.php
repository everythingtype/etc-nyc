<?php 

$taxonomy = "etc_project_dates";

$taxargs = array(
	'orderby'       => 'slug', 
	'order'         => 'DESC'
);

$categories = get_terms( $taxonomy, $taxargs ); 

foreach ($categories as $category) :

	$termlink = get_term_link( $category->slug, $taxonomy ); 

	echo '<h2><a href="' . $termlink . '">' . $category->name . '</a></h2>';
	echo '<div class="grid">';
	$postargs = array(
		'posts_per_page'   => -1,
		'orderby'          => 'menu_order',
		'order'            => 'DESC',
		'post_type'        => 'etc_projects',
		'tax_query' => array(
				array(
					'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $category->slug
				)
			)
	);

	$myposts = get_posts( $postargs ); 
	global $post;

	foreach ( $myposts as $post ) : 
		setup_postdata($post);
		get_template_part('parts/project-thumbnail');
	endforeach;

	echo '</div>';

endforeach;

wp_reset_query(); ?>