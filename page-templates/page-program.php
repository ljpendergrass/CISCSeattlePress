<?php
/*
Template Name: Program Page (Interior)
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
    	<header id=" " class="row visual-header header-programs" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">
        <img class="programicon" src="<?php echo get_field('icon_image'); ?>" alt="">
    	</header>
    <?php //todo: add elseif for no thumbnail/featured image
  endif; ?>
      <!-- Excerpt/intro -->
      <div class="row"><h3 class="excerpt text-center align-center"><?php
      $id = get_the_id();
      echo get_field("excerpt", $id, false);
      ?></h3></div>
      <!-- Title -->
      <h1 class="text-center"><?php echo get_the_title(); ?></h1>
      <!-- Border -->
      <!-- Todo: Partial fullborder into includable -->
      <div class="svg-hr-container row text-center">
        <div class="svg-centerer">
          <svg height="20" width="924">
            <path fill-opacity="0" stroke-dasharray="1,6" stroke-linecap="round" d="M0 4 L 451.3 4 L 462 14.5 L 472 4 L 924 4"/>
          </svg>
        </div>
      </div>

      <!-- Sidebar | Content -->
      <!-- Todo: Sidebar if test -->

      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
      <div class="entry-content row align-center">
        <?php echo program_layout(); ?>
        <?php the_content(); ?>
      </div>
      </div>

      <!-- bottom program line -->

      <!-- <ul class="program-cards row medium-unstack"> -->

      <?php do_action( 'foundationpress_page_before_comments' ); ?>
      <?php comments_template(); ?>
      <?php do_action( 'foundationpress_page_after_comments' ); ?>
  </article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' );

$the_query = new WP_Query(
  array(
    'post_type' => 'page',
    'meta_key' => '_wp_page_template',
    'meta_value' => 'page-templates/page-program.php'
  )
);

$string = "<section class='help-intro container'>
<ul class='no-bullet intro-flex-container'>";

if ( $the_query->have_posts() ) {
  while ( $the_query->have_posts() ) {
    $the_query->the_post();
    $post_id = get_the_ID();
    $title = get_the_title();
    $templatedir = get_bloginfo('template_directory');
    $inactiveimg = get_field('icon_image_inactive');
    $permalink = get_the_permalink();
    // add to string
    $string .= "<li class='text-center'>
    <a href='{$permalink}' class='text-center'>
    <img class='infodefault' src='{$inactiveimg}' alt=' '>
    {$title}</a>
    </li>
    ";
  };
  echo $string .= "</ul></section>";
};
?>



</div>

<?php get_footer();
