<?php
/*
Template Name: Featured Image Header w/Title
*/
get_header(); ?>


<div role="main">

<?php get_template_part( 'template-parts/visual-header' ); ?>
<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <article <?php post_class('main-content row') ?> id="post-<?php the_ID(); ?>">
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
  </article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer();
