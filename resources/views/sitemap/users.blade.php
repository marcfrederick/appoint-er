<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<?php /** @var \App\User[] $users */ ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($users as $user)
        <url>
            <loc>{{ Config::get('app.url') }}/users/{{ $user->id }}</loc>
            @if($user->updated_at)
                <lastmod>{{ $user->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            @endif
            <changefreq>monthly</changefreq>
            <priority>0.4</priority>
        </url>
    @endforeach
</urlset>
<?php
