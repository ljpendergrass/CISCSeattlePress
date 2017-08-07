<?php
/*
Template Name: Program Landing Page
*/
get_header(); ?>

<div id="page-full-width programs-page" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
    <?php
    // If a featured image is set, insert into layout and use Interchange
    // to select the optimal image size per named media query.
    if ( has_post_thumbnail( $post->ID ) ) : ?>
    	<header id=" " class="row visual-header" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">
        <h1>CISC Programs</h1>

    	</header>
    <?php endif; ?>


      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
      <div class="entry-content row">
          <?php the_content(); ?>
      </div>

      <?php echo( programs_bycategory() ); ?>

      <ul class="program-cards row medium-unstack">

        <li class="columns"><div class="card program-card">
          <img class="program-img" src="<?php echo bloginfo('template_directory'); ?>/assets/images/programicon-buildearly-childhood.png">
          <div class="card-section">
            <h4>Early Childhood Education</h4>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
          </div>
          <div class="card-section text-right">
            <a href="#" class="button">Learn More</a>
          </div>
        </div></li>

        <li class="columns"><div class="card program-card">
          <img class="program-img" src="<?php echo bloginfo('template_directory'); ?>/assets/images/programicon-buildearly-childhood.png">
          <div class="card-section">
            <h4>Early Childhood Education</h4>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
          </div>
          <div class="card-section text-right">
            <a href="#" class="button">Learn More</a>
          </div>
        </div></li>

        <li class="columns"><div class="card program-card">
          <img class="program-img" src="<?php echo bloginfo('template_directory'); ?>/assets/images/programicon-buildearly-childhood.png">
          <div class="card-section">
            <h4>Early Childhood Education</h4>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
          </div>
          <div class="card-section text-right">
            <a href="#" class="button">Learn More</a>
          </div>
        </div></li>

        <li class="columns"><div class="card program-card">
          <img class="program-img" src="<?php echo bloginfo('template_directory'); ?>/assets/images/programicon-buildearly-childhood.png">
          <div class="card-section">
            <h4>Early Childhood Education</h4>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
          </div>
          <div class="card-section text-right">
            <a href="#" class="button">Learn More</a>
          </div>
        </div></li>

        <li class="columns"><div class="card program-card">
          <img class="program-img" src="<?php echo bloginfo('template_directory'); ?>/assets/images/programicon-buildearly-childhood.png">
          <div class="card-section">
            <h4>Early Childhood Education</h4>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
          </div>
          <div class="card-section text-right">
            <a href="#" class="button">Learn More</a>
          </div>
        </div></li>

        <li class="columns"><div class="card program-card">
          <img class="program-img" src="<?php echo bloginfo('template_directory'); ?>/assets/images/programicon-buildearly-childhood.png">
          <div class="card-section">
            <h4>Early Childhood Education</h4>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
          </div>
          <div class="card-section text-right">
            <a href="#" class="button">Learn More</a>
          </div>
        </div></li>


      </ul>
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
  </article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer();
