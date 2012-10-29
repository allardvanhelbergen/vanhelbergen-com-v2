<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage van_Helbergen
 * @since van Helbergen 1.0
 */

get_header(); ?>

  <div id="primary">
    <div id="content" role="main">

      <article id="post-0" class="post error404 not-found">
        <header class="entry-header">
          <h1 class="entry-title">
            <?php _e( 
                'Crap. It broke.',
                'twentyeleven' ); ?>
          </h1>
        </header>

        <div class="entry-content">
          <p>
            404 - Not Found.
          </p>
          <p>
            It seems I messed up and wrote some bad code.
          </p>
          <p>
            While my army of minions runs to remedy the situation, why not go 
            look at another brilliant page on this website through the menu 
            above. 
          </p>
          <p></p>
        </div><!-- .entry-content -->
      </article><!-- #post-0 -->

    </div><!-- #content -->
  </div><!-- #primary -->

<?php get_footer(); ?>