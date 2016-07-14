<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to X in this file.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );



// Additional Functions
// =============================================================================

function x_excerpt_string( $more ) {
  
  $stack = x_get_stack();

  if ( $stack == 'integrity' ) {
    return ' ... <div><a href="' . get_permalink() . '" class="more-link">' . __( 'Read More', '__x__' ) . '</a></div>';
  } else if ( $stack == 'renew' ) {
    return ' ... <a href="' . get_permalink() . '" class="more-link">' . __( 'Read More', '__x__' ) . '</a>';
  } else if ( $stack == 'icon' ) {
    return ' ...';
  }

}

// excerpt to latest posts

add_filter( 'excerpt_more', 'x_excerpt_string' );

function x_shortcode_recent_posts_v2code( $atts ) {
  extract( shortcode_atts( array(
    'id'          => '',
    'class'       => '',
    'style'       => '',
    'type'        => '',
    'count'       => '',
    'category'    => '',
    'enable_excerpt' => '',
    'offset'      => '',
    'orientation' => '',
    'no_image'    => '',
    'fade'        => ''
  ), $atts ) );

  $id            = ( $id          != ''          ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class         = ( $class       != ''          ) ? 'x-recent-posts cf ' . esc_attr( $class ) : 'x-recent-posts cf';
  $style         = ( $style       != ''          ) ? 'style="' . $style . '"' : '';
  $type          = ( $type        == 'portfolio' ) ? 'x-portfolio' : 'post';
  $count         = ( $count       != ''          ) ? $count : 3;
  $category      = ( $category    != ''          ) ? $category : '';
  $category_type = ( $type        == 'post'      ) ? 'category_name' : 'portfolio-category';
  $offset        = ( $offset      != ''          ) ? $offset : 0;
  $orientation   = ( $orientation != ''          ) ? ' ' . $orientation : ' horizontal';
  $no_image      = ( $no_image    == 'true'      ) ? $no_image : '';
  $fade          = ( $fade        == 'true'      ) ? $fade : 'false';
  $enable_excerpt = ( $enable_excerpt == 'true'      ) ? true : false;

  $output = "<div {$id} class=\"{$class}{$orientation}\" {$style} data-fade=\"{$fade}\">";

    $q = new WP_Query( array(
      'orderby'          => 'date',
      'post_type'        => "{$type}",
      'posts_per_page'   => "{$count}",
      'offset'           => "{$offset}",
      "{$category_type}" => "{$category}"
    ) );

    if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post();

      if ( $no_image == 'true' ) {
        $image_output       = '';
        $image_output_class = 'no-image';
      } else {
        $image_output       = '<div class="x-recent-posts-img">' . get_the_post_thumbnail( get_the_ID(), 'entry-' . get_theme_mod( 'x_stack' ) . '-cropped', NULL ) . '</div>';
        $image_output_class = 'with-image';
      }

      $output .= '<a class="x-recent-post' . $count . ' ' . $image_output_class . '" href="' . get_permalink( get_the_ID() ) . '" title="' . esc_attr( sprintf( __( 'Permalink to: "%s"', '__x__' ), the_title_attribute( 'echo=0' ) ) ) . '">'
                 . '<article id="post-' . get_the_ID() . '" class="' . implode( ' ', get_post_class() ) . '">'
                   . '<div class="entry-wrap">'
                     . $image_output
                     . '<div class="x-recent-posts-content">'
                       . '<span class="x-recent-posts-date">' . get_the_date() . '</span>'
                       . '<h3 class="h-recent-posts">' . get_the_title() . '</h3>'     
                       . ( $enable_excerpt ? '<span class="x-recent-posts-excerpt">' . strip_tags( get_the_excerpt() ) . '</span>' : '' )
                     . '</div>'
                   . '</div>'
                 . '</article>'
               . '</a>';

    endwhile; endif; wp_reset_postdata();
  
  $output .= '</div>';

  return $output;
}

add_action('wp_head', 'change_recent_posts_to_v2');

function change_recent_posts_to_v2() {
    remove_shortcode( 'recent_posts' );
    add_shortcode( 'recent_posts', 'x_shortcode_recent_posts_v2code' );
}

// post thumbnails

add_theme_support( 'post-thumbnails' ); 

// filter the Gravity Forms button type

add_filter("gform_submit_button_2", "form_submit_button", 10, 2);
function form_submit_button($button, $form){
return "<button class='button' id='gform_submit_button_{$form["id"]}'><span><i class='fa fa-paper-plane'></i></span></button>";
}

// social shares

function phoo_get_social_share_link($social, $twitter_screen_name='')
{
    switch($social)
    {
        case 'facebook':
            return "window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),'facebookShare','width=626,height=436');return false;";
        break;

        case 'twitter':
            return "window.open('https://twitter.com/share?text=".get_the_title()."&url='+encodeURIComponent(location.href)+'&via=".$twitter_screen_name."','twitterShare','width=626,height=436');return false;";
        break;

        case 'googleplus':
            return "window.open('https://plus.google.com/share?url='+encodeURIComponent(location.href),'googlePlusShare','width=626,height=436');return false;";
        break;

        case 'pinterest':
            return "window.open('https://www.pinterest.com/pin/create/button/?url='+encodeURIComponent(location.href)+'&media=&description=".get_the_title()."','pinterestShare','width=626,height=436');return false;";
        break;

        case 'linkedin':
            return "window.open('https://www.linkedin.com/cws/share?url='+encodeURIComponent(location.href),'linkedinShare','width=626,height=436');return false;";
        break;
    }
}

// font awesome 

add_action('wp_head', function(){ echo '<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" >'; }, 99999 );