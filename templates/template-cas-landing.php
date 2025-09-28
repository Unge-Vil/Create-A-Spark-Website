<?php
/**
 * Template Name: CAS Landing
 * Description: Full-width landing template. Use the CAS block pattern and/or [cas_hero] shortcode.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header(); ?>
<main id="primary" class="site-main">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
      <?php
        while ( have_posts() ) : the_post();
          the_content();
        endwhile;
      ?>
    </div>
  </article>
</main>
<?php get_footer();
