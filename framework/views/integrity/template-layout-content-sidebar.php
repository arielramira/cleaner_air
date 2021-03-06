<?php

// =============================================================================
// VIEWS/INTEGRITY/TEMPLATE-LAYOUT-CONTENT-SIDEBAR.PHP
// -----------------------------------------------------------------------------
// Content left, sidebar right page output for Integrity.
// =============================================================================
?>

<?php get_header(); ?>

      <header class="x-header-landmark x-container max width">
    <h1 class="header-landmark"><?php the_title(); ?></h1>

    </header>


  <?php x_get_view( 'integrity', '_breadcrumbs' ); ?>

  <div class="x-container max width offset">

    <div class="<?php x_main_content_class(); ?>" role="main">


      <?php while ( have_posts() ) : the_post(); ?>
        <?php x_get_view( 'integrity', 'content', 'page' ); ?>
        <?php x_get_view( 'global', '_comments-template' ); ?>
      <?php endwhile; ?>

    </div><aside class="<?php x_sidebar_class(); ?>" role="complementary">
    <?php  dynamic_sidebar( 'ups-sidebar-participate' ); ?>
    </aside>
  </div>

          <div class="x-container max width offset" id="recentposts">
           <h1>Latest Updates</h1>
<?php echo do_shortcode('[carousel-horizontal-posts-content-slider]'); ?>
      </div>

<?php get_footer(); ?>