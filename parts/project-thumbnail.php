<?php 
	$typologies = wp_get_post_terms( $post->ID, 'etc_project_typologies' ); 
	$clients = wp_get_post_terms( $post->ID, 'etc_project_clients' );
	$dates = wp_get_post_terms( $post->ID, 'etc_project_dates' );
?>

<div class="griditem <?php echo get_field('project_prominence'); ?>"><div class="griditempadding">
	<div class="thumbnail"><div class="thumbnailpadding"><div class="thumbnailalign"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div></div></div>
	<div class="gridcaption"><h4><a href="<?php the_permalink(); ?>">
		<span class="category"><?php echo etc_singularize($typologies[0]->name); ?></span> <?php echo etc_singularize($clients[0]->name); ?>
		<div class="meta">
			<?php the_title(); ?><br />
			<?php echo etc_singularize($dates[0]->name); ?>
		</div>
	</a></h4></div>
</div></div>