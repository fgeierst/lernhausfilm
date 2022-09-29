<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bootcake
 */

get_header(); ?>
<div class="container">

  <div class="row">  
        <div class="col-md-12">
           <h2>
						 <?php post_type_archive_title(); ?>
					</h2>
					<p>
						 <a href="https://podcasts.apple.com/de/podcast/lernhaus/id1478000024?l=en&ls=1" class="btn btn-more btn-lg">iTunes</a> 
						 <a href="https://open.spotify.com/show/2SBpe4rSnIYUh1JenUDRG1" class="btn btn-more btn-lg">Spotify</a> 
						 <a href="https://podcasts.google.com/?feed=aHR0cDovL2xlcm5oYXVzZmlsbS5kZS9mZWVkL3BvZGNhc3Qv" class="btn  btn-lg">Google</a> 
						 <a href="https://pca.st/7J4YxN" class="btn  btn-lg">PocketCast</a> 
						 <!-- <a href="https://www.stitcher.com/podcast/florian-geierstanger/lernhaus?refid=stpr" class="btn  btn-lg">Stitcher</a>  -->
						 <a href="http://lernhausfilm.de/feed/podcast/" class="btn  btn-lg">RSS</a> 
					</p>
        </div>
  </div>

  <div class="row">  
        <div class="col-md-12">
           <!-- <h2>
						 podcast header
					</h2> -->
					<p>
						<?php
								// query for the about page
								$your_query = new WP_Query( 'pagename=podcast-header' );
								// "loop" through query (even though it's just one page) 
								while ( $your_query->have_posts() ) : $your_query->the_post();
										the_content();
								endwhile;
								// reset post data (important!)
								wp_reset_postdata();
						?>
					</p>
        </div>
  </div>





  <div class="row">

<!-- 	
      <?php if (get_theme_mod( 'themescode-bootcake-layout','themescode-left-sidebar' ) =='themescode-left-sidebar'){?>
        <div class="col-md-4">

            <?php get_sidebar(); ?>

        </div>

        <?php } ?> -->



           <div class="col-md-12 floatleft">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
           </div> <!-- col-sm-8 -->
<!-- 
     	<?php if (get_theme_mod( 'themescode-bootcake-layout' ) =='themescode-right-sidebar'){?>
	        <div class="col-md-4">

	            <?php get_sidebar(); ?>

	        </div>

        <?php } ?> -->


		</div><!-- #row -->

  <div class="row">  
        <div class="col-md-12">
           <!-- <h2>
						 Podcast footer
					</h2> -->
					<p>
						<?php
								// query for the about page
								$your_query = new WP_Query( 'pagename=podcast-footer' );
								// "loop" through query (even though it's just one page) 
								while ( $your_query->have_posts() ) : $your_query->the_post();
										the_content();
								endwhile;
								// reset post data (important!)
								wp_reset_postdata();
						?>
					</p>
        </div>
  </div>


	</div><!-- #container -->

<?php get_footer(); ?>
