<?php
/**
 * The Header for van Helbergen.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage van_Helbergen
 * @since van Helbergen 1.0
 */
?><!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ 
    -->
<!--[if lt IE 7]> 
  <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
  <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
  <html class="no-js lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if gt IE 8]><!-->
  <html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <title><?php
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title( '|', true, 'right' );

    // Add the blog name.
    bloginfo( 'name' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
      echo " | $site_description";

    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 ) {
      echo ' | ' . 
          sprintf( __( 'Page %s', 'vanhelbergen' ), max( $paged, $page ) );
    }

  ?></title>

  <!-- Stylesheet href is adapted for Compass. -->
  <link rel="stylesheet" 
      href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/style.css" />

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  
  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/foundation/modernizr.foundation.js"></script>
  <?php
    /* We add some JavaScript to pages with the comment form
     * to support sites with threaded comments (when in use).
     */
    if ( is_singular() && get_option( 'thread_comments' ) )
      wp_enqueue_script( 'comment-reply' );

    /* Always have wp_head() just before the closing </head>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to add elements to <head> such
     * as styles, scripts, and meta tags.
     */
    wp_head();
  ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
  <nav id="access" class="top-bar" role="navigation">

    <!-- <h3 class="assistive-text">
      <?php _e( 'Main menu', 'vanhelbergen' ); ?>
    </h3>
    <?php /* Allow screen readers / text browsers to skip the navigation 
        menu and get right to the good stuff. */ ?>
    <div class="skip-link">
      <a class="assistive-text" href="#content"
          title="<?php esc_attr_e(
              'Skip to primary content', 'vanhelbergen'); ?>">
        <?php _e( 'Skip to primary content', 'vanhelbergen' ); ?></a>
    </div>
    <div class="skip-link">
      <a class="assistive-text" href="#secondary"
          title="<?php esc_attr_e(
              'Skip to secondary content', 'vanhelbergen'); ?>">
        <?php _e( 'Skip to secondary content', 'vanhelbergen' ); ?></a>
    </div> -->

    <ul>
      <!-- Title Area -->
      <li class="name">
        <h1>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
              title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
              rel="home">
            <?php bloginfo( 'name' ); ?></a>
        </h1>
      </li>
      <li class="toggle-topbar"><a href="#"></a></li>
    </ul>

    <section>
      <!-- Right Nav Section -->
      <?php 
      /**
       * Our navigation menu. If one isn't filled out, wp_nav_menu
       * falls back to wp_page_menu. The menu assigned to the primary
       * location is the one used. If one isn't assigned, the menu with the
       * lowest ID is used.
       */ 
      // TODO(allard): Create custom walker to add divider between li elements.
      wp_nav_menu( array(
        'menu_class' => 'right',
        'theme_location' => 'primary'
      ) ); ?>
    </section>
  </nav><!-- #access -->

  <div id="main" class="row">
