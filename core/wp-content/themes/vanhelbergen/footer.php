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
    
    <div id="footer-push"></div>
  </div><!-- #page -->

  <footer id="footer" role="contentinfo" class="mastfoot">
    <?php get_sidebar( 'footer' ); ?>
  </footer><!-- #footer -->

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
