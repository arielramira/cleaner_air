<?php

// =============================================================================
// VIEWS/INTEGRITY/WP-INDEX.PHP
// -----------------------------------------------------------------------------
// Index page output for Integrity.
// =============================================================================

?>

<?php get_header(); ?>

 
  	<header class="x-header-landmarktwo x-container max width">
    <h1 class="h-landmark"><span>Webinars</span></h1></header>
      <?php x_get_view( 'integrity', '_breadcrumbs' ); ?>

     <div class="x-container max width offset">
  <div class="x-container-categories">   
    <div class="allcategories"><a href="http://mywordpresswebsite.com/cleanerair/latest-updates/">ALL</div></a>
    <?php wp_list_categories( array(
        'title_li' => ''
    ) ); ?>
</div>

   		 <div class="<?php x_main_content_class(); ?>" role="main">


      <?php x_get_view( 'global', '_index' ); ?>

    </div>

    <?php get_sidebar(); ?>

  </div>

<?php get_footer(); ?>