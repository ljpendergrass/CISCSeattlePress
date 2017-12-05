<?php
/**
* Visual header
*
* @package FoundationPress
*/

// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.

if ( has_post_thumbnail( $post->ID ) ) : ?>

<header id=" " class="row visual-header about-generic" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">
	<!-- Title -->
	<h1 class="text-left"><?php echo get_the_title(); ?></h1>
</header>
<?php else : ?>
<header class="row">
	<h1 class="entry-title"><?php the_title(); ?></h1>
</header>
<?php endif; ?>
