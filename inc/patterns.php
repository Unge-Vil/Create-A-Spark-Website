<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action('init', function(){
  if ( function_exists( 'register_block_pattern_category' ) ) {
    register_block_pattern_category('create-a-spark', ['label' => __('Create A Spark', 'create-a-spark')]);
  }
  if ( function_exists( 'register_block_pattern' ) ) {
    $landing_content = '
<!-- wp:shortcode -->[cas_hero title="Create A Spark" subtitle="We help young people turn ideas into finished projects—fast. Music, film, comics, games, and real community projects guided by kind mentors." badge="Explosive • Fluid • Spark"]<!-- /wp:shortcode -->

<!-- wp:group {"className":"cas-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group cas-card"><div class="wp-block-group__inner-container">
<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">About</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Structured, high-energy making sprints. Clear goals, practical tools, and a supportive environment.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:group -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"cas-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group cas-card"><div class="wp-block-group__inner-container">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Music</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>From idea to recorded track. Songwriting rooms, recording corners, and a friendly showcase.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"cas-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group cas-card"><div class="wp-block-group__inner-container">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Film</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Short films with small crews. Story, shot-lists, quick edits, and a premiere screening.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"cas-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group cas-card"><div class="wp-block-group__inner-container">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Comics</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Concept to printed mini-zine. Character design, panels, and print-ready files.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"cas-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group cas-card"><div class="wp-block-group__inner-container">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Mentored &amp; kind</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Guidance without pressure. Feedback loops that build confidence and momentum.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"cas-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group cas-card"><div class="wp-block-group__inner-container">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Make it real</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Each sprint ends in a tangible output—track, film, comic, or community deliverable.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"cas-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group cas-card"><div class="wp-block-group__inner-container">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Inclusive &amp; modern</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Welcoming spaces, modern tools, and practical workflows that demystify the process.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"cas-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group cas-card"><div class="wp-block-group__inner-container">
<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">FAQ</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><strong>Is there a newsletter or signup?</strong><br>No. This site is information-only right now.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><strong>Where can I read news?</strong><br>Soon we’ll embed posts from our blog here. For now, follow Unge Vil.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><strong>How can I partner?</strong><br>Reach out via Unge Vil’s site or email.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:group -->
';
    register_block_pattern('create-a-spark/landing', [
      'title'       => __('CAS Landing (Dark)', 'create-a-spark'),
      'description' => __('Create A Spark hero + info sections styled to match the site-wide dark theme.', 'create-a-spark'),
      'content'     => $landing_content,
      'categories'  => ['create-a-spark'],
    ]);
  }
});
