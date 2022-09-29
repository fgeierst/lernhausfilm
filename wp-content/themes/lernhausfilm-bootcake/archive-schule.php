<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bootcake
 */

get_header(); ?>

<div class="container">

  <div class="row">  
        <div class="col-md-4">

            <?php get_sidebar(); ?>

        </div>

  <div class="col-md-8">
        <?php if ( have_posts() ) : ?>

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

  



<article class="col-md-6 floatleft" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


  <?php if ( is_search() ) : // Only display Excerpts for Search ?>
  <div class="entry-summary">

    <?php the_excerpt(); ?>
    <p><a class="btn btn-default read-more" href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'bootcake' ); ?> <i class="fa fa-chevron-right"></i></a></p>
  </div><!-- .entry-summary -->

  <?php else : ?>
    
  <div class="entry-content archive-content">



    <?php if ( has_post_thumbnail()) : ?>
    <div class="grid">
      <figure class="effect-style">

      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
        <?php the_post_thumbnail( 'bootcake-featured', array( 'class' => 'bootcake-thumbnail' )); ?>
      </a>

      </figure><!--figure-->
    </div><!--grid-->

    <!-- .title start-->

    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php  the_title(); ?></a></h1>

      <!-- meta start-->

  <header class="entry-header">

    
    <?php if ( 'post' == get_post_type() ) : ?>
    <div class="entry-meta">

      <?php  bootcake_posted_on(); ?>

    </div><!-- .entry-meta -->
    <?php endif; ?>
  </header><!-- .entry-header -->

    <div class="article-excerpt">

      <?php the_excerpt(); ?>
      
    </div>

    <?php else : ?>
      <?php the_excerpt(); ?>
    <?php endif; ?>
    
    <p> <a class="btn btn-more read-more" href="<?php the_permalink(); ?>">
      <?php _e($GLOBALS['readMore'], 'bootcake' ); ?>  <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>

    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"></a>


    <?php
      wp_link_pages( array(
        'before'            => '<div class="page-links">'.__( 'Pages:', 'bootcake' ),
        'after'             => '</div>',
        'link_before'       => '<span>',
        'link_after'        => '</span>',
        'pagelink'          => '%',
        'echo'              => 1
          ) );
      ?>
  </div><!-- .entry-content -->
  <?php endif; ?>

  <hr class="section-divider">
</article><!-- #post-## -->

            <?php endwhile; ?>

            <?php the_posts_navigation(); ?>

        <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>


  </div>  <!-- #col-md-8 -->    
  </div><!-- #row -->


  <div class="row">  
        <div class="col-md-12">
						<?php
								// query for the about page
								$your_query = new WP_Query( 'pagename=schulen-footer' );
								// "loop" through query (even though it's just one page) 
								while ( $your_query->have_posts() ) : $your_query->the_post();
										the_content();
								endwhile;
								// reset post data (important!)
								wp_reset_postdata();
						?>
        </div>
  </div>

</div><!-- #container -->

<?php
get_sidebar();
get_footer();
