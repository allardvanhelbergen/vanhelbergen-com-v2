<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage van_Helbergen
 * @since van Helbergen 1.0
 */
?>

    </div><!-- #main -->

    <footer id="colophon" role="contentinfo">
      <?php
        /* A sidebar in the footer? Yep. You can can customize
         * your footer with three columns of widgets.
         */
        if ( ! is_404() )
          get_sidebar( 'footer' );
      ?>
      <div id="site-generator">
        <?php do_action( 'twentyeleven_credits' ); ?>
        <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentyeleven' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentyeleven' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'twentyeleven' ), 'WordPress' ); ?></a>
      </div>
    </footer><!-- #colophon -->
  </div><!-- #page -->

  <?php wp_footer(); ?>

  <!-- Included JS Files (Uncompressed) -->
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/foundation/app.js"></script>
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/foundation/jquery.foundation.alerts.js"></script>
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/foundation/jquery.foundation.buttons.js"></script>
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/foundation/jquery.foundation.mediaQueryToggle.js">
  </script>
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/foundation/jquery.foundation.topbar.js"></script>
  <!-- Application Javascript, safe to override -->
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/foundation/app.js"></script>
</body>
</html>
