<?php get_header(); ?>
		<?php if (have_posts()) : ?>
			<div class="masonry">
				<h2><?php single_cat_title(); ?></h2>
				<div class="grid">
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part('parts/project-thumbnail'); ?>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>

<?php get_footer(); ?>


