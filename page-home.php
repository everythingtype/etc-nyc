<?php 
	/* Template Name: Home */ 
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<?php if( have_rows('projects') ): 
			$i = 0; ?>
			<div class="slides">
			<?php while ( have_rows('projects') ) : the_row(); ?>
				<?php 
				
				$image = get_sub_field('image');
				if ( $image['alt'] ) :
					$alt = $image['alt']; 
				else :
					$alt = $image['title']; 
				endif; 

				$type = get_sub_field('type'); 
				$title = get_sub_field('title'); 
				$link = get_sub_field('link'); 

				?>

				<div class="slide" id="slide<?php echo $i; ?>">
					<div class="slideinner">
						<?php $i++; ?>
						<a href="#slide<?php echo $i; ?>"><img src="<?php echo $image['url'];  ?>" alt="<?php echo $alt; ?>" /></a>
						<div class="">
							<?php if ( $type ) echo '<span class="type">' . $type . '</span>';
							if ( $title ) echo $title;
							if ( $link ) echo '<a href="' . $link . '">View project</a>'; ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?> 
			</div>
		<?php endif; ?>

		<?php the_content(); ?>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>


