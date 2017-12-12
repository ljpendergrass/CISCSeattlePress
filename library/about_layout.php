<?php
/**
 * About Layout Detector for CISCSeattlePress
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 2.6.0
 */
function about_layout() { // thank you to http://www.wpbeginner.com/wp-tutorials/how-to-show-recent-posts-by-category-in-wordpress/

$currentpage = get_the_id();

$args = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'page-templates/page-about-landing.php'
];

// Get all posts matching about panding page (only one.)
// select the only page.
// get field
$posts = get_posts( $args );
$id = $posts[0];
$info = get_field("about_us_side_menu", $id, false); // info section from user

// init
$contents = array();
$links = array();

// iterate over selected pages to build contents of link list
foreach ($info as $page){
  $href = get_permalink($page);
  $title = get_the_title($page);
  // detect if current page
  if ($page == $currentpage ) {
    $class = 'class="active-contents-link reference-id-' . $page . ' currentpage-' . $currentpage . '"';
  } else {
    $class = 'class="inactive-contents-link reference-id-' . $page . ' currentpage-' . $currentpage . '"';
  };
  $item = "<li " . $class . "><a href='{$href}'>{$title}</a></li>";
  $contents[] = $item;
}

if (!($contents)) { // kludge contents formatting
  $menu = ''; // else contents section is empty
} else {
  $menu = '<div class="card contents-card">
  <ul class="contents no-bullet">
  ' . implode("\n",$contents) . '
  </ul>
  </div>';
}

// default: full width
$string = '<div class="small-12 columns">';

if (!(empty($menu))) { // if menu exists
  $string = '<div class="small-12 medium-4 large-4 columns">
      ' . $menu . '
      </div>
    <div class="small-12 medium-8 large-7 columns">';
};

return $string;

}
