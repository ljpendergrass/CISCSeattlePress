<?php
/*
Template Name: Front
*/
get_header(); ?>

<!-- <header id="front-hero" role="banner">
	<div class="marketing">
		<div class="tagline">
			<h1><?php bloginfo( 'name' ); ?></h1>
			<h4 class="subheader"><?php bloginfo( 'description' ); ?></h4>
			<a role="button" class="download large button sites-button hide-for-small-only" href="https://github.com/olefredrik/foundationpress">Download FoundationPress</a>
		</div>

		<div id="watch">
			<section id="stargazers">
				<a href="https://github.com/olefredrik/foundationpress">1.5k stargazers</a>
			</section>
			<section id="twitter">
				<a href="https://twitter.com/olefredrik">@olefredrik</a>
			</section>
		</div>
	</div>

</header> -->

<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
	<ul class="orbit-container">
		<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span> <i class="fa fa-3x fa-angle-left" aria-hidden="true"></i></button>
		<button class="orbit-next"><span class="show-for-sr">Next Slide</span> <i class="fa fa-3x fa-angle-right" aria-hidden="true"></i></button>
		<li class="orbit-slide is-active">

	    <figure class="orbit-img-container">

			</figure>

	    <figcaption class="orbit-caption">Front page headline. Lorem ipsum dolor. <a href="#" class="button large orbit-cta">READ MORE</a></figcaption>
	  </li>
		<li class="orbit-slide">

			<figure class="orbit-img-container">
				<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/demo/image01.jpg" alt="Space">
			</figure>

			<figcaption class="orbit-caption">Second slide.</figcaption>
		</li>
		<li class="orbit-slide">

			<figure class="orbit-img-container">
				<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/demo/image01.jpg" alt="Space">
			</figure>

			<figcaption class="orbit-caption">Third slide.</figcaption>
		</li>
		<li class="orbit-slide">

			<figure class="orbit-img-container">
				<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/demo/image01.jpg" alt="Space">
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
<!-- end orbit -->
<section class="help-intro">
	<h1 class="text-center">HOW WE HELP</h1>
	<!-- using tabs to accordion responsive foundation element  -->
	<!-- TODO: add flex style in order to stretch list in reference to # lis in UL -->
	<ul class="accordion intro-flex-container" data-responsive-accordion-tabs="tabs small-accordion medium-accordion large-tabs">
	  <li class="accordion-item large-flex-child-auto is-active" data-accordion-item >
	    <a href="#" class="accordion-title">
				<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/demo/intro-early-ed.png" alt="Space">
				Early Childhood Education</a>
	    <div class="accordion-content" data-tab-content>
	      A short description about Early Childhood Education goes here. <a href="#" class="button small">LEARN MORE</a>
	    </div>
	  </li>
		<li class="accordion-item large-flex-child-auto" data-accordion-item>
			<a href="#" class="accordion-title">
				<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/demo/intro-youth.png" alt="Space">
				Youth Program</a>
	    <div class="accordion-content" data-tab-content>
				Youth Program description. <a href="#" class="button small">LEARN MORE</a>
	    </div>
	  </li>
		<li class="accordion-item large-flex-child-auto" data-accordion-item>
			<a href="#" class="accordion-title">
				<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/demo/intro-family.png" alt="Space">
				Family Program</a>
			<div class="accordion-content" data-tab-content>
				Family Program description. <a href="#" class="button small">LEARN MORE</a>
			</div>
		</li>
		<li class="accordion-item large-flex-child-auto" data-accordion-item>
			<a href="#" class="accordion-title">
				<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/demo/intro-senior.png" alt="Space">
				Senior Program</a>
			<div class="accordion-content" data-tab-content>
				Senior Program description. <a href="#" class="button small">LEARN MORE</a>
			</div>
		</li>
		<li class="accordion-item large-flex-child-auto" data-accordion-item>
			<a href="#" class="accordion-title">
				<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/demo/intro-health.png" alt="Space">
				Health Care Access</a>
			<div class="accordion-content" data-tab-content>
				Health Care Access description. <a href="#" class="button small">LEARN MORE</a>
			</div>
		</li>
		<li class="accordion-item large-flex-child-auto" data-accordion-item>
			<a href="#" class="accordion-title">
				<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/demo/intro-crime.png" alt="Space">
				Crime Victim Advocacy Program</a>
			<div class="accordion-content" data-tab-content>
				Crime Victim Advocacy description. <a href="#" class="button small">LEARN MORE</a>
			</div>
		</li>



	</ul>
</section>
<!-- end intro -->
<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="intro" role="main">
	<div class="fp-intro">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php
					wp_link_pages(
						array(
							'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
							'after'  => '</p></nav>',
						)
					);
				?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action( 'foundationpress_page_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'foundationpress_page_after_comments' ); ?>
		</div>
	</div>

</section>
<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>

<section class="inspire">
	<h1 class="text-center">TAKE ACTION</h1>
	<div class="row">
		<div class="large-2 columns">

		</div>
		<figure class="small-12 large-2 columns text-center">
			<a href="#"><img src="https://placehold.it/240x240" alt="">
			<figcaption>Volunteer</figcaption></a>
		</figure>
		<figure class="small-12 large-4 columns text-center">
			<a href="#"><img src="https://placehold.it/240x240" alt="">
			<figcaption>Donation</figcaption></a>
		</figure>
		<figure class="small-12 large-2 columns text-center">
			<a href="#"><img src="https://placehold.it/240x240" alt="">
			<figcaption>In-kind donation</figcaption></a>
		</figure>
		<div class="large-2 columns">

		</div>

	</div>
</section>

<div class="section-divider">
	<hr />
</div>

<?php get_footer();
