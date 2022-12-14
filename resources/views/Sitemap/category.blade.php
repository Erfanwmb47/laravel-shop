<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($categories as $category)
        <url>
            <loc>{{ route('categories.index',$category->name) }}</loc>
            <changefreq>always</changefreq>
            <priority>0.9</priority>
            <lastmod>{{ $category->updated_at->format('Y-m-d\TH:i:s+03:30') }}</lastmod>
        </url>
    @endforeach
</urlset>
