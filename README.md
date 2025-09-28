# Create A Spark — Website

A **fast, dark‑themed, animated** landing site for [Create A Spark](https://www.createaspark.org/), built as static files so you can deploy on GitHub Pages now and plug in a WordPress blog later.

## Highlights

- ⚡ **Sparks Canvas** hero animation (no heavy libraries)
- 🧩 **Scroll reveal** effects via Intersection Observer
- 🌓 **Dark, modern aesthetic** with glassy cards and gradients
- 🔍 **SEO‑ready**: meta, Open Graph, JSON‑LD, robots, sitemap
- 📱 **PWA shell**: `site.webmanifest` and large icon
- 🧱 **Zero build**: vanilla CSS+JS, easy to extend
- 🧭 **Marathon pages**: `/marathons/` with a ready template

---

## Structure

```
.
├── index.html
├── site.webmanifest
├── robots.txt
├── sitemap.xml
├── marathons/
│   ├── music-marathon.html
│   └── template.html
└── assets/
    ├── css/
    │   └── styles.css
    ├── js/
    │   ├── main.js
    │   └── sparks.js
    └── img/
        ├── createaspark_logo.svg
        ├── icon-512.png
        └── og-image.jpg
```

## Local preview

Just open `index.html` in a browser, or run a tiny server:

```bash
python3 -m http.server 8080
# then visit http://localhost:8080
```

## Deploy on GitHub Pages

1. Push this folder to your repo (e.g. `Unge-Vil/Create-A-Spark-Website`).
2. In **Settings → Pages**, choose **Deploy from Branch** (`main`) and root folder.
3. If you use a custom domain, add `CNAME` at the repo root and point DNS to GitHub Pages.
4. Update `sitemap.xml` and absolute `og:image`/`canonical` URLs to match your domain.

> Tip: Keep absolute Open Graph URLs (https://YOURDOMAIN/...) for clean shares.

## Add a new Marathon page

1. Copy `marathons/template.html` to `marathons/<slug>.html`.
2. Edit the page title, meta description, and content blocks.
3. Link it from the **Marathons** grid in `index.html`.
4. (Optional) create custom OG images per page and update the `<meta property="og:image">`.

## SEO & Open Graph checklist

- Unique `<title>` (≤60 chars) and `<meta name="description">` (≤160 chars) per page.
- Friendly URLs: `/marathons/music-marathon.html` (or switch to folders).
- JSON-LD in `index.html` for Organization. Add `Event` JSON-LD for each marathon page.
- Keep `og:image` at **1200×630** (provided at `assets/img/og-image.jpg` here).
- Submit `sitemap.xml` in **Google Search Console**.
- Add `alt` text to all images and logos.

## WordPress blog later

When you're ready to add a blog:
- Host WordPress on a subdomain (e.g., `blog.createaspark.org`) or in a subfolder if your host allows.
- Link to posts from the landing page, or embed a JSON feed to show latest posts.
- Keep the static site as the fast front door; blog handles long‑form updates.

## Performance

- Minimal JS and no heavy frameworks.
- Canvas caps particles and respects `prefers-reduced-motion`.
- Consider inlining critical CSS and deferring the rest for even faster LCP.

## Tasks for Codex (or future contributors)

- [ ] Add **Event JSON‑LD** on marathon pages (type `MusicEvent`/`Event`).
- [ ] Add **newsletter signup** form (Netlify Forms or simple POST endpoint).
- [ ] Build a **marathon data JSON** and render cards dynamically.
- [ ] Generate per‑marathon **OG images** (serverless or prebuilt).
- [ ] Create a **CNAME** file for custom domain on GitHub Pages.
- [ ] Hook up a **WordPress blog** feed on `/news/`.
- [ ] Add a **language toggle** (NO/EN).

## License

MIT © Unge Vil / Create A Spark


## Shared hosting deployment (Apache/PHP)

- Upload all files to your web root via SFTP or your hosting panel.
- Keep the provided **.htaccess** for compression, caching and basic headers.
- If you’ll embed a blog feed later:
  - Use `rss-proxy.php` to safely fetch RSS → JSON (CORS‑friendly).
  - Edit the `$allow` array in `rss-proxy.php` to include your blog feed URL.
  - Unhide the `#news` section in `index.html` and call `loadRSS('/rss-proxy.php?src=YOUR_FEED')`.

## Content model for this info‑only site

- Single‑page sections: **About**, **Programs**, **Approach**, **Impact**, **FAQ**.
- English only. No forms/newsletter/signups.
- Future: add a blog feed block when ready.
