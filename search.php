<?php get_header(); ?>

<!-- search.php -->

<div class="searchlist">

	<h2>Results &ldquo;<?php printf( __( '%s'), get_search_query() ); ?>&rdquo;</h2>

	<?php if (have_posts()) : ?>

		<ul>
		<?php while ( have_posts() ) : the_post(); ?>

			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

		<?php endwhile; ?>

		</ul>

	<?php else : ?>

		<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>

		<?php get_search_form(); ?>

	<?php endif; ?>

</div>

<?php get_footer(); ?>