<?php

// =============================================================================
// VIEWS/GLOBAL/_CONTENT-THE-EXCERPT.PHP
// -----------------------------------------------------------------------------
// Display of the_excerpt() for various entries.
// =============================================================================

?>

<?php do_action( 'x_before_the_excerpt_begin' ); ?>

<div class="entry-content excerpt">

<?php do_action( 'x_after_the_excerpt_begin' ); ?>

  <?php the_excerpt(); ?>

<?php do_action( 'x_before_the_excerpt_end' ); ?>

    <ul class="social-share">
    <li>Share:</li>
                        <li><a onclick="<?php echo phoo_get_social_share_link('facebook'); ?>" class="fa-facebook-square"></a></li>
                        <li><a onclick="<?php echo phoo_get_social_share_link('twitter','@cleanerairOR'); ?>" class="fa-twitter-square"></a></li>
                        <li><a onclick="<?php echo phoo_get_social_share_link('linkedin'); ?>" class="fa-linkedin-square"></a></li>
                        <li><a onclick="<?php echo phoo_get_social_share_link('googleplus'); ?>" class="fa-google-plus-square"></a></li>
                    </ul></div>

<?php do_action( 'x_after_the_excerpt_end' ); ?>