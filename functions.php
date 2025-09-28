<?php
/**
 * Create A Spark - Kadence Child
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action('wp_enqueue_scripts', function(){
  $base_uri = get_stylesheet_directory_uri() . '/create-a-spark-assets';
  // Base styles
  wp_enqueue_style('cas-styles', $base_uri . '/assets/css/styles.css', [], '1.0', 'all');
  // Kadence compatibility (load after)
  wp_enqueue_style('cas-kadence', $base_uri . '/assets/css/wp-kadence-compat.css', ['cas-styles'], '1.0', 'all');
  // JS
  wp_enqueue_script('cas-main', $base_uri . '/assets/js/main.js', [], '1.0', true);
  wp_enqueue_script('cas-sparks', $base_uri . '/assets/js/sparks.js', ['cas-main'], '1.0', true);
}, 20);

/**
 * Shortcode: [cas_hero title="Create A Spark" subtitle="Explosive creativity..." badge="Explosive • Fluid • Spark"]
 */
add_shortcode('cas_hero', function($atts){
  $a = shortcode_atts([
    'title' => 'Create A Spark',
    'subtitle' => 'We help young people turn ideas into finished projects—fast. Music, film, comics, games, and real community projects guided by kind mentors.',
    'badge' => 'Explosive • Fluid • Spark'
  ], $atts);
  ob_start(); ?>
  <section class="hero section">
    <canvas id="sparks" aria-hidden="true"></canvas>
    <div class="hero-content container">
      <span class="badge reveal"><?php echo esc_html($a['badge']); ?></span>
      <h1 class="reveal"><?php echo esc_html($a['title']); ?></h1>
      <p class="reveal"><?php echo esc_html($a['subtitle']); ?></p>
    </div>
  </section>
  <?php
  return ob_get_clean();
});

// Register a simple block pattern category + patterns
require_once get_stylesheet_directory() . '/inc/patterns.php';
