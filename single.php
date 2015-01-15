<?php get_header(); ?>

<!-- single.php -->

<?php if (have_posts()) : ?>
	<div class="page">
		<?php while (have_posts()) : the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<p class="date"><?php the_time('m.d.Y'); ?></p>
			<?php the_content(); ?>
			<?php get_template_part('parts/postmeta'); ?>

		<?php endwhile; ?>
	</div>
<?php endif; ?>

<?php get_footer(); ?>