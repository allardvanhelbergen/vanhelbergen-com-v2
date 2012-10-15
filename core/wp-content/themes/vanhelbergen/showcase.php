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
      <header id="branding" role="banner" class="row">
        <hgroup class="twelve columns">
          <h1 id="site-title">
            <span>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
                  title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                  rel="home">
                <?php bloginfo( 'name' ); ?></a>
            </span>
          </h1>
          <h2 id="site-description">
            <?php bloginfo( 'description' ); ?>
          </h2>
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
              get_template_part( 'content', 'intro' );
          ?>
        <?php endwhile; ?>

        <section class="recent-posts">
          <h3 class="showcase-heading">
            <?php _e( 'Recent Posts', 'twentyeleven' ); ?>
          </h3>

          <?php

          // Display our recent posts, showing full content for the very latest,
          // ignoring Aside posts.
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

          // Our new query for the Recent Posts section.
          $recent = new WP_Query( $recent_args );

          // For all recent posts, just display the title and comment 
          // status.
          while ( $recent->have_posts() ) : $recent->the_post(); ?>

            <li class="entry-title">
              <a href="<?php the_permalink(); ?>" 
                  title="<?php printf( 
                      esc_attr__( 'Permalink to %s', 'twentyeleven' ),
                      the_title_attribute( 'echo=0' ) ); ?>" 
                  rel="bookmark">
                <?php the_title(); ?></a>
              <span class="comments-link">
                <?php comments_popup_link( 
                    '<span class="leave-reply">' . 
                        __( 'Leave a reply', 'twentyeleven' ) . '</span>', 
                    __( '<b>1</b> Reply', 'twentyeleven' ), 
                    __( '<b>%</b> Replies', 'twentyeleven' ) ); ?>
              </span>
            </li>

          <?php
          endwhile;

          // If we had some posts, close the <ol>
          if ( $recent->post_count > 0 )
            echo '</ol>';
          ?>
        </section><!-- .recent-posts -->
      </div><!-- #content -->
    </div><!-- #primary -->

<?php get_footer(); ?>