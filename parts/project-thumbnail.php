<?php 

	$typologies = etc_cleaned_post_terms( $post->ID ); 

	$clients = wp_get_post_terms( $post->ID, 'etc_project_clients' );
	$dates = wp_get_post_terms( $post->ID, 'etc_project_dates' );
	$prominence = get_field('project_prominence');

	if ( $prominence == "large" ) :
		$fallbacksize =  'phoneplus';
	else :
		$fallbacksize =  'gridthumb';
	endif;

?>

<div class="griditem <?php echo $prominence; ?>">

	<div class="griditempadding">
		<div class="thumbnail">
			<div class="thumbnailpadding">
				<div class="thumbnailalign">
					<a href="<?php the_permalink(); ?>"><?php spellerberg_the_thumbnail($post->ID, $fallbacksize); ?></a>
				</div>
			</div>
		</div>
		<div class="gridcaption">
			<h4>
				<a href="<?php the_permalink(); ?>">
					<span class="category"><?php echo etc_singularize($typologies[0]->name); ?></span> <?php echo etc_singularize($clients[0]->name); ?>
					<div class="meta"><?php the_title(); ?><br /><?php echo etc_singularize($dates[0]->name); ?></div>
				</a>
			</h4>
		</div>
	</div>
</div>