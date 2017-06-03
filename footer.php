<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

		</section>
		<div id="footer-container">
			<footer id="footer">
				<div class="row">
				<?php do_action( 'foundationpress_before_footer' ); ?>
				<article class="small-12 medium-4 large-3 columns small-text-center">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="logo" src="<?php echo bloginfo('template_directory'); ?>/assets/images/cisc-logo-rev-footer.gif"></a>
				</article>
				<?php dynamic_sidebar( 'footer-widgets' ); ?>
			</div>
			<div class="row align-bottom">
				<div class="column align-self-bottom expand text-right" style="align-self: flex-end;">
					<p>Supported by United Way of King County Copyright 2017. All rights reserved.</p>
				</div>
				<div class="column shrink">
					<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/uwkc-white.png" alt="">
				</div>
			</div>

				<?php do_action( 'foundationpress_after_footer' ); ?>
			</footer>
		</div>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		</div><!-- Close off-canvas content -->
	</div><!-- Close off-canvas wrapper -->
<?php endif; ?>


<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
<script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.18.8'><\/script>".replace("HOST", location.hostname));
//]]></script>
</body>
</html>
