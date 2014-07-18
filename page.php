<?php get_header(); ?>
		<?php if (have_posts()) : ?>
			<div class="page">
				<?php while (have_posts()) : the_post(); ?>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

<?php get_footer(); ?>


