<?php

// =============================================================================
// INDEX.PHP
// -----------------------------------------------------------------------------
// Handles output of pages and posts if a more specific template file isn't
// present. Must be present for theme to function properly.
//
// Content is output based on which Stack has been selected in the Customizer.
// To view and/or edit the markup of your Stack's index, first go to "views"
// inside the "framework" subdirectory. Once inside, find your Stack's folder
// and look for a file called "wp-index.php," where you'll be able to find the
// appropriate output.
// =============================================================================

?>


<?php get_header(); ?>

 
  	<header class="x-header-landmarkthree x-container max width">
    <h1 class="h-landmark"><span>Webinars</span></h1></header>
      <?php x_get_view( 'integrity', '_breadcrumbs' ); ?>

     <div class="x-container max width offset">
     <div class="x-container-categories">    

      </div>



   		 <div class="<?php x_main_content_class(); ?>" role="main">


      <?php x_get_view( 'global', '_index' ); ?>

    </div>

    <?php get_sidebar(); ?>

  </div>

<?php get_footer(); ?>