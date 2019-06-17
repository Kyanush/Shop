<? echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ $siteUrl }}/pages.xml</loc>
        <lastmod>2019-06-04T05:19:06+00:00</lastmod>
    </sitemap>
    @foreach($cities as $city)
        <sitemap>
            <loc>{{ $siteUrl }}/{{ $city->code }}.xml</loc>
            <lastmod><?php echo date('c'); ?></lastmod>
        </sitemap>
    @endforeach
</sitemapindex>