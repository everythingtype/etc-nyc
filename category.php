<?php get_header(); ?>
		<?php if (have_posts()) : ?>
			<div class="page">
				<?php while (have_posts()) : the_post(); ?>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="date"><?php the_time('m.d.Y'); ?></p>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

<?php get_footer(); ?>


