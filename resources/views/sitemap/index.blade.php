<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>http://appoint-er-unstable.herokuapp.com/</loc>
        <lastmod>2020-06-30T12:56:39+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>http://appoint-er-unstable.herokuapp.com/locations</loc>
        <lastmod>2020-06-30T12:56:39+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>http://appoint-er-unstable.herokuapp.com/login</loc>
        <lastmod>2020-06-30T12:56:39+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>http://appoint-er-unstable.herokuapp.com/register</loc>
        <lastmod>2020-06-30T12:56:39+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>http://appoint-er-unstable.herokuapp.com/imprint</loc>
        <lastmod>2020-06-30T12:56:39+00:00</lastmod>
        <priority>0.50</priority>
    </url>
    <url>
        <loc>http://appoint-er-unstable.herokuapp.com/privacy</loc>
        <lastmod>2020-06-30T12:56:39+00:00</lastmod>
        <priority>0.50</priority>
    </url>
    <url>
        <loc>http://appoint-er-unstable.herokuapp.com/contact</loc>
        <lastmod>2020-06-30T12:56:39+00:00</lastmod>
        <priority>0.50</priority>
    </url>

    <sitemap>
        <loc>{{ Config::get('app.url') }}/sitemap/locations</loc>
    </sitemap>
    <sitemap>
        <loc>{{ Config::get('app.url') }}/sitemap/users</loc>
    </sitemap>
</sitemapindex>
