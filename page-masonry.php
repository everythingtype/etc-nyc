<?php
	/* Template Name: Masonry */

get_header();
?>

<!-- page-masonry.php -->

<?php if (have_posts()) : ?>
	<div class="masonry">
		<?php while (have_posts()) : the_post(); ?>
			<?php echo get_template_part('parts/everything'); ?>
		<?php endwhile; ?>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
