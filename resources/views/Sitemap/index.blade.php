<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ route('sitemap.static') }}</loc>
        <lastmod>2021-09-25T19:12:26+03:30</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.post') }}</loc>
        <lastmod>2021-08-11T19:12:26+03:30</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{ route('sitemap.category') }}</loc>
        <lastmod>2021-09-25T19:12:26+03:30</lastmod>
    </sitemap>
</sitemapindex>
