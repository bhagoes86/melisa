<?php foreach ($document as $rowdocument): ?>
    <li data-cards-type='text'>
        <?php if ($rowdocument->type == 1) { ?><!--document-->
            <h2>Document Content</h2>
            <a href="javascript:void(0)">
                <img src="<?php echo base_url() . 'resource/' . $rowdocument->id_content . '.jpg' ?>" style="width: 100%;">
            </a>
        <?php } elseif ($rowdocument->type == 4) { ?><!--scribd-->
            <h2>Scribd Content</h2>
            <a href="javascript:void(0)" style="text-align: center">
                <i class="icon-file-text-alt"></i>
            </a>
        <?php } elseif ($rowdocument->type == 7) { ?><!--docstoc-->
            <h2>Docstoc Content</h2>
            <?php
            $media = analyze_media($rowdocument->file);
            $extract_id = explode('^^^', $media);
            ?>
            <a href="javascript:void(0)">
                <img src="http://img.docstoccdn.com/thumb/100/<?php echo $extract_id[1] ?>.png" style="width: 100%;">
            </a>
        <?php } ?>
        <p><?php echo $rowdocument->title ?></p>
    </li>
<?php endforeach; ?>