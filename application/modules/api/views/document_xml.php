<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:document="http://www.google.com/schemas/sitemap-document/1.1">
    <?php foreach ($content as $row): ?>
        <?php if ($row->type == 1) { ?>
            <url> 
                <loc><?php echo site_url('content/document' . '/' . $row->id_content) ?></loc> 
                <image:image>
                    <image:loc><?php echo base_url() . 'resource/' . $row->cover . '.jpg' ?></image:loc> 
                </image:image>
                <document:document>     
                    <document:content_loc>
                        <?php echo base_url() . 'resource/' . $row->file ?>
                    </document:content_loc>
                    <document:thumbnail_loc>
                        <?php echo base_url() . 'resource/' . $row->cover . '.jpg' ?>
                    </document:thumbnail_loc>
                    <document:title><?php echo $row->title ?></document:title>  
                    <document:description><?php echo $row->description ?></document:description>
                </document:document>
            </url>
        <?php } elseif ($row->type == 4) { ?>
            <url> 
                <loc><?php echo site_url('content/document' . '/' . $row->id_content) ?></loc>                
                <document:document>                       
                    <document:title><?php echo $row->title ?></document:title>  
                    <document:description><?php echo $row->description ?></document:description>
                </document:document>
            </url>
        <?php } elseif ($row->type == 7) { ?>
            <?php
            $media = analyze_media($row->file);
            $extract_id = explode('^^^', $media);
            ?>
            <url> 
                <loc><?php echo site_url('content/document' . '/' . $row->id_content) ?></loc>
                <image:image>
                    <image:loc>http://img.docstoccdn.com/thumb/100/<?php echo $extract_id[1] ?>.png</image:loc> 
                </image:image>
                <document:document>
                    <document:thumbnail_loc>
                        http://img.docstoccdn.com/thumb/100/<?php echo $extract_id[1] ?>.png
                    </document:thumbnail_loc>
                    <document:title>Grilling steaks for summer</document:title>  
                    <document:description>
                        Get perfectly done steaks every time
                    </document:description>
                </document:document>
            </url>
        <?php } ?>            
    <?php endforeach; ?>
</urlset>
