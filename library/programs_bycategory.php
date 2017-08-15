<?php
/**
 * Programs for CISCSeattlePress
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 2.6.0
 */
function programs_bycategory() { // thank you to http://www.wpbeginner.com/wp-tutorials/how-to-show-recent-posts-by-category-in-wordpress/
// the query
$the_query = new WP_Query(
  array(
    'post_type' => 'page',
    'meta_key' => '_wp_page_template',
    'meta_value' => 'page-templates/page-program.php'
  )
);
$string = " "; // init
// The Loop
if ( $the_query->have_posts() ) {
    $string .= '<ul class="program-cards row medium-unstack">';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $post_id = get_the_ID();
        $title = get_the_title();
        $excerpt = get_field('excerpt');
        $templatedir = get_bloginfo('template_directory');
        $cardimg = get_field('cardimg');
        $img = "<a href='" . get_the_permalink() . "'><img src='" . $cardimg . "'/></a>";
        $excerpt = '<p>' . $excerpt . '</p>';
        // compose what we will return
        $string .= '<li class="columns"><div class="card program-card">
          ' . $img . '
          <div class="card-section">
              <a href="' . get_the_permalink() .'"><h4>' . $title . '</h4></a>
            ' . $excerpt . '
          </div>
          <div class="card-section text-right">
            <a href="' . get_the_permalink() .'" class="button">Learn More</a>
          </div>
        </div></li>';
          } // end while
} else {
    // no posts
}

$string .= '</ul>';

return $string;

/* Restore original Post Data */
wp_reset_postdata();
}
