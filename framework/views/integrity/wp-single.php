<?php

// =============================================================================
// VIEWS/INTEGRITY/WP-SINGLE.PHP
// -----------------------------------------------------------------------------
// Single post output for Integrity.
// =============================================================================

$fullwidth = get_post_meta( get_the_ID(), '_x_post_layout', true );

?>

<?php get_header(); ?>
  
  <?php x_get_view( 'integrity', '_breadcrumbs' ); ?>
  <div class="x-container max width offset">
            <div class="entry-featured">
               <?php if (has_post_thumbnail( $post->ID ) ) { ?>
              <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
              <div class="index-thumb" style="background-image: url('<?php echo $image[0]; ?>')">
          </div>
       <?php } else
      { ?>    
    <div class="index-thumb" style="background-image: url('<?php phoo_dir(); ?>')">
       </div>
       <?php } ?>   
          </div>
    <div class="<?php x_main_content_class(); ?>" role="main">


      <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      
  <div class="entry-wrap">
    <?php x_get_view( 'integrity', '_content', 'post-header' ); ?>
    <?php x_get_view( 'global', '_content' ); ?>
  </div>
  <?php x_get_view( 'integrity', '_content', 'post-footer' ); ?>
    </article>        <?php x_get_view( 'global', '_comments-template' ); ?>
      <?php endwhile; ?>

    </div>

    <?php if ( $fullwidth != 'on' ) : ?>
      <?php get_sidebar(); ?>
    <?php endif; ?>

  </div>

<?php get_footer(); ?>