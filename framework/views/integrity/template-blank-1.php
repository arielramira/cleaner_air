<?php

// =============================================================================
// VIEWS/INTEGRITY/TEMPLATE-BLANK-1.PHP (Container | Header, Footer)
// -----------------------------------------------------------------------------
// A blank page for creating unique layouts.
// =============================================================================

?>

<?php get_header(); ?>

<header class="x-header-landmarkthree x-container max width">

    <h1 class="h-landmark"><span><?php the_title(); ?></span></h1></header>
      <div class="x-container max width offsettwo">

    <div class="<?php x_main_content_class(); ?>" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="entry-wrap">
            <?php x_get_view( 'global', '_content', 'the-content' ); ?>
          </div>
        </article>

      <?php endwhile; ?>

    </div>
  </div>

<?php get_footer(); ?>