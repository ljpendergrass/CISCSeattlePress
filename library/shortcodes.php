<?php
/**
 * Shortcodes for CISCSeattlePress
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 2.6.0
 */

// [bartag foo="foo-value"]
function bartag_func( $atts ) {
  $a = shortcode_atts( array( // inputs are taken in; including all of them is optional
    'foo' => 'something',
    'bar' => 'something else',
  ), $atts );
  return "<span style='color: red;'>Foo is {$a['foo']} and bar is {$a['bar']}</span>";
 }
 add_shortcode( 'bartag', 'bartag_func' );
// end test

// how we help pre breakdown
function help_func( $atts ) {
  $a = shortcode_atts( array( // inputs are taken in; including all of them is optional
    'foo' => 'something',
    'bar' => 'something else',
  ), $atts );
  $t = get_bloginfo('template_directory');
  $the_query = new WP_Query(
    array(
      'post_type' => 'page',
      'meta_key' => '_wp_page_template',
      'meta_value' => 'page-templates/page-program.php'
    )
  );
  $string = ''; // init
  $string .= "<section class='help-intro container'>
  <ul class='accordion intro-flex-container' data-responsive-accordion-tabs='tabs small-accordion medium-accordion large-tabs'>";

  if ( $the_query->have_posts() ) {
    $active = "is-active";
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $post_id = get_the_ID();
        $title = get_the_title();
        $excerpt = get_field('excerpt');
        $templatedir = get_bloginfo('template_directory');
        $activeimg = get_field('icon_image');
        $inactiveimg = get_field('icon_image_inactive');
        $permalink = get_the_permalink();
        // add to string
        $string .= "<li class='accordion-item large-flex-child-auto {$active}' data-accordion-item >
        <a href='{$permalink}' class='accordion-title'>
        <img class='infodefault' src='{$inactiveimg}' alt=' '>
        <img class='infohover' src='{$activeimg}' alt=' '>
        {$title}</a>
        <div class='accordion-content' data-tab-content>
          <p>{$excerpt} <a href='{$permalink}' class='button small'>LEARN MORE</a></p>
        </div>
        </li>
        ";
        $active = ""; // no more active tabs
      }
  $string .= "</ul></section>";
  return $string;
};
};
 add_shortcode( 'help', 'help_func' );
// end test


// [takeaction title="Take Action" a="postid" b="postid" c="postid"]
function takeaction_func( $atts ) {
  $a = shortcode_atts( array( // inputs are taken in; including all of them is optional
    'title' => "TAKE ACTION",
    'link_a' => 1,
    'link_b' => 2,
    'link_c' => 3,
  ), $atts );
  $t = get_bloginfo('template_directory');
  $url_a = get_permalink( $a['link_a'] );
  $url_b = get_permalink( $a['link_b'] );
  $url_c = get_permalink( $a['link_c'] );
  $title_a = get_the_title( $a['link_a'] );
  $title_b = get_the_title( $a['link_b'] );
  $title_c = get_the_title( $a['link_c'] );

  return "<section class='inspire fullblock'>
    <h1 class='text-center'>{$a['title']}</h1>
    <div class='row'>
      <div class='large-2 columns'>
        &nbsp;
      </div>
      <figure class='small-12 medium-3 large-2 columns text-center'>
        <a href='{$url_a}'>
        <img class='infodefault' src='{$t}/assets/images/icon-volunteer.svg' alt=' '>
        <img class='infohover' src='{$t}/assets/images/icon-volunteer-hover.svg' alt=' '>
        <figcaption>{$title_a}</figcaption></a>
      </figure>
      <figure class='small-12 medium-3 large-4 columns text-center'>
        <a href='{$url_b}'>
        <img class='infodefault' src='{$t}/assets/images/icon-donate.svg' alt=' '>
        <img class='infohover' src='{$t}/assets/images/icon-donate-hover.svg' alt=' '>
        <figcaption>{$title_b}</figcaption></a>
      </figure>
      <figure class='small-12 medium-3 large-2 columns text-center'>
        <a href='{$url_c}'>
        <img class='infodefault' src='{$t}/assets/images/icon-in-kind.svg' alt=' '>
        <img class='infohover' src='{$t}/assets/images/icon-in-kind-hover.svg' alt=' '>
        <figcaption>{$title_c}</figcaption></a>
      </figure>
      <div class='large-2 columns'>
      &nbsp;
      </div>

    </div>
  </section>";
 }
 add_shortcode( 'takeaction', 'takeaction_func' );
// end takeaction

