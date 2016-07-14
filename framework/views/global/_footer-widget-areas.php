<?php

// =============================================================================
// VIEWS/GLOBAL/_FOOTER-WIDGET-AREAS.PHP
// -----------------------------------------------------------------------------
// Outputs the widget areas for the footer.
// =============================================================================

$n = x_footer_widget_areas_count();

?>

<?php if ( $n != 0 ) : ?>

       <a name="question"><div class="x-container max width" id="gravityfooter">  </a> 
 <div class="gravityfooter"> 
        <?php echo do_shortcode('[column type="2/5"]<h1>Ask a Question</h1>[/column][column type="3/5" last="true"][gravityform id=1 title=false description=false][/column]'); ?>
        </div>      
        </div>

    <a name="signup"><footer class="x-colophon top" role="contentinfo"></a>

    <div class="x-container max width">

      <?php

      $i = 0; while ( $i < $n ) : $i++;

        $last = ( $i == $n ) ? ' last' : '';

        echo '<div class="x-column x-md x-1-' . $n . $last . '">';
          dynamic_sidebar( 'footer-' . $i );
        echo '</div>';

      endwhile;

      ?>

    </div>
  </footer>

<?php endif; ?>