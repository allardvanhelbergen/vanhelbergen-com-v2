<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage van_Helbergen
 * @since van Helbergen 1.0
 */

$options = twentyeleven_get_theme_options();
$current_layout = $options['theme_layout'];

if ( 'content' != $current_layout ) : ?>
  <div id="secondary" class="widget-area four columns" role="complementary">
    <?php //if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

      <aside id="archives" class="widget">
        <h3 class="subheader widget-title">
          <?php _e( 'Categories', 'vanhelbergen' ); ?>
        </h3>
        <ul>
          <?php wp_list_categories( array( 
            'heirarchical' => false,
            'title_li' => null 
          ) ); ?>
        </ul>
        <h3 class="subheader widget-title">
          <?php _e( 'Archives', 'vanhelbergen' ); ?>
        </h3>
        <ul>
          <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
        </ul>
      </aside>
    <?php //endif; // end sidebar widget area ?>
  </div><!-- #secondary .widget-area -->
<?php endif; ?>