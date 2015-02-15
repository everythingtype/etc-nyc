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

				$type = get_sub_field('type'); 
				$title = get_sub_field('title'); 
				$link = get_sub_field('link'); 

				?>

				<div class="slide" id="slide<?php echo $i; ?>">
					<?php $i++; ?>
					<div class="slideinner">
						<a href="#slide<?php echo $i; ?>" class="nextslide"><?php spellerberg_the_image($image['id']); ?></a>
						<div class="slidecaption">
							<?php 
								if ( $type ) echo $type; 
								if ( $title ) echo ' <span class="title">' . $title . '</span>';
							?>
							<?php if ( $link ) echo '<a href="' . $link . '">View project</a>'; ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?> 
			</div>
		<?php endif; ?>

		<div class="homecontent" id="slide<?php echo $i; ?>">
			<?php the_content(); ?>
		</div>

		<div class="homebottom">

		<?php if( have_rows('more_work') ): ?>

			<h2><a href="http://revision.etc-nyc.com/categories/" title="Categories">See more work</a></h2>

			<div class="grid">

			<?php while ( have_rows('more_work') ) : the_row(); 

				$linkedproject = get_sub_field('linked_project');

				if( $linkedproject ): 

					$post = $linkedproject;
					setup_postdata( $post );
					get_template_part('parts/project-thumbnail');
					wp_reset_postdata();

				endif;
			?>

			<?php endwhile; ?>

		</div>

		<?php endif; ?>

			<h2><a href="http://revision.etc-nyc.com/category/news/" title="News">News</a></h2>

			<div class="grid">

				<?php
			
				$newsposts = get_posts( 
					array( 
						'posts_per_page' => 3, 
					) 
				);
				foreach ( $newsposts as $post ) : 

					setup_postdata( $post );
					get_template_part('parts/news-thumbnail');

				endforeach; 

				wp_reset_postdata();

				?>

			</div>

			<h2>Contact us</h2>

			<?php echo do_shortcode('[gravityform id="1" name="Contact Us" title="false" description="false" ajax="true"]'); ?>

		</div>

	<?php endwhile; ?>

<?php endif; ?>

</div></div>

<?php get_footer(); ?>


