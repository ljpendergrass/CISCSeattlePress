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

// orbit shortcode, pre break-down
function orbit_func( $atts ) {
  $a = shortcode_atts( array( // inputs are taken in; including all of them is optional
    'foo' => 'something',
    'bar' => 'something else',
  ), $atts );
  $t = get_bloginfo('template_directory');
  $r = '<section class="container">
  <div class="orbit" role="region" aria-label="Main Images" data-orbit>
    	<ul class="orbit-container">
    		<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span> <i class="fa fa-3x fa-angle-left" aria-hidden="true"></i></button>
    		<button class="orbit-next"><span class="show-for-sr">Next Slide</span> <i class="fa fa-3x fa-angle-right" aria-hidden="true"></i></button>
    		<li class="orbit-slide is-active">

    	    <figure class="orbit-img-container">
    				<img src="' . $t . '/assets/images/demo/image01.jpg" alt="Space">
    			</figure>

    	    <figcaption class="orbit-caption">Front page headline. Lorem ipsum dolor. <a href="#" class="button large orbit-cta">READ MORE</a></figcaption>
    	  </li>
    		<li class="orbit-slide">

    			<figure class="orbit-img-container">
    				<img src="' . $t . '/assets/images/demo/image01.jpg" alt="Space">
    			</figure>

    			<figcaption class="orbit-caption">Second slide.</figcaption>
    		</li>
    		<li class="orbit-slide">

    			<figure class="orbit-img-container">
    				<img src="' . $t . '/assets/images/demo/image01.jpg" alt="Space">
    			</figure>

    			<figcaption class="orbit-caption">Third slide.</figcaption>
    		</li>
    		<li class="orbit-slide">

    			<figure class="orbit-img-container">
    				<img src="' . $t . '/assets/images/demo/image01.jpg" alt="Space">
    			</figure>

    			<figcaption class="orbit-caption">Fourth slide.</figcaption>
    		</li>

    	</ul>
    	<nav class="orbit-bullets">
    	  <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
    	  <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
    	  <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
    	  <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
    	</nav>
    </div>
    </section>
    <!-- end orbit -->';
  return $r;
 }
 add_shortcode( 'orbit', 'orbit_func' );
// end orbit

// how we help pre breakdown
function help_func( $atts ) {
  $a = shortcode_atts( array( // inputs are taken in; including all of them is optional
    'foo' => 'something',
    'bar' => 'something else',
  ), $atts );
  $t = get_bloginfo('template_directory');

  return "<section class='help-intro container'>
  	<!-- using tabs to accordion responsive foundation element  -->
  	<!-- TODO: add flex style in order to stretch list in reference to # lis in UL -->
  	<ul class='accordion intro-flex-container' data-responsive-accordion-tabs='tabs small-accordion medium-accordion large-tabs'>
  	  <li class='accordion-item large-flex-child-auto is-active' data-accordion-item >
  	    <a href='#' class='accordion-title'>
  				<img src='{$t}/assets/images/demo/intro-early-ed.png' alt='Space'>
  				Early Childhood Education</a>
  	    <div class='accordion-content' data-tab-content>
  	      A short description about Early Childhood Education goes here. <a href='#' class='button small'>LEARN MORE</a>
  	    </div>
  	  </li>
  		<li class='accordion-item large-flex-child-auto' data-accordion-item>
  			<a href='#' class='accordion-title'>
  				<img src='{$t}/assets/images/demo/intro-youth.png' alt='Space'>
  				Youth Program</a>
  	    <div class='accordion-content' data-tab-content>
  				Youth Program description. <a href='#' class='button small'>LEARN MORE</a>
  	    </div>
  	  </li>
  		<li class='accordion-item large-flex-child-auto' data-accordion-item>
  			<a href='#' class='accordion-title'>
  				<img src='{$t}/assets/images/demo/intro-family.png' alt='Space'>
  				Family Program</a>
  			<div class='accordion-content' data-tab-content>
  				Family Program description. <a href='#' class='button small'>LEARN MORE</a>
  			</div>
  		</li>
  		<li class='accordion-item large-flex-child-auto' data-accordion-item>
  			<a href='#' class='accordion-title'>
  				<img src='{$t}/assets/images/demo/intro-senior.png' alt='Space'>
  				Senior Program</a>
  			<div class='accordion-content' data-tab-content>
  				Senior Program description. <a href='#' class='button small'>LEARN MORE</a>
  			</div>
  		</li>
  		<li class='accordion-item large-flex-child-auto' data-accordion-item>
  			<a href='#' class='accordion-title'>
  				<img src='{$t}/assets/images/demo/intro-health.png' alt='Space'>
  				Health Care Access</a>
  			<div class='accordion-content' data-tab-content>
  				Health Care Access description. <a href='#' class='button small'>LEARN MORE</a>
  			</div>
  		</li>
  		<li class='accordion-item large-flex-child-auto' data-accordion-item>
  			<a href='#' class='accordion-title'>
  				<img src='{$t}/assets/images/demo/intro-crime.png' alt='Space'>
  				Crime Victim Advocacy Program</a>
  			<div class='accordion-content' data-tab-content>
  				Crime Victim Advocacy description. <a href='#' class='button small'>LEARN MORE</a>
  			</div>
  		</li>



  	</ul>
  </section>";
 }
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
        <a href='{$url_a}'><img src='{$t}/assets/images/demo/action-volunteer.png' alt=' '>
        <figcaption>{$title_a}</figcaption></a>
      </figure>
      <figure class='small-12 medium-3 large-4 columns text-center'>
        <a href='{$url_b}'><img src='{$t}/assets/images/demo/action-donation.png' alt=' '>
        <figcaption>{$title_b}</figcaption></a>
      </figure>
      <figure class='small-12 medium-3 large-2 columns text-center'>
        <a href='{$url_c}'><img src='{$t}/assets/images/demo/action-inkind.png' alt=' '>
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
function contact_func( $atts ) {
  $a = shortcode_atts( array( // inputs are taken in; including all of them is optional
    'foo' => 'something',
    'bar' => 'something else',
  ), $atts );
  return '<section class="container">
  	<h2 class="text-center">Stay in touch</h2>
  	<div class="row">
  		<div class="small-12 medium-6 large-6 columns">
  			<ul class="menu centered vertical mainpage-info no-bullet align-center">
  				<li>
  					<a href="#"><i class="fa fa-fw fa-address-book green" aria-hidden="true"></i> <span>Program Contacts</span> &nbsp; <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
  				</li>
  				<li>
  					<a href="#"><i class="fa fa-fw fa-map-marker green" aria-hidden="true"></i><span>Site Locations</span> &nbsp; <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
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
