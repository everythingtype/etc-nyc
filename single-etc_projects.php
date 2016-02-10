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
		$nextitle = get_the_title($nextID);

		wp_reset_query();

		?>

		<p class="pagenav"><a href="<?php echo $nextlink; ?>"><span class="nextproject">Next Project</span><span class="separator">: </span><span class="nexttitle"><?php echo $nextitle; ?></span></a></p>

		<?php $i = 0; ?>

		<?php if( have_rows('project_images') ):  ?>
			<div class="slides">
			<?php while ( have_rows('project_images') ) : the_row(); ?>

				<?php $image = get_sub_field('image'); ?>

				<div class="slide" id="slide<?php echo $i; ?>">
					<?php $i++; ?>
					<a href="#slide<?php echo $i; ?>" class="nextslide"><?php spellerberg_the_image($image['id']); ?></a>
				</div>

			<?php endwhile; ?> 

			<?php if ( get_the_content() != '' ) : ?>
				<a id="slide<?php echo $i; ?>" class="infoslide"></a>
				<a id="info"></a>
				<h3><?php the_title(); ?></h3>
			<?php endif; ?>

		</div>
		<?php endif; ?>


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
	<div class="projectcue"></div>
<?php endif; ?>

<?php get_footer(); ?>
