<?php 

	$prominence = get_field('project_prominence');

	if ( $prominence == "large" ) :
		$fallbacksize =  'phoneplus';
	else :
		$fallbacksize =  'gridthumb';
	endif;

	$sizeguidance = '890px';

?>

<div class="griditem <?php echo $prominence; ?>">
	<div class="ratio"></div>
	<div class="gridinner">

			<div class="thumbnail">
				<div class="thumbnailpadding">
					<div class="thumbnailalign">
						<a href="<?php the_permalink(); ?>" class="thumblink"><?php spellerberg_the_thumbnail($post->ID, $fallbacksize,$sizeguidance); ?></a>
					</div>
				</div>
			</div>
			<div class="gridcaption">
				<h4>
					<a href="<?php the_permalink(); ?>">
						<span class="category"><?php the_title(); ?></span>
						<div class="meta"><?php echo etc_thumbmeta($post->ID); ?></div>
					</a>
				</h4>
			</div>

	</div>

</div>