// [contact foo="foo-value"]
function contact_func( $atts ) { // todo: fix quotes on this piece of code
  $a = shortcode_atts( array( // inputs are taken in; including all of them is optional
    'foo' => 'something',
    'bar' => 'something else',
  ), $atts );
  $t = get_bloginfo('template_directory'); //todo: globalize this?
  return '<section class="container">
  	<h2 class="text-center">Stay in touch</h2>
  	<div class="row">
  		<div class="small-12 medium-6 large-6 columns">
  			<ul class="menu centered vertical mainpage-info no-bullet align-center">
  				<li>
  					<a class="contacticon" href="http://cisc-seattle.org/?page=program_contacts&lang=en">
            <div class="contacticon-container"><img class="contacticon" src="' . $t . '/assets/images/icon-contact.svg" ></div> <span>Program Contacts</span> &nbsp; <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
  				</li>
  				<li>
  					<a class="contacticon" href="http://cisc-seattle.org/?page=site_locations&lang=en">
            <div class="contacticon-container"><img class="contacticon" src="' . $t . '/assets/images/icon-location.svg" ></div> <span>Site Locations</span> &nbsp; <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
  				</li>
  			</ul>
  		</div>
  		<div class="small-12 medium-6 large-6 columns subscribe-box">
  			<h3>Sign Up</h3>
  			<p>Receive news and invitations</p>
  			<label>Email
          <input type="email" placeholder="Enter your email address">
        </label>
  			<button type="button" name="button" class="button large">Subscribe</button>
  		</div>
  	</div>
  </section>';
 }
 add_shortcode( 'contact', 'contact_func' );
// end contact

// [donatebutton text="text"]
function footer_donatebutton_func( $atts ) {
  $a = shortcode_atts( array( // inputs are taken in; including all of them is optional
    'text' => 'something',
  ), $atts );
  return "<a class='large expanded button donate'>{$a['text']}</a>";
 }
 add_shortcode( 'footer_donatebutton', 'footer_donatebutton_func' );
// end test

// [footersocial foo="foo-value"]
function footersocial_func( $atts ) {
  $a = shortcode_atts( array( // inputs are taken in; including all of them is optional
    'fblink' => '#fb',
    'bloglink' => '#blog',
    'ytlink' => '#yt',
  ), $atts );
  if ($a['fblink'] != '#fb') {
    $fbreturn = "<li><a href='{$a['fblink']}'><i class='fa fa-2x fa-facebook-official' aria-hidden='true'></i></a></li>";
  } else {
    $fbreturn = " ";
  };
  if ($a['bloglink'] != '#blog') {
    $blogreturn = "<li><a href='{$a['bloglink']}'><i class='fa fa-2x fa-facebook-official' aria-hidden='true'></i></a></li>";
  } else {
    $blogreturn = " ";
  };
  if ($a['ytlink'] != '#yt') {
    $ytreturn = "<li><a href='{$a['ytlink']}'><i class='fa fa-2x fa-facebook-official' aria-hidden='true'></i></a></li>";
  } else {
    $ytreturn = " ";
  };

  return "<ul class='social text-center flex-child-shrink'>
    {$fbreturn}
    <li><a href='{$a['bloglink']}'><i class='fa fa-2x fa-rss-square' aria-hidden='true'></i></a></li>
    <li><a href='{$a['ytlink']}'><i class='fa fa-2x fa-youtube-square' aria-hidden='true'></i></a></li>
  </ul>";
 }
 add_shortcode( 'footersocial', 'footersocial_func' );
// end test

function wpb_postsbycategory_news() { // thank you to http://www.wpbeginner.com/wp-tutorials/how-to-show-recent-posts-by-category-in-wordpress/
// the query
$the_query = new WP_Query( array( 'category_name' => 'news', 'posts_per_page' => 3 ) );
$string = " "; // init
// The Loop
if ( $the_query->have_posts() ) {
    $string .= '<ul class="row medium-unstack no-bullet">';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $post_id = get_the_ID();
        $excerpt = " ";
        $publisher = " ";
        $img = " ";
        if ( has_post_thumbnail() ) {
          $img = "<a href=" . get_the_permalink() .">" . get_the_post_thumbnail($post_id, array( 640, 500) ) . "</a>";
          $excerptlen = 15;
        } else {
          $excerptlen = 65;
        }
        if ( has_excerpt( $post_id ) ){
          $excerpt = '<p>' . wp_trim_words(get_the_excerpt(), $excerptlen) . ' <a href="' . get_the_permalink() .'">Read <span style="white-space: nowrap;">more <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></p>'; // trim excerpt if excerpt
        } else {
          $excerpt = '<p>' . wp_trim_words(get_the_content(), $excerptlen) .' <a href="' . get_the_permalink() .'">Read <span style="white-space: nowrap;">more <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></p>'; // if not, trim page content
        };
        if ( get_post_meta( $post_id, 'publisher', true ) ){
          $publisher = '<p class="publisher green">' . get_post_meta( $post_id, 'publisher', true ) . '</p>';
        };
        // compose what we will return
        $string .= '<li class="columns flex-container">
              <div class="card">
                ' . $img . '
                <div class="card-section">
                <h4><a href="' . get_the_permalink() .'">' . get_the_title() .'</a></h4>
                    ' . $publisher . '
                  <p class=""><em>' . get_the_date( "", $post_id ) . '</em></p>
                    ' . $excerpt . '
                </div>
              </div>
            </li>';
          } // end while
          // compose container
            $string = "
            <section class='itn fullblock'>
              <div class='container'>
                <h1 class='text-center'>IN THE NEWS</h1>
            " . $string . "
              </div>
            </section>";
} else {
    // no posts
}

