# Create A Spark — Kadence Child Theme

A lightweight child theme that skins a WordPress Kadence site with the Create A Spark dark look, plus an animated canvas hero and ready-to-use block pattern.

## What’s inside
- **Child theme** files: `style.css`, `functions.php`
- **Assets**: CSS (base + Kadence compatibility), JS (smooth scroll + sparks canvas), images (logo, OG, icon)
- **Block Pattern**: “CAS Landing (Dark)” under Patterns → Create A Spark
- **Page Template**: “CAS Landing” (full-width, use with the pattern or `[cas_hero]` shortcode)

## Install
1. Zip this folder and upload under **Appearance → Themes → Add New → Upload Theme**, or copy to `/wp-content/themes/createaspark-kadence-child` via SFTP.
2. **Activate** “Create A Spark - Kadence Child” theme.
3. Create a new page, choose the **CAS Landing** template, insert the **CAS Landing (Dark)** pattern, publish.
4. Set as your homepage under **Settings → Reading** (or Kadence customizer).

## Shortcode
Use the hero anywhere:
```
[cas_hero title="Create A Spark" subtitle="Explosive creativity..." badge="Explosive • Fluid • Spark"]
```

## Notes
- English-only, info-only. No forms/newsletters.
- OG tags and SEO are handled by your SEO plugin (e.g., Rank Math). Use the included `og-image.jpg` for social previews.
- For site-wide styles on existing Kadence pages, the compatibility stylesheet keeps things cohesive without breaking layouts.
- If you need extra Kadence block tweaks, tell us which blocks/pages and we’ll refine selectors.
