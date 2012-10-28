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
<div class="supplementary" class="row" 
    <?php twentyeleven_footer_sidebar_class(); ?>>
  <div id="first" class="widget-area twelve columns footer-menu" 
      role="complementary">
    <?php dynamic_sidebar( 'sidebar-3' ); ?>
    <p>
      Copyright &copy; <?php echo date("Y"); ?>,
      <a href="//www.vanhelbergen.com/">Allard van Helbergen</a>
    </p>
  </div><!-- #first .widget-area -->
</div><!-- #supplementary -->