<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:document="http://www.google.com/schemas/sitemap-document/1.1">
    <?php foreach ($content as $row): ?>
        <url>
            <loc><?php echo site_url('content/document' . '/' . $row->id_content); ?></loc>
            <lastmod><?php echo $row->date ?></lastmod>
            <priority>1</priority>
        </url>           
    <?php endforeach; ?>
</urlset>
