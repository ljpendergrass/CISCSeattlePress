<?php
/*
Template Name: Front
*/
get_header(); ?>


<!-- end intro -->
<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="intro" role="main">
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
</section>
<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>

<section class="inspire fullblock">
	<h1 class="text-center">TAKE ACTION</h1>
	<div class="row">
		<div class="large-2 columns">

		</div>
		<figure class="small-12 large-2 columns text-center">
			<a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/assets/images/demo/action-volunteer.png" alt=" ">
			<figcaption>Volunteer</figcaption></a>
		</figure>
		<figure class="small-12 large-4 columns text-center">
			<a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/assets/images/demo/action-donation.png" alt=" ">
			<figcaption>Donation</figcaption></a>
		</figure>
		<figure class="small-12 large-2 columns text-center">
			<a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/assets/images/demo/action-inkind.png" alt=" ">
			<figcaption>In-kind donation</figcaption></a>
		</figure>
		<div class="large-2 columns">

		</div>

	</div>
</section>

<section>
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
</section>

<?php get_footer();
