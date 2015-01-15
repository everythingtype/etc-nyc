<?php 

/* Template Name: Home */ 

get_header(); 

?>

<!-- page-home.php -->

<div class="home"><div class-"column">

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
						<a href="#slide<?php echo $i; ?>" class="nextslide"><img src="<?php echo $image['url'];  ?>" alt="<?php echo $alt; ?>" /></a>
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

		<div class="homecontent" id="slide<?php echo $i; ?>">
			<?php the_content(); ?>
		</div>

	<?php endwhile; ?>

<?php endif; ?>

</div></div>

<?php get_footer(); ?>


