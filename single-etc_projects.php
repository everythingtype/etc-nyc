<?php get_header(); ?>
		<?php if (have_posts()) : ?>
			<div class="project">
						
			<?php while (have_posts()) : the_post(); ?>

				<h2><?php the_title(); ?></h2>

				<p class="pagenav"><?php previous_post_link('%link','&larr;'); ?><?php next_post_link('%link','&rarr;'); ?></p>


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
											<a href="#slide<?php echo $i; ?>" class="nextslide"><img src="<?php echo $image['url'];  ?>" alt="<?php echo $alt; ?>" /></a>
										</div>
									</div>
						<?php endwhile; ?> 
						</div>
				<?php endif; ?>

				<?php the_content(); ?>

				<?php 
				
				$relatedposts = get_field('related_projects'); 
				if( $relatedposts ): ?>
					<div class="relatedprojects">
						<h3>Related Projects</h3>
						
						<?php foreach( $relatedposts as $post): setup_postdata($post); ?>
							<div class="relatedproject">
								<?php get_template_part('parts/project-thumbnail'); ?>
							</div>
						    <?php endforeach; ?>
					</div>
				<?php endif; ?>


			<?php endwhile; ?>
			</div>

		<?php endif; ?>

<?php get_footer(); ?>


