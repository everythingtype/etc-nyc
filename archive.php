<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php if ( is_tag() ) : ?>

			<div class="page">
				<?php while (have_posts()) : the_post(); ?>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="date"><?php the_time('m.d.Y'); ?></p>
					<?php the_content(); ?>
					<?php get_template_part('parts/postmeta'); ?>

				<?php endwhile; ?>
			</div>

		<?php else: ?>

			<div class="masonry">
				<h2><?php single_cat_title(); ?></h2>
				<div class="grid">
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part('parts/project-thumbnail'); ?>
					<?php endwhile; ?>
				</div>
			</div>

		<?php endif; ?>
	<?php endif; ?>

<?php get_footer(); ?>


