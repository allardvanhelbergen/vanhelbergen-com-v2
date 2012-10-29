<?php
/**
 * Template Name: Showcase Template
 * Description: A Page Template that showcases Sticky Posts, Asides, and Blog 
 * Posts
 *
 * The showcase template in Twenty Eleven consists of a featured posts section 
 * using sticky posts, another recent posts area (with the latest post shown in
 * full and the rest as a list) and a left sidebar holding aside posts.
 *
 * We are creating two queries to fetch the proper posts and a custom widget for
 * the sidebar.
 *
 * @package WordPress
 * @subpackage van_Helbergen
 * @since van Helbergen 1.0
 */

get_header(); ?>

    <div id="primary" class="showcase twelve columns">
      <header id="branding" role="banner">
        <hgroup>
          <h1>
            <span id="site-title">Hi, I’m Allard.</span><br>
            <small id="site-description">
              <?php bloginfo( 'description' ); ?></small>
          </h1>
        </hgroup>
      </header><!-- #branding -->
    
      <div id="content" role="main">

        <?php while ( have_posts() ) : the_post(); ?>
          <?php
            /**
             * We are using a heading by rendering the_content
             * If we have content for this page, let's display it.
             */
            if ( '' != get_the_content() )
              get_template_part( 'content', 'page' );
          ?>
        <?php endwhile; ?>

        
      </div><!-- #content -->

      <div class="complementary-info row" role="complementary">
        <section class="recent-posts four columns offset-by-one">
          <h4 class="showcase-heading subheader">
            <?php _e( 'Recent Blog Posts', 'vanhelbergen' ); ?>
          </h4>

          <?php
          $recent_args = array(
            'order' => 'DESC',
            'post__not_in' => get_option( 'sticky_posts' ),
            'tax_query' => array(
              array(
                'taxonomy' => 'post_format',
                'terms' => array( 
                  'post-format-aside', 
                  'post-format-link', 
                  'post-format-quote', 
                  'post-format-status' 
                ),
                'field' => 'slug',
                'operator' => 'NOT IN',
              ),
            ),
            'no_found_rows' => true,
          );

          // Query for the Recent Posts section.
          $recent = new WP_Query( $recent_args );

          if ( $recent->post_count > 0 )
            echo '<ol class="other-recent-posts">';

          // For all recent posts, just display the title and comment 
          // status.
          while ( $recent->have_posts() ) : $recent->the_post(); ?>

            <li class="entry-title">
              <a href="<?php the_permalink(); ?>" 
                  title="<?php printf( 
                      esc_attr__( 'Permalink to %s', 'vanhelbergen' ),
                      the_title_attribute( 'echo=0' ) ); ?>" 
                  rel="bookmark">
                <?php the_title(); ?></a>
            </li>

          <?php
          endwhile;

          // If we had some posts, close the <ol>
          if ( $recent->post_count > 0 )
            echo '</ol>';
          ?>
        </section><!-- .recent-posts -->

        <section class="recent-portfolio-posts four columns offset-by-two">
          <h4 class="showcase-heading subheader">
            <?php _e( 'Portfolio', 'vanhelbergen' ); ?>
          </h4>
          <p>
            Check out some of my work in my 
            <a href="http://vanhelbergen.com/portfolio/">portfolio</a>.
          </p>
        </section><!-- .recent-portfolio-posts -->

        <div class="one coulumns"></div>
      </div><!-- .complementary-info -->
    </div><!-- #primary -->

<?php get_footer(); ?>