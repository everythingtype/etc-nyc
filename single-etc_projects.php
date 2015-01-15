<?php get_header(); ?>

<!-- single-etc_projects.php -->

<?php if (have_posts()) : ?>
	<div class="project"><div class="column">
				
	<?php while (have_posts()) : the_post(); ?>

		<h2><?php the_title(); ?></h2>

		<?php

		$args = array(
			'post_type' => array( 'etc_projects' ),
			'orderby' => 'menu_order',
			'order' => 'DESC',
			'posts_per_page' => -1
		);

		$projects = get_posts( $args );

		$pages = array();

		foreach ($projects as $page) $pages[] += $page->ID;


		$current = array_search(get_the_ID(), $pages);

		$prevID = $pages[$current-1];
		$nextID = $pages[$current+1];

		if ( empty($prevID) ) : 
			$pagecount = count($pages) - 1;
			$prevID = $pages[$pagecount];
		endif;

		if ( empty($nextID) ) $nextID = $pages[0];

		$prevlink = get_permalink($prevID);
		$nextlink = get_permalink($nextID);

		wp_reset_query();

		?>

		<p class="pagenav"><a href="<?php echo $nextlink; ?>">Next Project</a></p>

		<?php $i = 0; ?>

		<?php if( have_rows('project_images') ):  ?>
			<div class="slides">
			<?php while ( have_rows('project_images') ) : the_row(); ?>

				<?php $image = get_sub_field('image');
				if ( $image['alt'] ) :
					$alt = $image['alt']; 
				else :
					$alt = $image['title']; 
				endif; ?>

				<div class="slide" id="slide<?php echo $i; ?>">
					<div class="slideinner">
						<?php $i++; ?>
						<a href="#slide<?php echo $i; ?>" class="nextslide"><img src="<?php echo $image['url'];  ?>" alt="<?php echo $alt; ?>" /></a>
					</div>
				</div>

			<?php endwhile; ?> 
			</div>
		<?php endif; ?>

		<div id="slide<?php echo $i; ?>">

			<?php if ( get_the_content() != '' ) : ?>
				<div class="projectcontent">
					<?php the_content(); ?>
				</div>
			<?php endif; ?>

			<?php $relatedposts = get_field('related_projects'); ?>
			<?php if( $relatedposts ): ?>
				<div class="relatedprojects">
					<h3>Related Projects</h3>
				
					<?php foreach( $relatedposts as $post): setup_postdata($post); ?>
						<div class="relatedproject">
							<?php get_template_part('parts/project-thumbnail'); ?>
						</div>
					    <?php endforeach; ?>
				</div>
			<?php endif; ?>


		</div>

	<?php endwhile; ?>
	</div></div>

<?php endif; ?>

<?php get_footer(); ?>