$string .= '</ul>';

return $string;

/* Restore original Post Data */
wp_reset_postdata();
}
// Add a shortcode
add_shortcode('newscards', 'wpb_postsbycategory_news');


function wpb_postsbycategory_front( $atts ) { // thank you to http://www.wpbeginner.com/wp-tutorials/how-to-show-recent-posts-by-category-in-wordpress/
  $a = shortcode_atts( array( // inputs are taken in; including all of them is optional
    'category' => ' ',
    'amount' => 3,
    'title' => ' ',
  ), $atts );
// the query
$the_query = new WP_Query( array( 'category_name' => $a["category"], 'posts_per_page' => $a['amount'], 'keyname' => 'eventdate', 'orderby' => 'meta_value', 'order' => 'ASC' ) );
$string = " "; // init
// The Loop
if ( $the_query->have_posts() ) {
        $yprevious = 0;
    while ( $the_query->have_posts() ) {
        $ylabel = ""; // init
        $the_query->the_post();
        $post_id = get_the_ID();
        $date = get_field('eventdate', false, false); // get date from acf date field
        $date = new DateTime($date); // new date object
        $excerpt = " "; // init
        $title = get_the_title();
        $m = $date->format('M');
        $d = $date->format('d'); $d = ltrim($d, '0'); // trim leading zeroes
        $y = $date->format('Y');
        if ( has_excerpt( $post_id ) ){
          $excerpt = '<p>' . wp_trim_words(get_the_excerpt(), 30) . ' <a href="' . get_the_permalink() .'">Read more <i class="fa fa-angle-double-right fa-fw" aria-hidden="true"></i></a></p>'; // trim excerpt if excerpt
        } else{
          $excerpt = '<p>' . wp_trim_words(get_the_content(), 30) .' <a href="' . get_the_permalink() .'">Read more <i class="fa fa-angle-double-right fa-fw" aria-hidden="true"></i></a></p>'; // if not, trim page content
        };
        if ( $y !== $yprevious ){ // hacky year label check
          $ylabel = "<h2 class='text-center year'>{$y}</h2>";
        } else{
          $ylabel = " "; // init
        }
        $yprevious = $date->format('Y'); // set as previous year
        // compose what we will return
        $string .= "{$ylabel}
              <article class='row align-center event'>
              <div class='columns large-2 medium-2 small-3 large-offset-1 medium-offset-1 text-center month-container'>
                <div class='month'>{$m}</div>
                <div class='day'>{$d}</div>
              </div>
              <div class='columns large-8 medium-8 small-9'>
                <h3><a href='" . get_the_permalink() ."'>{$title}</a></h3>
                {$excerpt}
              </div>
              </article>";
          } // end while
          // compose container
            $string = "
            <section class='mainpageposts container'>
                <h1 class='text-center eventslabel'>{$a['title']}</h1>
            " . $string . "
            </section>";
} else {
    // no posts
}


return $string;

/* Restore original Post Data */
wp_reset_postdata();
}
// Add a shortcode
add_shortcode('mainpageposts', 'wpb_postsbycategory_front');



function toc_linkbuilder( $atts ) { // thank you to http://www.wpbeginner.com/wp-tutorials/how-to-show-recent-posts-by-category-in-wordpress/
  $a = shortcode_atts( array( // inputs are taken in; including all of them is optional
    'title' => ' '
  ), $atts );
$escape = urlencode( $a['title'] );
$title = $a['title'];
$string = "<a class='toc-header' name='{$escape}'>{$title}</a>"; // init
return $string;

/* Restore original Post Data */
wp_reset_postdata();
}
// Add a shortcode
add_shortcode('header_toc_entry', 'toc_linkbuilder');

function dotted_hr( $atts ) {
  $a = shortcode_atts( array(
    'style' => ' '
  ), $atts );
$styleoptions = array(
  1 => '#6a2440',
  2 => '#52a499'
);
$hr = '
<div class="svg-hr-container text-center">
  <div class="svg-centerer">
  <svg height="20" width="1024">
      <path fill-opacity="0" stroke-dasharray="1,6" stroke-linecap="round" d="M0 4 L 1024 4" style="stroke: ' . $styleoptions[$a['style']] . ' "/>
    </svg>
  </div>
</div>';
return $hr;
}
add_shortcode('dottedhr', 'dotted_hr');
