<?php

// =============================================================================
// VIEWS/INTEGRITY/TEMPLATE-EVENTS-FULL.PHP
// -----------------------------------------------------------------------------
// Fullwidth page output for Integrity.
// =============================================================================

?>

<?php get_header(); ?>
  <?php x_get_view( 'integrity', '_breadcrumbs' ); ?>

  <div class="x-container max width offset">
    <div class="<?php x_main_content_class(); ?>" role="main">

      <?php while ( have_posts() ) : the_post(); ?>
        <?php x_get_view( 'integrity', 'content', 'page' ); ?>
        <?php x_get_view( 'global', '_comments-template' ); ?>
      <?php endwhile; ?>

    </div>
  </div>
            <div class="x-container max width offset" id="recentposts">
            <h1>Latest Updates</h1>
<?php echo do_shortcode('[carousel-horizontal-posts-content-slider]'); ?>
			</div>

<?php get_footer(); ?>