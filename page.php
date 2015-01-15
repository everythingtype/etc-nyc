<?php get_header(); ?>

<!-- page.php -->

<?php if (have_posts()) : ?>
	<div class="navbalance"><div class="page"><div class="column">
		<?php while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div></div></div>
<?php endif; ?>

<?php get_footer(); ?>


