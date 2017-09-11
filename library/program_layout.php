<?php
/**
 * Program Layout Detector for CISCSeattlePress
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 2.6.0
 */
function program_layout() { // thank you to http://www.wpbeginner.com/wp-tutorials/how-to-show-recent-posts-by-category-in-wordpress/
$id = get_the_id();
$info = get_field("program_contact_info", $id, true);




$query = get_post($id);
// get raw post html
$html = apply_filters('the_content', $query->post_content);
$dom = new DOMDocument;
$dom->loadHTML($html);
$xpath = new DOMXPath($dom);
$hrefs = array();
$titles = array();
$nodeList = $xpath->query('//a[@class="toc-header"]');
foreach ($nodeList as $node) {
    $hrefs[] = $node->getAttribute('name');
    $titles[] = $node->textContent;
}
$toclist = array();

// build list
foreach (array_combine($hrefs, $titles) as $href => $title ) {
  $item = "<li><a href='#{$href}'>{$title}</a>";
  $toclinks[] = $item;
};


if ($info != '' ) { // if contact info section is not empty
  $string = '<div class="small-12 medium-4 large-4 columns">
      <div class="card contents-card">
        <ul class="contents no-bullet">
          ' . implode("\n",$toclinks) . '
        </ul>
      </div>
      <div class="card contact-card">
        <div class="card-section card-intro">
          For further information, please contact:
        </div>
        <div class="card-section">
         ' . $info . '
        </div>
      </div>
    </div>
    <div class="small-12 medium-8 large-7 columns">';
} else {
  $string = '<div class="small-12 columns">';
};

return $string;

}
