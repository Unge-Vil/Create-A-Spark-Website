# Kadence Child — Create A Spark
> A production‑ready child theme for the **Kadence** parent theme that applies the Create A Spark dark/glass aesthetic, smooth‑scroll + reveal‑on‑scroll, and a lightweight canvas “sparks” hero animation. Built for **English‑only, info‑only** sites on typical shared hosting.

---

## 1) At a glance
- **Parent theme:** Kadence
- **Purpose:** Style your Kadence site to match the Create A Spark brand without custom page builders.
- **Highlights:**
  - Global CSS variables and `theme.json` palette
  - Glassy cards, dark layout, consistent spacing
  - IntersectionObserver reveal animations (`.cas-reveal`)
  - Canvas sparks hero (`#cas-hero-canvas`) with `prefers-reduced-motion` support
  - Reusable **Gutenberg Patterns** for fast page building
- **Tested with:** WordPress 6.x, Kadence (latest), Kadence Blocks (optional)

---

## 2) Folder structure
```
kadence-create-a-spark-child/
├─ assets/
│  ├─ css/
│  │  └─ cas.css                # Global CAS styles (variables, cards, reveal, hero)
│  ├─ js/
│  │  ├─ cas-main.js            # Smooth scroll + reveal-on-scroll
│  │  └─ cas-sparks.js          # Canvas sparks animation for hero
│  └─ img/
│     └─ createaspark_logo.svg  # Logo used in patterns
├─ patterns/
│  ├─ hero.php                  # CAS Hero (with canvas)
│  ├─ cards-3up.php             # Benefits/Features (3 columns)
│  ├─ programs-grid.php         # Programs overview (3 columns)
│  ├─ faq.php                   # Simple FAQ (native <details>)
│  ├─ contact-strip.php         # Email CTA strip
│  └─ cta-row.php               # Generic CTA row
├─ functions.php                # Enqueues CSS/JS (site-wide by default)
├─ style.css                    # Child theme header (required by WP)
├─ theme.json                   # Global colors, typography, widths
└─ README.md                    # This file (put into your GitHub repo root)
```

> Tip: If you prefer to limit the JS/CSS to a single page (e.g., your landing page), see **Section 8: Conditional enqueue**.

---

## 3) Installation
1. **Install Kadence** (parent) from WordPress.org (Appearance → Themes → Add New → search “Kadence”).
2. **Upload the child theme ZIP** (Appearance → Themes → Add New → Upload Theme).
3. Activate **Kadence Child — Create A Spark**.

### Optional plugins
- **Kadence Blocks** (recommended for richer layouts, accordions, etc.).  
- Your preferred **SEO plugin** (Rank Math / Yoast) for titles, meta, and share images.

---

## 4) Global design tokens
We expose brand colors and spacing via CSS variables in `assets/css/cas.css`:
```css
:root{
  --cas-bg:#0a0f18;
  --cas-card:#0f1726;
  --cas-text:#e6eefc;
  --cas-muted:#a7b3c8;
  --cas-brand:#ffb03a;
  --cas-brand2:#ff6a00;
  --cas-accent:#5ec8ff;
  --cas-radius:1.25rem;
}
```
- **Background:** `--cas-bg` (page background)
- **Card base:** `--cas-card` (glassy card surface)
- **Text & Muted:** `--cas-text`, `--cas-muted`
- **Brand:** `--cas-brand`, `--cas-brand2` (for gradient buttons)
- **Accent:** `--cas-accent` (links and highlights)
- **Radii:** `--cas-radius` (rounded corners)

You can override them in **Customizer → Additional CSS** or by editing `cas.css` directly.

`theme.json` sets defaults for content width and color palette so Kadence UI is aligned with these values.

---

## 5) Utility classes you’ll use
Apply these classes to **Row Layouts** (Kadence) or groups/blocks as needed:

- `cas-section` – Section spacing (top/bottom ~96px)
- `cas-card` – Glass card style (border + shadow + rounded)
- `cas-reveal` – Fade/slide-in when entering viewport (IntersectionObserver)
- `cas-hero-title` – Gradient hero title text style
- `cas-muted` – Muted text color for intros/subtitles

**Buttons:** When you use a Kadence Button (or WP Button block), the child theme styles `.kb-button` / `.wp-block-button__link` to use the brand gradient automatically.

---

## 6) Patterns (Block Inserter → Patterns → “CAS”)
- **CAS Hero (with canvas):** full-width hero with `#cas-hero-canvas` + centered logo, title & paragraph.
- **CAS 3‑up Cards:** three cards for benefits/features.
- **CAS Programs Grid:** three cards for Music/Film/Comics (edit copy as needed).
- **CAS FAQ:** minimalist FAQ using `<details>` elements.
- **CAS Contact Strip:** email CTA in a card.
- **CAS CTA Row:** generic call-to-action row.

> You can mix these with Kadence Rows/Columns for any layout; the theme styling keeps it coherent.

---

## 7) Header & page settings (Kadence)
For a **glassy header over the hero**:
- On your landing page, enable **Transparent Header** (Kadence page settings sidebar).
- Optional: enable **Sticky Header** for a persistent nav.
- Disable **Page Title** on the landing page (cleaner hero).

Customizer tips:
- **General → Layout → Container width** ≈ **1200px** (matches design).
- **Header → Design**: Keep background transparent or semi-transparent; the child theme adds the subtle glass look.

---

## 8) Conditional enqueue (only on specific pages)
By default, CSS/JS is loaded site‑wide. To load only on your “Create A Spark” page, replace the enqueue block in `functions.php` with:

