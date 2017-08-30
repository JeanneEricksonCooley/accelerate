<?php
/**
 * About Page Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 2.0
 */

get_header(); ?>


<div id="primary" class="home-page hero-content">
    <div class="main-content" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
            <p class="hero-message">
                Accelerate is a strategy and marketing agency located in the
                heart of NYC. Our goal is to build businesses by making our clients visible and making their customers smile.
            </p>
        <?php endwhile; // end of the loop. ?>
    </div><!-- .main-content -->
</div><!-- #primary -->

	<div id="primary" class="site-content">
		<div class="main-content" role="main">
			<?php while ( have_posts() ) : the_post();

                $services = get_field('services');
                $description = get_field('service_description');
                $image_1 = get_field('image_1');
            ?>

            <h2 class="about-page"><?php the_title(); ?></h2>
            <?php the_content(); ?>


  			<?php query_posts('posts_per_page=10&post_type=client_services&order=asc'); ?>
  				<?php while ( have_posts() ) : the_post();
                    $services = get_field('services');
                    $description = get_field('service_description');
                    $image_1 = get_field('image_1');
  					$size = "medium";
  				?>

                <article class="individual-client-services">
  					<aside class="client-services-image">
  						<figure>
  							<?php echo wp_get_attachment_image($image_1, $size); ?>
  						</figure>
                    </aside>


                    <div class="client-services-content">
  						<h3> <?php echo $services; ?></h3>
                        <p><?php echo $description ?></p>
                    </div>

                </article>
  				<?php endwhile; ?>
  			<?php wp_reset_query(); ?>



			<?php endwhile; // end of the loop. ?>
		</div><!-- .main-content -->

	</div><!-- #primary -->

<?php get_footer(); ?>
