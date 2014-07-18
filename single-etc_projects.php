<?php get_header(); ?>
		<?php if (have_posts()) : ?>
			<div class="project">
			
			<h2><?php the_title(); ?></h2>
			
			<?php while (have_posts()) : the_post(); ?>

				<?php if( have_rows('project_images') ): 
					$i = 0;
					
					?>
						<div class="slides">
						<?php while ( have_rows('project_images') ) : the_row(); ?>
									<?php $image = get_sub_field('image');
									if ( $image['alt'] ) :
										$alt = $image['alt']; 
									else :
										$alt = $image['title']; 
									endif; ?>

									<div class="slide" id="slide<?php echo $i; ?>">
										<div class="slideinner">
											<?php $i++; ?>
											<a href="#slide<?php echo $i; ?>"><img src="<?php echo $image['url'];  ?>" alt="<?php echo $alt; ?>" /></a>
										</div>
									</div>
						<?php endwhile; ?> 
						</div>
				<?php endif; ?>

				<?php the_content(); ?>
			<?php endwhile; ?>
			</div>

		<?php endif; ?>

<?php get_footer(); ?>