```php
add_action( 'wp_enqueue_scripts', function(){
  if ( is_page( 'create-a-spark' ) ) { // use page slug, ID, or title
    wp_enqueue_style( 'cas-child', get_stylesheet_directory_uri().'/assets/css/cas.css', [], '1.0.0' );
    wp_enqueue_script( 'cas-main', get_stylesheet_directory_uri().'/assets/js/cas-main.js', [], '1.0.0', true );
    wp_enqueue_script( 'cas-sparks', get_stylesheet_directory_uri().'/assets/js/cas-sparks.js', [ 'cas-main' ], '1.0.0', true );
  }
});
```

To **disable canvas** (e.g., for a content subpage), just omit `cas-sparks.js` from the enqueue or remove the hero canvas block.

---

## 9) Accessibility & motion
- The canvas animation respects **`prefers-reduced-motion`**, reducing particle count.
- Keep headings logical (H1 → H2 → H3) for screen readers.
- Ensure images have descriptive **alt** text in blocks.

---

## 10) Performance
- Very small JS (no frameworks).
- Use compressed images (WebP/AVIF if possible).
- On shared hosts, consider a caching plugin (e.g., WP Super Cache or LiteSpeed Cache if available).
- If Kadence performance settings are enabled, verify they don’t defer our tiny scripts incorrectly—see **Troubleshooting** below.

---

## 11) SEO & Open Graph
For the **landing page**:
- Set a clear **SEO title** and **meta description** in your SEO plugin (Rank Math / Yoast).
- Upload a **share image** (1200×630) and set it in the Social tab for the page.
- Set a **Site Icon** (favicon) in Appearance → Customize → Site Identity.

> The child theme does not force any meta tags; your SEO plugin remains the source of truth.

---

## 12) Troubleshooting
**Q: My reveal animations don’t trigger.**  
A: Ensure elements include the `cas-reveal` class. Check that no optimization plugin is removing the `IntersectionObserver` polyfill (modern browsers support it natively). Disable extreme CSS/JS minification to test.

**Q: The canvas hero isn’t visible.**  
A: Confirm the hero pattern is present and includes `<canvas id="cas-hero-canvas">`. Also make sure `cas-sparks.js` is enqueued, and the page uses a full‑width Row.

**Q: Header background looks solid.**  
A: Turn on **Transparent Header** on that page. Some header backgrounds from Customizer can override transparency; set it to transparent or very low opacity.

**Q: CLS (layout shift) from fonts?**  
A: Use system fonts (default) or load web fonts with `font-display: swap`. The theme defaults to system UI fonts for stability.

**Q: Plugin conflict with optimization/minify.**  
A: Exclude `cas-main.js` and `cas-sparks.js` from “combine/defer” rules to test. They are tiny and safe to load normally at footer.

---

## 13) Code snippets

**A. Enqueue only when a block/pattern is present (advanced)**  
Detect the hero canvas by content pattern:
```php
add_action( 'wp_enqueue_scripts', function(){
  if ( is_singular() ) {
    global $post;
    $has_canvas = isset($post->post_content) && strpos( $post->post_content, 'cas-hero-canvas' ) !== false;
    if ( $has_canvas ) {
      wp_enqueue_style( 'cas-child', get_stylesheet_directory_uri().'/assets/css/cas.css', [], '1.0.0' );
      wp_enqueue_script( 'cas-main', get_stylesheet_directory_uri().'/assets/js/cas-main.js', [], '1.0.0', true );
      wp_enqueue_script( 'cas-sparks', get_stylesheet_directory_uri().'/assets/js/cas-sparks.js', [ 'cas-main' ], '1.0.0', true );
    }
  }
});
```

**B. Add a custom body class from the Customizer (optional)**  
If you want to target just one page for CAS styling:
```php
add_filter( 'body_class', function( $classes ){
  if ( is_page( 'create-a-spark' ) ) $classes[] = 'cas-landing';
  return $classes;
});
```

**C. Disable animations globally (e.g., during audits):**
```css
.cas-reveal{ opacity:1 !important; transform:none !important; transition:none !important; }
#cas-hero-canvas{ display:none !important; }
```

---

## 14) Updating colors / tokens
- Update the variables in `assets/css/cas.css` and (optionally) mirror the palette in `theme.json`.
- If you change variable names, search and replace in `cas.css` and patterns to keep consistency.

---

## 15) Contributing (GitHub)
1. Fork the repo, create a feature branch, commit changes.
2. Run a quick smoke test on a local WP install (or staging).
3. Open a PR with a short description and screenshots/GIFs if visual changes are made.

**Recommended labels:** `enhancement`, `bug`, `docs`, `design`, `a11y`, `performance`.

---

## 16) Changelog (template)
```
## [1.0.1] - 2025-09-28
### Added
- New pattern: Partners logo wall
- Option to enqueue scripts only on landing page (Customizer toggle)

### Fixed
- Header transparency on iOS Safari scroll
```

---

## 17) License
MIT © Unge Vil / Create A Spark

---

## 18) Credits
Concept & design language: Create A Spark (Unge Vil)  
WordPress parent theme: Kadence

---

## 19) FAQ (quick)
- **Can I use this with other themes?** It’s tailored for Kadence. For others, copy `cas.css` and the scripts, then adapt header/blocks.
- **Does it support multi‑language?** The theme is language‑agnostic. Your site is English‑only today, but nothing blocks using a translation plugin later.
- **Where do I change the logo?** Swap the SVG in `assets/img/createaspark_logo.svg` or use a normal Image block in the hero pattern.
