<?php 
	$typologies = wp_get_post_terms( $post->ID, 'etc_project_typologies' ); 
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
					<?php the_time('F j, Y'); ?>
					<div class="meta"><?php the_title_attribute(); ?></div>
				</a>
			</h4>
		</div>
	</div>
</div>