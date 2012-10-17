<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage van_Helbergen
 * @since van Helbergen 1.0
 */
?>

<?php
  /* The footer widget area is triggered if any of the areas
   * have widgets. So let's check that first.
   *
   * If none of the sidebars have widgets, then let's bail early.
   */
  if ( ! is_active_sidebar( 'sidebar-3' )
    && ! is_active_sidebar( 'sidebar-4' )
    && ! is_active_sidebar( 'sidebar-5' )
  )
    return;
  // If we get this far, we have widgets. Let do this.
?>
<div id="supplementary" class="row" 
    <?php twentyeleven_footer_sidebar_class(); ?>>
  <div id="first" class="widget-area six columns footer-menu" 
      role="complementary">
    <?php dynamic_sidebar( 'sidebar-3' ); ?>
  </div><!-- #first .widget-area -->

  <div id="third" class="widget-area six columns footer-menu" 
      role="complementary">
    <?php dynamic_sidebar( 'sidebar-5' ); ?>
  </div><!-- #third .widget-area -->
</div><!-- #supplementary -->