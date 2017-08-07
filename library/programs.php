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
$the_query = new WP_Query( array( 'category_name' => 'programs', 'posts_per_page' => 6 ) );
$string = " "; // init
// The Loop
if ( $the_query->have_posts() ) {
    $string .= '<ul class="program-cards row medium-unstack">';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $post_id = get_the_ID();
        $title = get_the_title();
        $excerpt = " ";
        $templatedir = get_bloginfo('template_directory');
        $img = "<a href='" . get_the_permalink() . "'><img src='" . $templatedir . '/assets/images/' . get_post_meta($post_id, 'cardimg', true) . "'/></a>";
        $excerpt = '<p>' . get_the_excerpt() . '</p>';
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
