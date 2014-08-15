<?php get_header(); ?>

	<div class="page">

	<h2><?php printf( __( 'Search Results for: %s'), get_search_query() ); ?></h2>

	<?php if (have_posts()) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			<?php endif; ?>

			<?php the_excerpt(); ?>

		<?php endwhile; ?>

	<?php else : ?>

		<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>

		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>