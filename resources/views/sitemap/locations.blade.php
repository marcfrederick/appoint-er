<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<?php /** @var \App\Location[] $locations */ ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($locations as $location)
        <url>
            <loc>{{ Config::get('app.url') }}/locations/{{ $location->id }}</loc>
            <lastmod>{{ $location->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>
