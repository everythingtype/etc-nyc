<?php 
	/* Template Name: Big List */ 
?>
	
<?php get_header(); ?>
		<?php if (have_posts()) : ?>
			<div class="biglist">
			<?php while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>

<?php get_footer(); ?>


