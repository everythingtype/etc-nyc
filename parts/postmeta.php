<div class="postmeta">
	
	<?php the_tags( '<div class="column"><h4>More</h4><ul><li>','</li></li>','</li><ul></div>' ); ?> 

	<div class="column">
	<h4>Share</h4>
	<?php $url = get_permalink(); ?>
	<ul>
		<li><a href="http://www.facebook.com/share.php?u=<?php echo $url; ?>">Facebook</a></li>
		<li><a href="http://twitter.com/?status=<?php echo $url; ?>">Twitter</a></li>
	</ul>
	</div>
</div>
